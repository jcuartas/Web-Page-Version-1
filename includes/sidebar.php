<div class="sidebar">
  <div id="stitle">Earn money</div>
  <div class="">
    <a href="http://www.fanslave.net/ref.php?ref=1409904" target="_blank"><img alt="make-money-234x60" src="http://www.fanslave.com/images/stories/fanslave/banner-en/make-money-234x60.jpg" height="60" width="234" border="0" /></a>
  </div>
  <div id="stitle">Payments and Donations</div>
  <div class="">
      <p style="word-wrap:break-word;">1Ak5Ldc3o1hNXWPyDLfgRteoJUo5QBX49w</p>
      <img style="align:center" src="images/bitcoin.png" alt="" />
  </div>  
  <div id="stitle">Follow Me!</div>
    <div id="social">
      <a href="https://www.facebook.com/juanmanuelcuartas" target="_blank"><img src="images/facebook.gif" alt="" /></a>
      <a href="https://twitter.com/jcuartas" target="_blank"><img src="images/twitter.png" alt="" /></a>
      <a href="https://plus.google.com/+JuanCuartasBernal" target="_blank"><img src="images/google.png" alt="" /></a>
      <a href="https://www.pinterest.com/highbury_jmc" target="_blank"><img src="images/pin.png" alt="" /></a>
    </div>
  <div id='stitle'>Recent Stories</div>

  <?php
  include("database.php");
  $get_posts = "select
      p.post_id,
      p.post_title,
      p.post_image,
      p.post_content
    from
      posts p,
      categories c
    where
      p.category_id = c.cat_id and
      p.status = 2 and
      c.status = 2
    order by 1 DESC LIMIT 0,5";

  $run_posts = mysqli_query($con, $get_posts);

  while($row_posts = mysqli_fetch_array($run_posts))
  {
    $post_id = $row_posts['post_id'];
    $post_title = $row_posts['post_title'];
    $post_image = $row_posts['post_image'];

    echo "

    <div class='recent_posts'>
    <h2><a href='details.php?post=$post_id'>$post_title</a></h2>
    <img style='align:center;' src='admin/news_images/$post_image' width='100' height='100'>
    </div>
    ";
  }
   ?>

</div>
