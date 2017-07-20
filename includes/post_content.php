<div class="post_area">
    <?php
    include("database.php");
    if (!isset($_GET['cat'])) {
    $get_posts = "select
        p.post_id,
        p.post_title,
        p.post_date,
        p.post_author,
        p.post_image,
        p.post_content,
        p.status
      from
        posts p,
        categories c
      where
        p.category_id = c.cat_id and
        p.status = 2 and
        c.status = 2
      order by
        rand() LIMIT 0,5";
    }
    if (isset($_GET['cat'])) {
      $cat_id = $_GET['cat'];
      $get_posts = "select
          p.post_id,
          p.post_title,
          p.post_date,
          p.post_author,
          p.post_image,
          p.post_content,
          p.status
        from
          posts p,
          categories c
        where
          p.category_id = c.cat_id and
          p.status = 2 and
          c.status = 2 and
          category_id = '$cat_id'";
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

      $get_num_comments="select count(comment_id) comment from comments where post_id = '$post_id' and status='approved'";
      $run_num_comments=mysqli_query($con, $get_num_comments);
      $row_num_comments=mysqli_fetch_array($run_num_comments);
      $num_comments = $row_num_comments['comment'];
      echo "
      <h2><a id='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>

      <span><i>Posted by </i><b>$post_author</b> &nbsp; &nbsp; On <b>$post_date</b></span> <span style:'color:brown;'><b>Comments ($num_comments)</b></span>
      <img src='admin/news_images/$post_image' width='100' height='100'>

      <div>$post_content <a id='rmlink' href='details.php?post=$post_id'>Read More</a></div><br />
      ";
    }
     ?>
</div>
