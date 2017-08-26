( function( api ) {

	// Extends our custom "vw-corporate-lite" section.
	api.sectionConstructor['vw-corporate-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );