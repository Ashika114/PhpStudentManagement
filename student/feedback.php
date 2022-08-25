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
  $feedbackid="";
  $feedbackdate="";
  $grno="";
  $feedbackfor="";
  $details="";
  $rattings=""; 
  $df=new DataFunctions();

?>

<?php

if(isset($_POST['btnsave']))
  {
     $feedbackdate=date('y-m-d');
     $feedbackfor=$_POST['lstfeedbackfor'];
     $details=$_POST['txtdetails'];
     $rattings=$_POST['txtrattings'];
     $grno=$_SESSION['regid'];
     
    
      $query="insert into feedback(feedbackdate,feedbackfor,details,ratting,grno) values('$feedbackdate','$feedbackfor','$details','$rattings','$grno')";
      echo ($query);
      $result=$df->saveRecord($query);
      if($result)
      {
          echo '<script>alert("Record saved..")</script>';  
          header('location:feedback.php');
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       header('location:feedback.php');
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
    .bg {
  background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(255,255,255,1) 52%, rgba(255,204,0,0.5076300783985469) 100%);
  </style>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>

  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>Feedback Form</h2>
      </div>
    </div><!-- End Breadcrumbs -->
 
  <div class="container-fluid bg">
     <div class="row">
	    <div class="col-md-12">
         <div class="col-md-4"></div>
              <div class="col-md-5">
          <form name="frm" action="#" method="post">
             
              <div class="form-group">
                <label for="feedbackfor" class="form-label">Feedbackfor</label>
                <select name="lstfeedbackfor" id="feedbackfor" class="form-control">
                  <?php
                   $query="select staffid,staffname from staff";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["staffid"].">".$row["staffname"]."</option>");
                   }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="details" class="form-label">details</label>
                <input type="text" class="form-control" id="details" name="txtdetails" >
              </div>

                <div class="form-group">
                    <label for="rattings" class="form-label">rattings</label>
                    <input type="number" class="form-control" id="rattings" name="txtrattings" required>
                </div>

              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight:bold; font-size: 20px;">SEND</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight:bold; font-size: 20px;">CANCEl</button> </div> 
              </div>
          </form>

        
	 
        </div>
     </div>
  </div>
 

  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>