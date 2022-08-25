<!DOCTYPE html>
<html>
<head>

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
  $docid="";
  $docname="";
  $doctype="";
  $sem="";
  $file="";
  $filetype="";                                                    
  $df=new DataFunctions();

?>

<?php
   if(isset($_POST['btnnew']))
    {
        $_SESSION['trans']="new"; 
        header('location:document.php');
    } 

    if(isset($_POST['btnupdate']))
    {
        $_SESSION['docid']=$_POST['btnupdate']; 
        $_SESSION['trans']="update";  
        header('location:document.php');
    }

    if(isset($_POST['btndelete']))
    {
        $docid=$_POST['btndelete'];
        $query="delete from document where docid='$docid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            echo '<script>alert("Record Delete Successfully...")</script>';  
        }
        else
        {
             echo '<script>alert("Record can not Delete...")</script>';  
        }
    
    }


?>

</head>

<body>
<form name="frm" action="#" method="post">
<div class="wrapper">
  <?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
   <div class="container-fluid">
     <div class="row">
  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             Document <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
           <!-- Advanced Tables -->
          <div class="panel panel-default">
            <div class="panel-heading">
                 <span style="font-size: 25px;">Document Detail</span>
                 <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <?php
          
           echo("<table class='table table-bordered table-striped' id='tabsearch'>");
            echo("<thead class='thead'><tr>");
            echo("<th>DOC ID</th><th>DOC NAME</th><th>COURSE NAME</th><th>SUBID</th><th>FILE</th><th>DELETE</th><th>UPDATE</th>");
          echo("</tr></thead>");
          $query="select * from document d,course c , subject s where d.courseid=c.courseid AND d.subid=s.subid";

          #$query="select * from vwsubject";
           $tb=$df->getTable($query);             
           echo("<tbody>");
          while($row=mysqli_fetch_array($tb))
           {
            echo("<tr style='font-size:18px;'>");
            echo("<td>".$row['docid']."</td>");
            
            echo("<td>".$row['docname']."</td>");
             
            echo("<td>".$row['coursename']."</td>");
             echo("<td>".$row['subname']."</td>");
            echo("<td>".$row['file']."</td>");

            echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['docid'].">DELETE</button></td>");
            echo("<td><button class='btn btn-primary' type='submit' name='btnupdate' value=".$row['docid'].">UPDATE</button></td>");
            echo("</tr>");
           }
           echo("</tbody>");
           

           echo("</table>");
         ?>
                                       
         
                                        
                              
                </div>                        
            </div>
          </div>
          <!--End Advanced Tables -->

            
         </div>
        </div>
        </div>
        <?php  include("footer.php"); ?>
  </div>
</div>
</div>
</div>
</form>

<?php  include("jslink.php"); ?>
</body>
</html>