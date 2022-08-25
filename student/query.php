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
  $queryid="";
  $querydate="";
  $grno="";
  $query=""; 
  $solution="";
  $staffid="";
  $df=new DataFunctions();

?>

<?php

  if(isset($_POST['btnsave']))
  {
    
     $querydate=date('y-m-d');
     $query=$_POST['txtquery'];
     $grno=$_SESSION['regid'];
   
      $query="insert into query(querydate , query , grno) values('$querydate','$query','$grno')";

      $result=$df->saveRecord($query);
      if($result)
      {
          header('location:query.php');
          $msg="Record Saved....";
      }
      else
      {
        $msg="Record not saved..";  
      }
    
   }
   if(isset($_POST['btnreset']))
    {
       header('location:query_table.php');
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
        <h2>QUERY FORM</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  
  <div class="container-fluid bg">

    <div class="col-lg-4"></div>
      <div class="panel panel-default col-lg-5" >
                      
        <div class="panel-body">
         <div class="row">
           <div class="col-lg-12">

                                    
                <div class="form-group">
                   <label for="query" class="form-label">query</label>
                   <textarea class="form-control"  name="txtquery" id="query" rows="5" required></textarea>
                </div>
                                    
                                  
                </div>

               <!-- /.col-lg-6 (nested) -->

                 <div class="col-lg-12">

                   <div class="form-group">
                      <button type="submit" class="btn btn-success " name="btnsave" style=" font-weight: bold; font-size: 14px;">SAVE</button>
                      <button type="submit" class="btn btn-success pull-right" name="btnreset" style=" font-weight: bold; font-size: 14px;">RESET</button>
                                    
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