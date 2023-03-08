<?php// Starting the session, to use and
// store data in session variable
session_start();
include 'create-foodlisting.php';
  
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
    <title>Donor | Surplus Foods</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/public-assets@master/material-dashboard-2-builder/v3.0.4/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <a class="nav-link text-white active bg-gradient-primary" href="donor_index.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="dash_user.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-white " href="donor_profile.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">My profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="donor_reports.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Reports</span>
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
                    <a class="nav-link text-white " href="donor_foodListings.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Create Food listings</span>
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
                    <h5>Welcome to the Donor panel</h5>
                   
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                         <form action="create-foodlisting.php" method="post">
                             <div class="row mb-3">
                            <?php if(isset($_SESSION['status'])) {?>
                            <div class="alert alert-danger" role="alert">
                              <strong>Hi</strong><?php echo $_SESSION['status']; ?>.
                            </div>
                            <?php } unset($_SESSION['status']); ?>
                            <label> Welcome User.</label>


                           

                          <label style="text-align: center;">Please fill in the details</label>
                          
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="Organisation" id="Organisation"  placeholder= "Organisation"> <br>
                          </div>
                           <div class="col-sm-10">
                            <input type="text" class="form-control" name="Food" id="Food" placeholder= "Food: name of the food"><br>
                          </div>
                           <div class="col-sm-10">
                            <input type="text" class="form-control" name="Quantity" id="Quantity" placeholder= "Quantity">
                          </div>
                        </div>
                        <div class="row mb-3">
                          
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="Description" id="description"placeholder="Describe the food your donating">
                          </div>
                        </div>
                          
                          <div class="row mb-3">
                          
                           </div>
                          <button type="submit" value="Submit" class="btn btn-primary">Register</button>
                        </div>
        
        
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3 pb-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2022,
                            made by Surplus Foods
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
    </div>

    <!---center--->
    
   
</body> 
</html>