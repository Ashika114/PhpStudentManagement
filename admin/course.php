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
  $courseid="";
  $coursename="";
  $shortname="";
  $language="";
  $duration="";
  $fees="";                                                             
  $df=new DataFunctions();

?>

<?php
if($_SESSION["trans"]=="update") 
  {
    $courseid=$_SESSION['courseid'];
    $query="select * from course where courseid='$courseid'";
    $row=$df->getRecord($query);
    $courseid=$row['courseid'];
    $coursename=$row['coursename'];
    $shortname=$row['shortname'];
    $language=$row['language'];
    $duration=$row['duration'];
    $fees=$row['fees'];
  }
  
  if(isset($_POST['btnsave']))
  {
    
     $coursename=$_POST['txtcoursename'];
     $shortname=$_POST['txtshortname'];
     $language=$_POST['language'];
     $duration=$_POST['txtduration'];
     $fees=$_POST['txtfees'];
   
    $query="Select * from course WHERE coursename = '$coursename'";
      $tb=$df->getTable($query);
      $numExistRows = mysqli_num_rows($tb);
      if($numExistRows > 0)
      { 
          $msg = "Coursename Already Exists"; 
      }
      else 
      {
     if($_SESSION['trans']=="new")
     {
        $query="insert into course(coursename,shortname,language,duration,fees) values('$coursename','$shortname','$language','$duration','$fees')";

     }  
     if($_SESSION['trans']=="update")
     {
        $courseid=$_SESSION['courseid'];  
         $query="update course set coursename='$coursename',shortname='$shortname',language='$language',duration='$duration',fees='$fees' where courseid='$courseid' ";
      }  
      $result=$df->saveRecord($query);
      if($result)
      {
          $_SESSION["trans"]="";
          $_SESSION["courseid"]="";
          header('location:course_table.php');
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
       $_SESSION["courseid"]="";
       header('location:course_table.php');
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
                             COURSE DETAIL <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post">
            <div class="form-group">
                <p class="bg-danger text-white px-4" style="padding:10px; font-weight: bold; font-size:20px;"> <?php echo($msg); ?></p>
               
              </div>
              <div class="form-group">
                <label for="coursename" class="form-label">Coursename</label>
                <input type="text" class="form-control" name="txtcoursename" id="coursename" required value='<?php echo($coursename) ?>'> 
              </div>
              <div class="form-group">
                <label for="shortname" class="form-label">Shortname</label>
                <input type="text" class="form-control" id="shortname" name="txtshortname" value='<?php echo($shortname) ?>'>
              </div>
              <div class="form-group">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" class="form-control" id="duration" name="txtduration" value='<?php echo($duration) ?>'>
              </div>

              <div class="form-group dropdown"> 
                <label for="language" class="form-label">Language</label>
                <select class="form-select form-control" name="language" id="language" >
                   <option selected>ENGLISH</option>
                   <option value="1">HINDI</option>
                   <option value="2">GUJARATI</option>
          
                </select>
               </div>

                <div class="form-group">
                    <label for="fees" class="form-label">Fees</label>
                    <input type="text" class="form-control" id="fess" name="txtfees" value='<?php echo($fees) ?>'>
                </div>

              <div class="form-group"> <button type="submit" class="btn
btn-success " name="btnsave" style="margin-left: 4px; font-weight:
bold; font-size: 14px;">SAVE</button> <button type="submit" class="btn btn-success pull-right"
name="btncancel" style=" font-weight:
bold; font-size: 14px;">CANCEl</button> </div> </form>
         
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