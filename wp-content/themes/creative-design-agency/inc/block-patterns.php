<?php
/**
 * Block Patterns
 *
 * @package creative_design_agency
 * @since 1.0
 */

function creative_design_agency_register_block_patterns() {
	$creative_design_agency_block_pattern_categories = array(
		'creative-design-agency' => array( 'label' => esc_html__( 'Creative Design Agency', 'creative-design-agency' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'creative-design-agency' ) ),
	);

	$creative_design_agency_block_pattern_categories = apply_filters( 'creative_design_agency_creative_design_agency_block_pattern_categories', $creative_design_agency_block_pattern_categories );

	foreach ( $creative_design_agency_block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'creative_design_agency_register_block_patterns', 9 );