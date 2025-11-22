<?php
/**
 * Block Styles
 *
 * @package creative_design_agency
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function creative_design_agency_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'creative-design-agency-padding-0',
				'label' => esc_html__( 'No Padding', 'creative-design-agency' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'creative-design-agency-post-author-card',
				'label' => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'creative-design-agency-button',
				'label'        => esc_html__( 'Plain', 'creative-design-agency' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'creative-design-agency-post-comments',
				'label'        => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'creative-design-agency-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'creative-design-agency-wp-table',
				'label'        => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'creative-design-agency-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'creative-design-agency-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'creative-design-agency' ),
			)
		);
	}
	add_action( 'init', 'creative_design_agency_register_block_styles' );
}
