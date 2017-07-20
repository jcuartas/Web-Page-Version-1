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
    <?php
      include("../includes/database.php");

      if(isset($_GET['edit_post'])) {
        $edit_id = $_GET['edit_post'];

        $select_post = "select * from posts where post_id = '$edit_id'";

        $run_query = mysqli_query($con, $select_post);

        while ($row_post=mysqli_fetch_array($run_query)) {
          # code...
          $post_id = $row_post['post_id'];
          $title = $row_post['post_title'];
          $post_cat = $row_post['category_id'];
          $author = $row_post['post_author'];
          $keywords = $row_post['post_keywords'];
          $image = $row_post['post_image'];
          $content = $row_post['post_content'];
          $status = $row_post['status'];
        }
      }

     ?>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <table width="795" align="center" bgcolor = "#999999">
          <tr bgcolor="#FF6600">
            <td colspan="6" align="center"><h1>Edit Post ID No.: <?php echo $post_id; ?></h1></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Title:</strong></td>
            <td><input type="text" name="post_title" size="60" value="<?php echo $title; ?>"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Category:</strong></td>
            <td>
              <select class="" name="cat">
                <!-- <option>Select a Category</option> -->
                <?php

                //  include("../includes/database.php");
                 $get_cats = "select * from categories where cat_id='$post_cat'";

                 $run_cats = mysqli_query($con, $get_cats);

                 while($cats_row=mysqli_fetch_array($run_cats)) {
                   // $cat_id = $rowcat_id;
                   $cat_id = $cats_row['cat_id'];
                   $cat_title = $cats_row['cat_title'];

                   echo "<option value='$cat_id'>$cat_title</option>";
                }
                $get_more_cats = "select * from categories where cat_id != '$post_cat'";

                $run_more_cats = mysqli_query($con, $get_more_cats);

                while($row_more_cats=mysqli_fetch_array($run_more_cats)) {
                  // $cat_id = $rowcat_id;
                  $cat_id = $row_more_cats['cat_id'];
                  $cat_title = $row_more_cats['cat_title'];

                  echo "<option value='$cat_id'>$cat_title</option>";
               }

                ?>

              </select>
            </td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Author:</strong></td>
            <td><input type="text" name="post_author" size="60" value="<?php echo $author;?>"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Keywords:</strong></td>
            <td><input type="text" name="post_keywords" size="60" value="<?php echo $keywords; ?>"></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Image:</strong></td>
            <td><input type="file" name="post_image" size="50" value="$image"><img src="news_images/<?php echo $image;?>" width="60" height="60"/></td>
          </tr>

          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Post Content:</strong></td>
            <td><textarea name="post_content" rows="15" cols="40"><?php echo $content; ?></textarea></td>
          </tr>
          <!-- Status -->
          <tr>
            <td align="right" bgcolor="#FF6600"><strong>Status:</strong></td>
            <td>
              <select class="" name="status">
                <!-- <option>Select a Category</option> -->
                <?php

                //  include("../includes/database.php");
                 $get_status = "select * from post_status where status_id='$status'";

                 $run_status = mysqli_query($con, $get_status);

                 while($status_row=mysqli_fetch_array($run_status)) {
                   // $cat_id = $rowcat_id;
                   $status_id = $status_row['status_id'];
                   $status_name = $status_row['status_name'];

                   echo "<option value='$status_id'>$status_name</option>";
                }
                $get_more_status = "select * from post_status where status_id != '$status'";

                $run_more_status = mysqli_query($con, $get_more_status);

                while($row_more_status=mysqli_fetch_array($run_more_status)) {
                  // $cat_id = $rowcat_id;
                  $status_id = $row_more_status['status_id'];
                  $status_name = $row_more_status['status_name'];

                  echo "<option value='$status_id'>$status_name</option>";
               }

                ?>

              </select>
            </td>
          </tr>
          <!-- End Status -->


          <tr>

            <td colspan="6" align="center" bgcolor="#FF6600"><input type="submit" name="update" value="Update Now"></td>
          </tr>
        </table>
    </form>

  </body>
</html>

<?php
if(isset($_POST['update'])) {
  $update_id = $post_id;
  $post_title = $_POST['post_title'];
  $post_date = date('m-d-y');
  $post_cat1 = $_POST['cat'];
  $post_author = $_POST['post_author'];
  $post_keywords = $_POST['post_keywords'];
  $post_image = $_FILES['post_image']['name'];
  $post_image_tmp = $_FILES['post_image']['tmp_name'];
  $post_content = $_POST['post_content'];
  $post_status = $_POST['status'];

  if($post_title == '' OR $post_cat1 == 'null' OR $post_author == ''
        OR $post_keywords == '' /*OR $post_image == ''*/ OR $post_content == '') {
        echo "<script>alert('Please fill in all the fields.)</script>";
        exit();
      }
  else {
    if ($post_image != '') {
    move_uploaded_file($post_image_tmp,"news_images/$post_image");
    $update_posts = "update posts set category_id = '$post_cat1', post_title = '$post_title', post_date = '$post_date', post_author = '$post_author', post_keywords = '$post_keywords', post_image = '$post_image', post_content = '$post_content', status = '$post_status'
    where post_id = '$update_id'";
  } else {
    $update_posts = "update posts set category_id = '$post_cat1', post_title = '$post_title', post_date = '$post_date', post_author = '$post_author', post_keywords = '$post_keywords', post_content = '$post_content', status = '$post_status'
    where post_id = '$update_id'";
  }
    $run_update = mysqli_query($con, $update_posts);
    if ($post_status == 2) {$text = "Updated and Published";} else {$text = "Updated";}
    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('Post Has been $text!')</script>";
      echo "<script>window.open('index.php?view_posts', '_self')</script>";
     }

  }
}

?>
<?php } ?>
