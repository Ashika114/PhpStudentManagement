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

  
  if(isset($_POST['btnsave']))
  {
    
     $solution=$_POST['txtsol'];
     $staffid=$_SESSION['regid'];
    
     if($_SESSION['trans']=="update")
     {
        $queryid=$_SESSION['queryid'];  
         $query="update query set solution='$solution',staffid='$staffid' where queryid='$queryid' ";
        
      $result=$df->saveRecord($query);
      if($result)
      {
          $_SESSION["trans"]="";
          $_SESSION["queryid"]="";
          header('location:query_table.php');
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["queryid"]="";
       header('location:query_table.php');
    } 

?>

<style>
    button
    {
      margin-top: 10px;
      width: 100PX;

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
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form" style="margin-top: 70px;">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="sol" class="form-label" >Solution</label>
                <textarea class="form-control" rows="4" cols="10" name="txtsol" id="sol" required></textarea>
                 
              </div>
             

              <div class="form-group"> <button type="submit" class="btn
btn-success " name="btnsave" style="margin-left: 4px; font-weight:
bold; font-size: 14px;">SEND</button> <button type="submit" class="btn btn-success pull-right"
name="btncancel" style=" font-weight:
bold; font-size: 14px;">CANCEl</button> </div> </form>
         
            </div>
          </div>
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