<?php
add_filter( 'woocommerce_available_payment_gateways', 'wobee_gateway_disable_shipping' );

function wobee_gateway_disable_shipping( $available_gateways ) {

    global $woocommerce;

    if ( !is_admin() ) {

        $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );

        $chosen_shipping = $chosen_methods[0];

        if ( isset( $available_gateways['cod'] ) && 0 === strpos( $chosen_shipping, 'local_pickup' ) ) {
            unset( $available_gateways['imoje'] );
            unset( $available_gateways['bacs'] );
        }

    }

return $available_gateways;

}
?>
