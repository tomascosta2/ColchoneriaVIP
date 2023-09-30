<?php
global $product;

$thumb_url = get_the_post_thumbnail_url();
$link = get_the_permalink();
$regularPrice = $product->get_regular_price();
$discountPrice = wc_get_price_to_display($product);


if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="tcp-productmin tcp-card">
	<a href="<?php echo $link ?>">
		<img src="<?php echo ($thumb_url) ? $thumb_url : '/wp-content/themes/energen/assets/images/en-noimage.jpg'; ?>" alt="<?php echo $title; ?>">
	</a>
	<div class="tcp-productmin__body">
		<h3><a href="<?php echo $link ?>"><?php echo get_the_title(); ?></a></h3>
		<p class="tcp-productmin__desc"><?php echo $product->get_description(); ?></p>
		<div class="tcp-productmin__prices">
			<div class="--regular"><?php echo wc_price($regularPrice); ?></div>
			<div class="--discount"><?php echo wc_price($discountPrice); ?></div>
		</div>
		<?php echo woocommerce_template_loop_add_to_cart(); ?>
	</div>
</div>
