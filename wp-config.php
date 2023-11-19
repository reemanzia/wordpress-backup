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
define( 'DB_NAME', 'Heaven17' );

/** MySQL database username */
define( 'DB_USER', 'Heaven17' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fgkdkBkv' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ':b.0Gjz9*y|%43w) xK ZP*o] 7+.Q)5@@o$?:`O+{$)#l,b~HF[}bn65^HLmk}f' );
define( 'SECURE_AUTH_KEY',  '*pEEkXwQ<+Gy|_^bn/L[x0f1QZ?$TqJ2))G@Ae&a6*#`-g2^mqQymUY9AS;O 7Bs' );
define( 'LOGGED_IN_KEY',    ')o|(KZW>Su,dXC/i,<[TStQ/vw;2{?vctJrBn@[o((v!uB`GemmGTE]VVflsaihX' );
define( 'NONCE_KEY',        'J[abm|{l=}|Mvt)Ab?qI7I`gQiJ9$e17Y7(Ev9z{.w?? /Z)F]<B}9dP,QpwA[3o' );
define( 'AUTH_SALT',        'VsGz|MwTbe2-Y,<nx]=CX4IFeKtPfB,hUK9Lpcl,1^tym7%0VY[$JVXxL_`; > k' );
define( 'SECURE_AUTH_SALT', 'O;|rx.;<Pq9hDAm2&DHdLamAigM-m*O2Z7T=tHa2x[Gt9z~%.Aul&H+)wg|rXVvD' );
define( 'LOGGED_IN_SALT',   'Zy!oOB@ftJx1/Wo`,g_nsOd2@jX9eiFkBHPT]T-(d~K-sakX={6#a<:5e6ju.GA*' );
define( 'NONCE_SALT',       ',);7f)lOaN@[e*OGsJOc t`/c~C,~z_1Ei6blAgh,RNF#qc9iL4?^+@?JN,xlOWo' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define('DISABLE_WP_CRON', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
define('FS_METHOD','direct');
