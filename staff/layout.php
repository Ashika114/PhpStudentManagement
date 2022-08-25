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
<form name="frm" action="#" method="post">
    <?php  include("navbar.php"); ?>
 <?php  include("sidebar.php"); ?>
  <div class="container-fluid">
     <div class="row">
        

  <div id="page-wrapper">
     <div class="header"> 
                        <h1 class="page-header">
                             Charts <small>Show up your stats</small>
                        </h1>
    </div>

        <div id="page-inner">
         




        </div>
          <?php  include("footer.php"); ?>
  </div>    
        </div>
     </div>
  </div>

</div>
</form>
<?php  include("jslink.php"); ?>
</body>
</html>