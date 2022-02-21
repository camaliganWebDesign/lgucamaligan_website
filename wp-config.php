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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'penspmcdvttz_skgnbow' );

/** Database username */
define( 'DB_USER', 'penspmcdvttz_wojkbwjs' );

/** Database password */
define( 'DB_PASSWORD', '*=_HumanResourceManagementOfficeoftheMunicipalityOfCamaligan_2020_=*' );

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
define( 'AUTH_KEY',         'tLoAf]x&0a7j[B*Ud7TS&z|h/mKT#SWmYB>lw)@f@FCsg~{5wXB84F+f/C?QtC6L' );
define( 'SECURE_AUTH_KEY',  'weTiHg%FcY-6c)tDfbLG3LAmfM7Vs _qr$M(yS9$gZ^C/N[P`]6crM~L]W4dD|0A' );
define( 'LOGGED_IN_KEY',    'E*9:?IoXi[0*t.Qg+E^Nw)lsYL2!d6z#_Q&Gt5(b$J59;l`0`HW;!cy-Kt3=D,LP' );
define( 'NONCE_KEY',        'rU.W@Mz3IhpD4r<[}VzK?cqh)$f#x7r1JF%p80,RTSLdeC:6kDGvpkEFOKikz9?S' );
define( 'AUTH_SALT',        'KiM8A3O6HM.yp #n~-&PB}GS:qi>9aEHu@o;VQ]Bf:A&8|JUDc!LX6c}>bS$wHU?' );
define( 'SECURE_AUTH_SALT', 'OF&rz6# C^F7?FU)A.d.|KJ&~%o@rFB@NoUUG1MJN[pN@=$/K ~6I1HZbG$/c@~b' );
define( 'LOGGED_IN_SALT',   '@{Ms (F^#aVZMxHN3)Fxpe5dG@ 3L:$HRpUtnMk6WVf3Pst!0i&!+4&[<M$K{rbB' );
define( 'NONCE_SALT',       'F9&T9%ua|}3K:.|9>},`[x;,c?c6r$KX/D?/-6ZPD~{P:v&[-p}s9YC X{Z1Cy-=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Nb45KUeJi7_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
