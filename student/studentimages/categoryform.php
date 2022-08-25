<html>
<head>
  <?php
    session_start();
    include("csslink.php");
	include("../class/dataclass.php");
  ?>
 <?php
    $catid="";
    $catname="";
	$shortname="";
	$grpid="";
	$grpname="";
    $dc=new DataClass();
  ?>
  <?php
  
    if($_SESSION["trans"]=="update") 
	{
	  $catid=$_SESSION['catid'];
	  $query="select * from category where catid='$catid'";
	  $rw=$dc->getRecord($query);
	  $catid=$rw['catid'];
	  $catname=$rw['catname'];
	  $shortname=$rw['shortname'];
	  $grpid=$rw['grpid'];
	  }
	
    if(isset($_POST['btnsave']))
	{
	  
	   $catname=$_POST['txtcatname'];
	   $shortname=$_POST['txtshortname'];
	   $grpid=$_POST['lstgrp'];
	 
	 if($_SESSION['trans']=="new")
	  {
		 $query="insert into category(catname,shortname,grpid) values('$catname','$shortname','$grpid')";
		// echo($query);
      }	 
	  if($_SESSION['trans']=="update")
	  {
		 $catid=$_SESSION['catid'];	 
	     $query="update category set catname='$catname',shortname='$shortname',grpid='$grpid' where catid='$catid' ";
	  }	 
	  
	  $result=$dc->saveRecord($query);
	  if($result)
	  {
	   $_SESSION["trans"]="";
	   $_SESSION["catid"]="";
	   header('location:categoryshow.php');
	  }
	  else
	  {
	    $msg="Record not saved..";
	  }
	  
	}
	
	if(isset($_POST['btncancel']))
	{
	   $_SESSION["trans"]="";
	   $_SESSION["catid"]="";
	   header('location:categoryshow.php');
	}	
  ?>
  
  
  
</head>
<body>
<div id="wrapper">
  <form name="frmcategory" action="#" method="post">
  
  <?php
    include("navbar.php");
	include("sidebar.php");
  ?>
  
  		<div id="page-wrapper">
		   <div id="page-inner">
		   
		   <div class="row" style="margin-bottom:20px" >
		      <div class="col-md-3"></div>
              <div class="col-md-6"><span class='heading1'>Category Form</span></div>
		    </div>
			
		     <div class="row" >
			  <div class="col-md-3"> </div>
               <div class="col-md-6 panel1"> 
			      
				    <div class="form-group">
                    <label>Category Name</font></label>
                      <input type="text" class="form-control" name="txtcatname" value='<?php echo($catname) ?>' placeholder="Enter category Name" autofocus onchange='checkblank(this,lblcatname)'>
					   <label class='errmsg' id="lblcatname"></label>
                   </div>
				   
				   <div class="form-group">
                    <label>Short Name</font></label>
                    <input type="text" class="form-control" name="txtshortname" value='<?php echo($shortname) ?>' placeholder="Enter short Name">
                   </div>
				   
				    <div class="form-group">
                      <label>Group</label>
                      <select name="lstgrp" class="form-control">
					    <?php 
						  $tb=$dc->getTable("select grpid,grpname from groups"); 
						  while($rw=mysqli_fetch_array($tb))
						  {
							if($grpid==$rw['grpid']) 
							 echo("<option selected value=".$rw['grpid'].">".$rw['grpname']."</option>");
							else
						 	 echo("<option value=".$rw['grpid'].">".$rw['grpname']."</option>");
						  }
					     ?>
					   </select>
                   </div>
				   
                      
				   <div class="form-group">
                       <input type="submit" class="btn btn-success" name="btnsave" value="Save">
					   <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
                   </div>
				   
			   </div>
			 </div>
            
			<?php 
		     include("footer.php");
			?>	 		
		
            </div>
		
		</div>
  </form>
</div>
  <?php
    include("jslink.php");
  ?>
</body>
</html>