<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!---tab icon--->
  <link rel="shortcut icon"  href="images/logo.png"/>
</head>

<body>
	
  <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="" /><span>
              Surplus Foods
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Available_listing.php"> Available listings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>
              </ul>
              
            </div>
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

<!-- FORM-->
  <div class="register" >

              
    
          <form action="insert-recipient.php" method="post">
        <div class="row mb-3">

          <label style="text-align: center;">Please fill in the details</label>
          
          <div class="col-sm-10">
            <input type="text" class="form-control" name="organisation" id="Organisation" placeholder= "Organisation"> <br>
          </div>
           <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="Address" placeholder= "Address"><br>
          </div>
           <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="Email" placeholder= "Email">
          </div>
        </div>
        <div class="row mb-3">
          
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="Password"placeholder="Password">
          </div>

        </div>
        <div class="row mb-3">

        <div class="col-sm-10">
            <input type="password" class="form-control" name="confirm_password" id="confirm_password"placeholder="Confirm your Password">
          </div>
        </div>

       
          
          <div class="row mb-3">
          <div class="col-sm-10">
            <input type="text" class="form-control" name="contact_info" id="Contact_info"placeholder="Contact information">
          </div>
           </div>
          <button type="submit" value="Submit" class="btn btn-primary">Register</button> <br>
           <a href="recipient-login.php">Have an account? Click here.</a>
        </div>
        
        
      </form>

        </div>

  </div>
  <!-- FORM-->

    <!--- Footer-->



 <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>
            ACCOUNTS
          </h5>
          <ul>
            <li>
              <a href="register-donor.php" >Register As Donor</a>
            </li>
            <li>
              <a href="donor_login.php">Log In As Donor</a>
            </li>
            <li>
              <a href="register_recipient.php">Register As Recipient</a>
            </li>
            <li>
              <a href="recipient-login.php">Log In As Recipient</a>
            </li>
            
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            FOOD WASTE
          </h5>
          <ul>
            <li>
              <a href="https://www.unep.org/thinkeatsave/
              about/definition-food-loss-and-waste">Its Definition & Consequences</a>
            </li>
            <li>
              <a href="https://www.businessdailyafrica.com/bd/data-h
              ub/every-kenyan-trashes-99-kilos-of-food-yearly-3343820">The Statistics</a>
            </li>
            <li>
              <a href="https://www.unep.org/thinkeatsave/about/sdg-123-food-
              waste-index#:~:text=SDG%20Target%2012.3%20seeks%20to,
              Food%20Loss%20Index%20(FLI).">As a Sustainable Development Goal</a>
            </li>
            <li>
              <a href="https://www.farmafrica.org/latest/news/post/981-unfss-independent
              -dialogue-on-food-loss-and-waste-in-kenya">Food Waste in Kenya</a>
            </li>
            
          </ul>
        </div>
        <div class="col-md-3">
          <h5>
            MALNUTRITION
          </h5>
          <ul>
            <li>
              <a href="https://www.who.int/news-room/
              questions-and-answers/item/malnutrition">Its Definition</a>
            </li>
            <li>
              
            </li>
            <li>
             <a href="http://www.nutritionhealth.or.ke/wp-content/uploads/
             SMART%20Survey%20Reports/Nairobi%20SMART%20survey
             %20Final%20-%20Feb%202020.pdf">The Statistics</a>
            </li>
            <li>
              <a href="https://www.who.int/data/gho/data/themes/topics/
              sdg-target-2_2-malnutrition#:~:text=SDG%20Target%202.2%20End%20all,
              lactating%20women%20and%20older%20persons">As a Sustainable development goal</a>
            </li>
            <li>
              <a href="https://bmcnutr.biomedcentral.com
              /articles/10.1186/s40795-020-00357-4#:~:text=
              UNICEF%20estimates%20that%20in%20Kenya,
              year%20in%20Kenya%20%5B4%5D.">Malnutrition In Kenya</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <div class="social_container">
            <h5>
              Follow Us
            </h5>
            <div class="social-box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>

              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
          <div class="subscribe_container">
            <h5>
              Subscribe Now
            </h5>
            <div class="form_container">
              <form action="">
                <input type="email">
                <button type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2022 All Rights Reserved By
      <a href="https://html.design/">SURPLUS FOODS</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    
  </script>

 

  

</body>
</html>