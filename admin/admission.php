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
  $admid="";
  $admdate="";
  $sem="";
  $division="";
  $description="";   
  $grno="";
  $courseid="";                                                         
  $df=new DataFunctions();

?>

<?php
if($_SESSION["trans"]=="update") 
  {
    $admid=$_SESSION['admid'];
    $query="select * from admission where admid='$admid'";
    $row=$df->getRecord($query);
    $admid=$row['admid'];
    $admdate=$row['admdate'];   
    $division=$row['division'];
    $description=$row['description'];
    $courseid=$row['courseid'];
    $grno=$row['grno']; 
   $sem=$row['sem']; 

  }
  
  if(isset($_POST['btnsave']))
  {
     $admdate=date('y-m-d'); 
    
     $division=$_POST['txtdivsion'];
     $description=$_POST['txtdescription'];
     $courseid=$_POST['lstcourse'];
     $sem=$_POST['txtsem'];
     $grno=$_POST['txtgrno'];
    
     $query="Select * from admission WHERE grno = '$grno'";
      $tb=$df->getTable($query);
      $numExistRows = mysqli_num_rows($tb);
      if($numExistRows > 0)
      { 
          $msg = "STUDENT Already Exists"; 
      }
      else 
      {
     if($_SESSION['trans']=="new")
     {
        $query="insert into admission(admdate,division,description,courseid,grno,sem) values('$admdate','$division','$description','$courseid','$grno','$sem')";

     }  
     if($_SESSION['trans']=="update")
     {
        $admid=$_SESSION['admid'];  
         $query="update admission set admdate='$admdate',division='$division',description='$description',courseid='$courseid',grno='$grno',sem='$sem' where admid='$admid' ";
      } 
      echo ($query); 
      $result=$df->saveRecord($query);
      if($result)
      {
          $_SESSION["trans"]="";
          $_SESSION["admid"]="";
          header('location:admission_table.php');
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
       header('location:admission_table.php');
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
                              Admission <small>FORM</small>
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
                <label for="grno" class="form-label">GRNO</label>
                <input type="varchar" class="form-control" id="sem" name="txtgrno" required value='<?php echo $_SESSION['grno'] ?>' >
              </div>
             
               <div class="form-group">
                <label for="subtype" class="form-label">Course</label>
                <select name="lstcourse" class="form-control">
                  <?php
                   $query="select courseid,coursename from course";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["courseid"].">".$row["coursename"]."</option>");
                   }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="sem" class="form-label">Sem</label>
                <input type="number" class="form-control" id="sem" name="txtsem" required value='<?php echo($sem) ?>' >
              </div>

              <div class="form-group">
                <label for="division" class="form-label">Division</label>
                <input type="text" class="form-control" id="division" name="txtdivsion" required value='<?php echo($division) ?>'>
              </div>
              
               <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="txtdescription" value='<?php echo($description) ?>'>
              </div>

              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight:bold; font-size: 20px;">SAVE</button> <button type="submit" class="btn btn-success pull-right"name="btncancel" style=" font-weight:bold; font-size: 20px;">CANCEl</button> </div> </form>
         
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