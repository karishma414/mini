<?php
  $conn = new mysqli("localhost","root","","ecom") ; 
  if($conn->connect_error)
      die("connectin failed".$conn->connect_error)
  
?>