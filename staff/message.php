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
  $msgid="";
  $msgdate="";
  $message="";
  $mobileno="";
  $regid="";                                  
  $df=new DataFunctions();

?>

<?php

  if(isset($_POST['btnsave']))
  {
    
     $msgdate=date('y-m-d');
     $message=$_POST['txtmessage'];
     $mobileno=$_POST['txtmobileno'];
     $regid=$_SESSION['regid'];

     $query="insert into message(msgdate,message,mobileno,regid) values('$msgdate','$message','$mobileno','$regid')";

      $result=$df->saveRecord($query);
    
      if($result)
      {
        header('location:message.php');
         $msg="Message sent successfully...";
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["msgid"]="";
       header('location:message.php');
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
                             MESSAGE DETAIL <small>BOX</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              
              <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control" id="message" name="txtmessage" >
              </div>
              <div class="form-group">
                <label for="mobileno" class="form-label">Mobile no</label>
                <input type="text" class="form-control" id="mobileno" name="txtmobileno" >
              </div>

              <div class="form-group"> <button type="submit" class="btn
btn-success " name="btnsave" style="margin-left: 4px; font-weight:
bold; font-size: 20px;">SEND</button> <button type="submit" class="btn btn-success pull-right"
name="btncancel" style=" font-weight:
bold; font-size: 20px;">CANCEl</button>
 </div> 
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