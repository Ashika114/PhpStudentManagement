
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
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>About Us</h2>
        <p>SLATE provides a simple interface for maintenance of student
information. It can be used by educational institutes or colleges to maintain the records of students easily </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h5>SLATE deals with all kind of student details, academic related reports,college details, course details, curriculum, batch details, placement details and other resource related details too.</h5>
            <h4 class="font-italic">
              SLATE has three type of users 
            </h4>
            <ul>
              <li><i class="icofont-check-circled"></i> ADMIN </li>
              <li><i class="icofont-check-circled"></i> STAFF</li>
              <li><i class="icofont-check-circled"></i>STUDENT</li>
            </ul>
            <p>
             It tracks all the details of a student from the day one to the end of the course which can be used for all reporting purpose, tracking of attendance, progress in the course, completed semesters, years, coming semester year curriculum details, exam details, project or any other assignment details, final exam result and all these will be available through a secure, online interface embedded in the colleges website. It will also have faculty details, batch execution details, students details in all aspects,the various academic notifications to the staff and students updated by the college administration. It also facilitate us explore all the activities happening in the college, Different reports and Queries can be generated based on vast options related to students, batch, course, faculty, exams, semesters, certification and even for the entire college.
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  
  <div class="container-fluid">
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