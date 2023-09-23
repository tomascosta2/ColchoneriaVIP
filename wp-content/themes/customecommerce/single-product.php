<?php 
$product = wc_get_product();
$regularPrice = $product->get_regular_price();
$discountPrice = wc_get_price_to_display($product);

get_header(); 
?>

<div class="tcp-productview">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<?php 
				echo woocommerce_breadcrumb();
				echo woocommerce_show_product_images();
				?>
			</div>
			<div class="col-lg-6">
				<h1><?php echo get_the_title(); ?></h1>
				<div class="tcp-productview__quality">
					<span>Prueba de calidad</span>
				</div>
				<div class="d-flex gap-3">
					<?php
					if ( $discountPrice ) {
						echo '<span class="tcp-productview__regularprice">' . $regularPrice . '</span> ';
						echo '<span class="tcp-productview__dicountprice">' . $discountPrice . '</span>';
					} else {
						echo '<span class="tcp-productview__regularprice">' . $regularPrice . '</span> ';
					}
					?>
				</div>
				<?php echo get_the_content(); ?>
				<?php echo woocommerce_template_loop_add_to_cart(); ?>
			</div>
		</div>
		<div class="tcp-productview__info">
			Aca van los atributos
		</div>
		<div class="tcp-relatedproducts">
			<?php 
			woocommerce_related_products( array(
				'posts_per_page' => 4,
				'orderby'        => 'rand',
			) ); ?>
		</div>
	</div>
</div>

<?php get_footer();  ?>