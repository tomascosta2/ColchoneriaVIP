<?php
$cart_items = WC()->cart->get_cart();
$total_products = count($cart_items);
?>

<div class="row tcp-cart__header">
	<div class="col-lg-8">
		<a class="tcp-cart__back" href="/">Volver</a>
		<h1 class="tcp-cart__title">Mi carrito</h1>
	</div>
	<div class="col-lg-4">
		<h2>Carritos totales</h2>
	</div>
</div>
<div class="row py-3">
	<div class="col-md-8 pe-4">
		<?php do_action( 'woocommerce_before_cart' ); ?>
		<form class="tcp-cart__form tcp-card woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" id="FormCart">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>
		
			<div class="row tcp-cart__th">
				<div class="col-md-9">
					<span class="tcp-title-icon --shop mb-3">Producto</span>
				</div>
				<div class="col-md-3 text-center">
					<span class="tcp-title-icon --shop mb-3">Total</span>
				</div>
			</div>
			<?php foreach ($cart_items as $cart_item_key => $cart_item):
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				/**
				 * Filter the product name.
				 *
				 * @since 2.1.0
				 * @param string $product_name Name of the product in the cart.
				 * @param array $cart_item The product in the cart.
				 * @param string $cart_item_key Key for the product in the cart.
				 */
				$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_short_description(), $cart_item, $cart_item_key );

				if (!($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ))) {
					continue;
				}
				$product_permalink = apply_filters(
					'woocommerce_cart_item_permalink',
					$_product->is_visible() ? $_product->get_permalink( $cart_item ) : '',
					$cart_item,
					$cart_item_key
				);
		?>
			<div class="row mb-3 py-4">
				<div class="col-lg-9">
					<div class="d-flex align-items-center justify-content-start gap-2">
						<?php

							// Thumbnail
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							printf('<a href="%s" class="tcp-cart__productthumb d-flex align-items-center justify-content-start">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.

							echo '<div>'; // Inicio detalles y cantidad
							// Título Producto
							echo '<div>';
							echo 	'<div class="me-4">';
							echo 	'<h3 class="tcp-cart__itemtitle">' . $_product->get_name() . '</h3>';
							echo 	'<span class="tcp-cart__itemdata">Cantidad</span>';
									do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
							echo '</div>';

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
	
							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
							}

							echo '</div>';
						?>
						<?php
						// Cantidad
						echo '<div class="text-center">';
						if ( $_product->is_sold_individually() ) {
							$min_quantity = 1;
							$max_quantity = 1;
						} else {
							$min_quantity = 0;
							$max_quantity = $_product->get_max_purchase_quantity();
						}
						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $max_quantity,
								'min_value'    => $min_quantity,
								'classes' 	   => '',
							),
							$_product,
							false
						);

						echo '<div class="tcp-spinner">';
						echo 	apply_filters(
									'woocommerce_cart_item_quantity',
									$product_quantity,
									$cart_item_key,
									$cart_item
								);
						echo '</div>';
						// Link para quitar producto
						echo apply_filters(
							'woocommerce_cart_item_remove_link',
							sprintf(
								'<a href="%s" class="tcp-btn-remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">Remove item</a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								/* translators: %s is the product name */
								esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							),
							$cart_item_key
						);
						echo '</div>';
						echo '</div>'; // Fin detalles y cantidad
						
						?>
					</div>
				</div>
				<div class="col-lg-3 d-flex align-items-center justify-content-center">
					<?php
					// Precio
					echo '<div class="tcp-cart__price">';
					echo apply_filters(
						'woocommerce_cart_item_subtotal',
						WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ),
						$cart_item,
						$cart_item_key
					);
					if ($_product->is_taxable()) {
						echo '<span class="tcp-cart-price__iva">+IVA</span>';
					}
					echo '</div>';
					?>
				</div>
			</div>
			<?php endforeach?>

			<!-- Discount Coupons -->
			<?php do_action( 'woocommerce_cart_contents' ); ?>
			<div>
				<?php if ( wc_coupons_enabled() ) { ?>
					<div class="coupon">
						<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> 
						<input type="hidden" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
						<input type="hidden" name="apply_coupon" value="1">
						<!-- <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button> -->
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			<!-- End Discount Coupons -->

			<input type="hidden" name="update_cart" id="update_cart" value="1">
			<?php do_action( 'woocommerce_cart_actions' ); ?>
			<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
		</form>
	</div>
	<div class="col-md-4 ps-0">
		<?php do_action( 'woocommerce_cart_collaterals' ); ?>
	</div>
</div>

<?php
global $product;
$product = reset($cart_items);
$product = apply_filters( 'woocommerce_cart_item_product', $product['data'], $product, $product['key'] );
get_template_part('template-parts/product/related-products');
?>

<?php do_action( 'woocommerce_after_cart' ); ?>