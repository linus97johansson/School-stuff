<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css"/>
    <title>Contact</title>
</head>
<body>
<div class="mainWrapper">
    <?php
    include_once "php/menu.php";
    ?>
    <div class="mainBody">
        <div class="content big">
            <form id="contact">
                <input type="text" value="name" name="name" placeholder="Your name" required>
                <input type="text" value="number" name="number" placeholder="Your Number">
                <input type="email" value="email" name="email" placeholder="Your email" required>
                <textarea name="contact" id="contact" cols="30" rows="10" placeholder="Please write your massage here"
                          required></textarea>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
<?php
include_once("php/footer.php");
?>
</div>
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

