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
            $msg="Password doesn't match";
        }       
      }
   }
   
   if(isset($_POST['btncancel']))
   {
     header('location:staff_home.php');
   }


?>
<style type="text/css">
  .breadcrumbs{
    margin-top: 60px;
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
   
    .bg {
background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(255,255,255,1) 52%, rgba(255,204,0,0.5076300783985469) 100%);
}
  </style>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>CHANGE PASSWORD</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  
  <div class="container-fluid bg">

    <div class="col-lg-4"></div>
      <div class="panel panel-default col-lg-5" >
                      
        <div class="panel-body">
         <div class="row">
           <div class="col-lg-12">

                <div class="form-group">
                   <label for="oldpassword" class="form-label">Old password</label>
                   <input type="text" class="form-control" name="txtoldpwd" id="oldpassword"> 
                </div>
                <div class="form-group">
                   <label for="newpassword" class="form-label">New password</label>
                   <input type="text" class="form-control" name="txtnewpwd" id="newpassword"> 
                </div>
                                    
               
                                    
                                  
                </div>

               <!-- /.col-lg-6 (nested) -->

                 <div class="col-lg-12">

                   <div class="form-group">
                     <button type="submit" class="btn btn-success " name="btnchange" style=" font-weight:bold; font-size: 20px;">Change</button>
                     <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight:bold; font-size: 20px;">Cancel</button>
                                    
                   </div>
                  <div class="form-group">
                      <label style=" font-weight:bold; font-size: 20px;"><?php  echo($msg) ?></label>
                  </div>
                              
                                            
                   </div>
                </div>
                    <!-- /.row (nested) -->
            </div>
                <!-- /.panel-body -->
        </div>
  <!-- /.panel -->

  </div>
</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>