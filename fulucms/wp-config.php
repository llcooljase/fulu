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

define('DB_NAME', 'fulumail');



/** MySQL database username */

define('DB_USER', 'fulumail');



/** MySQL database password */

define('DB_PASSWORD', 'BiRD1IyzIP');



/** MySQL hostname */

define('DB_HOST', 'fulumail.db.9038980.hostedresource.com');



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

define('AUTH_KEY',         'rJuLUo?xMH_knA~ilG<{jNYz@xU^qE<&rXM%abz$6:|lR^Be`,jCIODS_^Tcm,3a');

define('SECURE_AUTH_KEY',  '=,^c5?*kNU#AjEWOLXsw$srM)NjEc;_ATZhFTFvl~jmNtKBj{f:0J_EOXNv=Ed)R');

define('LOGGED_IN_KEY',    ']|Z ]p9rAP5(nTbpVkU&<(mF8/^<aY01UCI1:R%n+Y:|x^Xu|1yYXHS}IC]aUJS`');

define('NONCE_KEY',        'iv@P<M0M(R;=U($6| QQ11NsMd*{hF--E*HwVIsygBczBn$PT^*QspchZQs<-vme');

define('AUTH_SALT',        '{|w@z,)[mQ&KtgWhj(~UGo$k1m`{kU7[Hy2k>ajRr~P2)z,:3y!T2gL(OKE2I>`6');

define('SECURE_AUTH_SALT', 'b4Xj;Y< Ts8`w;sw;/q5tw,6mTyVTEZqK7|KF7T:hh@XX+RY[p2w[lA`<a7_;Hx]');

define('LOGGED_IN_SALT',   'b{pin7t+^RAU$Mt3Bo9H6]y-xN#5_ysV;;ufcKgu+9mpjR* SCiUPRR`~H_BC|-q');

define('NONCE_SALT',       'W)+?z7TMloZ;>~9v)gIqI_w?3]U o01S|^#,a(#-`U+6|yKk<7IoYJ09;Gr&M}$*');



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

