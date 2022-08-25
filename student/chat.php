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
  $query="";
?>

<?php

 $regidfrom=$_SESSION['regidto'];

 $query="update chatcount set msgcount=0 where regid='$regidfrom'"; 
 $result=$df->saveRecord($query);

if(isset($_POST['btnsend']))
{
  $chatdate=date('y-m-d');
  $regidfrom=$_SESSION['regid'];
  $regidto=$_SESSION['regidto'];
  $msg=$_POST['txtmsg'];
  
    
  $query="insert into chat(chatdate,regidfrom,regidto,message) values('$chatdate','$regidfrom','$regidto','$msg')";
  $result=$df->saveRecord($query);
  $count=$df->getcount("select count(*) from chatcount where regid='$regidto'");
  
  if($count==0)
  { 
     $msgcount=1;
	   $status="new";
     $query="insert into chatcount(regid,msgcount,status) values('$regidto','$msgcount','$status')"; 
  }
  else
  {
	 $status="update";
	 $query="update chatcount set msgcount=msgcount+1,status='$status' where regid='$regidto'"; 
  }
   $result=$df->saveRecord($query);
  
  header('location:chat.php');
  }

?>

<style>
 .msg
 {
   height:200px;
   overflow:auto;
   border:1px solid grey;
   padding:20px;
   
 }
 
 .chatbox
 {
   padding:10px;
   border:1px solid gray;
   background-color:silver;
   border-radius:10px 10px;

 }
</style>

<script>
window.onload=function () {
     var objDiv = document.getElementById("d1");
     objDiv.scrollTop = objDiv.scrollHeight;
}
</script>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>
  
  <div class="container-fluid" style="margin-top:80px;">
     
 <?php
      $regid=$_SESSION['regidto']; 
        $usernameto=$df->getName("select username from register where regid='$regid'");    
      echo("<h1 style='text-align:center; text-transform:uppercase;'>Chat With ".$usernameto."</h1>"); 
    
    ?>
      <div class="row">
         <div class="col-md-3"></div>
      <div class="col-md-6 msg" id="d1">

   <?php
    if(isset($_SESSION['regidto']))
    {
      $regid=$_SESSION['regid'];  
      $regidfrom=$_SESSION['regid'];    
      $regidto=$_SESSION['regidto'];  
      $query="select * from vwchat where regidfrom='$regidfrom' AND regidto='$regidto' or regidfrom='$regidto'";
      $tb=$df->getTable($query);
      while($rw=mysqli_fetch_array($tb))
      {
          if($rw['usernamefrom']==$_SESSION['username'])
        {  
           echo("<p class='chatbox' style='background-color:lightblue ; margin-left:100px;  '><span><b>".$rw['usernamefrom'].":</b></span>".$rw['message']."</p>");
          }
        else
        {
        echo("<p class='chatbox' style='background-color:orange ; margin-right:100px '><span><b>".$rw['usernamefrom'].":</b></span>".$rw['message']."</p>");
        }
      }
    }
   ?>
   </div>
   </div>
     <form name="frmreg" action="#" method="post">   
   <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
      
     <div class="form-group">
         <textarea name="txtmsg" class="form-control" placeholder="Type your message here.."> </textarea>
      </div>
   <div class="form-group">         
         <button type="submit" style="font-size: 20px;" name="btnsend" class="btn btn-success">Send</button>
          <button type="submit" style="font-size: 20px;" name="btncancel" class="btn btn-danger pull-right">Cancel</button>
     </div>
   </div>



    </div>
  </div>
  </form>    
        
   
        </div>
     </div>
  </div>
 

  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
<script>
window.setInterval(function() {
  var elem = document.getElementById('d1');
  elem.scrollTop = elem.scrollHeight;
},1000);
</script>
</BODY>
</HTML>