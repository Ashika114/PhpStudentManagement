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
  $courseid="";
  $coursename="";
  $shortname="";
  $language="";
  $duration="";
  $fees="";                                                             
  $df=new DataFunctions();

?>

<?php
 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['queryid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:query.php');
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
                             Query 
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
             
              <div class="panel-body">
              <div class="table-responsive" >
              <?php
                echo("<table class='table table-bordered table-hove table-striped bg-light text-center' >");
                echo("<thead class='thead'><tr>");
                 echo("<th>QUERY ID</th><th>QUERY DATE</th><th>QUERY</th><th>GRNO</th><th>SOLUTION</th><th>SOLUTION</th>");
                echo("</tr></thead>");
                $query="select * from query";
                $tb=$df->getTable($query);             
                echo("<tbody>");
                while($row=mysqli_fetch_array($tb))
                {
                    echo("<tr style='font-size:18px;'>");
                    echo("<td>".$row['queryid']."</td>");
                    echo("<td>".$row['querydate']."</td>");
                    echo("<td>".$row['query']."</td>");
                    echo("<td>".$row['grno']."</td>");
                     echo("<td>".$row['solution']."</td>");
                    
                    echo("<td><button class='btn btn-success' type='submit' name='btnupdate' value=".$row['queryid'].">Solution</button></td>");
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