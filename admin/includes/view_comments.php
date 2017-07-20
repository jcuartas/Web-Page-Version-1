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
        <td colspan="8" align="center" bgcolor="#0099CC"><h2>Manage Comments here</h2></td>
      </tr>

      <tr>
        <th>ID</th>
        <th>Comment</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Status</th>
        <!-- <th>Edit</th> -->
        <th>Delete</th>
      </tr>
<?php
include("../includes/database.php");
if (isset($_GET['pending'])) {
  $get_comments = "select * from comments where status = 'unapproved'";
}
else {
$get_comments = "select * from comments";
}
$run_comments = mysqli_query($con, $get_comments);
$i = 1;
while ($row_comments = mysqli_fetch_array($run_comments)) {
  $comment_id = $row_comments['comment_id'];
  $post_id = $row_comments['post_id'];
  $comment_name = $row_comments['comment_name'];
  $comment_email = $row_comments['comment_email'];
  $comment_text = $row_comments['comment_text'];
  $status = $row_comments['status'];
 ?>

      <tr align="center">
        <td><?php echo $i++; ?></td>
        <td><?php echo $comment_text; ?></td>
        <td><?php echo $comment_name; ?></td>
        <td><?php echo $comment_email; ?></td>
        <td>
              <?php
                if ($status == 'approved') {
                  echo "<a href='index.php?view_comments&unapprove=$comment_id'>Unapprove</a>";
                }
                else {
                  echo "<a href='index.php?view_comments&approve=$comment_id'>Approve</a>";
                }
               ?>

        </td>
        <td><a href="index.php?view_comments&del_comment_id=<?php echo $comment_id; ?>&del_post_id=<?php echo $post_id; ?>">Delete</a></td>
      </tr>

<?php } ?>
    </table>
<?php
if (isset($_GET['unapprove'])){
  $unapprove_id = $_GET['unapprove'];

  $unapprove_comment = "update comments set status = 'unapproved' where comment_id = '$unapprove_id'";

  $run_unapprove_comment = mysqli_query($con, $unapprove_comment);

  if (mysqli_affected_rows($con)>0) {
    echo "<script>alert('Comment Unapproved!')</script>";
    echo "<script>window.open('index.php?view_comments', '_self')</script>";
  }
}

if (isset($_GET['approve'])){
  $approve_id = $_GET['approve'];

  $approve_comment = "update comments set status = 'approved' where comment_id = '$approve_id'";

  $run_approve_comment = mysqli_query($con, $approve_comment);

  if (mysqli_affected_rows($con)>0) {
    echo "<script>alert('Comment Approved!')</script>";
    echo "<script>window.open('index.php?view_comments', '_self')</script>";
  }
}
 ?>

<?php
  if (isset($_GET['del_comment_id']) && isset($_GET['del_post_id'])) {
    $delete_id = $_GET['del_comment_id'];
    $del_post_id = $_GET['del_post_id'];

    $delete_comm = "delete from comments where comment_id = '$delete_id' and post_id = '$del_post_id'";

    $run_delete = mysqli_query($con, $delete_comm);

    if (mysqli_affected_rows($con)>0) {
      echo "<script>alert('A Comment was deleted!')</script>";
      echo "<script>window.open('index.php?view_comments', '_self')</script>";
    }
  }

 ?>
  </body>
</html>
<?php } ?>
