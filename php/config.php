<?php

  // localhost
  $con= new mysqli("localhost","root","","crypto-db");
  
  if($con->connect_error){

    die("connection Failed" .$con->connect_error);

  }
?>