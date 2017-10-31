<?php
$current = basename($_SERVER['REQUEST_URI']);
var_dump($current);
?>
<div class="menuImage">
    <ul class="mainMeny">
        <li class="mainTitle">Book Club</li>
        <a href="index.php">
            <li class="menuItem <?php if ($current == "index.php"){print "active";}?>">Home</li>
        </a>
        <a href="about.php">
            <li class="menuItem <?php if ($current == "about.php"){print "active";}?>">About Us</li>
        </a>
        <a href="browse.php">
            <li class="menuItem <?php if ($current == "browse.php"){print "active";}?>">Browse Books</li>
        </a>
        <a href="myBooks.php">
            <li class="menuItem <?php if ($current == "myBooks.php"){print "active";}?>">My Books</li>
        </a>
        <a href="contact.php">
            <li class="menuItem <?php if ($current == "contact.php"){print "active";}?>">Contact</li>
        </a>
    </ul>
</div>

<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Linus-->
<!-- * Date: 2017-09-11-->
<!-- * Time: 19:22-->
<!-- */-->