<!DOCTYPE html>
<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $newpassword="";
  $cpassword="";
  $msg="";
  $df=new DataFunctions();

?>

<?php

   if(isset($_POST['btnsubmit']))
   {
      if(isset($_GET['token']))
      {

      $token = $_GET['token'];

       $newpassword=$_POST['txtnewpassword'];
       $cpassword=$_POST['txtcpassword'];
     
         if(($newpassword == $cpassword)){
      
              $query ="update register set password='$newpassword' where token='$token'";
              $result=$df->saveRecord($query);   
              if($result)
             { 
      
                  $_SESSION['msg'] = "Your Password has been Updated";
                  header('location:login.php');
             }
             else
            {
                  $msg="your password is not updated ";
                  header('location:forgot_password.php');
            }
          }
         else
         {
                $msg="Password is not Matching";
         }
       }
      else
      {
           echo $msg="Token not found";
      }
         
              
    
   
  }

?>

	<style>
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
		form {
			border: 3px black solid;
			 border-radius: 12px;
			padding: 20px;
  			 background: rgba(255, 255, 255)
		}
  
	</style>

</HEAD>
<BODY>


  
 <div class="container-fluid">
    	 <div class="row  mb-3 " style="margin-top:100px;">
	    <div class="col-md-3"></div>
	    <div class="col-md-6">
	    <div class="form px-5">
	 <form name="frm" action="" method="post">
 
 		<div class="form-group">
     		 <h1 class="text-center" style="font-weight: bold;">Reset Password</h1>
  		 </div>
        <div class="form-group">
                   <p class="bg-danger text-white px-4"><?php echo($msg) ?> </p> 
              </div>          
              <div class="form-group">
                <label for="password" class="form-label">New Password</label>
                <input type="text" class="form-control" name="txtnewpassword" id="password"required> 
              </div>
              <div class="form-group">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="text" class="form-control" id="cpassword" name="txtcpassword">
              </div>

             
      
            
            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" name="btnsubmit">Update Password</button>
             </div>

              <div class="form-group">
                <p style="margin-top: 10px; margin-left: 180px; font-size: 20px;"> 
                  Have an Account? <a href="login.php">log in</a>
                </p>
               
              </div>
           

            </form>
        </div>
    </div>

    </div>
  </div>
</div>
 
<?php  include("jslink.php"); ?>
</BODY>
</HTML>

