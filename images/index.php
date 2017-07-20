<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>A news Platform</title>
<link rel="stylesheet" href="styles/style.css" media="all">
</head>

<body>
  <?php include("counter.php"); ?>
  <div class="container">
    <div class="head">
      <a href="index.php"><img id="logo" src="images/logo.png" alt="Logo" /></a>
      <img id="banner" src="images/ad_banner.gif" alt="Ad Banner" />
    </div>
    <!--Navbar-->
    <?php include("includes/navbar.php"); ?>

    <!--Content Area start-->
    <?php include("includes/post_content.php"); ?>

    <!--Sidebar-->
    <?php include("includes/sidebar.php"); ?>

    <div class="footer_area">
      <h1 style="padding:20px; text-align:center">&copy; All Rights Reserved. 2016 - juanmanuelcuartas.esy.es</h1>
    </div>
  </div>



</body>
</html>
