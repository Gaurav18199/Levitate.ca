<?php
/**
 * Block Filters
 *
 * @package creative_design_agency
 * @since 1.0
 */

function creative_design_agency_block_wrapper( $creative_design_agency_block_content, $creative_design_agency_block ) {

	if ( 'core/button' === $creative_design_agency_block['blockName'] ) {
		
		if( isset( $creative_design_agency_block['attrs']['className'] ) && strpos( $creative_design_agency_block['attrs']['className'], 'has-arrow' ) ) {
			$creative_design_agency_block_content = str_replace( '</a>', creative_design_agency_get_svg( array( 'icon' => esc_attr( 'caret-circle-right' ) ) ) . '</a>', $creative_design_agency_block_content );
			return $creative_design_agency_block_content;
		}
	}

	if( ! is_single() ) {
	
		if ( 'core/post-terms'  === $creative_design_agency_block['blockName'] ) {
			if( 'post_tag' === $creative_design_agency_block['attrs']['term'] ) {
				$creative_design_agency_block_content = str_replace( '<div class="taxonomy-post_tag wp-block-post-terms">', '<div class="taxonomy-post_tag wp-block-post-terms flex">' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'tags' ) ) ), $creative_design_agency_block_content );
			}

			if( 'category' ===  $creative_design_agency_block['attrs']['term'] ) {
				$creative_design_agency_block_content = str_replace( '<div class="taxonomy-category wp-block-post-terms">', '<div class="taxonomy-category wp-block-post-terms flex">' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'category' ) ) ), $creative_design_agency_block_content );
			}
			return $creative_design_agency_block_content;
		}
		if ( 'core/post-date' === $creative_design_agency_block['blockName'] ) {
			$creative_design_agency_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'calendar' ) ) ), $creative_design_agency_block_content );
			return $creative_design_agency_block_content;
		}
		if ( 'core/post-author' === $creative_design_agency_block['blockName'] ) {
			$creative_design_agency_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'user' ) ) ), $creative_design_agency_block_content );
			return $creative_design_agency_block_content;
		}
	}
	if( is_single() ){

		// Add chevron icon to the navigations
		if ( 'core/post-navigation-link' === $creative_design_agency_block['blockName'] ) {
			if( isset( $creative_design_agency_block['attrs']['type'] ) && 'previous' === $creative_design_agency_block['attrs']['type'] ) {
				$creative_design_agency_block_content = str_replace( '<span class="post-navigation-link__label">', '<span class="post-navigation-link__label">' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'prev' ) ) ), $creative_design_agency_block_content );
			}
			else {
				$creative_design_agency_block_content = str_replace( '<span class="post-navigation-link__label">Next Post', '<span class="post-navigation-link__label">Next Post' . creative_design_agency_get_svg( array( 'icon' => esc_attr( 'next' ) ) ), $creative_design_agency_block_content );
			}
			return $creative_design_agency_block_content;
		}
		if ( 'core/post-date' === $creative_design_agency_block['blockName'] ) {
            $creative_design_agency_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . creative_design_agency_get_svg( array( 'icon' => 'calendar' ) ), $creative_design_agency_block_content );
            return $creative_design_agency_block_content;
        }
		if ( 'core/post-author' === $creative_design_agency_block['blockName'] ) {
            $creative_design_agency_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . creative_design_agency_get_svg( array( 'icon' => 'user' ) ), $creative_design_agency_block_content );
            return $creative_design_agency_block_content;
        }

	}
    return $creative_design_agency_block_content;
}
	
add_filter( 'render_block', 'creative_design_agency_block_wrapper', 10, 2 );
