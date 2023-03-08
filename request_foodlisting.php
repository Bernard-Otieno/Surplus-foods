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
    header("location: index.php");
}
//getting supplier info from tbl foodlisting
           $sql = "SELECT * FROM tbl_foodlistings WHERE(status='1') ";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){
                $donatingOrg = $row['Organisation'];
                $quantity = $row['Quantity'];
                $food_listing_id = $row['Food_Listings_id'];       
                
            $S_id=$row['Supplier_id'];
            $find = "SELECT * FROM supplier_admin WHERE Supplier_id = '$S_id'";
            $contact = mysqli_query($conn, $find);
            while($tuple=mysqli_fetch_array($contact)){
            $Supplier_contact = $tuple['contact_info'];


    //getting recipient info
             $email=  $_SESSION['email']; 
                         $find2 = "SELECT * FROM recipient_admin WHERE(email = '$email') ";
                         $contact2 =  mysqli_query($conn, $find2);

                          while($tuple2=mysqli_fetch_array($contact2)){
                                    
                                    $receiving_id = $tuple2['recipient_id'];
                                    $receiving_acc = $tuple2['Organisation'];
                                    $contact_receiver = $tuple2['contact_info'];
                               

mysqli_query($conn,"UPDATE tbl_foodlistings SET status = '0' WHERE Food_Listings_id ='" . $_GET['id'] . "'");

$sql = "INSERT INTO tbl_donations (food_listing_id,Supplier_id,donating_organisation,contact_info,quantity_donated, recipient_id,recieving_organisation)
 VALUES
  ('$food_listing_id','$S_id','$donatingOrg','$Supplier_contact','$quantity','$receiving_id','$receiving_acc')-";
mysqli_query($conn, $sql);

$fire = "INSERT INTO tbl_receivables (food_listing_id,Reciever_id,receiving_organisation,Contact_info,Supplier_id,supplying_organisation,Quantity_recieved) VALUES ('$food_listing_id','$receiving_id','$receiving_acc','$contact_receiver','$S_id','$donatingOrg','$quantity')";
mysqli_query($conn,$fire);

   
    
          }

        }
    }
 header('location: receiver_foodlisting.php');
?>
<!-- 
header('location: receiver_index.php');

    '" . $_GET['id'] . "','" . $_GET['S_id'] . "','" . $_GET['org'] . "','" . $_GET['info1'] . "','" . $_GET['quantity'] . "','" . $_GET['info2'] . "','" . $_GET['acc'] . "'");

mysqli_query($conn,"INSERT INTO tbl_receivables (food_listing_id,Reciever_id,receiving_organisation,Contact info,Supplier_id,supplying_organisation,Quantity_received VALUES 
    '" . $_GET['id'] . "''" . $_GET['info2'] . "''" . $_GET['acc'] . "','" . $_GET['contact_receiver'] . "','" . $_GET['S_id'] . "','" . $_GET['org'] . "','" . $_GET['quantity'] . "'"); -->
