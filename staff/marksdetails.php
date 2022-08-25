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
  $subjectid="";
  $totalmarks="";
  $obtainmarks="";
  $passingmarks="";                                                            
  $df=new DataFunctions();

?>

<?php

  
  if(isset($_POST['btnsave']))
  {
    
     $marksheetid=$_SESSION['marksheetid'];
  
     $totalmarks=$_POST['txttotalmarks'];
     $obtainmarks=$_POST['txtobtainmarks'];
     $passingmarks=$_POST['txtpassingmarks'];
     $subjectid=$_POST['lstsubject'];
     

      $query="insert into marksdetail(marksheetid,subid,totalmarks,obtainmarks,passingmarks) values('$marksheetid','$subjectid','$totalmarks','$obtainmarks','$passingmarks')";
      echo $query;
      $result=$df->saveRecord($query);
      if($result)
      {
       
          header('location:marksheet_table.php');
      }
      else
      {
        echo '<script>alert("Record not saved..")</script>';  
      }
    
   }

  
    if(isset($_POST['btncancel']))
    {
       $_SESSION["trans"]="";
       $_SESSION["docid"]="";
       header('location:marksheet_table.php');
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
                             MARKS DETAILS <small>FORM</small>
                        </h1>
    </div>

        <div id="page-inner">
      <div class="col-md-3 "></div> 
      <div class=" col-md-6">
      <div class="form">
        <form name="frm" action="" method="post" enctype="multipart/form-data">



              <div class="form-group">
                <label for="subjectid" class="form-label">SUBJECT</label>
                <select name="lstsubject" class="form-control">
                  <?php
                  $marksheetid=$_SESSION['marksheetid'];
                   $query="select subid,subname from subject s , admission a , marksheet m where m.marksheetid={$marksheetid} AND m.admid=a.admid AND a.courseid=s.courseid";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["subid"].">".$row["subname"]."</option>");
                   }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="totalmarks" class="form-label">Total Marks</label>
                <input type="text" class="form-control" id="totalmarks" name="txttotalmarks" required value="100">
              </div>

              <div class="form-group">
                <label for="obtainmarks" class="form-label">Obtain Marks</label>
                <input type="text" class="form-control" name="txtobtainmarks" id="obtainmarks" required> 
              </div>
            

              <div class="form-group dropdown"> 
                <label for="passingmarks" class="form-label">Passing Marks</label>
                <input type="text" class="form-control" id="passingmarks" name="txtpassingmarks" value="35" required>
               </div>


              <div class="form-group"> <button type="submit" class="btn btn-success " name="btnsave" style="margin-left: 4px; font-weight: bold; font-size: 14px;">SAVE</button> <button type="submit" class="btn btn-success pull-right" name="btncancel" style=" font-weight: bold; font-size: 14px;">CANCEl</button> </div> </form>
         
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