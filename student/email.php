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
  $subject="";
  $description=""; 
  $df=new DataFunctions();

?>
<?php

    if(isset($_POST['btndelete']))
    {
        $emailid=$_POST['btndelete'];
        $query="delete from email where emailid='$emailid'";
        $result=$df->saveRecord($query);  

        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';
            header('location:email.php');  
        }
        else
        {
             echo '<script>alert("Record can not Delete...")</script>';  
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
        <h2>EMAIL</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div>
       
  </div>
 
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
                           echo("<th>EMAIL FROM</th><th>SUBJECT</th><th>DESCRIPTION</th><th>DELETE</th>");
                          echo("</tr></thead>");
                          $regid=$_SESSION['regid'];
                          $query="SELECT * FROM email  WHERE regid = {$regid}";
                          $tb=$df->getTable($query);  

                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               echo("<td>".$row['emailfrom']."</td>");
                               echo("<td>".$row['subject']."</td>");
                               echo("<td>".$row['description']."</td>");
                               echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['emailid'].">DELETE</button></td>");
                        
                               echo("</tr>");
                          }
                          echo("</tbody>");
                          echo("</table>");

                   
           ?> 
                                        
         
                                        
                              
                </div>                        
            </div>
          </div>
          <!--End Advanced Tables -->

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>