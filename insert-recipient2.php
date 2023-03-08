<?php
include 'DBconnector.php';




 $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
 $pwd = mysqli_real_escape_string($conn, $_REQUEST['password']);
 $organisation = mysqli_real_escape_string($conn, $_REQUEST['organisation']);
 $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
 $number = mysqli_real_escape_string($conn, $_REQUEST['contact_info']);

 $hash = md5($pwd);

 
 

// Attempt insert query execution
$sql = "INSERT INTO recipient_admin (Organisation,Address,email,Password,contact_info)
VALUES ('$organisation', '$address', '$email','$hash','$number')";
if(mysqli_query($conn, $sql)){
    header('location:dash_reports.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
}

// Close connection
mysqli_close($conn);
?>
