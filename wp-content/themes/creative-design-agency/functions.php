<?php
/**
 * Creative Design Agency functions and definitions
 *
 * @package creative_design_agency
 * @since 1.0
 */


if ( ! function_exists( 'creative_design_agency_support' ) ) :
	function creative_design_agency_support() {

		load_theme_textdomain( 'creative-design-agency', get_template_directory() . '/languages' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support('woocommerce');

		// Enqueue editor styles.
		add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor-style.css');

		/* Theme Credit link */
		define('CREATIVE_DESIGN_AGENCY_BUY_NOW',__('https://www.cretathemes.com/products/creative-agency-wordpress-theme','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_PRO_DEMO',__('https://pattern.cretathemes.com/creative-design-agency/','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_THEME_DOC',__('https://pattern.cretathemes.com/free-guide/creative-design-agency/','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_PRO_THEME_DOC',__('https://pattern.cretathemes.com/pro-guide/creative-design-agency/','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_SUPPORT',__('https://wordpress.org/support/theme/creative-design-agency/','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_REVIEW',__('https://wordpress.org/support/theme/creative-design-agency/reviews/#new-post','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_PRO_THEME_BUNDLE',__('https://www.cretathemes.com/products/wordpress-theme-bundle','creative-design-agency'));
		define('CREATIVE_DESIGN_AGENCY_PRO_ALL_THEMES',__('https://www.cretathemes.com/collections/wordpress-block-themes','creative-design-agency'));


	}
endif;

add_action( 'after_setup_theme', 'creative_design_agency_support' );

if ( ! function_exists( 'creative_design_agency_styles' ) ) :
	function creative_design_agency_styles() {
		// Register theme stylesheet.
		$creative_design_agency_theme_version = wp_get_theme()->get( 'Version' );

		$creative_design_agency_version_string = is_string( $creative_design_agency_theme_version ) ? $creative_design_agency_theme_version : false;
		wp_enqueue_style(
			'creative-design-agency-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$creative_design_agency_version_string
		);

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_style( 'animate-css', esc_url(get_template_directory_uri()).'/assets/css/animate.css' );

		wp_enqueue_script( 'jquery-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', array('jquery') );

		wp_style_add_data( 'creative-design-agency-style', 'rtl', 'replace' );

		//font-awesome
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fontawesome/css/all.css'
			, array(), '6.7.0' );


		// Enqueue Swiper CSS
		wp_enqueue_style(
		    'swiper-bundle-style',
		    get_template_directory_uri() . '/assets/css/swiper-bundle.css',
		    array(),
		    $creative_design_agency_version_string
		);

		// Enqueue Swiper JS
		wp_enqueue_script(
		    'swiper-bundle-scripts',
		    get_template_directory_uri() . '/assets/js/swiper-bundle.js',
		    array('jquery'),
		    $creative_design_agency_version_string,
		    true
		);

		// Enqueue Custom Script (depends on Swiper too)
		wp_enqueue_script(
		    'creative-design-agency-custom-script',
		    get_template_directory_uri() . '/assets/js/custom-script.js',
		    array('jquery', 'swiper-bundle-scripts'),
		    $creative_design_agency_version_string,
		    true
		);
	}
endif;

add_action( 'wp_enqueue_scripts', 'creative_design_agency_styles' );

/* Enqueue admin-notice-script js */
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'appearance_page_creative-design-agency') return;

    wp_enqueue_script('admin-notice-script', get_template_directory_uri() . '/get-started/js/admin-notice-script.js', ['jquery'], null, true);
    wp_localize_script('admin-notice-script', 'pluginInstallerData', [
        'ajaxurl'     => admin_url('admin-ajax.php'),
        'nonce'       => wp_create_nonce('install_cretatestimonial_nonce'), // Match this with PHP nonce check
        'redirectUrl' => admin_url('themes.php?page=creative-design-agency-guide-page'),
    ]);
});

add_action('wp_ajax_check_creta_testimonial_activation', function () {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
    $creative_design_agency_plugin_file = 'creta-testimonial-showcase/creta-testimonial-showcase.php';

    if (is_plugin_active($creative_design_agency_plugin_file)) {
        wp_send_json_success(['active' => true]);
    } else {
        wp_send_json_success(['active' => false]);
    }
});

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// TGM plugin
require get_template_directory() . '/inc/tgm/tgm.php';

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Get Started.
require get_template_directory() . '/inc/get-started/get-started.php';

// Add Getstart admin notice
function creative_design_agency_admin_notice() { 
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'creative_design_agency_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();

    if( !$meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } if($current_screen->base != 'appearance_page_creative-design-agency-guide-page' && $current_screen->base != 'toplevel_page_cretats-theme-showcase' ) { ?>

	    <div class="notice notice-success dash-notice">
	        <h1><?php esc_html_e('Hey, Thank you for installing Creative Design Agency Theme!', 'creative-design-agency'); ?></h1>
	        <p><a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button get-start-btn">
				   <?php echo __('Nevigate Getstart', 'creative-design-agency'); ?>
				</a> 
	        	<script type="text/javascript">
				document.getElementById('install-activate-button').addEventListener('click', function () {
				    const creative_design_agency_button = this;
				    const creative_design_agency_redirectUrl = '<?php echo esc_url(admin_url("themes.php?page=creative-design-agency-guide-page")); ?>';
				    // First, check if plugin is already active
				    jQuery.post(ajaxurl, { action: 'check_creta_testimonial_activation' }, function (response) {
				        if (response.success && response.data.active) {
				            // Plugin already active — just redirect
				            window.location.href = creative_design_agency_redirectUrl;
				        } else {
				            // Show Installing & Activating only if not already active
				            creative_design_agency_button.textContent = 'Nevigate Getstart';

				            jQuery.post(ajaxurl, {
				                action: 'install_and_activate_creta_testimonial_plugin',
				                nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
				            }, function (response) {
				                if (response.success) {
				                    window.location.href = creative_design_agency_redirectUrl;
				                } else {
				                    alert('Failed to activate the plugin.');
				                    creative_design_agency_button.textContent = 'Try Again';
				                }
				            });
				        }
				    });
				});
				</script>

	        	
	        	<a class="button button-primary site-edit" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>"><?php esc_html_e('Site Editor', 'creative-design-agency'); ?></a> 
				<a class="button button-primary buy-now-btn" href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'creative-design-agency'); ?></a>
				<a class="button button-primary bundle-btn" href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_PRO_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Get Bundle', 'creative-design-agency'); ?></a>
	        </p>
	        <p class="dismiss-link"><strong><a href="?creative_design_agency_admin_notice=1"><?php esc_html_e( 'Dismiss', 'creative-design-agency' ); ?></a></strong></p>
	    </div>
	    <?php

	}?>
	    <?php

	}
}

add_action( 'admin_notices', 'creative_design_agency_admin_notice' );

if( ! function_exists( 'creative_design_agency_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function creative_design_agency_update_admin_notice(){
    if ( isset( $_GET['creative_design_agency_admin_notice'] ) && $_GET['creative_design_agency_admin_notice'] = '1' ) {
        update_option( 'creative_design_agency_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'creative_design_agency_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'creative_design_agency_getstart_setup_options');
function creative_design_agency_getstart_setup_options () {
    update_option('creative_design_agency_admin_notice', FALSE );
}