<?php
include 'DBconnector.php';


    // Starting the session, to use and
// store data in session variable
session_start();
  
// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}
  
// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
}


 
 $date= date('Y-m-d H:i:s');
 $food = mysqli_real_escape_string($conn, $_REQUEST['Food']);
 $org = mysqli_real_escape_string($conn, $_REQUEST['Organisation']);
 $description = mysqli_real_escape_string($conn, $_REQUEST['Description']);
 $number = mysqli_real_escape_string($conn, $_REQUEST['Quantity']);

 
 
  $email=  $_SESSION['email'];

// Attempt insert query execution
$id = "SELECT Supplier_id FROM supplier_admin WHERE email = '$email'";

$result = mysqli_query($conn,$id);

$row = mysqli_fetch_assoc($result);



$user_id = $row['Supplier_id'];
// echo $user_id;

$fire = "INSERT INTO tbl_foodlistings (Supplier_id,Organisation,dateposted,Food,Description,Quantity)
VALUES ('$user_id','$org', '$date', '$food','$description','$number')";

if(mysqli_query($conn, $fire)){
     $_SESSION['status'] = "Sucssesful!";
    header('location:donor_profile.php');
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
}

// Close connection
mysqli_close($conn);
?>









<!-- 
"INSERT INTO supplier_admin (Organisation,address,email,password,contact_info)
VALUES ('$organisation', '$address', '$email','$hash','$number')"; -->