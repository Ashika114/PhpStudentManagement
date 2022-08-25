<HTML>
<HEAD>
  <title>marksheet</title>
   <link href="assets/img/icon4.png" rel="icon">
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
   if(isset($_POST['btnmarks']))
    {
        $_SESSION['trans']="marks"; 
        $_SESSION['marksheetid']=$_POST['btnmarks']; 
        header('location:reportcard.php');
    } 


?>

</HEAD>
<BODY>
<form name="frm" action="#" method="post">
 <?php  include("menu.php"); ?>
  <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>MARKSHEET REPORT</h2>
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
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>EXAM TYPE</th><th>EXAM DATE</th><th>MARKSHEET</th>");
                          echo("</tr></thead>");
                          $grno=$_SESSION['regid'];
                          $query="select examtype,examdate,marksheetid FROM marksheet m, vwadmission v  WHERE v.grno={$grno} AND m.admid=v.admid";
                          
                          $tb=$df->getTable($query); 
                                      
                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                              
                               echo("<td>".$row['examtype']."</td>");
                               echo("<td>".$row['examdate']."</td>");
                                echo("<td><button class='btn btn-primary' type='submit' name='btnmarks' value=".$row['marksheetid'].">MARKSHEET</button></td>");
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