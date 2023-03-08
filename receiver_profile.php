<?php
 include'DBconnector.php';
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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Receiver | Surplus Foods</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="./css/theme.css">
    <link rel="stylesheet" href="./css/loopple/loopple.css">
    <link rel="shortcut icon"  href="images/logo.png"/>

</head>
<body>
    
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 position-absolute  bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="index.php" target="_blank">
                <img src="images/logo.png" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">
                  Surplus foods
                </span>
            </a>
        </div>



        <!--NAV--->
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="receiver_index.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="receiver_profile.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">My profile</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="feedback.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Complaints</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="receiver_foodlisting.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">View Food listings</span>
                    </a>
                </li>
                
                
                <li class="nav-item">
                    <a class="nav-link text-white " href= "index.php?logout='1'">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Log out</span>
                    </a>
                </li>
                
            </ul>
        </div>
        
    </aside>

    <!---end of NAV--->


    <!---center--->
    <div class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" id="panel">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarTop">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                
            </div>
        </nav>
        <div class="container-fluid pt-3">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Welcome to the Receiver panel</h5>
                   
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        
                         
                            <label> Welcome User. </label>
                         <p>ACCOUNT:
                            <strong>
                            <?php echo $_SESSION['email']; ?>
                           </strong>
                         </p>   
                        <div class="table-responsive">
                          <table class="table table-bordered">
                           <thead><tr>

                             <th>ID</th>
                             <th>Organisation</th>
                             <th>Email</th>
                             <th>Address</th>
                             <th>Mobile Number</th>
                             
                        </thead>
                        <tbody>
                         <?php 
                         $email=  $_SESSION['email']; 
                         $sql = "SELECT * FROM recipient_admin WHERE( email='$email') ";
                         $result = mysqli_query($conn, $sql);

                         while($row=mysqli_fetch_array($result)){
                               
                           ?>
                         <tr>
                         
                          <td><?php echo $row['recipient_id'] ?></td>
                          <td><?php echo $row['Organisation']??''; ?></td>
                          <td><?php echo $row['email']??''; ?></td>
                          <td><?php echo $row['Address']??''; ?></td>
                          <td><?php echo $row['contact_info']??''; ?></td>
                          
                         </tr>
                         <?php
                         }
                         ?>
                        
                    </div> 



                   
                            
                        <div class="table-responsive">
                          <table class="table table-bordered"> 
                            <h2>Reports Section</h2>
                            <h5>Donations Received</h5>

                           <thead><tr>

                             
                             <th>Donating Organisation</th>
                             <th>Quantity Received</th>
                             <th>Contact Information of Donating Organisation</th>
                             
                             
                        </thead>
                        <tbody>
                         <?php 
                         $email=  $_SESSION['email']; 
                         $sql = "SELECT * FROM recipient_admin WHERE( email='$email') ";
                         $result = mysqli_query($conn, $sql);

                         while($data=mysqli_fetch_array($result)){
                            $user_id =  $data['recipient_id'];
                               }
                            $query = "SELECT * FROM tbl_donations WHERE( recipient_id='$user_id' AND Status = '1') ";
                            $result = mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($result)){
                            
                               
                           ?>
                         <tr>
                         
                          
                          <td><?php echo $row['donating_organisation']??''; ?></td>
                          <td><?php echo $row['quantity_donated']??''; ?></td>
                          <td><?php echo $row['contact_info']??''; ?></td>
                          
                           
                         </tr>
                         <?php
                         }
                         ?>
                        
                    </div> 
                    
                    
               
                    
                    </div>

                        
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <!---center--->


</body>
</html>