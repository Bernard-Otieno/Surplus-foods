<?php

include'DBconnector.php';

  $id = $_GET['id'];
    
    $sql = "UPDATE supplier_admin set Status = '0' WHERE Supplier_id = '$id'";
if (mysqli_query($conn, $sql)) {

      header('location: dash_reports.php');
    }
    else {

      header('location: dash_reports.php');
      
      // If the email and password doesn't match
      
    }
  






?>