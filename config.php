<?php

#our config file, has information about the database, about the current page we're on

$url = $_SERVER['REQUEST_URI'];

$strings = explode('/', $url);

$current_page = end($strings);

//$dbname = 'library';
//$dbuser = 'root';
//$dbpass = '';
//$dbserver = 'localhost';
//
//# Open the database
//@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

//Konstanter för anslutningen
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "library");

// Användning av konstanter



//$user = "root";
//$pass = "";
//
//try {
//    $dbh = new PDO('mysql:host=127.0.0.1:3306;dbname=library', $user, $pass);
//    var_dump($dbh);
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}
//


$dsn = 'mysql:host=localhost;dbname=library';

//Inställningar

$attributes = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$dbh = new PDO($dsn, DB_USER, DB_PASSWORD, $attributes);

# Tell the user if it can’t connect
//if ($db->connect_error) {
//    echo "could not connect: " . $db->connect_error;
//    printf("<br><a href=index.php>Return to home page </a>");
//    exit();



#the following three will get you the current page, how?
#first you assign the URI (which is the end of the URL as we talked on the Lecture 2)
#You get that by using the superglobal $_SERVER['REQUEST_URI']
#then you create a new variable $strings which contains every string seperated by a "/" from the $url - hard to follow, ha?
#now that you have all strings 

//$url = $_SERVER['REQUEST_URI'];
//print_r($url);
//echo "</br>";
//$strings = explode('/', $url);
//print_r($strings);
//echo "</br>";
//$current_page = end($strings);
//print_r($current_page);
//echo "</br>";
//$dbname = 'library';
//$dbuser = 'root';
//$dbpass = '';
//$dbserver = 'localhost';
?>