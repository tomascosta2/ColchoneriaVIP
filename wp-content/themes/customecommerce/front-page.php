<?php 

get_header(); 

$post_id = $post->ID;

$bannerLink = get_field('boton_banner', $post_id);

?>

<div class="container">
	<div class="cv-homebanner">
		<div class="row">
			<div class="col-lg-8">
				<h1><?php echo get_field('titulo_banner', $post_id); ?></h1>
				<p><?php echo get_field('bajada_banner') ?></p>
				<span><?php echo get_field('datos_banner') ?></span>
				<a href="<?php echo $bannerLink['url']; ?>"><?php echo $bannerLink['title']; ?></a>
			</div>
			<div class="col-lg-4">
				<img src="<?php echo get_field('imagen_banner') ?>" alt="Colchones en Mendoza">
			</div>
		</div>
	</div>
	<div class="cv-homebeneficts">
		<div class="row">
			<div class="col-lg-4">
				<div class="cv-homebeneficts__item">
					<img src="<?php echo get_field('imagen_beneficio_1') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_1') ?></h5>
						<p><?php echo get_field('texto_beneficio_1') ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="cv-homebeneficts__item">
					<img src="<?php echo get_field('imagen_beneficio_2') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_2') ?></h5>
						<p><?php echo get_field('texto_beneficio_2') ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="cv-homebeneficts__item">
					<img src="<?php echo get_field('imagen_beneficio_3') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_3') ?></h5>
						<p><?php echo get_field('texto_beneficio_3') ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="cv-featuredproducts">
		<h2 class="cv-title"><?php echo get_field('titulo_1', $post_id); ?></h2>
		<?php get_template_part('template-parts/custom/featured-products'); ?>
	</div>
</div>

<section class="cv-homereviews">
	<h2 class="cv-title text-white"><?php echo get_field('titulo_2', $post_id); ?></h2>
</section>

<?php get_footer(); ?>