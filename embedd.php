<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$name = "Jasmiaaan";


if ($name == "Jasmin"){
    
    echo "Your name is $name !";
}

else{
    # we will now break the PHP and use HTML to make some form, and then continue PHP later.
    # you will notice that PHP continues working without any single problem, is goes and executes the script all the way through even with breaks.

?>

<form action="embedd.php" method="GET">
    
    <input type ="text" name="name">
    <input type="submit" value="Submit">
    
</form>
  
<?php

#now we have started the new PHP tag, but it continues on the old one.
    
}




?>

<!--embedding php in <a> for menu-->

<a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
<a class="<?php echo $current_page == 'booksearch.php' ? 'active' : NULL ?>" href="booksearch.php">Browse books</a>
