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
  $msg="";
  $df=new DataFunctions();

?>

<?php
$msg="";
 
 if(isset($_POST['btncancel']))
 {
     header('location:student_home.php');
 }
 if(isset($_POST['btnselect']))
 {
  
  $_SESSION['regidto']=$_POST['lstusername'];
    header('location:chat.php'); 
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
        <h2>SELECT USER WITH WHOM YOU WANT TO CHAT</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  <div class="container-fluid bg">

    <div class="col-lg-4"></div>
      <div class="panel panel-default col-lg-5" >
                      
        <div class="panel-body">
         <div class="row">
           <div class="col-lg-12">


           <div class="form-group">
      <label style="font-size:30px;">User List</label>
      <select name="lstusername" class="form-control">
      <?php 
        $regid=$_SESSION['regid'];
        $tb=$df->getTable("select regid,username from register where regid!='$regid'"); 
        while($rw=mysqli_fetch_array($tb))
        {
         echo("<option value=".$rw['regid'].">".$rw['username']."</option>");
        }
       ?>
       </select>
     </div>
    <div  class="form-group" style="margin-top: 30px;">
       <input type="submit" name="btnselect" class="btn btn-success pull-left" value="Select"/>
       <input type="submit" name="btncancel" class="btn btn-danger pull-right" value="Cancel"/>
    </div>
    <div  class="form-group">
      <label><h2><?php echo($msg); ?></h2></label>
    </div>
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