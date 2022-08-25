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

?>


<?php
if(isset($_POST['btndownload']))
{
 $docid=$_POST['btndownload'];
 $fname=$df->getname("select file from document where docid='$docid'");
 $file="../staff/".$fname;

   if(file_exists($file))
   {  

       $filetype=filetype($file);

       $filename=basename($file);

       header ("Content-Type: ".$filetype);

       header ("Content-Length: ".filesize($file));

       header ("Content-Disposition: attachment; filename=".$filename);

       readfile($file);
  }
  else
  {
     echo '<script>alert("Document extension must be .docx or .txt")</script>';  
  }
}




?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post" enctype="multipart/form-data">
 <?php  include("menu.php"); ?>

  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>COURSE MATERIAL</h2>
      </div>
    </div><!-- End Breadcrumbs -->
  
  <div class="container-fluid">
     <div class="row">
	    <div class="col-md-12">

          
           <!-- Advanced Tables -->
          <div class="panel panel-default">
           
            <div class="panel-body">
                <div class="table-responsive">

                    <?php
          
           echo("<table class='table table-bordered table-striped' id=''>");
            echo("<thead class='thead'><tr>");
            echo("<th>DOC ID</th><th>DOC NAME</th><th>COURSE NAME</th><th>SUB NAME</th><th>FILE</th><th>DOWNLOAD</th>");
          echo("</tr></thead>");
          $grno=$_SESSION['regid'];
          $query="select * from document d,course c , subject s , admission a where d.courseid=c.courseid AND d.subid=s.subid AND a.grno=$grno AND a.courseid=d.courseid AND s.sem=a.sem";
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
            echo("<td><button type='submit' class='btn btn-success' name='btndownload' value=".$row['docid'].">DOWNLOAD</button></td>");
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
 

</form>
  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>