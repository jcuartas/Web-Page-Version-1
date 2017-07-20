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
      <?php
      include("../includes/database.php");
      if (isset($_GET['edit_cat'])) {

      $edit_id = $_GET['edit_cat'];

      // $get_cat = "select * from categories where cat_id = '$edit_id'";
      $get_cat = "select c.cat_id, c.cat_title, c.status, ps.status_name from categories c, post_status ps where c.status = ps.status_id and cat_id = '$edit_id'";
      $run_cat_new = mysqli_query($con, $get_cat);

      while ($row_cat_new = mysqli_fetch_array($run_cat_new)) {
        # code...
        $cat_id = $row_cat_new['cat_id'];
        $cat_title = $row_cat_new['cat_title'];
        $status = $row_cat_new['status'];
        $status_name = $row_cat_new['status_name'];
      }

    }
       ?>

    <form class="" action="index.php?edit_cat=<?php echo $cat_id; ?>" method="post">
      <b>Edit Category:</b><input type="text" name="new_cat" value="<?php echo $cat_title; ?>">
      <b>Status:</b><select class="" name="status">
        <option value="<?php echo $status; ?>"><?php echo $status_name; ?></option>
        <?php
          $get_status = "select * from post_status where status_id != '$status'";
          $run_status = mysqli_query($con, $get_status);
          while ($row_status = mysqli_fetch_array($run_status)) {
            $status_id = $row_status['status_id'];
            $sta_name = $row_status['status_name'];
            echo "<option value='$status_id'>$sta_name</option>";
          }

        ?>
      </select>
      <input type="submit" name="update_cat" value="Update Category">
    </form>

    </div>
<?php
include("../includes/database.php");
if(isset($_POST['update_cat'])) {
  $cat_title = $_POST['new_cat'];
  $new_status = $_POST['status'];

  if ($cat_title == '') {
    echo "<script>alert('Please write a Category Name')</script>";
    echo "<script>window.open('index.php?edit_cat=$cat_id', '_self')</script>";
  }
  else {
    $update_cat = "update categories set cat_title = '$cat_title', status = '$new_status' where cat_id = '$cat_id'";

    $run_cat = mysqli_query($con, $update_cat);

    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('Category Updated')</script>";
      echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
  }
}
 ?>

  </body>
</html>
<?php } ?>
