<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<aside class="tcp-footer">
		<div class="container">
			<div class="tcp-footer__grid">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>
		</div>
	</aside>

	<?php
endif;
