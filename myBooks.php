<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css"/>
    <title>My books</title>
</head>
<body>
<div class="mainWrapper">
    <?php
    include_once "php/menu.php";
    ?>
    <div class="mainBody">
        <?php
        $sql = " SELECT * from books WHERE `reserved`='1'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $books = $stmt->fetchAll();

        foreach ($books as $book) {
            $id = $book['bookid'];
            $title = $book['title'];
            $author = $book['author'];
            print'<div class="content big">
                    <img src="images/book.png" alt="cover"> <span>Title:' . $title . '. Author:' . $author . '.</span>
                    <a href="returnBook.php?bookid=' . urlencode($title) . '"> Return </a>
                </div>';
        }
        ?>
    </div>
</div>
<?php
include_once("php/footer.php");
?>
</body>
</html>