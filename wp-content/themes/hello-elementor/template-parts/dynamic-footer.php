<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';

$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
	'container_class' => 'w-100',
	'add_li_class'  => 'col-md-4'
] );

$footer_nav_menu_2 = wp_nav_menu( [
	'menu' => '7',
	'fallback_cb' => false,
	'echo' => false,
	'container_class' => 'w-100',
	'add_li_class'  => 'col-md-4'
] );

?>
<footer id="site-footer" class="Footer text-white site-footer dynamic-footer pb-0 <?php echo $footer_class; ?>" role="contentinfo">
	<div class="bg-primary">
		<div class="container">
			<div class="row">
				<div class="site-branding show-<?php echo hello_elementor_get_setting( 'hello_footer_logo_type' ); ?> mt-3 mb-2 py-3">
					<img src="<?php echo get_template_directory_uri().'/assets/images/LOGO_FOOTER.svg' ?>" />
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<a href="#" class="link-secondary d-block">info@getlife.es | 911 879 876</a>
					<a href="#" class="link-secondary d-block">Sta. Engracia 90, Planta 4. 28010. Madrid, España.</a>
				</div>
				<div class="col-md-9">
					<?php if ( $footer_nav_menu ) : ?>
						<nav class="site-navigation <?php echo hello_show_or_hide( 'hello_footer_menu_display' ); ?>" role="navigation">
							<?php echo $footer_nav_menu; ?>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		
			<?php if ( $footer_nav_menu_2 ) : ?>
			<div class="row">
				<div class="col-md-9 offset-md-3">
					<nav class="site-navigation" role="navigation">
						<?php echo $footer_nav_menu_2; ?>
					</nav>
				</div>
			</div>
			<?php endif; ?>


			<div class="row mt-3">
				<div class="col-md-3 offset-md-9 ps-0">
					<ul class="list-inline mb-0">
						<li class="list-inline-item">
							<a href="#">
								<img src="/wp-content/themes/hello-elementor/img/instagram.svg" alt="Instagram"><span class="d-none">Instagram</span>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<img src="/wp-content/themes/hello-elementor/img/facebook.svg" alt="Facebook"><span class="d-none">Facebook</span>
							</a>						
						</li>
						<li class="list-inline-item">
							<a href="#">
								<img src="/wp-content/themes/hello-elementor/img/twitter.svg" alt="Twitter"><span class="d-none">Twitter</span>
							</a>						
						</li>
						<li class="list-inline-item">
							<a href="#">
								<img src="/wp-content/themes/hello-elementor/img/youtube.svg" alt="Youtube"><span class="d-none">Youtube</span>
							</a>						
						</li>
					</ul>
				</div>
			</div>

			<p class="border-top border-top mt-5 py-4 mb-0" style="font-size: 0.625rem">A través del presente Aviso Legal, le informamos que la página web con URL getlife.es (en lo sucesivo, el “Sitio Web”) es YOUR LIFE CORREDURÍA DE SEGUROS, S.L. (en lo sucesivo, “GETLIFE”), siendo la misma sociedad que gestiona y opera a través del Sitio Web. GETLIFE es una sociedad registrada en el Registro Mercantil de Madrid, con CIF B-42.814.236 y domicilio en calle Francisco de Rojas, 3 – 6ºD, Madrid 28010. Puede obtener más información sobre GETLIFE poniéndose en contacto enviando un correo electrónico a la siguiente dirección: info@getlife.es. Your Life Correduría de Seguros SL es un corredor de seguros inscrito en la DGSFP con número J-3945</p>
		</div>
	</div>
	<div class="bg-grey-blue-40">
		<div class="container">
			<div class="row py-3 align-items-center" style="font-size: 0.875rem">
				<div class="col-6 text-primary">
					<a class="p-0" href="#">Términos y condiciones</a> · <a class="p-0" href="#">Política de privacidad</a> · <a class="p-0" href="#">Política de cookies</a>
				</div>
				<div class="col-6 text-end text-primary">
					<span class="me-3">@ 2021 Getlife. Todos los derechos reservados</span><img class="mw-100 mt-n2" width="64px" alt="certificado ssl" src="/wp-content/themes/hello-elementor/img/SSL.png">
				</div>
			</div>
			<!-- <?php if ( '' !== hello_elementor_get_setting( 'hello_footer_copyright_text' ) || $is_editor ) : ?>
				<div class="copyright <?php echo hello_show_or_hide( 'hello_footer_copyright_display' ); ?>">
					<p class="mb-0"><?php echo hello_elementor_get_setting( 'hello_footer_copyright_text' ); ?></p>
				</div>
			<?php endif; ?> -->
		</div>
	</div>
</footer>
