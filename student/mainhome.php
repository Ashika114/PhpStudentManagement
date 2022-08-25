<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../main/mainhome.php");
    exit;
}
?>

<?php
  $msg="";
  $df=new DataFunctions();

?>

<?php



?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
 <?php  include("slider.php"); ?>
 <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>About Us</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h5>SLATE deal with all kind of student details, academic related reports,college details, course details, curriculum, batch details, placement details and other resource related details too.</h5>
            <h4 class="font-italic">
              SLATE has three type of users 
            </h4>
            <ul>
              <li><i class="icofont-check-circled"></i> ADMIN </li>
              <li><i class="icofont-check-circled"></i> STAFF</li>
              <li><i class="icofont-check-circled"></i>STUDENT</li>
            </ul>
            <p>
             It tracks all the details of a student from the day one to the end of the course which can be used for all reporting purpose, tracking of attendance, progress in the course, completed semesters, years, coming semester year curriculum details, exam details, project or any other assignment details, final exam result and all these will be available through a secure, online interface embedded in the colleges website. 
            </p>
            <a href="aboutus.php" class="learn-more-btn" >Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose SLATE?</h3>
               <ul>
              <li> Manage multiple departments from a single compute</li>
              <li> Student information storage, including grades and attendance</li>
              <li>Report generation</li>
              <li> Highly customizable according to your requirements</li>
              <li>Provide different COURSES details</li>
            </ul>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>BCA|BBA|BCOM</h4>
                    <p>We offer 3 years regular programs in BCA, BBA, B.COM. and 2 years regular M.Com.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>ENGINEERING</h4>
                    <p>Engineering is 4 years regular and 3 years D2D program. We offer Civil, Computer, Mechanical, Chemical and Electrical engineering.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>NURSING</h4>
                    <p>We offer 2 years regular M.Sc., 4 years B.Sc., 3 years GNM, and 2 years ANM program.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
  
  <div class="container">
     <div class="row">
	    <div class="col-md-12">
	 
	 
	 
        </div>
     </div>
  </div>
 </form>
  <?php  include("footer.php"); ?>

<?php  include("jslink.php"); ?>
</BODY>
</HTML>