<!DOCTYPE html>
<html>
<head>

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
  $actid="";
  $actname="";
  $actdate="";
  $purpose="";
  $staffid="";                                                             
  $df=new DataFunctions();

?>

<?php

if($_SESSION["trans"]=="update") 
  {
    $actid=$_SESSION['actid'];
    $query="select * from activities where actid='$actid'";
    $row=$df->getRecord($query);
    $actid=$row['actid'];
    $actname=$row['actname'];
    $actdate=$row['actdate'];
    $purpose=$row['purpose'];

  }

  if(isset($_POST['btnsave']))
  {
     $actdate=$_POST['txtactdate'];
     $actname=$_POST['txtactname'];
     $purpose=$_POST['txtpurpose'];
     $staffid=$_SESSION['regid'];

     $query="insert into activities(actdate,actname,purpose,staffid) values('$actdate','$actname','$purpose','$staffid')";
     //  echo($query);
          
      $result=$df->saveRecord($query);
      if($result)
      {
          header('location:activities_table.php');
          $msg="Record saved..";  
      }
      else
      {
        $msg="Record not saved..";  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["actid"]="";
       header('location:activities_table.php');
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
     <div class="header"> 
                        <h1 class="page-header">
                             ACTIVITIES DETAIL <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="actname" class="form-label">Actname</label>
                <input type="text" class="form-control" name="txtactname" id="actname" required value='<?php echo($actname) ?>' > 
              </div>
              <div class="form-group">
                <label for="actdate" class="form-label">Actdate</label>
                <input type="date" class="form-control" name="txtactdate" id="actdate" required value='<?php echo($actdate) ?>'> 
              </div>
              <div class="form-group">
                <label for="purpose" class="form-label">Purpose</label>
                <input type="text" class="form-control" id="purpose" name="txtpurpose" value='<?php echo($purpose) ?>'>
              </div>

              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight: bold; font-size: 20px;">ADD</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 20px;">CANCEl</button> </div> 
               <div class="form-group">
                    <label><?php  echo($msg) ?></label>
              </div>

            </form>
         
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