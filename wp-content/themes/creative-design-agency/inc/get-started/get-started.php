<?php
add_action( 'admin_menu', 'creative_design_agency_getting_started' );
function creative_design_agency_getting_started() {
	add_theme_page( esc_html__('Get Started', 'creative-design-agency'), esc_html__('Get Started', 'creative-design-agency'), 'edit_theme_options', 'creative-design-agency-guide-page', 'creative_design_agency_test_guide');
}

// Add a Custom CSS file to WP Admin Area
function creative_design_agency_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
   wp_enqueue_script( 'admin-notice-script', get_template_directory_uri() . '/get-started/js/admin-notice-script.js', array( 'jquery' ) );
}
add_action('admin_enqueue_scripts', 'creative_design_agency_admin_theme_style');

//guidline for about theme
function creative_design_agency_test_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'creative-design-agency' );
?>
	<div class="wrapper-outer">
		<div class="left-main-box">
			<div class="intro"><h3><?php echo esc_html( $theme->Name ); ?></h3></div>
			<div class="left-inner">
				<div class="about-wrapper">
					<div class="col-left">
						<p><?php echo esc_html( $theme->get( 'Description' ) ); ?></p>
					</div>
					<div class="col-right">
						<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/screenshot.png" alt="" />
					</div>
				</div>
				<div class="link-wrapper">
					<h4><?php esc_html_e('Important Links', 'creative-design-agency'); ?></h4>
					<div class="link-buttons">
						<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Free Setup Guide', 'creative-design-agency'); ?></a>
						<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'creative-design-agency'); ?></a>
						<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'creative-design-agency'); ?></a>
						<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_PRO_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Setup Guide', 'creative-design-agency'); ?></a>
					</div>
				</div>
				<div class="support-wrapper">
					<div class="editor-box">
						<i class="dashicons dashicons-admin-appearance"></i>
						<h4><?php esc_html_e('Theme Customization', 'creative-design-agency'); ?></h4>
						<p><?php esc_html_e('Effortlessly modify & maintain your site using editor.', 'creative-design-agency'); ?></p>
						<div class="support-button">
							<a class="button button-primary" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" target="_blank"><?php esc_html_e('Site Editor', 'creative-design-agency'); ?></a>
						</div>
					</div>
					<div class="support-box">
						<i class="dashicons dashicons-microphone"></i>
						<h4><?php esc_html_e('Need Support?', 'creative-design-agency'); ?></h4>
						<p><?php esc_html_e('Go to our support forum to help you in case of queries.', 'creative-design-agency'); ?></p>
						<div class="support-button">
							<a class="button button-primary" href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Get Support', 'creative-design-agency'); ?></a>
						</div>
					</div>
					<div class="review-box">
						<i class="dashicons dashicons-star-filled"></i>
						<h4><?php esc_html_e('Leave Us A Review', 'creative-design-agency'); ?></h4>
						<p><?php esc_html_e('Are you enjoying Our Theme? We would Love to hear your Feedback.', 'creative-design-agency'); ?></p>
						<div class="support-button">
							<a class="button button-primary" href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate Us', 'creative-design-agency'); ?></a>
						</div>
					</div>
				</div>
			</div>
			<div class="go-premium-box">
				<h4><?php esc_html_e('Why Go For Premium?', 'creative-design-agency'); ?></h4>
				<ul class="pro-list">
					<li><?php esc_html_e('Advanced Customization Options', 'creative-design-agency');?></li>
					<li><?php esc_html_e('One-Click Demo Import', 'creative-design-agency');?></li>
					<li><?php esc_html_e('WooCommerce Integration & Enhanced Features', 'creative-design-agency');?></li>
					<li><?php esc_html_e('Performance Optimization & SEO-Ready', 'creative-design-agency');?></li>
					<li><?php esc_html_e('Premium Support & Regular Updates', 'creative-design-agency');?></li>
				</ul>
			</div>
		</div>
		<div class="right-main-box">
			<div class="right-inner">
				<div class="pro-boxes">
					<h4><?php esc_html_e('Get Theme Bundle', 'creative-design-agency'); ?></h4>
					<p><?php esc_html_e('60+ Premium WordPress Themes', 'creative-design-agency'); ?></p>
					<p class="main-bundle-price" ><strong class="cancel-bundle-price"><?php esc_html_e('$2340', 'creative-design-agency'); ?></strong><span class="bundle-price"><?php esc_html_e('$86', 'creative-design-agency'); ?></span></p>
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/bundle.png" alt="bundle image" />
					<p><?php esc_html_e('SUMMER SALE: ', 'creative-design-agency'); ?><strong><?php esc_html_e('Extra 20%', 'creative-design-agency'); ?></strong><?php esc_html_e(' OFF on WordPress Theme Bundle Use Code: ', 'creative-design-agency'); ?><strong><?php esc_html_e('“HEAT20”', 'creative-design-agency'); ?></strong></p>
					<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_PRO_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Get Theme Bundle For ', 'creative-design-agency'); ?><span><?php esc_html_e('$86', 'creative-design-agency'); ?></a>
				</div>
				<div class="pro-boxes pro-theme-container">
					<h4><?php esc_html_e('Creative Design Agency Pro', 'creative-design-agency'); ?></h4>
					<p class="pro-theme-price" ><?php esc_html_e('$39', 'creative-design-agency'); ?></p>
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/premium.png" alt="premium image" />
					<p><?php esc_html_e('SUMMER SALE: ', 'creative-design-agency'); ?><strong><?php esc_html_e('Extra 25%', 'creative-design-agency'); ?></strong><?php esc_html_e(' OFF on WordPress Block Themes! Use Code: ', 'creative-design-agency'); ?><strong><?php esc_html_e('“SUMMER25”', 'creative-design-agency'); ?></strong></p>
					<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade To Pro At Just at $29.25', 'creative-design-agency'); ?></a>
				</div>
				<div class="pro-boxes last-pro-box">
					<h4><?php esc_html_e('View All Our Themes', 'creative-design-agency'); ?></h4>
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/all-themes.png" alt="all themes image" />
					<a href="<?php echo esc_url( CREATIVE_DESIGN_AGENCY_PRO_ALL_THEMES ); ?>" target="_blank"><?php esc_html_e('View All Our Premium Themes', 'creative-design-agency'); ?></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>