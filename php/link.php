<?php

  // localhost
  $con= new mysqli("localhost","root","","crypto-db");
  
    $img_link = "images/courses/";
  $img_link2 = "images/";
  if($con->connect_error){
    die("connection Failed" .$con->connect_error);
  }
?>