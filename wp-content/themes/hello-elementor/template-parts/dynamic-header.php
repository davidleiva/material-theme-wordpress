<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! hello_get_header_display() ) {
	return;
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'container_class'     => 'Menu__Container',
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
	'add_li_class'  => 'Menu__Item mdc-button'
] );
?>
<header id="Header site-header" class="Header site-header dynamic-header <?php echo esc_attr( hello_get_header_layout_class() ); ?>" role="banner">
	<div class="Header__TopHeader">
		<div class="container">
			<button class="mdc-button"><span class="mdc-button__ripple"></span> 911 984 986</button>
			<button class="mdc-button"><span class="mdc-button__ripple"></span> 911 984 986</button>
			<button class="mdc-button"><span class="mdc-button__ripple"></span> 911 984 986</button>
		</div>
	</div>
	<div class="Header__Container">
		<div class="header-inner">
			<div class="site-branding show-<?php echo hello_elementor_get_setting( 'hello_header_logo_type' ); ?>">
				<?php if ( has_custom_logo() && ( 'title' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
					<div class="site-logo Header__LogoWrapper <?php echo hello_show_or_hide( 'hello_header_logo_display' ); ?>">
						<?php the_custom_logo(); ?>
					</div>
				<?php endif;

				if ( $site_name && ( 'logo' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
					<h1 class="site-title <?php echo hello_show_or_hide( 'hello_header_logo_display' ); ?>">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
							<?php echo esc_html( $site_name ); ?>
						</a>
					</h1>
				<?php endif;

				if ( $tagline && ( hello_elementor_get_setting( 'hello_header_tagline_display' ) || $is_editor ) ) : ?>
					<p class="site-description <?php echo hello_show_or_hide( 'hello_header_tagline_display' ); ?> ">
						<?php echo esc_html( $tagline ); ?>
					</p>
				<?php endif; ?>
			</div>

			<?php if ( $header_nav_menu ) : ?>
				<nav class="site-navigation <?php echo hello_show_or_hide( 'hello_header_menu_display' ); ?>" role="navigation">
					<?php 
						echo $header_nav_menu;
					?>

					<button class="mdc-button mdc-button--raised mdc-theme--on-warning mdc-button--small">
						<span class="mdc-button__label">Contratar</span>
						<div class="mdc-button__ripple"></div>
					</button>

					<section class="MegaMenu mdc-elevation--z3">
						<div class="container">
							<div class="row d-flex">
								<div class="MegaMenu__Summary">
									<h6 class="h6 MegaMenu__SummaryHeader">¿Por qué somos diferentes?</h6>
									<p class="MegaMenu__SummaryText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, harum sed recusandae delectus numquam sunt eos eius quod voluptatibus minus deleniti ab alias ea cupiditate vitae doloremque expedita amet reprehenderit!</p>
								</div>
								<div class="MegaMenu__SubMenu">
									<?php echo wp_nav_menu([
										'menu' => 'SUBMENU-01',
										]);
									?>
								</div>
							</div>
						</div>
					</section>
				</nav>
				<div class="site-navigation-toggle-holder <?php echo hello_show_or_hide( 'hello_header_menu_display' ); ?>">
					<div class="site-navigation-toggle">
						<i class="eicon-menu-bar"></i>
						<span class="elementor-screen-only">Menu</span>
					</div>
				</div>
				<nav class="site-navigation-dropdown <?php echo hello_show_or_hide( 'hello_header_menu_display' ); ?>" role="navigation">
					<?php echo $header_nav_menu; ?>
				</nav>
			<?php endif; ?>
		</div>
	</div>

</header>
