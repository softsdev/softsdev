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
define('DB_NAME', 'softsdev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '?NHUjIdST<A+`!;(kFr,,n{q=I@vXd6476cYi4=KM4qZLuzob/:NC??v#1q.<}+=');
define('SECURE_AUTH_KEY',  '3sA,dCtw~QR?;;o<C!r9u&Vaf?i7NzW,eP?esFJ)g7od)MVgQZJgu?ME?Z=bu?p0');
define('LOGGED_IN_KEY',    'g[_CEJ.D rDw|uqh!N&M[N0J8l|zGEV,C=cT3AT5+n{T_/2{.:6qRv]l1G!Mew_i');
define('NONCE_KEY',        '.QC8(jn}vZYncO|C>^!+y;}NnuYc<Ig{4?T_gi/$7*<eZNL&<:+T+:R-ANF)&g^-');
define('AUTH_SALT',        'qv&:$.eD@w9zQ%sd]wN.+I}~CUV(cMVt1|3kEg&G]0*;%oPd<(D#lnfY-=RY?]WN');
define('SECURE_AUTH_SALT', '=e,u-;!L<Bk`MT|K{!n)60T[CWF,kci8Br$~2jZ[KU]%I9mjNyqArR.qv,5`f_X&');
define('LOGGED_IN_SALT',   'WUvrIiPGB22_e;d87?0d<OOxe~GUXF)1VqhA5z#Sr#2]rCN$,6b4!Gb5>Sr_)Vhb');
define('NONCE_SALT',       'Pq<$NJ$SK* ~[y%5;H%Qn~.&^bqia3(Q_Fd8`qO,9)}jnvgz3:2:l-20az(pRb!;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sd_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
