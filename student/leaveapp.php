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
  $appid="";
  $appdate="";
  $grno="";
  $datefrom="";
  $dateto="";
  $details=""; 
  $status="";
  $grno="";
  $df=new DataFunctions();

?>

<?php

  if(isset($_POST['btnsave']))
  {
    
     $appdate=date('y-m-d');
     $datefrom=$_POST['txtdatefrom'];
     $dateto=$_POST['txtdateto'];
     $details=$_POST['txtdetails'];
     $grno=$_SESSION['regid'];

   
      $query="insert into leaveapp(appdate,datefrom,dateto,details,grno) values('$appdate','$datefrom','$dateto','$details','$grno')";

      $result=$df->saveRecord($query);
      if($result)
      {
         $_SESSION["trans"]="";
          header('location:leaveapp_table.php');
          $msg="Record Saved....";
      }
      else
      {
        $msg="Record not saved..";  
      }
    
   }
  if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       header('location:leaveapp_table.php');
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
        <h2>LEAVE APPLICATION FORM</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  
  <div class="container-fluid bg">

    <div class="col-lg-4"></div>
      <div class="panel panel-default col-lg-5" >
                      
        <div class="panel-body">
         <div class="row">
           <div class="col-lg-12">


                <div class="form-group" >
                   <label for="datefrom" class="form-label" >Date from</label>
                   <input type="Date" class="form-control" name="txtdatefrom" id="datefrom" required> 
                </div>
                <div class="form-group">
                   <label for="dateto" class="form-label">Date to</label>
                   <input type="Date" class="form-control" name="txtdateto" id="dateto" required> 
                </div>
                                    
                <div class="form-group">
                   <label for="details" class="form-label">Details</label>
                   <textarea class="form-control"  name="txtdetails" id="details" rows="5" required></textarea>
                </div>
                                    
                                  
                </div>

               <!-- /.col-lg-6 (nested) -->

                 <div class="col-lg-12">

                   <div class="form-group">
                      <button type="submit" class="btn btn-success " name="btnsave" style=" font-weight: bold; font-size: 14px;">SEND</button>
                      <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 14px;">CANCEL</button>
                                    
                   </div>
                  <div class="form-group">
                      <label><?php  echo($msg) ?></label>
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