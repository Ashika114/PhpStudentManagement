<!DOCTYPE html>
<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
   $username="";
  $password="";
  $msg="";

  $df=new DataFunctions();

?>

<?php

  if(isset($_GET['token'])){

    $token = $_GET['token'];

    $query ="update register set status='active' where token='$token'";

    $result=$df->saveRecord($query); 
  
        if($result)
        { 
          if(isset($_SESSION['msg']))
          {
              $_SESSION['msg'] = "Account updated successfully";
              header('location:login.php');
          }
          else
          {
              $_SESSION['msg'] = "You are loggedout";
              header('location:login.php');
          }
        }
        else
        {
            $_SESSION['msg'] = "Account not updated successfully";
              header('location:register.php');
        } 
  } 

?>



</HEAD>
<BODY>


  
 <div style="margin-top: 100px;">
   asdcascfs
 </div>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>

