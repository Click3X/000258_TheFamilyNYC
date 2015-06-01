<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thefamily');

/** MySQL database username */
define('DB_USER', 'thefamily');

/** MySQL database password */
define('DB_PASSWORD', 'click3x22!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'oo@4+~a.]SD*)+)wqI|YGl!5;XbLjFidJn(IZ,||Cv)JXm${!LZ+F-=Txy/V$d-K');
define('SECURE_AUTH_KEY',  '5nc +O6|~ G_x` d2gb *L>qPunqluK$KjFG{/GkXA<,eGhT &uG%&){7hD_3 t+');
define('LOGGED_IN_KEY',    '5&Xb{k7a-JM,%wk72;+3:;WK3$qsX:>E^/ZweYT;RblK0JdSk8esv`hTfqY}Viy7');
define('NONCE_KEY',        '4{M|s|/g#yq6tQX,Nmu+R(*3$}0gLquw15X5y7>A2JFU_Hjt|Fq&E*@28(BP~U|L');
define('AUTH_SALT',        'c5Y^KQf?}h{Od |z:MV05?QbWg}e[yg`?}^H^eM8C}E|b0m*|Pq*)ceaN|JLPbl?');
define('SECURE_AUTH_SALT', '2NT+L<#)CyAdrLOv9heBbG8B:9e^c2-G+|.OC7adHiz:U#gE&WExghJ_cKchONvA');
define('LOGGED_IN_SALT',   'Qkk+<Tf[;|sfGF(G?L*t]_z!+^V>HKzimwZU0M&pBN1+S.gEH+v*JxS;+Xb_-W>t');
define('NONCE_SALT',       '*_^*gG_>`t0a..iW-PE!fo6mH*g=<RknOA,+Vr]OL7]wDn<&iEqE@+i-3pVi$u92');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
