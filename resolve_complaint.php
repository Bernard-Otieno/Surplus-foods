<?php


include'DBconnector.php';

  $id = $_GET['id'];
    
    $sql = "UPDATE tbl_complaints set status = '0' WHERE Complaint_id = '$id'";
if (mysqli_query($conn, $sql)) {

      header('location: dash_feedback.php');
    }
    else {

      header('location: dash_index.php');
      
      // If the email and password doesn't match
      
    }


?>