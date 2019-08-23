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
define( 'DB_NAME', 'blogBarter' );

/** MySQL database username */
define( 'DB_USER', 'barter' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Barter_D3sarrollo' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'Xv|M;}9ioU4b!e6HD:9`mik|Gpk2R8hra{@zlB|nqY[jdLdCZjB#={,`@jmRGIL/' );
define( 'SECURE_AUTH_KEY', 'X,qy-W |uhc, 7ZOg<F/?+t#s{yQd^C8Q>~YUuG*q.e2V3A.yVA6Ei(CI.TfI|S^' );
define( 'LOGGED_IN_KEY', 'x>{kT2,!I;DuxF8`@v38GB2z;x@FL|vP9rw*K!5d=3Z,eJHLCm0.2WZ5&,7:?mzK' );
define( 'NONCE_KEY', '29N!~J9]$Ch]uDliU6-8F(LcW1BA]nD@Q,`QJvp&KUe}C_U]!fzj,G*zWaE%kB.0' );
define( 'AUTH_SALT', 'k}E+*AytxqL,P[slPo?=l=q{wy7E-f;|EuIRmW$?i1r7P?oYm4fAoEbIN?Y^wt)#' );
define( 'SECURE_AUTH_SALT', 'sBHq{#u/vg&cSY]a}4xn6!pjZ9PTWv`0Q/e|d{{Q5{F=CxcN>^F;A3nMSUonNPC3' );
define( 'LOGGED_IN_SALT', ':ETc!zhhg7(>4(Y7m-L*kDt!!GMjd)Gey.K`:6Reg%;ky`_vlqg:?W/Y2Bjb;WWF' );
define( 'NONCE_SALT', 'J5GKGu}vfuwQ,(r%88<@lUC5Ji+zUi`h&PI|mTz /)$=>0bR]tDPs2Y?7Kc&;pv[' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_5d4dc488e0e38_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
