<?php
/*
 * Plugin Name:  Acmet Products
 * Plugin URI:   https://damoiseau.me
 * Description:  Acme Products Plugin for WordPress
 * Version:      1.0
 * Author:       Mike Damoiseau
 * Author URI:   https://damoiseau.me
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  acme
 * Domain Path:  /languages
*/

// include the Composer autoload file
require __DIR__ . '/vendor/autoload.php';

new \Acme\WordPress\Cpt\ProductCpt();
new \Acme\WordPress\Cpt\VariationCpt();

// var_dump(
//     (new \Acme\App\Product(8))->getVariations()
// );exit;