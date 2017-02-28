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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

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
define('AUTH_KEY',         'zEiwzpr@TSaLS*u/[_&:~V&Oa$9Uog_f:u{E_K~0Ln]>aC1/5[l4+=1U}okSKJ72');
define('SECURE_AUTH_KEY',  '-E}g^ZI-P~4TgnGP*AnEG6Op[T4gPYX]xQ6P#ZDv*`dN2tNK[L3RL(g]^e^<v_|$');
define('LOGGED_IN_KEY',    'w=ch-@r%V&8{Us,[Cc~r3+d}{0F IsCkt;?(oZ3r&7dveX89K}6+*b3`dW+L!oM0');
define('NONCE_KEY',        'vQ]*GH>vC|*9yhsO>9jM[Rs*[x,KGA6.e;U-2C}|N6ecMUSd7vCG(;baV#NJ.-6A');
define('AUTH_SALT',        ':aOEon..?/m.%0{0{+c-qg&|8P8,Z= )~|~hnArrVb.K,WO)N_wA?UTO,N+@T,bz');
define('SECURE_AUTH_SALT', 'B.^L9%Q$)rkTWI[r1:}jxR~b@o3!E.{w;b?Qr/::37[_nE^4.m+d0&<VX8Fw8p2j');
define('LOGGED_IN_SALT',   'f{>Gyec0zE)QIJ+_?Y)^.DP8F:QIgnh[,?til^^|L)D`Vy.tUpXtL^u0Uk~ol<Oq');
define('NONCE_SALT',       '!y*wUrU:o?wc$bX.GCwU`04$HCuHP(iftWa!z+DJ+by_M.=OmTQg`zaqxTxjl06X');

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
define( 'WP_MEMORY_LIMIT', '128M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
