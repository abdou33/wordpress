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
define( 'DB_NAME', 'wordpress' );

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

define( 'FS_METHOD', 'direct' );

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
define( 'AUTH_KEY',         'P+_0nuMz,R)g8 y|j +uN_E6Lk&+gEvoHqnKKS!C,%]3uk8>HRFAPlgVoIehAS *' );
define( 'SECURE_AUTH_KEY',  '|~@{4N9%qxvde:e7u:t<[h+T.f26QtJ?X89>E3IelA@yA=k)U;-P4FNE(I{BJ`tC' );
define( 'LOGGED_IN_KEY',    'bJs2i5OX^|HTd$F&V{v8/;?_QQlIpIqU/:ziR8j;fMg>|YK#CW+&PzR%!l(Qxa>:' );
define( 'NONCE_KEY',        'ylU:Mpx#Ix~p-t61VU[N&RtXF6hLmNn7Ia=O%,yGX[c7)x[:j^{W+N35t1s8(@{j' );
define( 'AUTH_SALT',        '-#>_Sywou>>]7f|Q*4`nbyHyAmX%ZeN#L%qlm`r 6Lc@o!Vj_%!s#Cg UDAop1?$' );
define( 'SECURE_AUTH_SALT', 'bT?LEB)okt[+o0Z|A]1,;ib.Nr1_(TfmUVd9Iz~gb=PpqdkWN<_7td$u]98u/<=5' );
define( 'LOGGED_IN_SALT',   'hgic:jR^.yIO$q[.+vDuwXwVAt4(Af?J)0m!LjB>-O;<m?s}7&E+EAD(&%X_kVHu' );
define( 'NONCE_SALT',       'eD]6y{|$&=a^ZIqV[k3]?#`1fQ7vTf0Ka-bz0rYj=Dz6I=+F<U4rGR *+rL>K.L#' );

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

