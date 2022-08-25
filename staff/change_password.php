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
   $regid="";
   $username="";
   $oldpwd="";
   $newpwd="";
   $msg="";
    $df=new DataFunctions();

?>

<?php
   
   
   if(isset($_POST['btnchange']))
   {
   
     $oldpwd=$_POST['txtoldpwd'];
    $newpwd=$_POST['txtnewpwd'];
    $regid=$_SESSION['regid'];
    $query="select password from register where regid='$regid'";
    $rw=$df->getRecord($query);
   
   if($rw)
   {
      if($oldpwd==$rw['password'])
        {
      $query="update register set password='$newpwd' where regid='$regid'";
      $result=$df->saveRecord($query);
      if($result)
      {
        $msg="Password Change Successfully";
      }
      else
      {
        $msg="Password not Changed";
      }
    }
       else
     {
        $msg="Password not match";
     }       
   }
   }
   
   if(isset($_POST['btncancel']))
   {
     header('location:staff_home.php');
   }

?>


</head>

<body>
<?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper"5

  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             Change Password
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
        <div class="form1" style="border: 4px black solid; border-radius: 3px; margin:10px; padding:20px;">
        <form name="frm" action="" method="post" >

              
              <div class="form-group">
                <label for="oldpassword" class="form-label">Old Password</label>
                <input type="text" class="form-control" id="oldpassword" name="txtoldpwd" required >
              </div>
              <div class="form-group">
                <label for="newpassword" class="form-label">New Password</label>
                <input type="text" class="form-control" id="newpassword" name="txtnewpwd" required >
              </div>

              <div class="form-group"> 
                <button type="submit" class="btn btn-success pull-left" name="btnchange" style=" font-weight:bold; font-size: 20px; margin-top: 10px;">Change</button>
                <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight:bold; font-size: 20px; margin-top: 10px;">Cancel</button>
              </div> 
            <div style="margin-top: 70px;font-weight:bold; font-size: 20px;">
                    <?php  echo($msg) ?>
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