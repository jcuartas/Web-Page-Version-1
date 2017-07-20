<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>A news Platform</title>
<link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
  <div class="container">
    <div class="head">
      <a href="index.php"><img id="logo" src="images/logo.png" alt="Logo" /></a>
      <img id="banner" src="images/ad_banner.gif" alt="Ad Banner" />
    </div>
    <!--Navbar-->
    <?php include("includes/navbar.php"); ?>

    <!--Content Area start-->
    <div class="post_area">
        <?php
        include("includes/database.php");
        if (isset($_GET['search'])) {
          $get_query = $_GET['search_query'];
          if ($get_query=='') {
            echo "<script>alert('Please write a keyword')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            exit();
          }
          $get_posts = "select * from posts where post_keywords like '%$get_query%' or
          post_title like '%$get_query%' or post_content like '%$get_query%'";
        }

        $run_posts = mysqli_query($con, $get_posts);

        while($row_posts = mysqli_fetch_array($run_posts))
        {
          $post_id = $row_posts['post_id'];
          $post_title = $row_posts['post_title'];
          $post_date = $row_posts['post_date'];
          $post_author = $row_posts['post_author'];
          $post_image = $row_posts['post_image'];
          $post_content = substr($row_posts['post_content'], 0, 300);

          echo "
          <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>

          <span><i>Posted by </i><b>$post_author</b> &nbsp; &nbsp; On <b>$post_date</b></span> <span style:'color:brown;'><b>Comments (2)</b></span>
          <img src='admin/news_images/$post_image' width='100' height='100'>

          <div>$post_content <a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br />
          ";
        }
         ?>
    </div>

    <!--Sidebar-->
    <?php include("includes/sidebar.php"); ?>

    <div class="footer_area">
      <h1 style="padding:20px; text-align:center">&copy; All Rights Reserved. 2016 - juanmanuelcuartas.esy.es</h1>
    </div>
  </div>



</body>
</html>
