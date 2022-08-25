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
  $subid="";
  $subname="";
  $subtype="";                                                    
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:subject.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['subid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:subject.php');
    }

    if(isset($_POST['btndelete']))
    {
        $subid=$_POST['btndelete'];
        $query="delete from subject where subid='$subid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';  
        }
        else
        {
             echo '<script>alert("Record can not Delete...")</script>';  
        }
    
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
                             Subject <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
           <!-- Advanced Tables -->
          <div class="panel panel-default">
            <div class="panel-heading">
                 <span style="font-size: 25px;">Subject Detail</span>
                 <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <?php
          
           echo("<table class='table table-bordered table-striped' id='dataTables-example'>");
            echo("<thead class='thead'><tr>");
            echo("<th>SUBJECT ID</th><th>SUBJECT NAME</th><th>SUBJECT TYPE</th><th>COURSE NAME</th><th>DELETE</th><th>UPDATE</th>");
          echo("</tr></thead>");
          $query="select subid,subname,subtype,coursename from course c,subject s where c.courseid=s.courseid";
          #$query="select * from vwsubject";
           $tb=$df->getTable($query);             
           echo("<tbody>");
          while($row=mysqli_fetch_array($tb))
           {
            echo("<tr style='font-size:18px;'>");
            echo("<td>".$row['subid']."</td>");
              echo("<td>".$row['subname']."</td>");
            echo("<td>".$row['subtype']."</td>");
            echo("<td>".$row['coursename']."</td>");
            echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['subid'].">DELETE</button></td>");
            echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value=".$row['subid'].">UPDATE</button></td>");
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
        <?php  include("footer.php"); ?>
  </div>
</div>
</div>
</div>
</form>

<?php  include("jslink.php"); ?>
</body>
</html>