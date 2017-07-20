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
    <style type="text/css">
    th, td, tr, table { padding:0; margin:0;}
    th {border-left: 2px solid #333; border-bottom: 3px solid #333;}
    td {border-left: 2px solid #999;}
    h2 {padding:10px;}
    </style>
  </head>
  <body>
    <table align="center" bgcolor="#FF9999">
      <tr>
        <td colspan="8" align="center" bgcolor="#0099CC"><h2>View all posts here</h2></td>
      </tr>

      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
<?php
include("../includes/database.php");

$get_cats = "select c.cat_id, c.cat_title, ps.status_name from categories c, post_status ps where c.status = ps.status_id";

$run_cats = mysqli_query($con, $get_cats);
$i = 1;
while ($row_cats = mysqli_fetch_array($run_cats)) {
  $cat_id = $row_cats['cat_id'];
  $cat_title = $row_cats['cat_title'];
  $status_name = $row_cats['status_name'];
 ?>

      <tr align="center">
        <td><?php echo $i++; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><?php echo $status_name; ?></td>
        <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="index.php?view_cats&delete_cat=<?php echo $cat_id; ?>">Delete</a></td>

      </tr>

<?php } ?>
    </table>
<?php
  if (isset($_GET['delete_cat'])) {
    $delete_id = $_GET['delete_cat'];

    $delete_cat = "delete from categories where cat_id = '$delete_id'";

    $run_delete = mysqli_query($con, $delete_cat);

    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('A Category was deleted!')</script>";
      echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }
  }

 ?>
  </body>
</html>
<?php } ?>
