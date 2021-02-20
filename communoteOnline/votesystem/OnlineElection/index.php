
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online-Voting| E-Election</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <style>
   .toogle-show-mobile-nav{
     display:none;
   }
 </style>
 

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizPage - v3.2.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.php">E-voting</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.php">Home</a></li>
              <!-- <li><a href="#about">About Us</a></li> -->
             <!--  <li><a href="#services">Services</a></li>-->
              <li><a id="register-voter" data-toggle="modal" data-target="#register_voter" href="#">Register</a></li>
              <li><a href="../index.php">Login</a></li>    
              <li><a href="../admin/index.php">Admin</a></li>



            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel" data-bs-interval="5000">
        <ol class="carousel-indicators"> </ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/e_voting2.jpeg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">ONLINE ELECTION / </h2>Rules and Conditions should apply
              </div>
            </div>
          </div>

          <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/e_voting2.jpeg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">ONLINE ELECTION / Rules and Conditions should apply</h2>
                <h4  class="animate__animated animate__fadeInDown" > <b> Vte Once at every Position </b></h4>

              </div>
            </div>
          </div>
          </div>
      </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      
    </div>
  </section>


  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Online Election</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
			<p><h2><q>IMYAKA IREZE, ABAKOZI NIBAKE MU MURIMA </q></h2></p>
				<hr>


        <p><b> To register in voting </b>&nbsp; &nbsp; <a  class="btn btn-primary btn-sm" id="register-voter" data-toggle="modal" data-target="#register_voter" href="#">Clic Here</a></p>
        <p></b><span class="text-success">If registered </span></b>  &nbsp; &nbsp; <a class="btn btn-primary btn-sm"  href="../index.php">Login here to vote</a>  


            </div>
			<div class="modal-footer">


      
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
        </div>
    </div>
</div>



<!-- voting closed -->

<?php
	include 'includes/conn.php';
		$sql = "SELECT * FROM settings";
// if($isvotingStill == 0){}
 ?>



<?php include('../admin/includes/voters_modal.php') ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script >

$(document).ready(function(){
        $("#myModal").modal('show');
    });

    $(document).on('click', 'a#register-voterFromMadal', function(){
      $("#myModal").modal('hide');
  });

  $(document).on('click', 'a.btn#register-voterFromMadal', function(){
      $("#myModal").modal('hide');
  });

  $(document).on('click', 'a#register-voter', function(){
$('nav.mobile-nav.d-lg-none').addClass('toogle-show-mobile-nav');
  });

$('#register_voter').on('hide.bs.modal', function(){
  $('nav.mobile-nav.d-lg-none').removeClass('toogle-show-mobile-nav');

} );


function validateForm() {
    var password = document.forms["register-Voter-form"]["password"].value;
    var email = document.forms["register-Voter-form"]["email"].value;
    var confirm_password = document.forms["register-Voter-form"]["confirm-password"].value;
    if (confirm_password != password) {
        alert("Passwords mismatch");
        return false;
    }


    $.ajax({    url:"../includes/verfyEmaill.php", 
                method:"post",  
                data:{email:email},
                success:function(data){
                  console.log(data);
                  data =  JSON.parse(data);
                  if(data.success){
                    alert('cant not register ' + data.message);
                    return false;
                  }
            }  
           });




}
  
  </script>

  

</body>

</html>