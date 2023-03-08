<?php 
 include 'DBconnector.php';

// // Starting the session, to use and
// // store data in session variable
// session_start();
// // If the session variable is empty, this
// // means the user is yet to login
// // User will be sent to 'login.php' page
// // to allow the user to login
// if (!isset($_SESSION['email'])) {
//     $_SESSION['msg'] = "You have to log in first";
//     header('location: login.php');
// }
  
// // Logout button will destroy the session, and
// // will unset the session variables
// // User will be headed to 'login.php'
// // after logging out
// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['email']);
//     header("location: login.php");
// }
$sql = "DELETE FROM tbl_foodlistings WHERE Food_Listings_id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>