/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectText(containerid) {
	if (document.selection) {
		var range = document.body.createTextRange();
		range.moveToElementText(containerid);
		range.select();
	} else if (window.getSelection) {
		var range = document.createRange();
		range.selectNode(containerid);
		window.getSelection().addRange(range);
	}
}

 
var app = angular.module('themeoptionsz', ['ui.sortable']);
app.service('optionsService', ['$http', function ($http) {
        this.options = [];

        // this.options.push({id: Math.ceil(Math.random() * 100).toString() + Date.now().toString().substr(4), name: 'copyright text', type: 'textarea', value: 'shyam 2 "makwana'});

        // get options when needed from database. 
        this.getOptions = function (fromDb) {
            var fromDb = fromDb || null;
            if (fromDb == true) {
                return $http({
                    method: "post",
                    url: tozLocalized.ajaxurl,
                    params: {action: 'get_toz_options'}
                })
                .then(this.handleSuccess, this.handleError);
            } else {
                return this.options;
            }
        }

        // Total count 
        this.optionsCount = function () {
            if (this.options === []) {
                return false;
            }else {
                var length = this.options.length;
                return (length > 1) ? (length + " items") : (length + " item");
            }
        };

        // Fiedl types object 
        this.fieldtypes = {};
        this.fieldtypes["default"] = {name: "Select Field Type", slug: "default", value: -1};
        this.fieldtypes["text"] = {name: "Text", slug: "text", value: 1};
        this.fieldtypes["textarea"] = {name: "Textarea", slug: "textarea", value: 2};

        this.selectedFieldType = this.fieldtypes["default"];

        this.saveOptions = function (options) {
                    return $http({
                        method: "post",
                        url: tozLocalized.ajaxurl,
                        data: { 'options' : JSON.stringify(options)},
                        params: { action: 'save_toz_options'},
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    })
                    .then(this.handleSuccess, this.handleError);
        };

        this.handleSuccess = function (res) {
            if (res.data !== "0" && res.data.constructor === Array) {
                this.options = res.data;
                return res.data;
            }
//            else if (  && res.data !== "0" ) {
//                this.options = [];
//                // Something went wrong
//                return false;
//            }
            else {
                this.options = [];
                return false; 
            }
        }

        this.handleError = function (response) {
            if (!angular.isObject(response.data) || !response.data.message) {
                return($q.reject("An unknown error occurred."));
            }
            return($q.reject(response.data.message));
        }

        return this; 
    }]);

// Applications main Controller 
app.controller('MainController', ["$scope", "optionsService", "$log", "$http", function ($scope, optionsService, $log, $http) {
        $scope.options = optionsService.options;
        $scope.fieldTypes = optionsService.fieldtypes;
        $scope.optionsCount = optionsService.optionsCount;
        $scope.selectedFieldType = optionsService.selectedFieldType;
        $scope.updatedSuccess = false; 
        $scope.invalidNameMessage = "Alphanumeric and Spaces are allowed only.";
        $scope.sortableOptions = {
            handle: '> .move-column',
            stop: function () {
            }
        }
        
        function applyRemoteData(data) {
            if (data !== false) {
                $scope.options = data;
            }else {
                $scope.options = [];
            }
        }

        getOptions();
        function getOptions() {
            optionsService.getOptions(true).then(function (data) {
                applyRemoteData(data);
            });
        }

        $scope.saveOptions = function (tozForm) {
            $scope.updatedSuccess = false; 
            var tozForm = tozForm || null;
            if (tozForm && tozForm.$valid) {
                optionsService.saveOptions($scope.options).then(function (data) {
                    applyRemoteData(data);
                    $scope.updatedSuccess = true; 
                });
            }
        }

        // Add new option button 
        $scope.addOption = function () {
            if ($scope.selectedFieldType.value !== -1) {
                $scope.options.push({id: Math.ceil(Math.random() * 100).toString() + Date.now().toString().substr(4), name: '', type: $scope.selectedFieldType.slug, value: ''});
            }
        };

        // For removing Option
        $scope.removeOption = function ($index) {
            $scope.options.splice($index, 1);
        }

        // For generating shortcode based on option id
        $scope.generateShortCode = function (option) {
            var shortcode = "[toz_option name=\"" + option.name + "\" id=\"" + option.id + "\"]";
            return shortcode;

        };

        // For generating PHP code based on option ID
        $scope.generatePHPCode = function (option) {
            var shortcode = "<?php echo toz_option('" + option.name + "' , '" + option.id + "'); ?>";
            return shortcode;
        };

    }]);

// Add new option button 
app.directive('addOption', function () {
    return {
        restrict: 'E',
        templateUrl: tozLocalized.templates + 'addOption.html'
    }
});

// Options table thead and tfoot rows.
app.directive('optionsTableHeader', function () {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: tozLocalized.templates + 'optionsTableHeader.html'
    }
});

// textField directive 
app.directive('textField', function () {
    return {
        restrict: 'E',
        template: '<input type="text" ng-model="option.value" name="formoptions[value_{{$index}}]" ng-trim="false" placeholder="Option Value" />'
    }
});

// textareaField directive 
app.directive('textareaField', function () {
    return {
        restrict: 'E',
        template: '<textarea ng-model="option.value"  name="formoptions[value_{{$index}}]" ng-trim="false"  placeholder="Option Value" rows="4" ></textarea>'
    }
});

// move icon directive 
app.directive('moveIcon', function () {
    return {
        restrict: 'E',
        template: '<img src="' + tozLocalized.images + 'move.png' + '" alt="Move" title="Move Option" />'
    }
});

// delete icon directive 
app.directive('deleteIcon', function () {
    return {
        restrict: 'E',
        replace: true,
        template: '<button type="button" class="notice-dismiss" ng-click="removeOption($index)"><span class="screen-reader-text">Delete this option.</span></button>'
    }
});


//  http://stackoverflow.com/questions/1173194/select-all-div-text-with-single-mouse-click
