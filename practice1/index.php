<!DOCTYPE html>
<?php
  $config = array(
          "host"=>"localhost",
          "duser"=>"root",
          "dname"=>"opentutorials2"
        );
          function db_init($host,$duser,$dname){
            $conn = mysqli_connect($host, $duser);
            mysqli_select_db($conn, $dname);
            return $conn;
          }
  $conn = db_init($config["host"],$config["duser"],$config["dname"]);
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <style>
      body{
        margin: 0;
      }
      header{
        border-bottom: 1px solid grey;
        padding-left: 45px;
        text-align: center;
      }
      nav{
        border-right: 1px solid grey;
        width: 200px;
        height: 700px;
        float: left;
      }
      nav ul{
        margin: 0;
        padding: 20px;
        list-style: none;
      }
      #content{
        padding-left : 20px;
        float:left;
        width: 600px;
      }
      body.black{
        background-color:black;
        color:white;
      }
      body.white{
        background-color:white;
      }
    </style>
  </head>

  <body id = "body">
    <header>
      <h1><a href ="index.php">SeoMinSeok</h1>
    </header>
    <nav>
      <ul>
        <?php
          $result = mysqli_query($conn, "SELECT * FROM topic");
          while($row = mysqli_fetch_assoc($result)){
            echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a><li>';
        }
         ?>
      </ul>
    </nav>
    <div id = "content">
    <article>
        <?php

          if(empty($_GET['id'])){
            echo "Welcome";
          }
          else
          {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM topic WHERE id =".$id;
            $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id = ".$id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <h2><?=htmlspecialchars($row['title'])?></h2>
            <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
            <div><?=htmlspecialchars($row['description'])?></div>
       <?php
          }
        ?>

      </article>
      <input type="button" name="name" value="White" onclick="document.getElementById('body').className = 'white'">
      <input type="button" name="name" value="Black" onclick="document.getElementById('body').className = 'black'">
      <a href="write.php">쓰기</a>
    </div>
  </body>
</html>
