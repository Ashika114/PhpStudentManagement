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
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>CLASSROOM DETAILS</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

       <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
              <div class="table-responsive">
              <?php
                echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                echo("<thead class='thead'><tr>");
                echo("<th>ROOM NO</th><th>COURSE NAME</th><th>SEM</th><th>DIVISION</th><th>FACILITIES</th><th>CAPACITY</th>");
                echo("</tr></thead>");
                $grno=$_SESSION['regid'];
                $query="select roomno,coursename,c.sem,c.division,facilities,capacity from classroom c, admission a , vwadmission v where a.grno=$grno AND c.courseid=a.courseid AND c.sem=a.sem AND c.division=a.division AND v.grno=$grno ";
                $tb=$df->getTable($query);             
                echo("<tbody>");
                while($row=mysqli_fetch_array($tb))
                {
                    echo("<tr style='font-size:18px;'>");
                    echo("<td>".$row['roomno']."</td>");
                    echo("<td>".$row['coursename']."</td>");
                    echo("<td>".$row['sem']."</td>");
                    echo("<td>".$row['division']."</td>");
                    echo("<td>".$row['facilities']."</td>");
                    echo("<td>".$row['capacity']."</td>");
                    
                    echo("</tr>");
                }
                echo("</tbody>");
                echo("</table>");
              ?>
                                             
                   </div>             
             </div>
        </div>
        <!--End Advanced Tables --> 

	 
        </div>
     </div>
  </div>
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>