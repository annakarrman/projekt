<?php
/*autoload of classes*/
spl_autoload_register(function($class) {

    include 'classes/' . $class . '.class.php';
    
    });

    
//host
define("DBHOST", "localhost");
//user
define("DBUSER", "admin");
//password
define("DBPASS", "password");
//database
define("DBDATABASE", "inkopslista");


/*
//host
define("DBHOST", "studentmysql.miun.se");
//user
define("DBUSER", "ankr1402");
//password
define("DBPASS", "2RHBXUVlGOsdUUpZ");
//database
define("DBDATABASE", "ankr1402");
*/


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>