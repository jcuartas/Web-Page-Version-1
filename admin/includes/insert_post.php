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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    <style type="text/css">
    td, tr {padding:0px; margin:0px; }

    </style>

  </head>
  <body>
    <form class="" action="index.php?insert_post" method="post" enctype="multipart/form-data">
        <table width="795" align="center" bgcolor = "#999999">
          <tr bgcolor="#FF6600">
            <td colspan="6" align="center"><h1>Insert New Post:</h1></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Title:</strong></td>
            <td><input type="text" name="post_title" size="60"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Category:</strong></td>
            <td>
              <select class="" name="cat">
                <option>Select a Category</option>
                <?php

                 include("../includes/database.php");
                 $get_cats = "select * from categories";

                 $run_cats = mysqli_query($con, $get_cats);

                 while($cats_row=mysqli_fetch_array($run_cats)) {
                   // $cat_id = $rowcat_id;
                   $cat_id = $cats_row['cat_id'];
                   $cat_title = $cats_row['cat_title'];

                   echo "<option value='$cat_id'>$cat_title</option>";
                }

                ?>

              </select>
            </td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Author:</strong></td>
            <td><input type="text" name="post_author" size="60"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Keywords:</strong></td>
            <td><input type="text" name="post_keywords" size="60"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Image:</strong></td>
            <td><input type="file" name="post_image" size="50"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Content:</strong></td>
            <td><textarea name="post_content" rows="15" cols="40"></textarea></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#FF6600">Status:</td>
            <td>
              <select class="" name="status">
                <option>Select a status</option>
                <?php

                //  include("../includes/database.php");
                 $get_status = "select * from post_status";

                 $run_status = mysqli_query($con, $get_status);

                 while($status_row=mysqli_fetch_array($run_status)) {
                   // $cat_id = $rowcat_id;
                   $status_id = $status_row['status_id'];
                   $status_name = $status_row['status_name'];

                   echo "<option value='$status_id'>$status_name</option>";
                }

                ?>
            </td>
          </tr>

          <tr>

            <td colspan="6" align="center" bgcolor="#FF6600"><input type="submit" name="submit" value="Publish Now"></td>
          </tr>
        </table>
    </form>

  </body>
</html>

<?php
if(isset($_POST['submit'])) {
  $post_title = $_POST['post_title'];
  $post_date = date('m-d-y');
  $post_cat = $_POST['cat'];
  $post_author = $_POST['post_author'];
  $post_keywords = $_POST['post_keywords'];
  $post_image = $_FILES['post_image']['name'];
  $post_image_tmp = $_FILES['post_image']['tmp_name'];
  $post_content = $_POST['post_content'];
  $post_status = $_POST['status'];
  if($post_title == '' OR $post_cat == 'null' OR $post_author == ''
        OR $post_keywords == '' OR $post_image == '' OR $post_content == '') {
        echo "<script>alert('Please fill in all the fields')</script>";
        exit();
      }
  else {
    if ($post_status==1) {$text = "Saved";} else {$text = "Published";}
    move_uploaded_file($post_image_tmp,"news_images/$post_image");

    $insert_posts = "insert into posts (category_id, post_title, post_date, post_author, post_keywords, post_image, post_content, status)
    values ('$post_cat', '$post_title', '$post_date', '$post_author', '$post_keywords', '$post_image', '$post_content', '$post_status')";

    $run_posts = mysqli_query($con, $insert_posts);

    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('Post Has been $text!')</script>";
      echo "<script>window.open('index.php?insert_post', '_self')</script>";
    }

  }
}

?>
<?php } ?>
