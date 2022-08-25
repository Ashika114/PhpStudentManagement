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
  $df=new DataFunctions();

?>

<?php



?>

</head>

<body>
    <div id="wrapper">
        
    <?php  include("navbar.php"); ?>
    <?php  include("sidebar.php"); ?>
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Tables Page <small>Responsive tables</small>
                        </h1>			
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              <span style="font-size: 25px;">Admission Details</span>
                  <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px;" type='submit' name='btnnew' value="new">NEW</button>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                              




                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    </div>
            </div>
                <!-- /. ROW  -->
        </div>
                    <?php  include("footer.php"); ?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>

       <?php  include("jslink.php"); ?>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
