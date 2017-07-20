<?php
$user = 'root';
$password = 'root';
$db = 'mycms';
$host = 'localhost:8889';
$port = 8889;

// $mysqli = new mysqli($host, $user, $password, $db);

// if ($mysqli->connect_errno) {
//     printf("Connect failed:%s\n", $mysqli->connect_error);
// }
//else {
  $con = mysqli_connect($host, $user, $password, $db);
  //$id = 8;

  // $stmt = $mysqli->prepare("select * from categories");
  //
  // //$stmt->bind_param("d", $id);
  //
  // $stmt->execute();
  //
  // $result = $stmt->get_result();
  //
  // while($row=$result->fetch_object()) {
  //   $results=$row;
  //   // $cat_id = $rowcat_id;
  //   $cat_id = $results->cat_id;
  //   $cat_title = $results->cat_title;
  //
  //   echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  //}

//}

?>
