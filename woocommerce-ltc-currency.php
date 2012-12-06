<?php
/**
 * Plugin Name: WooCommerce LTC Currency
 * Plugin URI: http://claudiosmweb.com/
 * Description: Adds Litecoin currency in WooCommerce
 * Author: claudiosanches
 * Author URI: http://claudiosmweb.com/
 * Version: 1.0
 * License: GPLv2 or later
 */

if ( !class_exists( 'WC_LTC_Currency' ) ) {

    /**
     * Add LTC Currency in WooCommerce.
     */
    class WC_LTC_Currency {

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
         * Add LTC Currency in WooCommerce.
         *
         * @param  array $currencies Current currencies.
         *
         * @return array             Currencies with LTC.
         */
        public function add_currency( $currencies ) {
            $currencies['LTC'] = __( 'Litecoin (&#11360;)', 'wcltc' );
            asort( $currencies );

            return $currencies;
        }

        /**
         * Add LTC Symbol
         *
         * @param  string $currency_symbol Currency symbol.
         * @param  array  $currency        Current currencies.
         *
         * @return string                  LTC currency symbol.
         */
        public function currency_symbol( $currency_symbol, $currency ) {
            switch( $currency ) {
                case 'LTC':
                    $currency_symbol = '&#11360;';
                    break;
            }

            return $currency_symbol;
        }

    } // close WC_LTC_Currency class.

    $WC_LTC_Currency = new WC_LTC_Currency();
}
