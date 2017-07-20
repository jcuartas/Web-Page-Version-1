<?php
session_start();
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Manager</title>




        <link rel="stylesheet" href="css/style.css">




  </head>

  <body>

<h2 style="color:#FFF; text-align:center;"><?php echo @$_GET['not_authorised']; ?></h2>
    <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="profile">

    <button class="profile__avatar" id="toggleProfile">
     <img src="SKUB-124pp.jpg" alt="Avatar" />
    </button>
    <div class="profile__form">
      <form class="" action="login.php" method="post">
      <div class="profile__fields">
        <div class="field">
          <input type="text" id="fieldUser" class="input" name="user_name" required pattern=.*\S.* />
          <label for="fieldUser" class="label">Username</label>
        </div>
        <div class="field">
          <input type="password" id="fieldPassword" name="user_pass" class="input" required pattern=.*\S.* />
          <label for="fieldPassword" class="label">Password</label>
        </div>
        <div class="profile__footer">
          <button name="login" type="submit" class="btn">Let me write the Future</button>
        </div>
      </div>
      </form>
     </div>
  </div>
</div>

        <script src="js/index.js"></script>




  </body>

  <?php
  include("../includes/database.php");
  if (isset($_POST['login'])) {
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $user_pass = hash('ripemd160', $_POST['user_pass']);
    $user_pass = mysqli_real_escape_string($con, $user_pass);
    $check_user = "select * from users where user_name = '$user_name' and user_password = '$user_pass'";

    $run_user = mysqli_query($con, $check_user);

    if ($user_name == '' or $user_pass == '') {
      echo "<script>alert('Please enter your User Name or password')</script>";
    }

    if(mysqli_num_rows($run_user)>0) {
      $_SESSION['user_name']=$user_name;
      echo "<script>window.open('index.php?logged_in=You have Successfully Logged in!', '_self')</script>";
    }
    else {
      echo "<script>alert('User Name or password is incorrect')</script>";
    }
  }

  ?>
</html>
