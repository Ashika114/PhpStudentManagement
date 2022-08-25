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
  $admid="";
  $admdate="";
  $stream="";
  $division="";
  $description="";                                                            
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:admission.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['admid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:admission.php');
    }

    if(isset($_POST['btndelete']))
    {
        $admid=$_POST['btndelete'];
        $query="delete from admission where admid='$admid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';  
            header('location:admission_table.php');
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
                             Admission <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 25px;">Admission Detail</span>
                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
              </div>
              <div class="panel-body">
              <div class="table-responsive">
                <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>ADM ID</th><th>ADM DATE</th><th>FIRST NAME</th><th>LAST NAME</th><th>COURSE NAME</th><th>SEM</th><th>DIVISION</th><th>DESCRITION</th><th>DELETE</th><th>UPDATE</th>");
                          echo("</tr></thead>");
                       //   $query="select * from admission";
                           $query="select admid,admdate,division,description,coursename,sem,fname,lname from course c inner join admission a on c.courseid=a.courseid inner join student s on a.grno=s.grno";
                          

                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['admid']."</td>");
                                echo("<td>".$row['admdate']."</td>");
                               echo("<td>".$row['fname']."</td>");
                                  echo("<td>".$row['lname']."</td>");
                                echo("<td>".$row['coursename']."</td>");
                                 echo("<td>".$row['sem']."</td>");
                                echo("<td>".$row['division']."</td>");
                                echo("<td>".$row['description']."</td>");

                               echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['admid'].">DELETE</button></td>");
                               echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value=".$row['admid'].">UPDATE</button></td>");
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
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>