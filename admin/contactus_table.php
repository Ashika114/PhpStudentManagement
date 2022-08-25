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

?>

<?php
    if(isset($_POST['btnupdate']))
    {
          $_SESSION['contactid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:contact.php');
       
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
                             Contact detials <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              
              <div class="panel-body">
              <div class="table-responsive">
                <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>CONTACT ID</th><th>CONTACT DATE</th><th>NAME</th><th>DETAILS</th><th>CONTACTNO</th><th>EMIALID</th><th>RESPONSE</th><th>ACTION</th>");
                          echo("</tr></thead>");
                          $query="select * from contactus";
                          $tb=$df->getTable($query);             
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['contactid']."</td>");
                                echo("<td>".$row['contactdate']."</td>");
                               echo("<td>".$row['name']."</td>");
                               echo("<td>".$row['details']."</td>");
                               echo("<td>".$row['contactno']."</td>");
                               echo("<td>".$row['emailid']."</td>");
                               echo("<td>".$row['response']."</td>");
                               echo("<td><button class='btn btn-success' type='submit' name='btnupdate' value=".$row['contactid'].">RESPONSE</button></td>");
                               
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