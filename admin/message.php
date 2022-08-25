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
        $mobileno=$_POST['txtmobileno'];
        $msg=$_POST['txtmessage'];

          // Account details
          $apiKey = urlencode('MzU3MDYyNGI0NzUyMzAzNzc4NDM2NzZlMzU0ODQ1Njk=');
          
          // Message details
          $numbers = array('$mobileno');
          $sender = urlencode('TXTLCL');
          $message = rawurlencode('$msg');
         
          $numbers = implode(',', $numbers);
         
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
          // Send the POST request with cURL
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          curl_close($ch);
          
          // Process your response here
          echo $response;

        
    
    
   }
  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["msgid"]="";
       header('location:message.php');
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
     <div class="header"> 
                        <h1 class="page-header">
                             MESSAGE DETAIL <small>BOX</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">

              
              <div class="form-group">
                <label for="mobileno" class="form-label">Mobile no</label>
                <input type="text" class="form-control" id="mobileno" name="txtmobileno" required>
              </div>
              <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control" id="message" name="txtmessage" required>
              </div>
              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight: bold; font-size: 20px;">SEND</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 20px;">CANCEl</button>
              </div> 
              <div class="form-group">
                       <label><?php  echo($msg) ?></label>
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