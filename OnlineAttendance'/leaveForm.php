<?php
	include('connection.php');
	$userName = $_COOKIE['user_name'];
	$sql = "SELECT * FROM employee WHERE username = '$userName'";
	$result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if (count($row) == 0) {
		header("Location: index.html");
	} else {
		$name = $row['name'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave form</title>
    <link rel = "stylesheet" type = "text/css" href = "/styles/leaveFormStyle.css">  
    <script src="/js/main.js"></script>
</head>
<body >

    <div class="wrapper">
    <div class="leave-box">
        <h1>LEAVE FORM </h1>
    </div>

   
	<form action="updateForm.php" method="post">
		<table>
		<tr>
			<td>
				Name:
			</td>
			<td>
				<input readonly type="text" name="uname" value="<?php echo $name ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Register No:
			</td>
			<td>
				<input type="number" name="rgno" required>
			</td>
		</tr>
		
		<tr>
			<td>
				Leave type :
			</td>
			<td>
				<input type="radio" name="leavetype" value="Health" required>Health
				<input type="radio" name="leavetype" value="OD" required>ON Duty
				<input type="radio" name="leavetype" valeu="Other" required>Other
			</td>
		</tr>
		<tr>
			<td>Start date:</td>
			<td><input type="date" name="startdate" required></td>
			<td>Return date:</td>
			<td><input type="date" name="returndate" required></td>
            
		

		</table>
       

        <textarea cols="15" rows="25" name="details">Details</textarea>
        <input class="btn" type="submit" name="Submit" value="Submit" >

	</form>

</div>
</body>
</html>