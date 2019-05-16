<?php
    session_start();
    include_once("db.php")
?>


<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php
        require_once("nbbc/nbbc.php");

        $bbcode = new BBCode;

        $sql = "SELECT * FROM posts ORDER BY id DESC";

        $res = mysqli_query($db, $sql) or die(mysqli_error());

        $posts = "";

        if(mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];

                $admin = "<div><a href='del.post.php?pid=$id'>Delate</a>&nbsp;<a href='edit.post.php?pid=$id'>Edit</a>&nbsp</div>";

                $output = $bbcode ->Parse($content);

                $posts .= "<div><h2><a href='view_post.php?pid=$id'>$title<a/></h2><h3>$date</h3><p>$output</p>$admin<hr /></div>"
            }
            echo $posts;

        }   else {
            echo "There are no posts to dislay!"
        }

    ?>
</body>
</html>