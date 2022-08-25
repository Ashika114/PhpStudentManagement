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
  $msg="";
  $roomid="";
  $roomno="";
  $roomtype="";
  $facilities="";
  $capacity="";                                                             
  $df=new DataFunctions();

?>

<?php
if($_SESSION["trans"]=="update") 
  {
    $contactid=$_SESSION['contactid'];
    $query="select * from contactus where contactid='$contactid'";
    $row=$df->getRecord($query);
    $response=$row['response'];
    $name=$row['name'];
    $details=$row['details'];
    $emailid=$row['emailid'];

  }
  
  if(isset($_POST['btnsave']))
  {
    
      
     if($_SESSION['trans']=="update")
     {
        $contactid=$_SESSION['contactid']; 
        $response=$_POST['txtresponse']; 
         $query="update contactus set response='$response' where contactid='$contactid'";

         $subject = 'SLATE Contactus form response';
          $message = 'Hi '.$name.', following is the responce to you query ('.$details.') that you submitted earlier through the SLATE contact us service : '.$response;
        
          $headers = 'From: patelgita9762@gmail.com';

          if (mail($emailid,$subject,$message,$headers)) {
                echo '<script>alert("Email sent...")</script>';         
          }

        $result=$df->saveRecord($query);
        if($result)
        {
            echo '<script>alert("Record saved..")</script>';
            header('location:contactus_table.php');
        }
        else
        {
          echo '<script>alert("Record not saved..")</script>';  
        }
      }
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["contactid"]="";
       header('location:contactus_table.php');
    } 

?>

<style>
    button
    {
      margin-top: 10px;
      width: 100PX;

    }
</style>


</head>

<body>
<?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper">

  <div id="page-wrapper">


        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form" style="margin-top:50px;">
        <form name="frm" action="" method="post">

              <div class="form-group">
                <label for="roomno" class="form-label">RESPONSE</label>
              
                <textarea style="margin:10px 0px; " class="form-control" name="txtresponse" id="roomno" rows="5" cols="5"><?php echo($response) ?></textarea>
                 
              </div>
              
              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight: bold; font-size: 20px;">SAVE</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 20px;">CANCEl</button> </div> </form>
         
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