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
  $roomid="";
  $roomno="";
  $roomtype="";
  $facilities="";
  $capacity="";                                                         
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:classroom.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['roomid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:classroom.php');
    }

    if(isset($_POST['btndelete']))
    {
        $roomid=$_POST['btndelete'];
        $query="delete from classroom where roomid='$roomid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';  
            header('location:classroom_table.php');
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
                     
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 25px;">Classroom Detail</span>
                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
              </div>
              
              <div class="panel-body">
              <div class="table-responsive">
              <?php
                echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='tabsearch'>");
                echo("<thead class='thead'><tr>");
                echo("<th>ROOM ID</th><th>ROOM NO</th><th>COURSE ID</th><th>SEM</th><th>DIVISION</th><th>FACILITIES</th><th>CAPACITY</th><th>DELETE</th><th>UPDATE</th>");
                echo("</tr></thead>");
                $query="select * from classroom";
                $tb=$df->getTable($query);             
                echo("<tbody>");
                while($row=mysqli_fetch_array($tb))
                {
                    echo("<tr style='font-size:18px;'>");
                    echo("<td>".$row['roomid']."</td>");
                    echo("<td>".$row['roomno']."</td>");
                    echo("<td>".$row['courseid']."</td>");
                    echo("<td>".$row['sem']."</td>");
                    echo("<td>".$row['division']."</td>");
                    echo("<td>".$row['facilities']."</td>");
                    echo("<td>".$row['capacity']."</td>");
                    echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['roomid'].">DELETE</button></td>");
                    echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value=".$row['roomid'].">UPDATE</button></td>");
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