<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'tcp-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<div class="tcp-overheader">
	<svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M3.20022 0.105474C3.35692 -0.0371044 3.6 -0.0351512 3.7567 0.107427C4.31116 0.613286 4.83147 1.15821 5.31763 1.74805C5.53862 1.4668 5.78973 1.16016 6.06094 0.910161C6.21964 0.76563 6.46473 0.76563 6.62344 0.912114C7.31853 1.55665 7.90714 2.40821 8.32098 3.2168C8.7288 4.01368 9 4.82813 9 5.40235C9 7.89454 6.99509 10 4.5 10C1.97679 10 0 7.89258 0 5.4004C0 4.6504 0.357589 3.73438 0.912054 2.82813C1.47254 1.90821 2.26406 0.949224 3.20022 0.105474ZM4.53415 8.12501C5.04241 8.12501 5.49241 7.98829 5.91629 7.71485C6.76205 7.14063 6.98906 5.99219 6.4808 5.08985C6.3904 4.91407 6.15938 4.90235 6.02879 5.05079L5.52254 5.62305C5.38996 5.77149 5.15089 5.76758 5.02634 5.61329C4.69487 5.20313 4.10223 4.47071 3.76473 4.05469C3.63817 3.89844 3.3971 3.89649 3.26853 4.05274C2.58951 4.88282 2.24799 5.40626 2.24799 5.99415C2.25 7.33204 3.26652 8.12501 4.53415 8.12501Z" fill="#FF5C00"/>
	</svg>
	<span>Llevate tu colchon con hasta un 50% de descuento en las mejores marcas</span>
</div>
<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<div class="container">
		<div class="tcp-header__inner">
			<?php get_template_part( 'template-parts/header/site-branding' ); ?>
			<?php get_template_part( 'template-parts/header/site-nav' ); ?>
		</div>
	</div>
</header><!-- #masthead -->
