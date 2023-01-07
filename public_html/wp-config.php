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
define('DB_NAME', 'chugorgu_db');

/** MySQL database username */
define('DB_USER', 'chugorgu_db');

/** MySQL database password */
define('DB_PASSWORD', '2VDwrfWPPYD');

/** MySQL hostname */
define('DB_HOST', '10.168.1.72');

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
define('AUTH_KEY',         'B`(l}TD1a*(&hJ[i$+-^oSnl{4B)W}E_i[W!<gV!iWwvc+QV{Ml02sQ,],s*T  ~');
define('SECURE_AUTH_KEY',  '~s+M+t+P-+>QX,b5jL)wn-6]6YX;3LWgz9bcde(g:*|_M+.B4eVsv_]!7T29eG?+');
define('LOGGED_IN_KEY',    '8CB8$%CDn%3vk1;=PFF-l(=11{;A)$p2iDQ]IqEi-bD&m@A+;C;OCF,a`/:oG< `');
define('NONCE_KEY',        '3:I@hC[ts3-+y%l;i2=|i-U)DG4/+mpP*-R$~`;LLsTq(sw4.uFHI!pD9Ps@}c#x');
define('AUTH_SALT',        'j9)Rz}bz:z;Fl0+f=3gQ`*AT.{2LDtI zfOP.$B|e53~F=]67`|7d|6wGC+>t&:1');
define('SECURE_AUTH_SALT', 'D5f~LaZC+=|-9lXTpGFdkS<L>,,Wq:P 0<d&Ku~ar~++7{MWqX$/bF>bdPI||PdP');
define('LOGGED_IN_SALT',   '*>CU-s/LUL.zh!yow]O#op|*pa9.;-9jqS4c4MagzcO>EQ+%Pk3;N2]3rseKZ*6D');
define('NONCE_SALT',       '-G.!#Kuw(Tz8A)l%V1o$^<|pyz-B#Vyx_@p+r^}/Kss*qi,v`3ZS#y*ZqqvZB h<');

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