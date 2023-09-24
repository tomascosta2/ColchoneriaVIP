<?php 
$args = array(
    'post_type'           => 'product',
    'posts_per_page'      => 4,
    'post__in'            => wc_get_featured_product_ids(),
);

$featuredProds = new WP_Query($args);

echo '<div class="tcp-productsgrid">';
while ( $featuredProds->have_posts() ) :
	$featuredProds->the_post();
	get_template_part('woocommerce/content-product');
endwhile;
echo '</div>';