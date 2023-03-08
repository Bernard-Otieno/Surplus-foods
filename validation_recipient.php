<?php
include 'DBconnector.php';
// Starting the session, necessary
// for using session variables
session_start();

// Declaring and hoisting the variables
$email = "";

$errors = array();
$_SESSION['success'] = "";

// User login
if (isset($_POST['login_user'])) {
  
  // Data sanitization to prevent SQL injection
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Error message if the input field is left blank
  if (empty($email)) {
    array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // Checking for the errors
  if (count($errors) == 0) {
    
    // Password matching
    $password = md5($password);
    
    $query = "SELECT * FROM recipient_admin WHERE email=
        '$email' AND Password='$password' AND status = 1";
    $results = mysqli_query($conn, $query);

    // $results = 1 means that one user with the
    // entered email exists
    if (mysqli_num_rows($results) == 1) {
      
      // Storing email in session variable
      $_SESSION['email'] = $email;
      
      // Welcome message
      $_SESSION['success'] = "You have logged in!";
      
      // Page on which the user is sent
      // to after logging in
      header('location: receiver_index.php');
    }
    else {
      header('location: recipient-login.php');
      // If the email and password doesn't match
      array_push($errors, "email or password incorrect");
      
    }
  }
}

?>
 
  



  




// $sql = "SELECT email,Password FROM recipient_admin WHERE (email = '$email'AND Password = '$pwd')";
 // $result = $conn->query($sql);