<?php

include("config.php");

$bookid = trim($_GET['bookid']);
echo '<INPUT type="hidden" name="bookid" value=' . $bookid . '>';

$bookid = trim($_GET['bookid']);      // From the hidden field
$bookid = addslashes($bookid);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

echo $bookid;

// Prepare an update statement and execute it
$sql = "UPDATE books SET reserved=0 WHERE bookid = " . $bookid;
var_dump($sql);
$stmt = $dbh->prepare($sql);
$stmt->execute();
printf("<br>Succesfully returned!");
print"You should be redirected to the front page. If not, press <a href='index.php'>Here</a>.";
header("location:index.php");
exit;

?>

    


