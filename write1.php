<?php
  $conn = mysqli_connect("localhost", "root");
  mysqli_select_db($conn, "opentutorials");
  $result = mysqli_query($conn, "SELECT * FROM topic");
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css?before">
</head>
<body id = "change">
    <header>
        <img src="moon.jpg" alt="moon" height = "75" width = "100">
        <h1><a href="http://localhost/index.php">JavaScript</a></h1>
    </header>
    <nav>
        <ol>
          <?php
          $a = 0;
          while($row = mysqli_fetch_assoc($result){
            echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a><li>'."\n";
            $a++;
        }
        #echo '<li><a href = "http://localhost/write1.php">글쓰기</a></li>';
         ?>
        </ol>
    </nav>
    <div id = "control">
      <input type="button" value = "white" onclick = "document.getElementById('change').className = 'white'"/>
      <input type="button" value = "black" onclick = "document.getElementById('change').className = 'black'"/>
      <a href="http://localhost/write.php"> 쓰기</a>
    </div>
    <article>
      <?php
        $conn = mysqli_connect("localhost", "root");
        mysqli_select_db($conn, "opentutorials");
        $result = mysqli_query($conn, "SELECT * FROM topic");
        $a = 0;
        while($row = mysqli_fetch_assoc($result)){
          if($a > 3){
            echo '<h2>'.$row['title'].'</h2>'.'작성자 :' ;
            echo $row['author'];
            echo '</br>';
            echo $row['description'];
            echo '</br>';
          }
          $a++;
      }

       ?>
    </article>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5fe9e72cdf060f156a9122e6/1eqkqu22j';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
    </script>

<!--End of Tawk.to Script-->
</body>
</html>
