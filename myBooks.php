<?php
if(!isset($_COOKIE["accepted"])) {
    $cookie_value = "No";
    setcookie("accepted", $cookie_value, time() + (86400 * 30), "/");
};
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/main.css"/>
        <title></title>
    </head>
    <body>
        <div class="mainWrapper">
            <?php
            if($_COOKIE["accepted"] == "No"){
                print'
                <div class="cookieAlert">This site uses cookies!  By your continued use of this site you accept out "terms of use"</div>
                ';

            }
            include_once "php/menu.php";
            ?>
            <div class="mainBody">
                <div class="content big">
                    <img src="images/book.png" alt="book"> <input type="button" name="return" value="return">
                </div>
                <div class="content big">
                    <img src="images/book.png" alt="book"> <input type="button" name="return" value="return">
                </div>
            </div>
        </div>
    <?php
    include_once ("php/footer.php");
    ?>
    </body>
</html>