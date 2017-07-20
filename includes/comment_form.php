
<?php
include("database.php");

if (isset($_GET['post'])) {
  $post_id = $_GET['post'];

include("database.php");

$get_posts = "select * from posts where post_id = $post_id";

$run_posts = mysqli_query($con, $get_posts);

$row_posts = mysqli_fetch_array($run_posts);

  $post_title = $row_posts['post_title'];
  $post_date = $row_posts['post_date'];
  $post_author = $row_posts['post_author'];
  $post_image = $row_posts['post_image'];
  $post_content = $row_posts['post_content'];


  echo "
  <h2>$post_title</h2>

  <span><i>Posted by </i><b>$post_author</b> &nbsp; &nbsp; On <b>$post_date</b></span> <span style:'color:brown;'><b></b></span>
  <img src='admin/news_images/$post_image' width='300' height='300'>

  <div>$post_content</div>
  <div><a id='rmlink' href='index.php'>Back</a></div>
  ";

}

  $get_comments = "select * from comments where post_id='$post_id' and status = 'approved' ";

  $run_comments = mysqli_query($con, $get_comments);

  $count = mysqli_num_rows($run_comments);
  echo "<h2>Post a Comment (". $count .")</h2>";
  while ($row_comments=mysqli_fetch_array($run_comments)) {
    $comment_name = $row_comments['comment_name'];
    $comment_text = $row_comments['comment_text'];

    echo "<div><h3 style='background:black; padding-left:10px; color:white;'>$comment_name <i>Says:</i></h3>
    <p style='background:#F63; padding-left:5px;'>$comment_text</p></div>";
  }
  ?>




<form class="" action="details.php?post=<?php echo $post_id; ?>" method="post">

<table width="730" align="center" bgcolor="#99CCCC">
  <tr>
    <td align="right"><strong>Your Name:</strong></td>
    <td><input type="text" name="comment_name" size="40"></td>
  </tr>

  <tr>
    <td align="right"><strong>Your Email:</strong></td>
    <td><input type="text" name="comment_email" size="40"></td>
  </tr>

  <tr>
    <td align="right"><strong>Your Comment:</strong></td>
    <td><textarea name="comment" rows="25" cols="37"></textarea></td>
  </tr>

  <tr>
    <td colspan="4" align="center"><input type="submit" name="submit" value="Post Comment"></td>
  </tr>
</table>
</form>

<?php
  include("database.php");
  if(isset($_POST['submit'])) {

    $comment_name = $_POST['comment_name'];
    $comment_email = $_POST['comment_email'];
    $comment = $_POST['comment'];
    $status = "unapproved";

    if($comment_name == '' OR $comment_email == '' OR $comment == '') {
      echo "<script>alert('Please fill in all blanks')</script>";
      echo "<script>window.open('details.php?post=$post_id')</script>";
      exit();
    }
    else {
      $query_comment = "insert into comments(post_id, comment_name, comment_email, comment_text, status) values ('$post_id','$comment_name', '$comment_email', '$comment', '$status')";

      $run_query = mysqli_query($con, $query_comment);

      if (mysqli_query($con, $run_query)) {
        echo "<script>alert('Your comment will be published after approval!')</script>";
        echo "<script>window.open('details.php?post=$post_id')</script>";
      }
    }
  }
 ?>
