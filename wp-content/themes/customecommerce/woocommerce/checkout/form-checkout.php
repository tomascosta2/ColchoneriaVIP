<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="or-checkout">
	<a class="or-cart__back d-block mb-4" href="/cart">Volver</a>

	<?php
	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
		echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
		return;
	}
	?>

	<div class="row">
		<div class="col-lg-6">
			<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
		</div>
	</div>

	<form name="checkout" method="post" class="mt-4 checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="row" id="customer_details">
				<div class="col-lg-6">
					<div class="or-checkout__customerdetails">
						<!-- Formulario con detalles de facturacion -->
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="or-checkout__review">
						<!-- Datos de la compra -->
						<h2>Su pedido</h2>
						<hr class="mb-0">
						<?php get_template_part('woocommerce/checkout/review-order'); ?>
						<h5>Garantía de reembolso de 30 días.</h5>
						<p class="or-checkout__subhead">Confiamos tanto en nuestros productos y servicios de WordPress que ofrecemos una garantía de reembolso de 30 días si no quedás satisfecho.</p>
					</div>
				</div>
			</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		<?php endif; ?>
			
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<!-- Metodos de pago -->
		<?php get_template_part('woocommerce/checkout/payment') ?>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

	</form>

	<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</div>