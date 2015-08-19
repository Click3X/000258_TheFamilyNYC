<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'familynycwp');

/** MySQL database username */
define('DB_USER', 'familynycwp');

/** MySQL database password */
define('DB_PASSWORD', 't4keThe5th');

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
define('AUTH_KEY',         '5|8_|j1%Y7RHQ(Yt{Mr!J%#% T`QXk}HE|p8/d:Z}Sm7ZjLsQUFEI]Ta#|&-CiOw');
define('SECURE_AUTH_KEY',  'GGgQu@>Yg,4`.f+K`w^Uq|q@Wm]1ej[>J99|4!bTr<H`E#A/hWU1e6X2:,l%Q{z/');
define('LOGGED_IN_KEY',    'j/T;BSOZz+xF[K$w7&{vI9jCZ4 /WX3=$LDLz|NrcfG7{S3!ZUAp%H6aU6@&5e!)');
define('NONCE_KEY',        'y/=Q-N+ v3d}dVaGZT5anUli#*3zOrdAlaaKZ!kG>RNaPn7:{1xo| cN;+bXLKCt');
define('AUTH_SALT',        '%(I.8V:WL-C>5lmVM)2Y29J%dI/&LbVg(lJg_}2+$X->s-|>5U_X-HIA7[k{B/HX');
define('SECURE_AUTH_SALT', '*6fSk%hBX])N29DGnZAnh]<Yd:^P+3Uc}@EOC8!V*qV44SYEnTL_Z-zN9UOg=-v2');
define('LOGGED_IN_SALT',   'g+@ fT+xo-v,Y|^32QuSC>V|W2b+cOQ%WX,/644l.S!y1;!#[}-`4;M}a Hnd+!W');
define('NONCE_SALT',       'r0;Lz-QrbL]qc saNd,Z%`Eob@!4-NAi23?L*CPU;^1+nPY yai3Es|BJ9AOc-NN');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
