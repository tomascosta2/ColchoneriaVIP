<?php
global $product;

$title = get_the_title();
$thumb_url = get_the_post_thumbnail_url();
$link = get_the_permalink();
$regularPrice = $product->get_regular_price();
$discountPrice = wc_get_price_to_display($product);


if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="tcp-productmin">
	<a href="<?php echo $link ?>">
		<img src="<?php echo ($thumb_url) ? $thumb_url : '/wp-content/themes/energen/assets/images/en-noimage.jpg'; ?>" alt="<?php echo $title; ?>">
	</a>
	<div class="tcp-productmin__body">
		<?php echo $title; ?>
		<div class="d-flex">
			<div class="tcp-productmin__regularprice"><?php echo $regularPrice; ?></div>
			<div class="tcp-productmin__discountprice"><?php echo $discountPrice; ?></div>
		</div>
		<?php echo woocommerce_template_loop_add_to_cart(); ?>
	</div>
</div>
