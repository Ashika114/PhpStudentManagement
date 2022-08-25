<!DOCTYPE html>
<html>
<Head>

<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $msg="";
  $actid="";
  $actdate="";
  $actname="";
  $purpose="";                                                    
  $df=new DataFunctions();

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
                             Activities <small>Report</small>
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 25px;">Activities Detail</span>
                  
              </div>
              <div class="panel-body">
              <div class="table-responsive">
					<?php 
							  echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='tabsearch'>");
							  echo("<thead class='thead'><tr>");
							  echo("<th>ACT ID</th><th>ACT DATE</th><th>ACT NAME</th><th>PURPOSE</th>");
							  echo("</tr></thead>");
							  $query="select * from activities";
							  $tb=$df->getTable($query);             
							  echo("<tbody>");
							  while($row=mysqli_fetch_array($tb))
							 {
								   echo("<tr style='font-size:18px;'>");
								   echo("<td>".$row['actid']."</td>");
									echo("<td>".$row['actdate']."</td>");
								   echo("<td>".$row['actname']."</td>");
								   echo("<td>".$row['purpose']."</td>");
						  
								
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
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>