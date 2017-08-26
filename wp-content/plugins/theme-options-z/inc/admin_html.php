<?php 
defined('ABSPATH') or die('No script kiddies please!'); 
?>
<div class="wrap" ng-app="themeoptionsz" id="themeoptionsz" ng-controller="MainController">
    <h2><?php echo TOZ_PLUGIN_FULL_NAME; ?></h2>

    <div id="message" ng-show="updatedSuccess" class="updated notice notice-success is-dismissible below-h2">
        <p>
            Options updated.
        </p>
        <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">
                Dismiss this notice.
            </span>
        </button>
    </div>

    <form novalidate="" name="tozForm">
        <add-option></add-option>
        <table class="wp-list-table widefat fixed striped toz-options">
            <thead>
                <tr options-table-header></tr>
            </thead>

            <tbody id="toz-options-list" ui-sortable="sortableOptions" ng-model="options">
                <tr id="{{option.id}}" ng-repeat="option in options track by $index" class="toz_option">
                    <td scope="row" class="move-column" >
                        <move-icon></move-icon>
                    </td>
                    <td class="column-name">
                        <input type="text" ng-model="option.name" name="formoptions[name_{{$index}}]" ng-trim="true" placeholder="Option name" ng-pattern="/^[a-zA-Z0-9\s]*$/" />
                        <div ng-show="tozForm['formoptions[name_{{$index}}]'].$invalid && !tozForm['formoptions[name_{{$index}}]'].$pristine" class="invalidField">{{invalidNameMessage}}</div>
                        {{tozForm['formoptions[name_$index]']}}
                    </td>
                    <td class="email column-value">
                        <div ng-if="option.type == 'text'">
                            <text-field></text-field>
                        </div>
                        <div ng-if="option.type == 'textarea'">
                            <textarea-field></textarea-field>
                        </div>
                    </td>
                    <td class="role column-shortcode">
                        <span class="readonly" ng-show="tozForm['formoptions[name_{{$index}}]'].$valid &&  tozForm['formoptions[name_{{$index}}]'].$viewValue != '' " select-on-clickx ng-cloak ng-bind="generateShortCode(option)" onclick="selectText(this)" ></span>
                    </td>

                    <td class="posts column-phpcode numx">
                        <span class="readonly" ng-show="tozForm['formoptions[name_{{$index}}]'].$valid && tozForm['formoptions[name_{{$index}}]'].$viewValue != ''" select-on-clickx ng-bind="generatePHPCode(option)" onclick="selectText(this)" ></span>
                    </td>
                    <td  class="column-delete">
                        <delete-icon></delete-icon>
                    </td>
                </tr>
                <tr ng-if="options.length == 0" style="text-align: center;">
                    <td colspan="6">
                        <?php echo __('Oops, No Options Found!', TOZ_TEXT_DOMAIN ) ; ?>
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr options-table-header></tr>
            </tfoot>

        </table>
        <add-option></add-option>        
    </form>
</div>
