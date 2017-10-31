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
            include_once "php/menu.php";
            ?>
            <div class="mainBody">
                <div class="content big">
                    <form action="post">
                        <input type="text">
                        <input type="text">
                        <input type="submit" name="search" value="search">
                    </form>
                </div>
                <?php
                include_once ("php/booklist.php");
                foreach ($books as $book){
                    $title = $book['title'];
                    $author = $book['author'];
                    print'
                <div class="content big">
                    <img src="images/book.png" alt="cover"> <span>Title:'.$title.'. Author:'.$author.'.</span>
                </div>
                ';
                }
                ?>
            </div>
        </div>
        <?php
        include_once ("php/footer.php");
        ?>
        </div>
    </body>
</html>


<!-- * To change this license header, choose License Headers in Project Properties.-->
<!-- * To change this template file, choose Tools | Templates-->
<!-- * and open the template in the editor.-->


