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
        $msg="Record not saved..";  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       
       header('location:message.php');
    } 
?>

<style type="text/css">
 
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
        <h2>MESSAGE FORM</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid bg">
     <div class="col-lg-4"></div>
      <div class="panel panel-default col-lg-5" >
                      
        <div class="panel-body">
         <div class="row">
           <div class="col-lg-12">

              <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control" id="message" name="txtmessage">
              </div>
              <div class="form-group">
                <label for="mobileno" class="form-label">Mobile no</label>
                <input type="text" class="form-control" id="mobileno" name="txtmobileno">
              </div>

              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight:bold; font-size: 20px;">SEND</button> <button type="submit"class="btn btn-success pull-right" name="btncancel" style="font-weight:bold; font-size: 20px;">CANCEl</button>
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