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
				<div class="tcp-productview__main">
					<h1><?php echo get_the_title(); ?></h1>
					<span>Marca: </span><strong><?php echo $product->get_attribute('marca') ?></strong>
					<div class="tcp-productview__stars">
						***** (324)
					</div>
					<div class="tcp-product__prices">
						<?php
						if ( $discountPrice ) {
							echo '<span class="tcp-productview__regularprice --regular">' . wc_price($regularPrice) . '</span> ';
							echo '<span class="tcp-productview__dicountprice --discount">' . wc_price($discountPrice) . '</span>';
						} else {
							echo '<span class="tcp-productview__regularprice --discount">' . wc_price($regularPrice) . '</span> ';
						}
						?>
					</div>
					<?php echo get_the_content(); ?>
					<div class="d-flex flex-column flex-md-row gap-2 mt-3">
						<a class="cv-btn --unfilled" href="https://wa.me/+5492614713096">Hablar con ventas</a>
						<?php echo woocommerce_template_loop_add_to_cart(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="tcp-productview__attributes my-5">
			<?php wc_display_product_attributes($product); ?>
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