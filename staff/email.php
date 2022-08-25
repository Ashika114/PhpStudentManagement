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
  $emailid="";
  $emaildate="";
  $emailfrom="";
  $emailto="";
  $subject="";
  $description=""; 
  $regid="";                                                            
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

<style>
   table {
  width: 70%;
  background-color: white;
  border: 5px solid black;
  font-family: 'Open Sans', sans-serif;
}

th {
  height: 40px;
  font-weight: bold;
  font-size: 18px;

}
</style>


</head>

<body>
<?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper">

  <div id="page-wrapper">

        <div id="page-inner">
    
 

              <?php
                           echo("<table  class='table table-bordered table-striped'>");
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
          <?php  include("footer.php"); ?>
  </div>    
        </div>
     </div>
  </div>

</div>

<?php  include("jslink.php"); ?>
</body>
</html>