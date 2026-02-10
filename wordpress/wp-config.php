<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp1_db' );

/** Database username */
define( 'DB_USER', 'wp1_user' );

/** Database password */
define( 'DB_PASSWORD', '111' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'WI>6fL2kLbQ@q,5t@/D{k/ZiJyg-3F H/rM<H4W~gANw,C:v0jHtWJax-;e2(51T' );
define( 'SECURE_AUTH_KEY',  '6WN)c7<*mK%!2K]GWt#ssoe7GpW#vuA s;3./H(;N2f2`vWyU|n3BY2 m8|k0|U)' );
define( 'LOGGED_IN_KEY',    'iWXi+ 0!>$HW*mg](X?{k0pF#ZxxB_xnHps1 HLbOLJ(_cD.qQ]T@fgG!2~2<-E%' );
define( 'NONCE_KEY',        '+|~=$O;{K@G$U@K283%:2rJB/kzEZDrEbB(V.fgCJsfo9X5zX`<?R}9|.+ArM>}U' );
define( 'AUTH_SALT',        '2o9Pc&9@+R[Z@F&[P;IT4e&jf#NoOo?Y[tP)>6W-f:rZ|RR/AP?u7%n9^-fh$m)W' );
define( 'SECURE_AUTH_SALT', 'imtGnZiEgkEOc*!fh:2j(fs7k?OTaku:}(Kn#iK4m*{N{;Cuf.AVcY{CX^TGCR]A' );
define( 'LOGGED_IN_SALT',   '>!U}%Ap[];ZOR[l^/zlwh=G!eMR.g(?9F],=3%:~CeJ@em]VjM#:Y9@dWVeJ>|%e' );
define( 'NONCE_SALT',       ':=*X/vPhOZ7WA/.=)a*p5a+JK~QHQ:~CA0R$f/^88pu(=x[++;@/aaN>9!^r?@c%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp1_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
