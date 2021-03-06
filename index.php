<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"],$config["duser"],$config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM topic");
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css?after">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body id = "change">
    <!--
    <div class="alert alert-info alert-dismissible fade show" role="alert" font-size= "5px">
      #<?php
        #session_start();
        #if(!$_SESSION['user']){ // 로그인 하지못햇을시 무조건 login.php거침.
        #  header('location: /login.php');
        #}
        #else{
        #  echo 'Welcome : '.$_SESSION['user'];
      #}
       ?>
         <Button type="submit" name="" data-bs-dismiss="alert" data-bs-toggle="modal" data-bs-target="#exampleModal" class = "btn btn-secondary">Logout</Button>
    </div>
  -->

  <div class="container-fluid" style = "background-color : #0d6efd">
    <br>
    <div class="row">
        <div class="col-sm-11"><?php
          session_start();
          if(!$_SESSION['user']){ // 로그인 하지못햇을시 무조건 login.php거침.
            header('location: /login.php');
          }
          else{
            echo 'Welcome : '.$_SESSION['user'];
        }
         ?></div>

         <div class="col-sm-1">
           <Button type="submit" name="" data-bs-dismiss="alert" data-bs-toggle="modal" data-bs-target="#exampleModal" class = "btn btn-secondary">Logout</Button>
         </div>
    </div>

  </div>




    <div class="container-fluid">
      <header class = "jumbotron text-center">
          <img src="moon.jpg" alt="moon" height = "75" width = "100" class = "rounded">
          <h1><a href="/index.php">JavaScript</a></h1>

      </header>
    </div>

    <div class="row">
      <nav class ="col-md-3">
          <ol class= "nav flex-column">
            <?php
              while($row = mysqli_fetch_assoc($result)){
                echo '<li class="nav-item"><a class="nav-link" href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a><li>'."\n";

            }
            #echo '<li><a href = "http://localhost/write1.php">글쓰기</a></li>';
             ?>
          </ol>
      </nav>
      <div class="col-md-9">
        <article>

            <?php
              if(isset($_GET['id'])){ ?>
                <a href="delete.php?id=<?=$_GET['id']?>" class = "btn btn-primary">Delete</a>
                <a href="revise.php?id=<?=$_GET['id']?>" class = "btn btn-primary">Revise</a>
              <?php } ?>



          <?php
            #if(empty($_GET['id']) == false)
              #echo file_get_contents($_GET['id'].".txt");
            if(empty($_GET['id']) == false){
              #$sql = 'SELECT * FROM topic WHERE id ='.$_GET['id'];
              $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id = ".$_GET['id'];

              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
              echo '<p>'.htmlspecialchars($row['name']).'</p>';
              echo strip_tags($row['description'],'<a><h1><h2><h3><li><ol>');
            }else{
              echo '<h2>'.'Wellcome to Minseok homepage'.'</h2>';
            }
            echo '<hr>';
            echo '<h3>'.'comment'.'<h3>';
            ?>
            <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://chat222.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        </article>
        <hr>
        <div id = "control">
          <div class="btn-group" role="group" aria-label="Basic example">
            <input type="button"class="btn btn-primary" value = "white" onclick = "document.getElementById('change').className = 'white'"/>
            <input type="button"class="btn btn-secondary" value = "black" onclick = "document.getElementById('change').className = 'black'"/>
            <a href="/write.php" class="btn btn-success">Write</a>
          </div>
        </div>
      </div>
    </div>


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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<!--End of Tawk.to Script-->
  <footer style = "background-color : #bbbbbb">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-sm-2" style = "text-align : center";><h5>Copyright &copy; 2021</h5><h5>민석(Minseok)</h5></div>
        <div class="col-sm-6"><h4>대표자소개</h4><p>서민석</p></div>
        <div class = "col-sm-2"><h4 style="text-align:center;">SNS</h4>
          <div class ="list-group">
            <a href ="#" class="list-group-item">facebook</a>
            <a href ="#" class="list-group-item">youtube</a>
            <a href ="#" class="list-group-item">naver</a>
          </div>
        </div>
        <div class="col-sm-2"><h4 style="text-align : center"><i class="bi-check2"></i>  by 민석</h4>
        </div>
      </div>
    </div>
  </footer>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">로그아웃 하시겠습니까?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form class="" action="/login.php" method="post">
          <button type="submit" class="btn btn-primary">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
