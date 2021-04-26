<?php
include('connection.php');  
if(isset($_POST['Submit']))
{    
     $uname = $_POST['uname'];
     $rgno = $_POST['rgno'];
     $leavetype= $_POST['leavetype'];
     $startdate= $_POST['startdate'];
     $returndate= $_POST['returndate'];
     $details= $_POST['details'];
     $sql = "INSERT INTO leaveform(name,rgno,leavetype,startdate,returndate,details)
     VALUES ('$uname', '$rgno',  '$leavetype', '$startdate', '$returndate', '$details')";
     if (mysqli_query($con, $sql)) {
       // echo "string";
        header("Location: attendance.html"); 

     } else {
        echo "Error: " . $sql . mysqli_error($con);
        
     }
     mysqli_close($con);
}
?>