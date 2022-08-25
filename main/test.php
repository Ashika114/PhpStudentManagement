<!DOCTYPE html>
<html>
<head>
    <?php
       include('../class/DataFunctions.php');
        $df=new DataFunction();
    ?>

    <style>
     table{
             font-family: serif;
             border-collapse: collapse;
          }

      td, th {
                border: 1px solid #ddd;
                padding: 8px;
             }

      tr:nth-child(even){background-color: #f2f2f2;}

      tr:hover {background-color: #ddd;}

      th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: dimgray;
            color: white;
         }
  </style>
</head>
<body>


 <!-- $query="select * from student";
  $rw=$df->getRecord($query);
  echo($rw['fname']);
  echo($rw['lname']);  -->


<?php
  $query="select * from student";
  $tb=$df->getTable($query);
  
 /* while($rw=mysqli_fetch_array($tb))
  {
  echo($rw['fname']);
  echo($rw['lname']);
  echo('<br>');
  } */
	
		echo "<table>";
		echo "<tr>";
				echo "<th>Firstname</th>";
				echo "<th>Middlename</th>";
				echo "<th>Lastname</th>";
		echo "</tr>";
	 If (mysqli_num_rows($tb) > 0) 
   {
      while ($row = mysqli_fetch_array($tb)) 
      {  
        echo "<tr>"; 
          echo "<td>".$row['fname']."</td>";
          echo "<td>".$row['mname']."</td>";    
          echo "<td>".$row['lname']."</td>";     
        echo "</tr>";       
      }
    }
    echo "</table>";
  
?> 

</body>
</html>