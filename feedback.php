<?php 

include 'DBconnector.php';

error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$organisation = $_POST['Organisation'];
	$email = $_POST['email']; // Get Email from form
	$complaint = $_POST['complaint']; // Get Comment from form

	$sql = "INSERT INTO tbl_complaints (Organisation,email,complaint)
			VALUES ('$organisation','$email', '$complaint')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('complaint added successfully.')</script>";
	} else {
		echo "<script>alert('complaint does not add.')</script>";
	}
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
    <link rel="stylesheet" type="text/css" href="st.css">


</head>

<body class="g-sidenav-show  bg-gray-200">
    <!--  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 position-absolute  bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="index.php" target="_blank">
                <img src="images/logo.png" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">
                  Surplus foods
                </span>
            </a>
        </div>



        <NAV--->
       <!--  <hr class="horizontal light mt-0 mb-2">
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
                    <a class="nav-link text-white " href="feedback.php">
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
 
    </aside> --> 

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
                   
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        
                            <label> Welcome Admin. </label>

                        
                    </div>

                    <div class="wrapper">
		<form action="" method="POST" class="form">
			<div class="row">
		
				<div class="input-group">
					<label for="Organisation">Organisation</label>
					<input type="Organisation" name="Organisation" id="Organisation" placeholder="Enter Organisation" required>
				</div>

				<div class="input-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="Enter your Email" required>
				</div>
			</div>
			<div class="input-group">
				<label for="complaint">Complaint</label>
				<input id="complaint" name="complaint" type="complaint" placeholder="Enter your Complaint" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn bg-gradient-primary mt-4 w-20" type="submit">Post</button>
			</div>
		</form>
		<div class="prev-comments">
			<?php 
			
			$sql = "SELECT * FROM tbl_complaints";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['Organisation']; ?></h4>
				<h5><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></h5>
				<p><?php echo $row['complaint']; ?></p>
				
			</div>
			<?php

				}
			}
			
			?>
		</div>
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