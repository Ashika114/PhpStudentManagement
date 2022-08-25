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
  $staffid="";
  $staffname="";
  $address="";
  $cityid="";
  $pincode="";
  $contactno=""; 
  $emailid="";
  $joindate="";
  $qualification="";
  $exp=""; 
  $specialization="";
  $extraquality="";
  $photo="";
  $df=new DataFunctions();

?>
<?php

  if(isset($_POST['btnupdate']))
  {
     $staffid=$_SESSION['regid']; 
     $staffname=$_POST['txtstaffname'];
     $address=$_POST['txtaddress'];
     $pincode=$_POST['txtpincode'];
     $contactno=$_POST['txtcontactno'];
     $emailid=$_POST['txtemailid'];
     $joindate=$_POST['txtjoindate'];
     $qualification=$_POST['txtqualification'];
     $exp=$_POST['txtexp'];
     $specialization=$_POST['txtspecialization'];
     $extraquality=$_POST['txtextraquality'];
     
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
          $destfile = 'staffimages/'.$filename;
          move_uploaded_file($filepath,$destfile); 
           $query="update staff set staffname='$staffname',address='$address',pincode='$pincode',contactno='$contactno',emailid='$emailid',joindate='$joindate',qualification='$qualification',exp='$exp',specialization='$specialization',extraquality='$extraquality',photo='$destfile' where staffid='$staffid' ";
         //  echo($query);
            $result=$df->saveRecord($query);
            if($result)
            {
                $msg="Profile succefully updated...";  
            } 
            else
            {
                $msg="Record not saved..";  
             }
         } 
         else
         {
            $msg="Not a Valid Extension for image";
         }
          
  
      }
      else{
            $msg="Reupload Image again to update profile..."; 
      }   
     
    
   }
   if(isset($_POST['btncancel']))
  {
      header('location:staff.php');  
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
  <form name="profile" action="#" method="post" enctype="multipart/form-data">
<?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        <div class="wrapper">

  <div id="page-wrapper">
    

        <div id="page-inner">
      
          <div class="row">

              <div class="col-lg-12">
                  <div class="panel panel-default">
                      
                      <div class="panel-body">
                         <div class="form-group">
                          <p class="bg-danger text-white" style="font-size: 20px; font-weight: bold; border-radius: 5px;"> <?php echo($msg); ?></p>
               
                       </div>
                          <div class="row">

                              <div class="col-lg-6">
                                
                                    <?php
                 
                                        $staffid=$_SESSION['regid'];
                                        $query="select * from staff where staffid='$staffid'";
                                        $rw=$df->getRecord($query);

                                        $staffname=$rw['staffname'];
                                        $address=$rw['address'];
                                        $contactno=$rw['contactno'];
                                        $emailid=$rw['emailid'];
                                        $pincode=$rw['pincode'];
                                        $joindate=$rw['joindate'];
                                        $qualification=$rw['qualification'];
                                        $exp=$rw['exp'];
                                        $specialization=$rw['specialization'];
                                        $extraquality=$rw['extraquality'];       
                                        $img=$rw['photo'];       
                   
                                    ?>
                      
                                       
                                    <div class="form-group">
                                      <label for="staffname" class="form-label">Staffname</label>
                                      <input type="text" class="form-control" name="txtstaffname" id="staffname" value='<?php echo($staffname) ?>'> 
                                    </div>
                                    <div class="form-group">
                                      <label for="address" class="form-label">Address</label>
                                      <textarea class="form-control"  name="txtaddress" id="address" rows="3"><?php echo($address) ?></textarea>
                                    </div>
                                    <div class="form-group col-lg-6" style="padding-left: 0;" >
                                      <label for="pincode" class="form-label">Pincode</label>
                                      <input type="text" class="form-control" name="txtpincode" id="pincode" value='<?php echo($pincode) ?>'> 
                                    </div>
                                    <div class="form-group col-lg-6" style=" padding-right: 0">
                                      <label for="joindate" class="form-label">Join Date</label>
                                      <input type="Date" class="form-control" name="txtjoindate" id="joindate" value='<?php echo($joindate) ?>'> 
                                    </div>
                                    <div class="form-group">
                                      <label for="contactno" class="form-label">Contact Number</label>
                                      <input type="text" class="form-control" name="txtcontactno" id="contactno" value='<?php echo($contactno) ?>'> 
                                    </div>
                                    <div class="form-group">
                                      <label for="emailid" class="form-label">EmailID</label>
                                      <input type="email" class="form-control" name="txtemailid" id="emailid" value='<?php echo($emailid) ?>'> 
                                    </div>
                                   
                                     
                                  
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                             <div class="col-lg-6">
                               

                                    <div class="form-group">
                                      <label for="photo" class="form-label">Photo</label>
                                      <input type="file" name="fupphoto" id="photo"> 
                                    </div>

                                    <div class="form-group  col-lg-6" style="padding-left: 0;">
                                      <label for="qualification" class="form-label">Qualification</label>
                                      <input type="text" class="form-control" name="txtqualification" id="qualification" value='<?php echo($qualification) ?>'> 
                                    </div>
                                    <div class="form-group  col-lg-6" style="padding-right: 0;">
                                      <label for="exp" class="form-label">Experience</label>
                                      <input type="text" class="form-control" name="txtexp" id="exp" value='<?php echo($exp) ?>'> 
                                    </div>
                                    <div class="form-group col-lg-6" style="padding-left: 0">
                                      <label for="specialization" class="form-label">Specialization</label>
                                      <input type="text" class="form-control" name="txtspecialization" id="specialization" value='<?php echo($specialization) ?>'> 
                                    </div>
                                    <div class="form-group col-lg-6" style="padding-right: 0px;">
                                      <label for="extraquality" class="form-label">Extra Quality</label>
                                      <input type="text" class="form-control" name="txtextraquality" id="extraquality" value='<?php echo($extraquality) ?>'> 
                                    </div>
                                     <div class="form-group col-lg-6" style="padding-right: 0px;">
                                <?php
                                   if($rw['photo'] == ""){
                                      echo "<img width='250' height='200' src='staffimages/default.jpg' alt='Default Profile Pic'>";
                                    } else {
                                    ?>
                                      
                                    <img src='<?php echo($img) ?>' width="300px" height="200px">
                                    <?php
                                  }
                                ?>                             

                                     </div>

                             
                             </div>
                                <!-- /.col-lg-6 (nested) -->
                              <div class="col-lg-12">
                              
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-success " name="btnupdate" style=" font-weight: bold; font-size: 20px;">UPDATE</button>
                                    <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 20px;">CANCEL</button>
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
                <!-- /.col-lg-12 -->
          </div>
 <?php  include("footer.php"); ?>

      </div>
         
  </div>    
        </div>
     </div>
  </div>

</div>
</form>
<?php  include("jslink.php"); ?>
</body>
</html>