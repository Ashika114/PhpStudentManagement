<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
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
  
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p>Everythings always ending, But everythings always beginning, too. Select you course today and begin your future.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/bca.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BCA</h4>
                </div>

                <h3><a href="#">Bachelor of Computer Applications</a></h3>
                <p>BCA is an undergraduate program in Computer Applications. It is open for students who have qualified Higher Secondary Examination with a minimum of 45% marks.BCA is a 3 year regular program and is often seen as equivalent to a B.E. or B.Tech. in Computer Science. The course is, usually, divided in six semesters.</p>
                <div class="trainer d-flex justify-content-between align-items-center"><b>
                   Duration of Course : 3 years<br>
                   Eligibility Criteria : 10+2 <br>
                   Affiliation University: Veer Narmad South Gujarat University, Surat </b>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/bba.jpeg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>BBA</h4>
                </div>

                <h3><a href="#">Bachelor of Business Administration</a></h3>
                <p>BBA is a professional undergraduate course in Business Management. The business world is and has always been a major part for any society and this course equips you with the right knowledge and skills in business and management; principles which are perfect for a career in the corporate world.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <b>
                   Duration of Course : 3 years<br>
                   Eligibility Criteria : 10+2 <br>
                   Affiliation University: Veer Narmad South Gujarat University, Surat</b>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/mca.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>MCA</h4>
                </div>

                <h3><a href="#">Master of Computer Applications</a></h3>
                <p>The 2 Years MCA program is being offered by Gujarat Technological University, Ahmedabad. During the course the students will study the AI, Machine Learning, Big Data, Web Technologies and in-depth knowledge of advanced programming languages, tools and platforms. The Program also imparts the ability to analyze, design, develop and manage software development. </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <b>
                   Duration of Course : 2 years<br>
                   Eligibility Criteria : Graduation in BCA <br>
                   Affiliation University: Gujarat Technological University</b>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Courses Section -->
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>