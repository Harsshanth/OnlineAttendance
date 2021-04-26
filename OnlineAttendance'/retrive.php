<?php
include_once 'connection.php';
$result = mysqli_query($con,"SELECT * FROM leaveform");
?>
<!DOCTYPE html>
<html>
 <head>
   <link rel = "stylesheet" type = "text/css" href = "/styles/retrive.css">   
 <title> Requests</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<form  method="POST">
  <table>
  <h1>Leave Permission List</h1>
  <tr>
    <td>Name</td>
    <td>register no</td>

    <td>Leave type</td>
    
    <td>startdate</td>
    <td>returndate</td>
    <td>details</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["rgno"]; ?></td>
   
    <td><?php echo $row["leavetype"]; ?></td>
    <td><?php echo $row["startdate"]; ?></td>
    <td><?php echo $row["returndate"]; ?></td>
    
    <td><?php echo $row["details"]; ?></td>
    


</tr>
<?php
$i++;
}
?>
</table>
</form>
 <?php
}
else{
    echo "No result found";
}
?>
 
 </body>
</html>