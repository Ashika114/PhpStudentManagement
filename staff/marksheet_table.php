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
  $examtype="";
  $examdate="";


?>

<?php

  if(isset($_POST['btnmarks']))
    {

        $_SESSION['marksheetid']=$_POST['btnmarks'];  
        header('location:marksdetails.php');
    } 


    if(isset($_POST['btndelete']))
    {
        $marksheetid=$_POST['btndelete'];
        $query="delete from marksheet where marksheetid='$marksheetid'";
        $result=$df->saveRecord($query);   
        if($result)
        { 
            $msg="Record Delete Successfully...";  
        }
        else
        {
            $msg="Record can not Delete...";  
        }
    
    }

     if(isset($_POST['btnsubmit']))
    {
        $examtype=$_POST['txtexamtype'];
           $marksheetdate=date('y-m-d');
        $examdate=$_POST['txtdate'];
        $admid=$_POST['lstadmid'];
        $query="insert into marksheet(admid,marksheetdate,examdate,examtype) values('$admid','$marksheetdate','$examdate','$examtype')";
         $result=$df->saveRecord($query);
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
                             Marksheet
                        </h1>
    </div>
        <div id="page-inner">

         <div class="row">
         <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
           
             <div class="panel-heading">
                 <div><span class="bg-danger text-white px-4" style="font-size: 20px; font-weight:bold; padding:5px 30px;">
                <?php
                   echo $msg;      
                ?></span>
                </div>
              <label for=examtype style="font-size: 17px; margin-top: 20px;  font-weight: bold;">EXAM TYPE : </label>
              <select  name="txtexamtype" id="examtype" style="font-size: 16px;">

                  
                  <option value="internal" >Internal</option>
                  <option value="external">External</option>
    
              </select>

              <label for="admid" style="font-size: 17px; margin-left: 30px; font-weight: bold;">ADMID : </label>
                <select name="lstadmid" id="admid">
                  <?php
                   $query="select admid from admission";
                   $tb=$df->gettable($query);
                   while($row=mysqli_fetch_array($tb))
                   {
                      echo("<option value=".$row["admid"].">".$row["admid"]."</option>");
                   }
                  ?>
                </select>

                <label for="date" style="font-size: 17px; margin-left: 30px; font-weight: bold;" >EXAM DATE : </label>
                <input type="date" id="date" name="txtdate" style="font-size: 12px; padding: 0px; margin:0px;" >

              <button class="btn btn-success pull-right"  style=" font-weight:bold; font-size: 18px; margin-top:20px;" type='submit' name='btnsubmit' value="new">SUBMIT</button>

              
            </div>


              <div class="panel-body">

              <div class="table-responsive">

          
                  <?php 
                          echo("<table class='table table-bordered table-hove table-striped bg-light text-center' id='dataTables-example'>");
                          echo("<thead class='thead'><tr>");
                          echo("<th>MARKSHEET ID</th><th>ADMID</th><th>EXAM TYPE</th><th>EXAM DATE</th><th>MARKS</th><th>DELETE</th>");
                          echo("</tr></thead>");

                           $query="select * from marksheet ";
                            $result=$df->saveRecord($query);

                          $tb=$df->getTable($query);             

                          echo("<tbody>");
                          while($row=mysqli_fetch_array($tb))
                         {
                               echo("<tr style='font-size:18px;'>");
                               
                                
                               echo("<td>".$row['marksheetid']."</td>");
                                echo("<td>".$row['admid']."</td>");
                                 echo("<td>".$row['examtype']."</td>");
                                  echo("<td>".$row['examdate']."</td>");
                                echo("<td><button class='btn btn-success' type='submit' name='btnmarks' value=".$row['marksheetid']." >MARKS</button></td>");
                                echo("<td><button class='btn btn-danger' type='submit' name='btndelete' value=".$row['marksheetid'].">DELETE</button></td>");
                                
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