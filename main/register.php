<!DOCTYPE html>
<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $regid="";
  $regdate="";
  $username="";
  $password="";
  $usertype="";
  $contactno="";
  $emailid="";
  $verify="";
  $msg="";
  $df=new DataFunctions();

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
     
  if(isset($_POST['btnsubmit']))
  {
    $username=test_input($_POST['txtusername']);
     $emailid = test_input($_POST["txtemailid"]);

     $regdate=date('y-m-d');
    $password=test_input($_POST['txtpassword']);
    $cpassword=test_input($_POST['txtcpassword']);
    $usertype=test_input($_POST['ddusertype']);
     $contactno=test_input($_POST['txtcontactno']);
      $verify='n';
       if( !function_exists('random_bytes') )
      {
          function random_bytes($length = 6)
          {
              $characters = '0123456789';
              $characters_length = strlen($characters);
              $output = '';
              for ($i = 0; $i < $length; $i++)
              $output .= $characters[rand(0, $characters_length - 1)];
               return $output;
          }
      }
      $token = bin2hex(random_bytes(15));

      $query="Select * from register WHERE emailid = '$emailid'";
      $tb=$df->getTable($query);
      $numExistRows = mysqli_num_rows($tb);
      if($numExistRows > 0)
      { 
          $msg = "Email Id Already Exist"; 
      }


      $query="Select * from register WHERE username = '$username'";
      $tb=$df->getTable($query);
      $numExistRows = mysqli_num_rows($tb);
      if($numExistRows > 0)
      { 
          $msg = "Username Already Exists"; 
      }
      else 
      {
          if(($password == $cpassword)){
              $regid=$df->primary("select max(regid) from register"); 
              $query="insert into register(regid,regdate,username,password,usertype,contactno,emailid,verification,token,status) values('$regid','$regdate','$username','$password','$usertype','$contactno','$emailid','$verify','$token','inactive')";
              $result=$df->saveRecord($query);
               $subject = 'Email Activation';
              $message = 'Hi,'.$username.' clcik here to activate your account on SLATE http://localhost/studentmanagement/main/activate.php?token='.$token;
              $headers = 'From: patelgita9762@gmail.com';

              if (mail($emailid,$subject,$message,$headers)) {

                        $_SESSION['msg'] = "check your mail to activate your account $emailid";
                        
                  }
              if($result)
              {
                  if($usertype=="STAFF")
                  {         
                      $query="insert into staff(staffid,staffname,contactno,emailid) values('$regid','$username','$contactno','$emailid')";
                      $result=$df->saveRecord($query);
                      header('location:login.php');
                  }
                  if($usertype=="STUDENT")
                  {         
                        $query="insert into student(grno,fname,contactno,emailid) values('$regid','$username','$contactno','$emailid')";
                        $result=$df->saveRecord($query);
                        header('location:login.php');
                  }
              }
            }
              else
             {
                   $msg="Password does not match...."; 
              }
          }       
               
}    
  
}

      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

?>

  <style>

    .form-group
    {
      margin-bottom: 0px;
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
    .form {
      border: 3px black solid;
       border-radius: 12px;
      padding: 20px;
         background: rgba(255, 255, 255);
         margin-bottom: 100px;
    }
    body {
      background: linear-gradient(to bottom, white 10%, #ffcc00 100%)
      }
  
</style>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>
  
 <div class="container-fluid">
       <div class="row " style="margin-top:80px;">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form px-5">
       <form name="frm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <div class="form-group mb-3">
         <h4 class="text-center" style="font-weight: bold;">SIGN UP TO OUR WEBSITE</h4>
       </div>
              <div class="form-group">
                <p class="bg-danger text-white px-4"> <?php echo($msg); ?></p>
               
              </div>
           
              <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="txtusername" id="username" pattern="^[A-Za-z][A-Za-z0-9]{3,31}$" title="Must contain number and letter only, and username starts with letter and contain minimum 4 letter" required> 
              </div>
              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="txtpassword" name="txtpassword"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
              <div class="form-group">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="txtcpassword" name="txtcpassword" required>
              </div>

              <div class="form-group dropdown"> 
                <label for="usertype" class="form-label">User Type</label>
                <select class="form-select form-control" name="ddusertype" id="usertype" required>
                  <option selected>STUDENT</option>
                  <option>STAFF</option>
          
        </select>
        </div>

        <div class="form-group">
                <label for="cno" class="form-label">Contact Number</label>
                <input class="form-control" id="cno" name="txtcontactno" pattern="[\d]{10}" title="Enter valid mobile number" required>
              </div>

              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="txtemailid" required>
              </div>
              
              <div class="form-group mt-4">
              <button type="submit"  name="btnsubmit" class="btn btn-success w-25 p-2 font-weight-bold" style="margin-left: 100px;">SignUp</button>
              <button type="submit" name="btncancel" class="btn btn-success w-25 p-2 font-weight-bold" style="float: right; margin-right: 100px;">Reset</button>
              </div>
              
            </form>
        </div>
    </div>
</div>
</div>

 <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>