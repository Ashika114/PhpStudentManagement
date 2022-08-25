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

<style type="text/css">
  th
  {
    text-align: center;
  }
  table
  {
    margin-top: 20px;
  }
  @media print{
    body * {
      visibility: hidden;
    }
    .print-container,.print-container * {
      visibility: visible;
    }
    .print-container{
      position: absolute;
      left: 20px;
      right: 20px;
      top: 50px;
    }
  }
</style>



</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>MARKSHEET REPORT</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div style="margin-bottom: 10px;">
          <button style="border-radius: 10px; width: 300px; font-size: 25px;" onclick='window.print()' class='btn btn-primary' >PRINT MARKSHEET</button>
      </div>
     <div class="row print-container">
	    <div class="col-md-12">

        <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
                <?php
                        $regid=$_SESSION['regid'];
                        $query="select * from student s, vwadmission a , marksheet m where s.grno='$regid' AND a.grno=s.grno AND m.admid=a.admid";
                        $row=$df->getRecord($query);
                        $photo=$row['photo'];
                        $fname=$row['fname'];
                        $mname=$row['mname'];
                        $lname=$row['lname'];
                        $coursename=$row['coursename'];
                        $sem=$row['sem'];
                        $division=$row['division'];
                        $examtype=$row['examtype'];
                        $date=$row['examdate'];
                        $examdate=date('d-m-y',strtotime($date));                       
                ?>
                <div>
                      <img src="assets/img/1.png" height="80" width="400" style="margin-left: 10px;">
                       <img src="<?php echo($photo) ?>" height="120" width="120" style="float: right; margin-top: 20px; margin-right: 10px;">
                     

                </div>
                <div style="margin-top: 30px; margin-left: 10px; font-size: 20px;">
                      <label>Student Name : &nbsp;</label><?php echo($fname) ?>&nbsp; <?php echo($mname) ?> &nbsp;<?php echo($lname) ?>
                </div>
                <div style=" font-size: 20px; margin-left: 10px;">
                      <label>Course : &nbsp;</label><?php echo($coursename) ?> &emsp; &emsp; &emsp;
                      <label>Sem : &nbsp;</label><?php echo($sem) ?>
                </div>
                <div style=" font-size: 20px; margin-left: 10px;">
                      <label>Exam Type : &nbsp;</label><?php echo($examtype) ?> &emsp; &emsp; &emsp;
                      <label>Exam Date : &nbsp;</label><?php echo($examdate) ?>
                </div>
              <div class="table-responsive">
                <?php
                        echo("<table class='table table-bordered table-hove table-striped bg-light text-center'>");
                          echo("<thead class='thead'><tr class='text-center'>");
                          echo("<th>SUBJECT NAME</th><th>TOTAL MARKS</th><th>OBTAIN MARKS</th><th>PASSING MARKS</th>");
                          echo("</tr></thead>");
                           if($_SESSION["trans"]=="marks") 
                          {
                                $marksheetid=$_SESSION['marksheetid'];
                                 $query="select * from marksdetail m , subject s where m.marksheetid='$marksheetid' AND s.subid=m.subid ";
                            
                               $tb=$df->getTable($query); 
                                      
                               echo("<tbody>");
                            while($row=mysqli_fetch_array($tb))
                           {
                               echo("<tr style='font-size:18px;'>");
          
                               echo("<td>".$row['subname']."</td>");
                                echo("<td>".$row['totalmarks']."</td>");
                                echo("<td>".$row['obtainmarks']."</td>");
                                echo("<td>".$row['passingmarks']."</td>");
                                
                                echo("</tr>");  
                               
                            }
                            $query="select SUM(obtainmarks) AS sum, SUM(passingmarks) AS p,SUM(totalmarks) AS t from marksdetail m , subject s where m.marksheetid='$marksheetid' AND s.subid=m.subid ";
                                $row=$df->getRecord($query);
                                $sum1=$row['t'];
                                $sum2=$row['sum'];
                                $sum3=$row['p'];
                                
                                
                                echo("<tr style='font-size:20px; font-weight:bold'>");
          
                                echo("<td>Aggregate Total</td>");
                                echo("<td>".$sum1."</td>");
                                echo("<td>".$sum2."</td>");
                                echo("<td>".$sum3 ."</td>");
                                echo("</tr>");

                            echo("</tbody>");
                            echo("</table>");
                                
 
                          }
                     echo("<div style='margin:40px 300px; font-size:25px; border:3px double black; text-align:center; padding:15px; '>");

                      $marks = $sum2;
                      $total = $sum1;
                     
                      

                      if($total == 0)
                      {
                            echo "Value is 0.";
                      }
                      else
                      {
                         $percentage = ($marks*100)/$total; 
                      echo("PERCENTAGE : ".$percentage."%<br>");
                      if ($sum2 >= $sum3) {
                        echo"<p style='color:green; font-weight:bold; text-align:center;'>PASS</p>";
                      }
                      else
                      {
                        echo"<p style='color:red; font-weight:bold;'>FAIL</p>";
                      }
                    }
                    echo("</div>");
                    

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
<script type="text/javascript">
    
  </script>

</BODY>
</HTML>