<?php

$books = array();
$books[] = array("title" => "Wordpress for you", "author" => "Johan Kohlin");
$books[] = array("title" => "PHP the easy way", "author" => "John Bauer");
$books[] = array("title" => "The big bad wolf", "author" => "R. K. Rowling");
$books[] = array("title" => "No Idea", "author" => "Nolan Ideos");
?>
<h3>Use your search</h3>
            <hr>
            By title:<br>
            <form method="GET">
                <table bgcolor="#bdc0ff" cellpadding="6">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td><INPUT type="text" name="searchtitle"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><INPUT type="submit" name="submit" value="Submit"></td>
                        </tr>
                    </tbody>
                </table>
            </form>

            <h3>Book List</h3>
            <hr>
            <?php
            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
            if (isset($_GET) && !empty($_GET)) {
            # Get data from form
                
                #first trim the search, so no white spaces appear prior to the text entered
                $searchtitle = trim($_GET['searchtitle']);
                
                #after that it is wise to use addslashes, it adds slashes if there's an apostrophe or quotation mark
                $searchtitle = addslashes($searchtitle);
                
                
                 #here we create a variable $id and basically say that we want the data from the array matching the search criteria
                $id = array_search($searchtitle, array_column($books, 'title'));
                
                #echo $id;

                echo '<table bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
                if ($id !== FALSE) {
                    $book = $books[$id];
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            } 
            
            
            # in this else under, you basically show the book-list.
            # above you checked in the GET method has been set, if it has display the results of the "search"
            # if they have not been set, just display the list instead. In this case "book-list" is insufficient
            # all you have to do is merge book-list.php with book-search.php and create one master page
            # define the array at the start in PHP and manipulate it later on.
            
            else 
                
                {                
                echo '<table bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                foreach ($books as $book) {
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>

            
            
            
            <!--
        
            WHAT WOULD THIS PART OF CODE DO???
            
            
            -->
            
            //<?php
//            if (isset($_COOKIE['colourpreference']))
//                    $colourpreference = $_COOKIE['colourpreference'];
//                else
//                    $colourpreference = "#dddddd";
//                echo '<table bgcolor="' . $colourpreference . '" cellpadding="6">';
//                
//                ?>