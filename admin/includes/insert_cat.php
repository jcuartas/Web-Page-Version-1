<?php
@session_start();
if(!isset($_SESSION['user_name'])) {
  echo "<script>window.open('../login.php?not_authorised=You are not Authorised to access!', '_self')</script>";
}
else {

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title></title>
  </head>
  <body>
    <div align="center"><br> <br> <br> <br>


    <form class="" action="index.php?insert_cat" method="post">
      <b>Insert New Category:</b><input type="text" name="new_cat">
      <input type="submit" name="insert_cat" value="Insert Category Now">
    </form>

    </div>
<?php
include("../includes/database.php");
if(isset($_POST['insert_cat'])) {
  $cat_title = $_POST['new_cat'];

  if ($cat_title == '') {
    echo "<script>alert('Please insert Category Name')</script>";
    echo "<script>window.open('index.php?insert_cat', '_self')</script>";
  }
  else {
    $insert_cat = "insert into categories (cat_title) values ('$cat_title')";

    $run_cat = mysqli_query($con, $insert_cat);

    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('New Category Added')</script>";
      echo "<script>window.open('index.php?insert_cat','_self')</script>";
    }
  }
}
 ?>

  </body>
</html>
<?php } ?>
