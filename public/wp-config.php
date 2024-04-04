<?php

define( 'WP_DEBUG', true );
// define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_LOG', '/opt/homebrew/var/log/wordpress/php.log' );
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 2 );
define( 'SCRIPT_DEBUG', true );
define('SAVEQUERIES',false);

define('WP_HOME','http://localhost:8081');
define('WP_SITEURL','http://localhost:8081');
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sem' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
// define( 'DB_PASSWORD', '51448888' );
define( 'DB_PASSWORD', '' );

/** Database hostname */
// define( 'DB_HOST', '101.34.172.68' );
define( 'DB_HOST', '0.0.0.0' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'O;g7#wN07`_|] [@UUi>uOQ*pjO9#e$/J0Wi>={b<pp-A]=yr,)VD.Xs&uI5uiSG' );
define( 'SECURE_AUTH_KEY',   '[>@p~Eqr5HnCLt>>JoEOjK820C/y2[p#ts3N :}HR4n=UfkLuHm1caq,lZcOj+;/' );
define( 'LOGGED_IN_KEY',     ';<c4vo(:}Ty3BvvU7koaSbbLQ-Y_nvCuZ1Jo<zOL[=$2lTmF&zgi74%2Yy-+t;l[' );
define( 'NONCE_KEY',         'p-w@3ylOUrqa1uK$]#6V513P?u1}0o;EgOj1_d)l7nKaLsm%<1B8Z]:6RI&~mh1T' );
define( 'AUTH_SALT',         'MfqSHP@1{O*-EV=e0)CxqV!vbT0{KaJA2]36]Zf;I&{B~`uyH@4/bbtN<u^:##iO' );
define( 'SECURE_AUTH_SALT',  '{VU:v3`[H=;!tMOtbA3W)]mkqZpQz:1+40Col:R[&Jv] N:eQoD=*DpSLm,q/UDi' );
define( 'LOGGED_IN_SALT',    'tXp9L9%p*/V}?D64/)$q)uq(]!/~,.Ppa|Em*|x<]Gv=Z<t4 kAE3a_uR={S7w*3' );
define( 'NONCE_SALT',        '`[%H/dW&qnJ<N,(=<PG85T/a*vK?4<.L4&]:}Hy2LOIsK2q9j0!>]S+J$$4c+LHA' );
define( 'WP_CACHE_KEY_SALT', 'anB_zDZAKlA/fNTvMJvX[1:</0U/<yJbqSi0r4m!idBSl4}=H-FR`L)3,yK@831@' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
