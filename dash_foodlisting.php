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

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Surplus Foods</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="./css/theme.css">
    <link rel="stylesheet" href="./css/loopple/loopple.css">
    <link rel="shortcut icon"  href="images/logo.png"/>

</head>

<body class="g-sidenav-show  bg-gray-200">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="dash_index.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="dash_user.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="dash_myprofile.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">My profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="dash_reports.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="dash_feedback.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Complaints</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="foodListings.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Food listings</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="index.php?logout='1'">
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
                    <h5>Welcome to the admin panel</h5>
                    

                <div class="panel-body" >

            <div class="table-responsive" >

            <table class="table table-bordered table-hover table-striped" >

            <thead>

            <tr>

            <th>No</th>
            <th>Organisation</th>
            <th>Food</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Date</th>



            </tr>

            </thead>


            <tbody>
            <?php

            $i=0;

            $get_c = "SELECT * from tbl_foodlistings WHERE (status=1) ";

            $run_c = mysqli_query($conn,$get_c);

            while($row_c=mysqli_fetch_array($run_c)){

             $fl_id = $row_c['Food_Listings_id'];

            $fl_org = $row_c['Organisation'];

            $fl_food = $row_c['Food'];

            $fl_desc = $row_c['Description'];

            $fl_quantity = $row_c['Quantity'];

            $fl_date = $row_c['dateposted'];
            $i++;

            ?>








            <tr>

            <td><?php echo $i; ?></td>

           <!--  <td><?php echo $fl_id; ?></td> -->

            <td><?php echo $fl_org; ?></td>

            <td><?php echo $fl_food; ?></td> 

            <td><?php echo $fl_desc; ?></td>

            <td><?php echo $fl_quantity; ?></td>

            <td><?php echo $fl_date; ?></td>



            <td>

            <a href="FL_delete.php?id=<?php echo $fl_id; ?>" >

            <i class="fa fa-trash-o" ></i> Delete

            </a>
            <a href="update_foodlistings.php?id=<?php echo $fl_id; ?>">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                </svg> Edit
            </a>

            </a>


            </td>


            </tr>

            <?php } ?>


            </tbody>



            </table>

            </div>

            </div>


                   
                </div>
					
                
                  

                    </div>
                    
                </div>
				
            </div>
					

          
              <br> 

        </div>
				





        <footer class="footer pt-3 pb-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2022
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
       </div>
     </body> 
</html>
