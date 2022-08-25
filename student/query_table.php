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
  $queryid="";
  $querydate="";
  $query="";
  $grno="";
  $solution="";
  $staffid=""; 
  $df=new DataFunctions();

?>

<?php

if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:query.php');
    } 

?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>

 <?php  include("menu.php"); ?>
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>QUERY</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

        <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
                   <div class="panel-heading">

                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px; margin-bottom: 10px;" type='submit' name='btnnew' value="new">NEW</button>
              </div>
              <div class="table-responsive">
              <?php
                echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                echo("<thead class='thead'><tr>");
                echo("<th>QUERY NO.</th><th>QUERYDATE</th><th>QUERY</th><th>SOLUTION</th><th>STAFFNAME</th>");
                echo("</tr></thead>");
                $regid=$_SESSION['regid'];
                $x = 1;
                $query="select querydate,query,solution,staffname from query q , staff s where q.grno=$regid AND q.staffid=s.staffid ";
                $tb=$df->getTable($query);             
                echo("<tbody>");
                while($row=mysqli_fetch_array($tb))
                {
                    echo("<tr style='font-size:18px;'>");
                    echo("<td>".$x++."</td>");
                    echo("<td>".$row['querydate']."</td>");
                    echo("<td>".$row['query']."</td>");
                
                    echo("<td>".$row['solution']."</td>");
                    echo("<td>".$row['staffname']."</td>");
                   
                   
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