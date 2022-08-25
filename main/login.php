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
  $login="";  
  $msg="";

  $df=new DataFunctions();

?>

<?php

  if(isset($_POST['btnlogin']))
  {
      $username=$_POST['txtusername'];
      $password=$_POST['txtpassword'];
     $login = false;

   //query for email verification before login
       $query="Select * from register where username='$username' AND password='$password' AND status='active'";
  //$query="Select * from register where username='$username' AND password='$password'";
      $rw=$df->getRecord($query);
      
      if($rw)
      {
		     
         $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['regid']=$rw['regid'];
         $_SESSION['username']=$rw['username'];

          if ($rw['usertype']=="ADMIN" ) 
          {
            header('location:../admin/admin_home.php');
          }
		      if ($rw['usertype']=="STUDENT" ) 
          {
               $query="Select * from admission where grno='{$_SESSION['regid']}'";
               $row=$df->getRecord($query);
               if ($row){
                  header('location:../student/student_home.php');
               }
               else
               {
                    $_SESSION['msg']="Your adimission is not confirm...";
               }  
          }
		      if ($rw['usertype']=="STAFF" ) 
          {
                  header('location:../staff/staff_home.php');
                    
          }
       
      }
      else
      {
         $_SESSION['msg']="Incorrect Username or Password!!";
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
    body {
  background: rgb(255,204,0);
background: linear-gradient(24deg, rgba(255,204,0,1) 0%, rgba(255,255,255,0.7541286778383228) 58%);
	</style>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>
  
 <div class="container-fluid">
    	 <div class="row  mb-3 " style="margin-top:100px;">
	    <div class="col-md-3"></div>
	    <div class="col-md-6">
	    <div class="form px-5">
	     <form name="frm" action="" method="post">
 
 		<div class="form-group">
     		 <h3 class="text-center" style="font-weight: bold;">LOGIN TO OUR WEBSITE</h3>
  		 </div>
       <div>
         <p class="bg-danger text-white px-4"> <?php
                  if(isset($_SESSION['msg']))
                  {
                    echo $_SESSION['msg'];
                  }
                  else
                  {
                    echo $_SESSION['msg'] = "You are logout...please Login again.";
                  }
           ?> </p>
       </div>
           
              <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtusername" id="username"required> 
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="txtpassword" required="">
              </div>
            
            <div class="form-group text-center">
              <button type="submit" name="btnlogin" class="btn btn-success w-25 p-2 font-weight-bold ">LOGIN</button>
             </div>
             <div class="form-group">
                <a href="recover_password.php">FORGOT PASSWORD</a>
               
              </div>


          </form>
        </div>
    </div>
    <div class="col-md-3" style="margin-top:240px; ">
             <div class="signup-image" >
                        <figure><img src="assets/img/signup-image.jpg" alt="sing up image"></figure>
                        
            </div>
    </div>
  </div>
</div>  
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>

