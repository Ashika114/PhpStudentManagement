<?php

class DataFunctions
{
	public $conn="";
	
	public function __construct()
	{
       $this->conn=mysqli_connect('localhost','root','','studentdb1') or die('not connected...');
	}
	   
   function getTable($query)
   {
	  $tb=mysqli_query($this->conn,$query);
	  return $tb;
   }
   
   function getRecord($query)
   {
	  $tb=mysqli_query($this->conn,$query);
	  $rw=mysqli_fetch_array($tb);
	  return $rw;
   }
   
   function saveRecord($query)  //insert, update, delete
   {
	   $result=mysqli_query($this->conn,$query);
	   return $result;
   }
   
   function primary($query) //select max(id) from tabname;
   {
	  $tb=mysqli_query($this->conn,$query);
	  $rw=mysqli_fetch_array($tb);
 	  if($rw)
	  {
	     $pk=$rw[0];
		 $pk++;
	  }		 
	  else
	  {
	     $pk=1;
	  }
	  return $pk;
   }
   
   function getcount($query)
   {
	  $tb=mysqli_query($this->conn,$query);
	  $rw=mysqli_fetch_array($tb);
	  $count=$rw[0];
	  return $count;
   }
   
    function getname($query)
   {
	  $name="";
	  $tb=mysqli_query($this->conn,$query);
	  $rw=mysqli_fetch_array($tb);
	  $name=$rw[0];
	  return $name;
   }
   
}

?>