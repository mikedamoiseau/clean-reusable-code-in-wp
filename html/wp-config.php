<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'example' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'buzzwoo' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'QQkY!<=jHMw58(GdbW!?( yeU@e%|@W|VtUy%Yk>nxpeG;V8RJo|}`YJ[rJT4_1l' );
define( 'SECURE_AUTH_KEY',   '-M[Zs71)M1XXFi}:q{L8}gi$0`15.QswCWQ|-Sa)hLQn]Wh)tFq!xYr%+VAv/!Fa' );
define( 'LOGGED_IN_KEY',     'XWS}=G`5sRzxp}C{3|+D`|-LWGrw+|^pVBc*`o9Wzx!lK;zQ_K[JEi.plW,#&m*I' );
define( 'NONCE_KEY',         'ZF+dCFUQ/^hv9k>e_@3@tU-|Qsj!LC#bOe}9iB*EL>~f< dr,qj*nMM47$g$. W=' );
define( 'AUTH_SALT',         '9nI9>F6/A8;+pDo+PU[$>;ZHyuOSqsxDB5rwzI+<h6(/MOqG3b+0r;]H6Vx5IL0j' );
define( 'SECURE_AUTH_SALT',  'm+[55 i6*Edk3;KK2:xKu}5b6qp12PYX5Je%D` > `pv+#Ej($FcDI[*?I[eMs(I' );
define( 'LOGGED_IN_SALT',    'fqugT~woz}*Uy 67WrHz{&<W-1NN#OFr#@*_~~:D_q/,d/L1SP$;hXyJnH&c%%xC' );
define( 'NONCE_SALT',        'I%7X ]V (dvpLj Us&}IBpl=4/wpR)90%%`&Hw|nU|t|},p S[ujw^;2djI_Y)uP' );
define( 'WP_CACHE_KEY_SALT', '#_CN:dprt62&xbF^nH/ZZ]SCcr_d-^SQyZ==EA)`pBzF*~K=-vl<T)lH&U F FV.' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
