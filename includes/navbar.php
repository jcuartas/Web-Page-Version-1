<div class="navbar">
    <ul id="menu">
      <li><a href="index.php">Home</a></li>
      <?php

       include("database.php");
       $get_cats = "select * from categories where status='2'";

       $run_cats = mysqli_query($con, $get_cats);

       while($cats_row=mysqli_fetch_array($run_cats)) {
         // $cat_id = $rowcat_id;
         $cat_id = $cats_row['cat_id'];
         $cat_title = $cats_row['cat_title'];

         echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
      }

      ?>
    </ul>
    <div>
        <form id="form" method="get" action="results.php" enctype="multipart/form-data">
          <input type="text" name="search_query" value="">
          <input type="submit" name="search" value="Search Now">
        </form>
    </div>
</div>
