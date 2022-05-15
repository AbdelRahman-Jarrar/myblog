<?php
$conn = mysqli_connect("localhost", "root", "qwer", "myblog");

if($_POST["action"] == "insert"){
  insert();
}

function insert(){

  global $conn;

  $title = $_POST["title"];
  $body = $_POST["body"];

  if(empty($title) || empty($body) ){
    echo "";
    exit;
  }
  $query = "INSERT INTO `posts`(`title`, `body`)  VALUES ('$title','$body')";
  mysqli_query($conn, $query);
  // Output
  echo 1;
}
