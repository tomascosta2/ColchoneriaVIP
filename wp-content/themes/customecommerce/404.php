<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="tcp-notfoundpage">
	<div class="container">
		<h1>404</h1>
		<p>No pudimos encontrar lo que buscabas... Por favor intenta con otras palabras clave</p>
		<?php get_search_form(); ?>
	</div>
</div>
	
<?php
get_footer();
