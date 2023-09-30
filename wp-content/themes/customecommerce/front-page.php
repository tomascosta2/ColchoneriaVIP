<?php 

get_header(); 

$post_id = $post->ID;

$bannerLink = get_field('boton_banner', $post_id);

?>

<div class="container">
	<section class="cv-homebanner tcp-card">
		<div class="row">
			<div class="col-lg-8">
				<h1><?php echo get_field('titulo_banner', $post_id); ?></h1>
				<p><?php echo get_field('bajada_banner') ?></p>
				<span><?php echo get_field('datos_banner') ?></span>
				<a class="cv-btn --primary" href="<?php echo $bannerLink['url']; ?>"><?php echo $bannerLink['title']; ?></a>
			</div>
			<div class="col-lg-4">
				<img class="img-fluid" src="<?php echo get_field('imagen_banner') ?>" alt="Colchones en Mendoza">
			</div>
		</div>
	</section>
	<section class="cv-homebeneficts">
		<div class="row">
			<div class="col-lg-4">
				<div class="tcp-card">
					<img src="<?php echo get_field('imagen_beneficio_1') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_1') ?></h5>
						<p><?php echo get_field('texto_beneficio_1') ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tcp-card">
					<img src="<?php echo get_field('imagen_beneficio_2') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_2') ?></h5>
						<p><?php echo get_field('texto_beneficio_2') ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tcp-card">
					<img src="<?php echo get_field('imagen_beneficio_3') ?>" alt="Colchones en Mendoza">
					<div class="cv-homebeneficts__itembody">
						<h5><?php echo get_field('titulo_beneficio_3') ?></h5>
						<p><?php echo get_field('texto_beneficio_3') ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="cv-homefeatured">
		<div class="cv-featuredproducts">
			<h2 class="cv-title mb-5"><?php echo get_field('titulo_1', $post_id); ?></h2>
			<?php get_template_part('template-parts/custom/featured-products'); ?>
			<a class="cv-btn --primary --lg mx-auto mt-5" href="/categoria-producto/colchones">Ver más</a>
		</div>
	</section>
</div>

<section class="cv-homereviews">
	<div class="container">
		<h2 class="cv-title text-white mb-5"><?php echo get_field('titulo_2', $post_id); ?></h2>
		<div class="row">
			<div class="col-lg-4">
				<div class="tcp-card h-100">
					<img src="<?php echo get_field('foto_opinion_1', $post_id)['url'] ?>" alt="Cliente Colchoneria VIP">
					<h5><?php echo get_field('nombre_opinion_1', $post_id); ?></h5>
					<?php echo get_field('texto_opinion_1', $post_id); ?>
					<img src="/wp-content/themes/customecommerce/assets/images/<?php echo get_field('estrellas_opinion_1', $post_id) ?>-stars" alt="Review Colchoneria VIP">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tcp-card h-100">
					<img src="<?php echo get_field('foto_opinion_2', $post_id)['url'] ?>" alt="Cliente Colchoneria VIP">
					<h5><?php echo get_field('nombre_opinion_2', $post_id); ?></h5>
					<?php echo get_field('texto_opinion_2', $post_id); ?>
					<img src="/wp-content/themes/customecommerce/assets/images/<?php echo get_field('estrellas_opinion_2', $post_id) ?>-stars" alt="Review Colchoneria VIP">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="tcp-card h-100">
					<img src="<?php echo get_field('foto_opinion_3', $post_id)['url'] ?>" alt="Cliente Colchoneria VIP">
					<h5><?php echo get_field('nombre_opinion_3', $post_id); ?></h5>
					<?php echo get_field('texto_opinion_3', $post_id); ?>
					<img src="/wp-content/themes/customecommerce/assets/images/<?php echo get_field('estrellas_opinion_3', $post_id) ?>-stars" alt="Review Colchoneria VIP">
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<section class="cv-featuredproducts">
		<h2 class="cv-title mb-5"><?php echo get_field('titulo_3', $post_id); ?></h2>
		<?php get_template_part('template-parts/custom/featured-products'); ?>
		<a class="cv-btn --primary --lg mx-auto mt-5" href="/categoria-producto/colchones">Ver más</a>
	</section>
	<section class="cv-storedata">
		<h2 class="cv-title"><?php echo get_field('titulo_4', $post_id); ?></h2>
		<div class="row">
			<div class="col-lg-6">
				<div class="tcp-card">
					<?php echo get_field('mapa_ubicacion_1', $post_id) ?>
					<div class="d-flex">
						<img src="<?php echo get_field('imagen_ubicacion_1', $post_id) ?>" alt="Colchoneria en Mendoza 9 de Julio">
						<div>
							<h3><?php echo get_field('direccion_ubicacion_1', $post_id) ?></h3>
							<span><?php echo get_field('datos_banner', $post_id) ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="tcp-card">
					<?php echo get_field('mapa_ubicacion_2', $post_id) ?>
					<div class="d-flex">
						<img src="<?php echo get_field('imagen_ubicacion_2', $post_id) ?>" alt="Colchoneria en Mendoza 9 de Julio">
						<div>
							<h3><?php echo get_field('direccion_ubicacion_2', $post_id) ?></h3>
							<span><?php echo get_field('datos_banner', $post_id) ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cv-storedata__sellers">
			<div class="tcp-card">
				<img src="<?php echo get_field('imagen_vendedor_1', $post_id) ?>" alt="Vendedores de colchones mendoza">
				<h5><?php echo get_field('nombre_vendedor_1', $post_id) ?></h5>
				<span><?php echo get_field('datos_vendedor_1', $post_id); ?></span>
			</div>
			<div class="tcp-card">
				<img src="<?php echo get_field('imagen_vendedor_2', $post_id) ?>" alt="Vendedores de colchones mendoza">
				<h5><?php echo get_field('nombre_vendedor_2', $post_id) ?></h5>
				<span><?php echo get_field('datos_vendedor_2', $post_id); ?></span>
			</div>
			<div class="tcp-card">
				<img src="<?php echo get_field('imagen_vendedor_3', $post_id) ?>" alt="Vendedores de colchones mendoza">
				<h5><?php echo get_field('nombre_vendedor_3', $post_id) ?></h5>
				<span><?php echo get_field('datos_vendedor_3', $post_id); ?></span>
			</div>
			<div class="tcp-card">
				<img src="<?php echo get_field('imagen_vendedor_4', $post_id) ?>" alt="Vendedores de colchones mendoza">
				<h5><?php echo get_field('nombre_vendedor_4', $post_id) ?></h5>
				<span><?php echo get_field('datos_vendedor_4', $post_id); ?></span>
			</div>
			<div class="tcp-card">
				<img src="<?php echo get_field('imagen_vendedor_5', $post_id) ?>" alt="Vendedores de colchones mendoza">
				<h5><?php echo get_field('nombre_vendedor_5', $post_id) ?></h5>
				<span><?php echo get_field('datos_vendedor_5', $post_id); ?></span>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>