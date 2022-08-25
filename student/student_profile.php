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
  $grno="";
  $fname="";
  $mname="";
  $lname="";
  $address="";
  $cityid=""; 
  $pincode=""; 
  $birthdate=""; 
  $gender="";
  $photo=""; 
  $contactno="";
  $emailid="";
  
  $df=new DataFunctions();

?>

<?php

if(isset($_POST['btnupdate']))
  {
     $grno=$_SESSION['regid'];
     $fname=$_POST['txtfname'];
     $address=$_POST['txtaddress'];
     $contactno=$_POST['txtcontactno'];
     $pincode=$_POST['txtpincode'];
    $mname=$_POST['txtmname'];
     $lname=$_POST['txtlname'];
     
   //  $cityid=$_POST['txtcityid'];
     
     $birthdate=$_POST['dtbirthdate'];
     $gender=$_POST['txtgender'];     
     $emailid=$_POST['txtemailid'];

     $file=$_FILES['fupphoto'];
     $filename= $file['name']; 
     $filepath=$file['tmp_name'];
     $fileerror= $file['error'];

     $file_ext = explode('.',$filename);
     $file_ext_check = strtolower(end($file_ext));

     $valid_file_ext = array('png','jpg','jpeg');

    
       
   

     if($fileerror === 0)
      {
          if (in_array($file_ext_check,$valid_file_ext)) 
          {
          $destfile = 'studentimages/'.$filename;
          move_uploaded_file($filepath,$destfile); 
           $query="update student set fname='$fname',mname='$mname',lname='$lname',address='$address',pincode='$pincode',contactno='$contactno',birthdate='$birthdate',gender='$gender',emailid='$emailid',photo='$destfile' where grno='$grno' ";  
          $result=$df->saveRecord($query);
          if($result)
          {
                $msg='Profile Updated successfully...';  
          }
          else
          {
                $msg="Record not saved.."; 
          }
         } 
         else
         {
            $msg="Not a Valid Extension";
         }
  
      }   
     
    
   }
   if(isset($_POST['btncancel']))
  {
      header('location:student_profile.php');  
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
   
    body {
  background: rgb(255,255,255);
background: linear-gradient(144deg, rgba(255,255,255,1) 0%, rgba(255,204,0,1) 100%);
  </style>

</HEAD>
<BODY>
<form name="frm" action="#" method="post" enctype="multipart/form-data">
 <?php  include("menu.php"); ?>


 <div class="container" style="border: 2px solid white;margin-top:90px; padding:5px;background-color: white;">
   
      <div class="col-md-12">
      
                  <?php
                 
                       $grno=$_SESSION['regid'];
                       $query="select * from student where grno='$grno'";
                       $rw=$df->getRecord($query);
                       $fname=$rw['fname'];
                       $address=$rw['address'];
                       $contactno=$rw['contactno'];
                       $pincode=$rw['pincode'];
                       $lname=$rw['lname'];
                       $mname=$rw['mname'];
                       $birthdate=$rw['birthdate'];
                       $gender=$rw['gender'];
                       $img=$rw['photo'];
                       $emailid=$rw['emailid'];
              
                           
                  ?>
              <div class="form-group">
                <p class="bg-danger text-white px-4" style="font-size: 20px; font-weight: bold; border-radius: 5px;"> <?php echo($msg); ?></p>
               
              </div>
             <div class="col-lg-6">
                                
               <div class="form-group" style="padding-left: 0; margin-top: 10px;">
                <label for="fname" class="form-label" >First Name</label>
                <input type="text" class="form-control" name="txtfname" id="fname" value='<?php echo($fname) ?>'> 
              </div>
              <div class="form-group" style="padding: 0;">
                <label for="mname" class="form-label">Middle Name</label>
                <input type="text" class="form-control" name="txtmname" id="mname" value='<?php echo($mname) ?>'> 
              </div>
              <div class="form-group" style="padding-right: 0;">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="txtlname" id="lname" value='<?php echo($lname) ?>'> 
              </div>
              <div class="form-group " style="padding-left: 0;">
                <label for="addresss" class="form-label">Address</label>
                <textarea class="form-control"  name="txtaddress" id="address" rows="3"><?php echo($address) ?></textarea>
              </div>

              <div class="form-group" style="padding-right: 0;">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="dtbirthdate" value='<?php echo($birthdate) ?>'>
              </div>

             </div>

              <div class="col-lg-6">

                <div class="form-group col-lg-6" style="padding-right: 0px; margin-top: 10px;">
                    <label for="contactno" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactno" name="txtcontactno" value='<?php echo($contactno) ?>'>
                </div>


                 <div class="form-group col-lg-6 " style=" margin-top: 10px;">
                     <label for="emailid" class="form-label">EmailID</label>
                     <input type="email" class="form-control" name="txtemailid" id="emailid" value='<?php echo($emailid) ?>'>
                </div>

                <div class="form-group col-lg-6">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="text" class="form-control" id="pincode" name="txtpincode" value='<?php echo($pincode) ?>'>
              </div>
                <div class="form-group col-lg-6">
                     <label for="photo" class="form-label ">Photo</label>
                     <input type="file" class="form-control" style="background-color: white;" name="fupphoto" id="photo"> 
                </div>
               <div class="form-group " >
                <label for="radio1" class="form-label" style="margin-left:10px;">Gender</label>

                    <input type="radio" id="radio1" name="txtgender" value="male" <?php if($gender=="male") echo("checked") ?> > Male
                    <input type="radio"  name="txtgender" value="female" <?php if($gender=="female") echo("checked") ?> > Female
                    <input type="radio" name="txtgender" value="other" <?php if($gender=="other") echo("checked") ?> > Other
                  </label>
               </div>   

               

               <div class="form-group " style="padding-right: 0px; margin-left: 10px;">
                  <img src='<?php echo($img) ?>' width="300px" height="200px">
               </div>
            </div>

            <div class="col-lg-12">
                 <div class="form-group ">
                    <button type="submit" class="btn btn-success pull-left" name="btnupdate" style=" font-weight: bold; font-size: 20px;">UPDATE</button>
                    <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 20px;">CANCEL</button>
                </div>
               
            </div>

        </div>
    </div>
    </div>
  </div>
</div>
  </form>
 
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>