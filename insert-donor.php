<?php
include 'DBconnector.php';

// Escape user inputs for security
 $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
 $pwd = mysqli_real_escape_string($conn, $_REQUEST['password']);
 $organisation = mysqli_real_escape_string($conn, $_REQUEST['organisation']);
 $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
 $number = mysqli_real_escape_string($conn, $_REQUEST['contact_info']);
 $confirm_pwd = mysqli_real_escape_string($conn, $_REQUEST['confirm_password']);


 $hash = md5($pwd);

 if ($pwd !== $confirm_pwd) {
   header('location: register-donor.php');  
}
    else{ 

 
 

        // Attempt insert query execution
        $sql = "INSERT INTO supplier_admin (Organisation,address,email,password,contact_info)
        VALUES ('$organisation', '$address', '$email','$hash','$number')";
        if(mysqli_query($conn, $sql)){
            header('location:donor_login.php');
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
        }
}
// Close connection
mysqli_close($conn);
?>
