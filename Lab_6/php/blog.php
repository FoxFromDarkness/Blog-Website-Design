<?php
    session_start();
    include_once("db.php")
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/style_blog.css" rel="stylesheet"/>
    <script src="main.js"></script>
</head>

<header>
  
  <div id="0"></div>

  <img width="500" height="500" src="../images/profilowe.png"/>

  <div class="SocialMedia">
      <a href="https://www.facebook.com/profile.php?id=100001728866242&ref=br_rs"> <img width="100" height="100" src="../images/facebook.png"/> </a>
      <a href="https://www.instagram.com/pawel_minda/"> <img width="100" height="100" src="../images/instagram.png"/> </a>
      <a href="https://github.com/FoxFromDarkness"> <img width="100" height="100" src="../images/github1.png"/> </a>
      </div>
</header>

<nav>
  <a href="#0"><div class="MenuButtons">Home</div></a>
  <a href="post.php"><div class="MenuButtons">Stwórz nowy post</div></a>
  <a href="logout.php"><div class="MenuButtons">Wyloguj się</div></a>
  <!-- <a href="../index.html"><div class="MenuButtons">Powrót do strony</div></a> -->
</nav>

<body>
    <?php
        require_once("../nbbc/nbbc.php");

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

                $admin = "<div><a href='del_post.php?pid=$id'>Delate</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>&nbsp</div>";

                $output = $bbcode ->Parse($content);

                $posts .= "<div><h2><a href='view_post.php?pid=$id'>$title<a/></h2><h3>$date</h3><p>$output</p>$admin<hr /></div>";
            }
            echo $posts;

        }   else {
            echo "There are no posts to dislay!";
        }

    ?>
</body>

<footer>
  © 2018 Paweł Minda
</footer>
</html>