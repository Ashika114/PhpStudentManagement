<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/DataFunctions.php');
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../main/mainhome.php");
    exit;
}
?>

<?php 
$msg="";
 $df=new DataFunctions();
 $x="";

?>

<?php



?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>STUDENT HOME PAGE</h2>

      </div>
    </div><!-- End Breadcrumbs -->
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

       
               <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">


        <div class="row" data-aos="zoom-in" data-aos-delay="100" style="margin-top:0px;">
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" >
           
            <div class="course-item" >
              <img  src="assets/img/activities.png" width="350px" height="350px"  alt="activities">
              <div class="course-content" style="text-align:center;">
                <hr>
                <a href="activities_table.php" style="color:black; font-size: 25px; font-weight: bold; text-align: center; padding: 20px; ">ACTIVITIES </a>
                

              </div>
            </div>

          </div> <!-- End Course Item-->

           <div class="col-lg-4 col-md-6 d-flex align-items-stretch" >
           
            <div class="course-item" >
              <img  src="assets/img/book.jpg" width="350px" height="350px"  alt="activities">
              <div class="course-content" style="text-align:center;">
                <hr>
                <a href="subject_table.php" style="color:black; font-size: 25px; font-weight: bold; text-align: center; padding: 20px; ">SUBJECT</a>
                

              </div>
            </div>

          </div> <!-- End Course Item-->

           <div class="col-lg-4 col-md-6 d-flex align-items-stretch" >
           
            <div class="course-item" >
              <img  src="assets/img/notes.jpg" width="350px" height="350px"  alt="activities">
              <div class="course-content" style="text-align:center;">
                <hr>
                <a href="document_table.php" style="color:black; font-size: 25px; font-weight: bold; text-align: center; padding: 20px; ">COURSE MATERIAL </a>
                

              </div>
            </div>

          </div> <!-- End Course Item-->
         
        </div>

      </div>
    </section><!-- End Courses Section -->

       


             <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">
        <div class="section-title" style="">
          <h2>Trainers</h2>
          <p>Our Professional Trainers</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100" style="margin-top:0px;">
           <?php
            
                  $query="select * from staff";
                  $tb=$df->getTable($query);             
                  while($rw=mysqli_fetch_array($tb))
                 {
                    $staffname=$rw['staffname'];
                    $address=$rw['address'];
                    $contactno=$rw['contactno'];
                    $emailid=$rw['emailid'];
                    $pincode=$rw['pincode'];
                    $joindate=$rw['joindate'];
                    $qualification=$rw['qualification'];
                    $exp=$rw['exp'];
                    $specialization=$rw['specialization'];
                    $extraquality=$rw['extraquality'];       
                    $img=$rw['photo']; 
                  }
            
                    
            ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="padding: 10px; margin-top: 0px;">
           
            <div class="course-item" >
              <img  src="<?php echo('../staff/'.$img) ?>" width="350px" height="250px"  alt="staff profile picture">
              <div class="course-content">
                
                <h3>Name : <?php echo($staffname); ?></h3>
                <h3>Contact no : <?php echo($contactno) ?></h3>
                <h3>EmailID : <?php echo($emailid) ?></h3>
                <h3>Qualification : <?php echo($qualification) ?></h3>

              </div>
            </div>

          </div> <!-- End Course Item-->
          <div  class="col-lg-7 col-md-6 d-flex align-items-stretch" style="">
            <p style="font-size:18px;">If we are ever to sit and count our blessings, we would not be able to ignore the importance a teacher has or had in our lives. Teachers are also often compared to the building blocks of our society who help us lay a firm foundation of knowledge and wisdom, on which we further build our lives and career. This esteemed profession is often counted as one of the most respectable, among others because it is the teachers who work in others growth. Someone can also be a teacher by nature and not by profession for having personality qualities like enriching others with knowledge and guiding them.</p>
            <p style="font-size:18px;">A teacher is a person with commendable skills for helping others learn, guiding, and helping solve a problem. Teachers should have excellent communication skills so that the students can understand everything and learn with ease. Teachers have several credentials as per their designation or where they are teaching.</p>
           <a href="staff_table.php" class="learn-more-btn" style="width:200px; height: 50px; padding: 10px 40px; font-size: 20px; background: #ffcc00; color: black; border-radius:20px; text-decoration: none; " >Learn More</a>
            </div>
        </div>

      </div>
    </section><!-- End Courses Section -->
   

        

        </div>
     </div>
  </div>
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>