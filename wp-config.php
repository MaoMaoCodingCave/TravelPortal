<?php
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
define( 'DB_NAME', 'wordpress_local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'T(pk_x)vwg0(L0;{]`j~&J5I%$AmIgDA3(xkVFN[R]2dryNSZ?VlM ;tzNlS^/Xg' );
define( 'SECURE_AUTH_KEY',  'T~/1kffYUDnlW3]U0Y+*T+oSs4g2,^GKg0.utqS.)gq,!cR~0%$c.~{q{&kAV|((' );
define( 'LOGGED_IN_KEY',    ';zXNs{sdh0zD+8UnEYy|k]1wV.d6`Mqgjmp!nf`L[WhJIX[z+pw;=_q1B|oQ_+RR' );
define( 'NONCE_KEY',        'DSqV<4A#fIPaHI1?[~pm8>YI=BL(f->7sZLyD.,Q:+qno%$7/o)&2lS?IE|%2iCY' );
define( 'AUTH_SALT',        '(IA=jEcvfPWA1|+ql3>tthY~YmJhs=)-aQzB5)g>r{xNR&+npd1pFt19<n*x+qON' );
define( 'SECURE_AUTH_SALT', '*WjMY:(%yI/+%~/g.{ tV0v:JT@c7l1shH%{L#g2Id}0vVHjF>6X]i>vfcd:fLk ' );
define( 'LOGGED_IN_SALT',   '(&0-8?]tN[)i-F:nUi#b`1<a4f^]n`1]IY2ET4e6e,Bh|[m9 (S:r+q=:35) 5?(' );
define( 'NONCE_SALT',       '`h:s-z=<48x^-fs+/3lZN  %oxzF7p0Bk>,4eIW*L7$..YGaL%/r(<t_lDNRQVrS' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define('DISALLOW_FILE_EDIT', false);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
