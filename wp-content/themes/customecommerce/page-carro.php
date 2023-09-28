<?php
wp_enqueue_script('cartCoupon', get_template_directory_uri() . '/assets/js/cart-coupon.js');
get_header();
?>
<div class="container mt-3 mb-5">
	<?php the_content()?>
	<div class="tcp-relatedproducts">
		<?php echo do_shortcode('[products limit="4" columns="4" category="hoodies, tshirts" cat_operator="OR"]') ?>
	</div>
</div>
<?php
get_footer();