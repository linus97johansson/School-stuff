<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css"/>
    <title>Admin Panel</title>
</head>
<body>
<div class="mainWrapper">

    <?php
    include_once "config.php";
    include_once "php/menu.php";
    session_start();

    print'<div class="mainBody">';
    if (isset($_SESSION['adminID'])) {

        //Form to add picture
        print'<div class="content big">
This is the form to upload a picture in the gallery
<form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="file" accept="image/*" name="image">
            <input type="submit" name="submit">
        </form>
        </div>';

        //Form to add a book.

        print"
    <div class='content big'>
    this is the form to add a author
<form method='post'>
            <input type='text' name='Title' placeholder='Book Title'>
            <input type='text' name='Author' placeholder='Author'>
            <input type='submit' name='addBook'>
        </form>
        </div>";

        if (isset($_POST['addBook'])) {
            $sql = "INSERT INTO `books`(`title`, `author`) VALUES ('" . $_POST['Title'] . "','" . $_POST['Author'] . "')";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            unset($_POST);
        }

        //Listing all the books.

        $sql = "SELECT * FROM `books`";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $books = $stmt->fetchAll();

        foreach ($books as $book) {
            print'
                <div class="content big">
                    <img src="images/book.png" alt="cover"> <span>Title:' . $book["title"] . '. Author:' . $book["author"] . '.</span>
                    <a href="admin.php?delete=' . urlencode($book["bookid"]) . '"> Delete </a>
                </div>
                ';

        }

        //delete book

        if (isset($_GET['delete'])){
            $sql = "DELETE FROM `books` WHERE `bookid` = ".$_GET['delete'];
            var_dump($sql);
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            header("location: admin.php");
        }

        //logout

        print'
              <div class="content big">
              <span> </span>
              <form action="" method="post">
                    <input type="submit" name="logout" value="Sign Out">
                </form>
                <span> </span>
              </div>';
        if (isset($_POST['logout'])) {
            session_destroy();
            header("location: index.php");
        }
    } else {
        print'
                    <h2>Log in</h2>
                      <form method="POST">
                          <label>Username</label>
                          <input class="loginTxt" type="text" name="username" />
                          <label>Password</label>
                          <input class="loginTxt" type="password" name="password" />
                          <input id="loginBtn" type="submit" value="Log in" />
                      </form>';
        if (isset($_POST) && !empty($_POST)) {
            $usernameInput = $_POST["username"];
            $usernameInput = htmlentities($usernameInput);

            $passwordInput = sha1($_POST["password"]);
            $passwordInput = htmlentities($passwordInput);

            $sql = " SELECT * FROM `Admins` WHERE `username`='" . $usernameInput . "' AND `password`='" . $passwordInput . "'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $matches = $stmt->fetchAll();

            $numberMatches = count($matches);

            if ($numberMatches == 0) {
                print"There were no admin account whit that username or password";
            }
            if ($numberMatches > 1) {
                print"There seems to be an error with the accounts. contact an admin asap!";
                session_destroy();
                die();
            }
            if ($numberMatches == 1) {

                ini_set("session.cookie_httponly", true);

                if (isset($_SESSION["userIP"]) === false) {
                    $_SESSION["userIP"] = $_SERVER["REMOTE_ADDR"];
                }

                if ($_SESSION["userIP"] !== $_SERVER["REMOTE_ADDR"]) {
                    session_unset();
                    session_destroy();
                }
                $id = $matches[0]['id'];
                $_SESSION["username"] = $usernameInput;
                $_SESSION["adminID"] = $id;
                header("location: admin.php");
            }

        }

    }
    print"</div>
        </div>";
    include_once("php/footer.php");
    ?>
</div>
</body>
</html>
