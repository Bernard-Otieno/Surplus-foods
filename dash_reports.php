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
    header('location: donor_login.php');
}

if (isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Welcome";
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

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
     <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Organisation','Quantity'],

          <?php 
          $query = "SELECT Organisation, sum(Quantity) FROM tbl_foodlistings group by Organisation";
          $result = mysqli_query($conn, $query);

            while ($row= mysqli_fetch_assoc($result)) {

                echo "['".$row['Organisation']."', ".$row['sum(Quantity)']."],";
            }
           ?>
        ]);
       

        var options = {
          title: 'Available listings',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Organisation','Quantity'],

          <?php 
          $query = "SELECT  receiving_organisation, sum(Quantity_recieved) FROM tbl_receivables group by receiving_organisation ";
          $result = mysqli_query($conn, $query);

            while ($row= mysqli_fetch_assoc($result)) {

                echo "['".$row['receiving_organisation']."', ".$row['sum(Quantity_recieved)']."],";
            }
           ?>
        ]);
       

        var options = {
          title: 'Donations Received',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_2'));
        chart.draw(data, options);
      }
    </script>
    
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

        <!--- Center-->
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

                        
                    </div>
                </div>
                <div id="piechart_3d" style="width: 900px;height: auto;"></div>
                <div id="piechart_3d_2" style="width: 900px; height: auto;"></div>
                <div class="table-responsive">
                          <table class="table table-bordered"> 
                            
                            <h5>Donations Received</h5>

                           <thead><tr>

                             
                             <th>Receiving Organisation</th>
                             <th>Contact info</th>
                             <th>Supplying Organisation</th>
                             <th>Quantity received</th>
                             <th>Status</th>

                             
                             
                        </thead>
                        <tbody>
                         <?php 
                         
                            $query = "SELECT * FROM tbl_receivables WHERE( status='1') ";
                            $result = mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($result)){
                            
                               
                           ?>
                         <tr>
                         
                          
                          <td><?php echo $row['receiving_organisation']??''; ?></td>
                          <td><?php echo $row['Contact_info']??''; ?></td>
                          <td><?php echo $row['supplying_organisation']??''; ?></td>
                          <td><?php echo $row['Quantity_recieved']??''; ?></td>
                          <td><?php echo $row['Status']??''; ?></td>
                          
                           
                         </tr>
                         <?php
                         }
                         ?>

                         <table class="table table-bordered"> 
                            
                            <h5>Recipient Admin Table</h5>

                           <thead><tr>

                             
                             
                             <th>Organisation</th>
                             <th>Address</th>
                             <th>Email</th>
                             <th>Contact Information</th>
                             <th>Status</th>
                             <th>Deactivate</th>
                             <th>Reactivate</th>

                             
                             
                        </thead>
                        <tbody>
                         <?php 
                         
                            $query = "SELECT * FROM recipient_admin";
                            $result = mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($result)){
                            
                               
                           ?>
                         <tr>
                         
                          
                      
                          <td><?php echo $row['Organisation']??''; ?></td>
                          <td><?php echo $row['Address']??''; ?></td>
                          <td><?php echo $row['email']??''; ?></td>
                          <td><?php echo $row['contact_info']??''; ?></td>
                          <td><?php echo $row['Status']??''; ?></td>
                             <td>
                           
                              <a href="deactivate_recipient.php?id=<?php echo $row['recipient_id']; ?>">

                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle2-off" viewBox="0 0 16 16">
                                  <path d="M9 11c.628-.836 1-1.874 1-3a4.978 4.978 0 0 0-1-3h4a3 3 0 1 1 0 6H9z"/>
                                  <path d="M5 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1A5 5 0 1 0 5 3a5 5 0 0 0 0 10z"/>
                                </svg>
                              </a>
                          </td>
                          <td>
                              <a href="reactivate_recipient.php?id=<?php echo $row['recipient_id']; ?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                      <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                    </svg>
                              </a>
                          </td>


                          
                           
                         </tr>
                         <?php
                         }
                         ?>
                         </tbody>
                     </table>
                          <br>

                         <table class="table table-bordered"> 
                            
                            <h5>Supplier Admin Table</h5>

                           <thead><tr>

                             
                         
                             <th>Organisation</th>
                             <th>Email</th>
                             <th>Address</th>
                             <th>Contact Information</th>
                             <th>Status</th>
                             <th>Deactivate</th>
                             <th>Reactivate</th>


                             
                             
                        </thead>
                        <tbody>
                         <?php 
                         
                            $query = "SELECT * FROM supplier_admin";
                            $result = mysqli_query($conn, $query);

                         while($row=mysqli_fetch_array($result)){
                            
                               
                           ?>
                         <tr>
                         
                          
                          
                          <td><?php echo $row['Organisation']??''; ?></td>
                          <td><?php echo $row['address']??''; ?></td>
                          <td><?php echo $row['email']??''; ?></td>
                          <td><?php echo $row['contact_info']??''; ?></td>
                          <td><?php echo $row['Status']??''; ?></td>
                          <td>
                              <a href="deactivate_donor.php?id=<?php echo $row['Supplier_id'];?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle2-off" viewBox="0 0 16 16">
                                  <path d="M9 11c.628-.836 1-1.874 1-3a4.978 4.978 0 0 0-1-3h4a3 3 0 1 1 0 6H9z"/>
                                  <path d="M5 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1A5 5 0 1 0 5 3a5 5 0 0 0 0 10z"/>
                                </svg>
                              </a>
                          </td>
                          <td>
                            <a href="reactivate_donor.php?id=<?php echo $row['Supplier_id'];?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                              <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                            </svg></a>
                          </td>
                           
                         </tr>
                         <?php
                         }
                         ?>
                     </tbody>
                     </table>



                        
                    </div>


                     
                          
            </div>
           
        </div>
    
                

        <footer class="footer pt-3 pb-4"a>
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <!-- <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2022,
                            made by Surplus Foods
                        </div> -->
                    </div>
                    
                </div>
            </div>
        </footer>
    </div>
    
 </body> 
</html>
