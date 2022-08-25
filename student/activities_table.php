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
  $actid="";
  $actdate="";
  $actname="";
  $purpose=""; 
  $actregid="";
  $participatename="";
  $grno="";                                                   
  $df=new DataFunctions();

?>

<?php
if(isset($_POST['btnparticipate']))
{
  $actid=$_POST['btnparticipate'];
  $grno=$_SESSION['regid'];
  $participatename=$_SESSION['username'];
  $query="select * from actreg where actid=$actid AND grno=$grno";
  $tb=$df->getTable($query);
  if(mysqli_num_rows($tb) > 0) 
  {
     echo '<script>alert("User already Participated")</script>';  
  }
  else
  {
       $query="insert into actreg(actid,grno,participatename) values('$actid','$grno','$participatename')";
       $result=$df->saveRecord($query);
  
      if($result)
     {
        echo '<script>alert("Participated Successfully...")</script>';
        header('location:activities_table.php');       
      }
      else
      {
        echo '<script>alert("Not Participated")</script>';  
      }
   }

}



?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>ACTIVITIES DETIALS</h2>
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
                 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='tabsearch'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>ACT ID</th><th>ACT DATE</th><th>ACT NAME</th><th>PURPOSE</th><th>PARTICIPATE</th>");
                          echo("</tr></thead>");
                          $query="select * from activities";
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['actid']."</td>");
                              echo("<td>".$row['actdate']."</td>");
                               echo("<td>".$row['actname']."</td>");
                               echo("<td>".$row['purpose']."</td>");
                               echo("<td><button class='btn btn-primary' id='btn' type='submit' name='btnparticipate' value=".$row['actid'].">PARTICIPATE</button></td>");
                            
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