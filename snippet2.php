<?php
add_filter( 'woocommerce_available_payment_gateways', 'wobee2_gateway_disable_shipping_326' );

function wobee2_gateway_disable_shipping_326( $available_gateways ) {

    global $woocommerce;

    if ( !is_admin() ) {

        $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );

        $chosen_shipping = $chosen_methods[0];

        if ( isset( $available_gateways['transferuj'] ) && $chosen_shipping == 'flexible_shipping_1_2' )  {
        unset( $available_gateways['transferuj'] );
        }
        if ( isset( $available_gateways['bacs'] ) && $chosen_shipping == 'flexible_shipping_1_2' )  {
        unset( $available_gateways['bacs'] );
        }
        if ( isset( $available_gateways['imoje'] ) && $chosen_shipping == 'flexible_shipping_1_2' )  {
        unset( $available_gateways['imoje'] );
        }
        elseif ( isset( $available_gateways['cod'] ) && $chosen_shipping == 'flexible_shipping_1_1' )  {
        unset( $available_gateways['cod'] );
        }


}


return $available_gateways;

}

 ?>
