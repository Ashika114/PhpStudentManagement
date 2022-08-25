<!DOCTYPE html>
<html>
<Head>

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
  $staffid="";
  $chk="";
  $atnddate="";

?>

<?php
   
  if(isset($_POST['btnsend']))
  {
    if(isset($_POST['chksend']))
    {
    $chk=$_POST['chksend'];     
    $atnddate=date('y-m-d');
    $staffid=$_SESSION['regid'];
    $subname=$_SESSION['subname'];
   
    $query="Select * from attendance where atnddate='$atnddate' AND staffid='$staffid' AND subname='$subname'";
      $rw=$df->getRecord($query);
      if($rw)
      {
            $msg='Attendance already taken!!';
      }
     else
     {
                
    foreach($chk as $chk=>$val)
    {  
      if($val=="present")
      {
          $query="insert into attendance(atnddate,present,admid,staffid,subname) values('$atnddate','present','$chk','$staffid','$subname')";
      }
      else
      {
          $query="insert into attendance(atnddate,present,admid,staffid,subname) values('$atnddate','absent','$chk','$staffid','$subname')";
          
      }
      $result=$df->saveRecord($query);
      if($result)
      {
        echo '<script>alert("Record saved..")</script>';
        header('location:attendance_table.php');  
      }
      else
      {
        $msg="Record not saved..";  
      }
   
       }
     
    }
  }
  else
  {
        $msg='Record not found..';
  }
   
    
  } 

   if(isset($_POST['btncancel']))
    {  
        header('location:attendance_table.php');
    }  


  

?>

</head>

<body>
<form name="frm" action="#" method="post">
<div class="wrapper">
  <?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
   <div class="container-fluid">
     <div class="row">
  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             Attendance <small>Report</small>
                        </h1>
                       
    </div>
    
        <div id="page-inner">
        

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                 <select name="lstcourse">
                  <?php
                   $query="select courseid,coursename from course";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["coursename"].">".$row["coursename"]."</option>");
                   }
                  ?>
                </select>
                <select name="lstsub">
                  <?php
                   $query="select subid,subname from subject";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["subname"].">".$row["subname"]."</option>");
                   }
                  ?>
                </select>
                 <select name="lstsem">
                  <?php
                   $query="select admid,sem from admission";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["sem"].">".$row["sem"]."</option>");
                   }
                  ?>
                </select>
                 <select name="lstdivision">
                  <?php
                   $query="select admid,division from admission";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["division"].">".$row["division"]."</option>");
                   }
                  ?>
                </select>
                 <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 15px;" type='submit' name='btnfilter' value="filter">FILTER</button>
            </div>

              <div class="panel-body">
              <div class="table-responsive">
                      <div class="alert alert-danger" style="font-size: 15px;font-weight: bold; padding: 3px;" role="alert">
                         <?php echo $msg; ?>       
                      </div>
                  <?php 

                        

                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");

                          echo("<thead class='thead'><tr>");
                          echo("<th>ADM ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>COURSE NAME</th><th>SEM</th><th>DIVISION</th><th>SUBJECT</th><th>ATTENDANCE</th>");
                          echo("</tr></thead>");
                          echo("<tbody>");

                       if(isset($_POST['btnfilter']))
                      {
                          $course=$_POST['lstcourse'];
                          $sem=$_POST['lstsem']; 
                          $sub=$_POST['lstsub'];
                          $division=$_POST['lstdivision'];
                         
                          if ($course != "" AND $sem != "" AND $sub != "" AND $division != "" ) {
                           
                           $query="select * from vwattendance where coursename='$course' AND subname='$sub' AND sem='$sem' AND division='$division' ";
                          

                          $tb=$df->getTable($query);             
                          if (mysqli_num_rows($tb) > 0) {
                            
                          
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               
                                $_SESSION['subname']=$row['subname'];
                               echo("<td>".$row['admid']."</td>");

                               echo("<td>".$row['fname']."</td>");
                                  echo("<td>".$row['lname']."</td>");
                                echo("<td>".$row['coursename']."</td>");
                                 echo("<td>".$row['sem']."</td>");
                                echo("<td>".$row['division']."</td>");
                                echo("<td>".$row['subname']."</td>");
                    ?>

                                <td>Present<input type='radio' checked required
                                name='chksend[<?php echo $row['admid'] ?>]'
                                value='present'>
                                Absent<input required type='radio'
                                name='chksend[<?php echo $row['admid'] ?>]'
                                value='absent'></td>
                    <?php

                               echo("</tr>");
                            }
                          }
                           else{ 
                                  $msg="Record not found..";
                            }
                            }
                      }
                     
                          echo("</tbody>");
                          echo("</table>");
                 ?>


                 
              <div class="form-group">
                       <input type="submit" class="btn btn-success" name="btnsend" style=" font-weight:bold; font-size: 15px;" value="Take Attendance">
             <input type="submit" class="btn btn-danger pull-right"  style=" font-weight:bold; font-size: 15px;" name="btncancel" value="Cancel">
                   </div>
                   
                        </div>             
             </div>
        </div>
        <!--End Advanced Tables -->
        </div>
      </div>

        </div>
        <?php  include("footer.php"); ?>
  </div>
</div>
</div>
</div>
</form>

<?php  include("jslink.php"); ?>

</body>
</html>