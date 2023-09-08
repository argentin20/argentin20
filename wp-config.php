<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'number1_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'OMh84yqC/MA%_?X&2pF}Gc,^h>uNtP.VFdAtbXwj$;DnR4*Fx^k$r}&MQ+pK{DP=' );
define( 'SECURE_AUTH_KEY',  'nuP@@j1rymN)`M;kjpvi|d_ln,j}9*It`2*yBbJqc08}GyfuSPK!OBIVf2cVPnJq' );
define( 'LOGGED_IN_KEY',    'K[;NS<tq1>hbFL+33S!G-SS]ihvqmTVa!e;s<j4S3=9BccpZSlu:?la]P$w6jvaI' );
define( 'NONCE_KEY',        'Y-V*[11MoSz5JJ:Ao6fE4{B>i%{1O;ANxRyaD;yI;q|}P`Jza|CPwf{AEy|,c3DH' );
define( 'AUTH_SALT',        '=|$vnhQ>1r1udOvY:[_@h_?Fz{re{}Wq>T]bQ[72*~PK[SR;R6wE{*8)hFxW2+6=' );
define( 'SECURE_AUTH_SALT', 'bNi%HAjNq}%fdA_?X%* .FXlkkXN+/cL(Io{z+q~>1Z0i|F~+@fS `*iC<anag_^' );
define( 'LOGGED_IN_SALT',   'ePSDk-V.fo3]>a]m#bX?T0}mNQ{o$ZW,zrCxn8C!o[AwUzQOMb/IaL#ze8etD4&;' );
define( 'NONCE_SALT',       'lMU&e, sl=>^*Z/%`{&{t  8hXT #?8TuuQ#5N8nB/aJU:qkEDGT3.j{x*J|W/=p' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
