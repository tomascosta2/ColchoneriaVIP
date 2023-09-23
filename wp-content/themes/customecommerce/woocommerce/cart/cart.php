<?php
$cart_items = WC()->cart->get_cart();
$total_products = count($cart_items);
?>

<div class="row">
	<div class="col-lg-8">
		<?php do_action( 'woocommerce_before_cart' ); ?>
		<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" id="FormCart">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>
		
			<div class="row">
				<div class="mb-3">Carro de compra (<?=$total_products . ' Producto' . ($total_products > 1 ? 's' : '')?>)</div>
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
					<div class="row mb-3">
						<div class="col-lg-6">
							<div class="d-flex align-items-center justify-content-start gap-2">
								<?php
									// Link para quitar producto
									echo apply_filters(
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="tcp-btn-remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											/* translators: %s is the product name */
											esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);

									// Thumbnail
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
									printf('<a href="%s" class="tcp-product-thumbnail">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.

									// Título Producto + SKU
									echo '<div>';
									echo 	wp_kses_post(apply_filters(
												'woocommerce_cart_item_name', 
												sprintf( '<a href="%s" class="tcp-product-title">%s</a>', 
													esc_url( $product_permalink ), 
													$_product->get_short_description()
												), $cart_item, $cart_item_key 
											));
									echo 	'<div class="tcp-text-sku">SKU ' . $_product->get_sku() . '</div>';

									do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
		
									// Meta data.
									echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
			
									// Backorder notification.
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
									}
	
									echo '</div>';
								?>
							</div>
						</div>
						<div class="col-lg-6">
							<?php
								// Cantidad
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
										'classes' 	   => 'tcp-spinner__input',
									),
									$_product,
									false
								);

								echo '<div class="d-flex align-items-center gap-3 h-100">';
								echo '<div class="tcp-cart__itemcount">';
								echo 	apply_filters(
											'woocommerce_cart_item_quantity',
											$product_quantity,
											$cart_item_key,
											$cart_item
										);
								echo '</div>';

								// Precio
								echo '<div class="tcp-cart__price">';
								echo apply_filters(
									'woocommerce_cart_item_subtotal',
									WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ),
									$cart_item,
									$cart_item_key
								);
								if ($_product->is_taxable()) {
									echo '<span class="tcp-cart__priceiva">+IVA</span>';
								}
								echo '</div>';
								echo '</div>';
							?>
						</div>
					</div>
			<?php endforeach?>

			<input type="hidden" name="update_cart" id="update_cart" value="1">
			<?php do_action( 'woocommerce_cart_actions' ); ?>
			<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
		</form>
	</div>
	<div class="col-lg-4 ps-0">
		<div class="cart-collaterals">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>
	</div>
</div>

<?php
global $product;
$product = reset($cart_items);
$product = apply_filters( 'woocommerce_cart_item_product', $product['data'], $product, $product['key'] );
get_template_part('template-parts/product/related-products');
?>


<?php do_action( 'woocommerce_after_cart' ); ?>
