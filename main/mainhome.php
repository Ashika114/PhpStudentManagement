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

  $tstudent=$df->getcount("select count(*) from admission");
  $tstaff=$df->getcount("select count(*) from staff");
  $tcourse=$df->getcount("select count(*) from course");
  $tactivities=$df->getcount("select count(*) from activities");


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

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo($tstudent) ?></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo($tstaff) ?></span>
            <p>STAFF</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo($tcourse) ?></span>
            <p>COURSE</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo($tactivities) ?></span>
            <p>ACTIVITIES</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row"> <div class="col-lg-4 d-flex align-items-stretch" >
        <div class="content" style="background-color:#5fcf80;"> <h3>Why Choose
        SLATE?</h3> <ul> <li> Manage multiple departments from a single
        compute</li> <li> Student information storage, including grades and
        attendance</li> <li>Report generation</li> <li> Highly customizable
        according to your requirements</li> <li>Provide different COURSES
        details</li> </ul> </div> </div> <div class="col-lg-8 d-flex
        align-items-stretch" data-aos="zoom-in" data-aos-delay="100"> <div
        class="icon-boxes d-flex flex-column justify-content-center"> <div
        class="row"> <div class="col-xl-4 d-flex align-items-stretch"> <div
        class="icon-box mt-4 mt-xl-0"> <i class="bx bx-receipt"></i>
        <h4>Marksheet Generation</h4> <p>Using SLATE staff can easily make
        marksheet and student have to simply download it.</p> </div> </div>
        <div class="col-xl-4 d-flex align-items-stretch"> <div
        class="icon-box mt-4 mt-xl-0"> <i class="bx bx-cube-alt"></i>
        <h4>Manage Master data</h4> <p>Using SLATE admin can do insert,update
        and delete operation and can also make admission of student.</p>
        </div> </div> <div class="col-xl-4 d-flex align-items-stretch"> <div
        class="icon-box mt-4 mt-xl-0"> <i class="bx bx-images"></i>
        <h4>Attedance</h4> <p>Staff can take attendance using SLATE and
        forward report to student and can also upload notes and assignment
        for students.</p> </div> </div> </div> </div><!-- End .content-->
        </div> </div>

      </div>
    </section><!-- End Why Us Section -->

     <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title" >
          <h2>Courses</h2>
          <p>Popular Courses</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="assets/img/bba.jpeg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 style="background-color:#FFCC00c7; color: black;">BBA</h4>
                </div>
                <h3><a href="course.php">Bachelor of Business Administration</a></h3>
                <p>Bachelor of Business Administration (BBA) is a professional undergraduate course in Business Management. The business world is and has always been a major part for any society and this course equips you with the right knowledge and skills in business and management; principles which are perfect for a career in the corporate world.
                </p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="assets/img/mca.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 style="background-color:#FFCC00c7; color: black;">MCA</h4>
                </div>

                <h3><a href="course.php">Master of Computer Applications</a></h3>
                <p>The 2 Years MCA program is being offered by Gujarat Technological University, Ahmedabad. During the course the students will study the AI, Machine Learning, Big Data, Web Technologies and in-depth knowledge of advanced programming languages, tools and platforms. The Program also imparts the ability to analyze, design, develop and manage software development. </p>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="assets/img/bca.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 style="background-color:#FFCC00c7; color: black;">BCA</h4>
                </div>

                <h3><a href="course-details.html"></a>Bachelor of Computer Applications</h3>
                <p>Bachelor of Computer Applications (BCA) is an undergraduate program in Computer Applications.  Course help students to Understand the essentials of basics of computer applications through experimental learning in an era of computers. The course curriculum mainly focuses on using various applications, web development, and database management .</p>
                
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Popular Courses Section -->
  
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