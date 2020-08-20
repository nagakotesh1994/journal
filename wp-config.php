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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'law' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '[qr{_[ahV+Bov,C ~qkv+&6mIu%kalzVwbk7tw~b-zRpoSg,6ta1/(_0M7)$BW{:' );
define( 'SECURE_AUTH_KEY',  'iRC1JxezOxqH,gd9,2 d:coy@bp?K-.rnzk id-8Ji/DKV@3p$F>a(s/+RD-8*;V' );
define( 'LOGGED_IN_KEY',    '!ke2+,tFuC=TB`w*GTio)]~S)b?MD>o?&~5qFC_-7zuObWc*h_Yj*ALwjU?tXHvq' );
define( 'NONCE_KEY',        ':(T5;%p36ZldZU}T;2iCv>o_OO6-6-y8)3x,5Izit=[z|Y++AJT<9+/y0HE[HsP`' );
define( 'AUTH_SALT',        '<!^On>hzy0yp@PxLAat@VTrM:|6XREs6e0U]arK>)50&pe$1!Kn_u8X(o9K_:sOW' );
define( 'SECURE_AUTH_SALT', 'w1e&f.A7;g+NL.O+Q(H5:m 1*zkgtGrT-RZM%mB*S_I{,JI&ZX,b} pw#3`A7,z6' );
define( 'LOGGED_IN_SALT',   '_<{@R s_bC1KA_PRz^Gy9M)yl&&WvO>eF/.{J:Re{mv8/[0Cexr+=RMJawRqoqP<' );
define( 'NONCE_SALT',       '@s(v>42E}*2cefM-yrcp3VLidIe8[&X1^Q6~VyM9C[H2M?%Q-KOJSG|tOqO`>uq]' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
