<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer class="tcp-rightsfooter">
		<div class="container">
			<div class="d-lg-flex text-center justify-content-between">
				<p>©Nombre de la empresa 2023 - Todos los derechos reservados</p>
				<p>Sitio desarrollado por Tomás Costa</p>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
	window.addEventListener('load', () => {
		const menuToggler = document.getElementById('menuToggler');
		const mainMenu = document.getElementById('mainMenu');
		menuToggler.addEventListener('click', () => {
			mainMenu.classList.toggle('--active');
		});
	});
</script>

</body>
</html>
