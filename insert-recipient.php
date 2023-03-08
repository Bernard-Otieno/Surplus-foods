<?php
include 'DBconnector.php';

 $organisation = mysqli_real_escape_string($conn, $_REQUEST['organisation']);
 $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
 $email = mysqli_real_escape_string($conn, $_REQUEST['email']);

 $pwd = mysqli_real_escape_string($conn, $_REQUEST['password']);

 $confirm_pwd = mysqli_real_escape_string($conn, $_REQUEST['confirm_password']);

 $number = mysqli_real_escape_string($conn, $_REQUEST['contact_info']);



 $hash = md5($pwd);

 if ($pwd !== $confirm_pwd) {
    // $error = "Passwords did not match!";
   header('location: register_recipient.php') ; 
}
 else{
 

        // Attempt insert query execution
        $sql = "INSERT INTO recipient_admin (Organisation,Address,email,Password,contact_info)
        VALUES ('$organisation', '$address', '$email','$hash','$number')";
        if(mysqli_query($conn, $sql)){

            header('location:recipient-login.php');
           
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
        }
 }
// Close connection
mysqli_close($conn);
?>
