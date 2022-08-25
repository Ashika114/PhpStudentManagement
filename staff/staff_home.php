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
  $tstudent="";
  $tstaff="";
  $tcourse="";
  $tsubject="";
  $tquery="";
  $tfeedback="";

  $msg="";
  $df=new DataFunctions();

?>

<?php
$regid=$_SESSION['regid'];
$tstudent=$df->getcount("select count(*) from admission");
 $tstaff=$df->getcount("select count(*) from staff");
  $tcourse=$df->getcount("select count(*) from course");
  $tsubject=$df->getcount("select count(*) from subject");

    $tcontactus=$df->getcount("select count(*) from leaveapp");
    $tquery=$df->getcount("select count(*) from query");
    $tfeedback=$df->getcount("select count(*) from email where regid='$regid'");
    $tactivities=$df->getcount("select count(*) from activities");


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
                           WELCOME TO STAFF PANEL  
                        </h1>
    </div>

        <div id="page-inner">
         
          <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                               <i class="fas fa-edit fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
                <h3><?php echo ($tcontactus); ?></h3>
                               <strong>Leave Appliaction</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                              <div class="panel-left pull-left blue">
                                <i class="fas fa-question-circle fa-5x"></i>
                </div>
                                
                            <div class="panel-right">
              <h3><?php echo ($tquery); ?></h3>
                               <strong>No. of Query's </strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                                <i class="fa fa-inbox fa-5x"></i>
                               
                            </div>
                            <div class="panel-right">
               <h3><?php echo ($tfeedback); ?></h3>
                               <strong>No. of Email Received</strong>
 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                                <i class="fas fa-dice-d20 fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
              <h3><?php echo ($tactivities); ?></h3>
                             <strong>No. of Activities</strong>

                            </div>
                        </div>
                    </div>
                </div>

         <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Student</h4>
            <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo ($tstudent); ?>" ><span class="percent"><?php echo ($tstudent); ?></span>
            </div>
          </div>
        </div>
      </div>
  
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Course</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo ($tcourse); ?>" ><span class="percent"><?php echo ($tcourse); ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Subject</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo ($tsubject); ?>" ><span class="percent"><?php echo ($tsubject); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.row-->

         
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