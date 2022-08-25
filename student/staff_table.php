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
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>STAFF DTEAILS</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

        
         <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
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
            ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="padding: 10px;">
           
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
 <?php } ?>

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