<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines

You may include other settings here that you only want enabled on your local development checkouts
*/

define( 'DB_NAME', 'kbhff_dk_db' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'

// For local development
define('WP_HOME', 'http://localhost:8888');
define('WP_SITEURL', 'http://localhost:8888');
define('WP_DEBUG', true);
