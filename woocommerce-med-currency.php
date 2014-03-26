<?php
/**
 * Plugin Name: WooCommerce MED Currency
 * Plugin URI: http://claudiosmweb.com/
 * Description: Adds MediterraneanCoin currency in WooCommerce
 * Author: claudiosanches
 * Author URI: http://claudiosmweb.com/
 * Version: 2.0
 * License: GPLv2 or later
 */

if ( ! class_exists( 'WC_MED_Currency' ) ) {
    
    TODO: rename file

    /**
     * Add MED Currency in WooCommerce.
     */
    class WC_MED_Currency {

        /**
         * Class construct.
         */
        public function __construct() {

            // Actions.
            add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ), 0 );

            // Filters.
            add_filter( 'woocommerce_currencies', array( &$this, 'add_currency' ) );
            add_filter( 'woocommerce_currency_symbol', array( &$this, 'currency_symbol' ), 1, 2 );
        }

        /**
         * Load Plugin textdomain.
         *
         * @return void.
         */
        public function load_textdomain() {
            load_plugin_textdomain( 'wcltc', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        }

        /**
         * Add MED Currency in WooCommerce.
         *
         * @param  array $currencies Current currencies.
         *
         * @return array             Currencies with MED.
         */
        public function add_currency( $currencies ) {
            $currencies['MED'] = __( 'MediterraneanCoin', 'wcltc' );
            asort( $currencies );

            return $currencies;
        }

        /**
         * Add MED Symbol.
         *
         * @param  string $currency_symbol Currency symbol.
         * @param  array  $currency        Current currencies.
         *
         * @return string                  MED currency symbol.
         */
        public function currency_symbol( $currency_symbol, $currency ) {
            switch( $currency ) {
                case 'MED':
                    $currency_symbol = '&#11360;';
                    break;
            }

            return $currency_symbol;
        }

    } // close WC_MED_Currency class.

    $WC_MED_Currency = new WC_MED_Currency();
}
