( function( api ) {

	// Extends our custom "creative-design-agency" section.
	api.sectionConstructor['creative-design-agency'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );