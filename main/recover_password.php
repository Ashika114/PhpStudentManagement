<!DOCTYPE html>
<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $regid="";
  $regdate="";
  $username="";
  $password="";
  $usertype="";
  $contactno="";
  $emailid="";
  $verify="";
  $msg="";
  $df=new DataFunctions();

?>

<?php

if(isset($_POST['btnsend']))
{
   $emailid=$_POST['txtemailid'];
   $username=$_POST['txtusername'];


      $query="Select * from register WHERE emailid = '$emailid' AND username = '$username'";
      $tb=$df->getTable($query);
      $numExistRows = mysqli_num_rows($tb);
      if($numExistRows > 0)
      { 
                $row=$df->getRecord($query);
                $username = $row['username'];
                $token = $row['token']; 

               $subject = 'Recover password';
              $message = 'Hi,'.$username.' clcik here too reset your password http://localhost/studentmanagement/main/forgot_password.php?token='.$token;
              $headers = 'From: patelgita9762@gmail.com';

              if (mail($emailid,$subject,$message,$headers)) {

                        $_SESSION['msg'] = "check your mail to reset your password";
                        header('location:login.php');
                }
                else {
                  echo $msg="Email Sending failed...";
                }
        }
        else
        {
          echo $msg="No Email or username found";
        }
               
}


?>

  <style>

    .form-group
    {
      margin-bottom: 0px;
    }
    .form-control{
        width: 100%;
          border: none;
          border-radius: 4px;
          background-color: #f1f1f1;

    }
    .form-label{
      font-size: 20px;
      font-weight: bold;
    }
    .form {
      border: 3px black solid;
       border-radius: 12px;
      padding: 20px;
         background: rgba(255, 255, 255);
         margin-bottom: 100px;
    }
    body {
      background: linear-gradient(to bottom, white 10%, #ffcc00 100%)
      }
  
</style>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>
  
 <div class="container-fluid">
       <div class="row " style="margin-top:100px;">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form px-5">
       <form name="frm" action="" method="post">

          <div class="form-group mb-3">
         <h1 class="text-center" style="font-weight: bold;">Password Recovery</h1>
       </div>

               <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="txtusername">
              </div>

              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="txtemailid">
              </div>
              
              <div class="form-group mt-4">
              <button type="submit"  name="btnsend" class="btn btn-success w-25 p-2 font-weight-bold" style="margin-left: 220px;">Send Email</button>
            </div>
               <div class="form-group">
                <p style="margin-top: 10px; margin-left: 180px; font-size: 20px;"> 
                  Have an Account? <a href="login.php">log in</a>
                </p>
               
              </div>
               <div class="form-group">
                <label  class="form-label"> <?php echo($msg); ?></label>
               
              </div>
            </form>
        </div>
    </div>
</div>
</div>

 <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>