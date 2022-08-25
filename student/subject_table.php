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
        <h2>SUBJECT DETIALS</h2>
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
          
           echo("<table class='table table-bordered table-striped' id='dataTables-example'>");
            echo("<thead class='thead'><tr>");
            echo("<th>SUBJECT ID</th><th>SUBJECT NAME</th><th>SUBJECT TYPE</th><th>SEM</th><th>COURSE NAME</th>");
          echo("</tr></thead>");
          $grno=$_SESSION['regid'];
          $query="select subid,subname,subtype,s.sem,coursename from course c,subject s , admission a where a.grno=$grno AND c.courseid=s.courseid AND a.courseid=c.courseid AND s.sem=a.sem";
          #$query="select * from vwsubject";
           $tb=$df->getTable($query);             
           echo("<tbody>");
          while($row=mysqli_fetch_array($tb))
           {
            echo("<tr style='font-size:18px;'>");
            echo("<td>".$row['subid']."</td>");
              echo("<td>".$row['subname']."</td>");
            echo("<td>".$row['subtype']."</td>");
            echo("<td>".$row['sem']."</td>");
            echo("<td>".$row['coursename']."</td>");
           
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