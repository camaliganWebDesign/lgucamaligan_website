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
define('AUTH_KEY',         'H)BNU0S+TN[ 7_Mg0>pvI}F!yZuSSKvP^3<W0&U>]^^-7V)+]LAL]{rS;.keSfwJ');
define('SECURE_AUTH_KEY',  'mhUJkY04vyM2}>k7kI!i{[d5goo`j9a,~%N_:Xy`!wrGEh(d0m.mz;.DLtNXB>Rv');
define('LOGGED_IN_KEY',    '<iDH@~>m-&Q!YKY*90{389]UYz-8DmtO8GEc+.qwo!x@FWCu#FnH4;Fl$k^sY$$0');
define('NONCE_KEY',        '`UCo`+.wu0^e|4t*ZgK~$;+BGTJnw$+lgLnsn|Cn@5 :p=9!e+6sYRmh6s[WQ]|/');
define('AUTH_SALT',        'U/G[! 0!#^xa8zE+t69SUxSI>?,oze?Z1$?x&#d0,wed(:[+K6E-f)&wHtIg2C$x');
define('SECURE_AUTH_SALT', 'D%2iUSR@djgtt{EjAkaAP!sE.kZ8^|%`B%MD(M.&nEYrHtFE4*b7juzyTiKS@|8J');
define('LOGGED_IN_SALT',   'p{3[*>mL%4c=()m7a%w!p`w`&ayCh(UQI)>t|{M:XjPE =[vQd6Ncb-D#Ss+2UBV');
define('NONCE_SALT',       'b?%Wk{Wg|-+;:[!@J!ddvF<7{jGOHY#j[:Pp3I[E1$6%ODJ(^0H#^mz#2][EH5Du');

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

define( 'SCRIPT_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */
//===========================================================================
// script and styles versioning control
define( 'WP_JS_CSS_VERSION', 'v1.0.0' );
//===========================================================================

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
