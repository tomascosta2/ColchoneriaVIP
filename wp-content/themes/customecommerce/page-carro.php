<?php
wp_enqueue_script('spinner', get_template_directory_uri() . '/assets/js/spinner.js');

get_header();
?>
<div class="container mt-3">
	<?php the_content()?>
	<div class="tcp-relatedproducts">
		<?php echo do_shortcode('[products limit="4" columns="4" category="hoodies, tshirts" cat_operator="OR"]') ?>
	</div>
</div>
<?php
get_footer();