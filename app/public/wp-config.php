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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'BnhnSixOf/a3vBXBJBrUxA6H2jGYGHWNvD53QV5LAs3RJ/g8quahbM8AM9y7yd7rCo4+O6uieqOPBsTrFNi0Nw==');
define('SECURE_AUTH_KEY',  'k4b3NnZeW1VaaTFA0xOFvIf4kTu1IkIlhqO/pycqofHuYnUDJWw6PrCwntqyTLt7eCVYGFi2Bc16EtjgPPNYJg==');
define('LOGGED_IN_KEY',    'JihwB+n+3FBTGfzYqwwt8ehaLCdVe+evulO4G9IpftAkfeKn0R9WKKOkP2XtVKD3Fc0n99j+PMWZCxJLPexuHg==');
define('NONCE_KEY',        'SYRR6D2QpNcQghJHlbYUObfUF7K/43EPOl6vFRza5nW1wtu1jeRWYfWtKOFQGcVVuJiA5cX8bbhk4PwLToyH+g==');
define('AUTH_SALT',        'GuacA4SScr8Z5kKhJ4AtZv0DquUs1AsNaqR1z+5/hx0wnMUeVGIWGynjO0mg6JvEHCV7UtNBCBkTNxO/Dkkwrg==');
define('SECURE_AUTH_SALT', 'QZi24elPqTGfgwT3DZoulenCr8ZMkvHcRLu5pmXW8SCApoYQGeeYOGKyPuJLukjwtgbHu98WqQQRj1Twt8WLCA==');
define('LOGGED_IN_SALT',   'DXMd9wT13EicVy9xj8lbLXB+gToOouEW9yG+3C4MvhcbCrlCmpHO4P67F5NzcGj/tIE043yNefw3oD9SjO1szg==');
define('NONCE_SALT',       'DHrji48GYdqrmJSmLt8xOsnvwVloJoKtMyjrPS9wNvFm7kpnbIUtNoZcWRA7deaOxkRfhhqrlgvJOPsigculKA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
