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
            include_once "config.php";
            ?>
            <div class="mainBody">



                <div class="content big">
                    <form method="GET">
                        <INPUT type="text" name="searchQuerry" placeholder="Title or Author">
                        <INPUT type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <?php
//                include_once "php/booklist.php";

//                $query = " SELECT * from books";
//                var_dump($query);
//                $stmt = $db->prepare($query);
//                $stmt->execute();
//                $books = $stmt->fetch();

                $sql = " SELECT * from books";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $books= $stmt->fetchAll();


                //                Starting with this search method
                if (isset($_GET) && !empty($_GET)) {
                    # Get data from form

                    #first trim the search, so no white spaces appear prior to the text entered
                    $searchQuerry = trim($_GET['searchQuerry']);

                    #after that it is wise to use addslashes, it adds slashes if there's an apostrophe or quotation mark
                    $searchQuerry = addslashes($searchQuerry);

//                    var_dump($searchQuerry);

                    #here we create a variable $id and basically say that we want the data from the array matching the search criteria
//                    $id = array_search($searchQuerry, array_column($books, 'title'));
//                    $id2 = array_search($searchQuerry, array_column($books, 'author'));

                    $sql = " SELECT * FROM `books` WHERE `title` LIKE '%".$searchQuerry."%' OR `author` LIKE '%".$searchQuerry."%'
";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    $books= $stmt->fetchAll();

                    $hits = count($books)
                    ;
//                    var_dump($books['0']['bookid']);

                    #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
                    if ($books !== FALSE) {
                        foreach ($books as $book) {
                            $id = $book['bookid'];
                            $title = $book['title'];
                            $author = $book['author'];
                            print'
                <div class="content big">
                    <img src="images/book.png" alt="cover"> <span>Title:' . $title . '. Author:' . $author . '.</span>
                    <a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a>
                </div>
                ';
                        }
                    }
                    if ($books == FALSE){
                        print'There were no books matching your search!';
                    }
                }



//                Else do this, which just lists all books

                else {

                    foreach ($books as $book) {
                        $title = $book['title'];
                        $author = $book['author'];
                        print'
                <div class="content big">
                    <img src="images/book.png" alt="cover"> <span>Title:' . $title . '. Author:' . $author . '.</span>
                    <a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a>
                </div>
                ';
                    }
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


