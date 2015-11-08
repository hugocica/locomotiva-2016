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
define('DB_NAME', 'locomotiva');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'pkrU7)9c{IcCAbn0/BiJ 2Wz vAVKTVA$^n1y|0LVFi|m;1qW_y84wfF*0-BL o~');
define('SECURE_AUTH_KEY',  'O]R P:#!Rnujr7u.v:V%$MNptas$.i@o|cb[|]gfbm3CrO65u,|*(+qk)0GT.3f9');
define('LOGGED_IN_KEY',    'a$`fIewdbTu6fTh2[AHD{s|I}h_#NVN1|tL+E1(XKrqP,XR|`O!#N?x@SU]p2ZE;');
define('NONCE_KEY',        'qm+M%vEomg+koO]@uSpw+OH9[=-|Es#DZUMu#oGd5FP EF-gBFu-?X9^QC/=M1+Z');
define('AUTH_SALT',        '>+Mx+zJ2X-`jyaK^Xy{/ wC|Z7Xml+wLlv|#m{UYU+aqYBV=N>.c;sr!Pilo_/Q?');
define('SECURE_AUTH_SALT', 'I(q(fVN{Y-5I0_34Bcc5Whsdwc|7&H58r&5/P nT@xyc^!C^Ei+:D*0I3&PT+#qy');
define('LOGGED_IN_SALT',   'gQoC)m3Db.X @e__/Y7H|u:*|x@zn|>U;+R+Hnx>L#7r?O@`Pw/%|q3Xomp&M 7y');
define('NONCE_SALT',       'U/Olp|8ortRooc5{uEx/g~Vge.z%!+]vH)|X*A NA2|nP~}tfdOT!MX%+xC:l?_m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
