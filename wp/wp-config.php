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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hair-sect' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'suepass' );

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
define( 'AUTH_KEY',         ' Yf-dH!O|P<!sSgrG(Frw:i ;J(3-f-%z51mXE dRa1R4+TZHc(8f@h]#5fA+=pU' );
define( 'SECURE_AUTH_KEY',  'L!7rVx9+EOieWXr3&hBuqdK{ho2E/&&ouKF%KvA;$Lz{hh>o>*vfpI.{l*H]%s)7' );
define( 'LOGGED_IN_KEY',    '4=rHXlR)?`I!3_.Wq&mb{ZXYdVn+]C@!J?=c.D2@)3lFO{|]P4sN|avR@sBEJSLr' );
define( 'NONCE_KEY',        'cSl&L]b%Vq-[*|@G7~dr%.SI(+H+q|*,E2nb%v-Gs7w1ns-)G}AU^7?V=MGq:-i@' );
define( 'AUTH_SALT',        '%bXlq_n?ZpcW],we-Cc}DR=BBqSHF1LLH1F@@DMyvzS^7!?|riHtJnx=6vsULI-D' );
define( 'SECURE_AUTH_SALT', 'oXluLh^P1H.L2LWl<+Yp$HS#f-_Q{w_QqQB?$JO8*eb9/{F&]RgQZq}0FsI[]>P+' );
define( 'LOGGED_IN_SALT',   'CNh`3aB,G3Mp7IDq(%CAKdBXl=q#~4VONjU62>,Qp]-gi?*lT/HLfM1,2DOCt!!1' );
define( 'NONCE_SALT',       '6R2@k]!Qp#Y7v*>w9ye&&/53M)AF;xqxE71&kqtIdShTsld6J+!EHN6Ew`neu U(' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
