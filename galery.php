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

        <?php
        $files = glob("uploads/*.*");
        for ($i=0; $i<count($files); $i++)
        {
            $image = $files[$i];
            $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
            );

            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_file)) {
                print"<div class='content'>";
                echo basename($image); // show only image name if you want to show full path then use this code // echo $image."<br />";
                echo '<img src="'.$image .'" alt="Random image" />'."</div>";
            } else {
                continue;
            }
        }
        ?>

    </div>
    <?php
    include_once ("php/footer.php");
    ?>
</div>
</body>
</html>
<?php