<?php
define('WP_CACHE', false /* Modified by NitroPack */);

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
define('DB_NAME', 'rozeskin2');

/** Database username */
define('DB_USER', 'kodai');

/** Database password */
define('DB_PASSWORD', 'tZqsls7URjNC0aF');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '+]SpteNHBJp.A5^2)drubFVP(MlOA;8!4{K6eAa:f03bnye36m{waIEg$k7aE_ .');
define('SECURE_AUTH_KEY',  '!XX1]tLa_<mt[1~2k@``-V8bkH;>aRSTOf6V?A>k=n[}<tZ93RC->m(^E4S*$t&3');
define('LOGGED_IN_KEY',    ';,Rm}_vwOE)=pnJ05Fz94yG;Z%;dSx<)[HfiY}mYk=n)h8d!,F5LoiSC??NaOBJs');
define('NONCE_KEY',        'RL>++~`oI:b>_>PV6&u9 XG+2u*F0awy]1i9gv!$&fJUUuEq8J>K,Hv_v:8liljM');
define('AUTH_SALT',        'r,e?v/;ie$%9bPbB?RA,dMcVtH`gdvcDE.oDy}`_,[N`Q#xUEVsa:%v[Y{lFd/gx');
define('SECURE_AUTH_SALT', 'eAazIw<a#lByQpn.9u5i]M1d}i0r.RJ=aE,~/1smJO5Q]MB>)I~#ItzoR9HK_s=b');
define('LOGGED_IN_SALT',   'beIBJKf_?UoI3CZ+dt:k(%SA<emZCFBE7Fa]9<TM2/{3gSGV%H}Qy!S4usi5%drS');
define('NONCE_SALT',       'XP9WrZ@8;8lFxv2(:E)$]^:,QQHQ$~{q&q#ULsR2aR-I+6#720dnTgucC2Z8.)fc');



//Enable error logging.
@ini_set('log_errors', 'On');
@ini_set('error_log', '/var/www/rozeskin/php-errors.log');

//Don't show errors to site visitors.
@ini_set('display_errors', 'Off');
if (!defined('WP_DEBUG_DISPLAY')) {
	define('WP_DEBUG_DISPLAY', false);
}

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
