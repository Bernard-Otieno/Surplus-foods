<?php
include 'DBconnector.php';

// Escape user inputs for security
 $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
 $pwd = mysqli_real_escape_string($conn, $_REQUEST['password']);
 $organisation = mysqli_real_escape_string($conn, $_REQUEST['organisation']);
 $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
 $number = mysqli_real_escape_string($conn, $_REQUEST['contact_info']);

 $hash = md5($pwd);

 
 

// Attempt insert query execution
$sql = "INSERT INTO supplier_admin (Organisation,address,email,password,contact_info)
VALUES ('$organisation', '$address', '$email','$hash','$number')";
if(mysqli_query($conn, $sql)){
    header('location:dash_reports.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
}
 
// Close connection
mysqli_close($conn);
?>
