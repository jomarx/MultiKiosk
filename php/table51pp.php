<!DOCTYPE html>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "600";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
	<style>
	td {
		
		border:1px solid black;
		font-size: 15px	;
	}
		th {
		font-size: 15px	;
		border:1px solid black;
	}

	</style>
<body>

<?php
echo "<center>";
echo "<span style='font-size: 25pt'>";
//echo date("m/d/Y H:i:s");
//echo "<BR><b>Task Database (for reports)</b><BR><BR>";
echo "</span>";


$servername = "192.168.143.220";
$username = "jomar";
$password = "magic44ever";
$dbname = "kpi_mech";

try {
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Start connection
	
//	$sql = "SELECT * from mbreak_db";
		$sql = "SELECT task_db.ID,task_db.location,mech_db.FirstName,mech_db.LastName,mech_db.ShortName,mech_db.dayOrNight,mbcode_db.details,task_db.StartDate,task_db.EndDate, task_db.comments from mech_db INNER JOIN task_db ON task_db.Assignee=mech_db.empID INNER JOIN mbcode_db ON mbcode_db.id=task_db.details ORDER BY `ID` DESC";

	$result = $conn->query($sql);
    		
	
	if ($result->num_rows > 0) {
		echo "<span style='font-size: 15pt'>";
		echo "<table style='border:4px solid black; width: 100%'>";
		//echo "<font size='30'>";
		echo "<tr><th>TaskID</th><th>location</th><th>FirstName</th><th>LastName</th><th>ShortName</th><th>DayOrNight</th><th>Details</th><th>StartDate</th><th>EndDate</th><th>Comments</th><th>Duration (mins)</th></tr>";
		echo "</span>";
		
		// <th>SpecialSerial</th><th>StartDate</th><th>EndDate</th><th>Details</th>
		// output data of each row
		while($row = $result->fetch_assoc())
		{
			
			$to_time = strtotime($row["EndDate"]);
			$from_time = strtotime($row["StartDate"]);
			$duration = round(abs($to_time - $from_time) / 60,2);

			
			echo "<tr>";
			echo "<td>".$row["ID"]."</td>";
			echo "<td>".$row["location"]."</td>";
			echo "<td>".$row["FirstName"]."</td>";
			echo "<td>".$row["LastName"]."</td>";
			echo "<td>".$row["ShortName"]."</td>";
			echo "<td>".$row["dayOrNight"]."</td>";
			echo "<td>".$row["details"]."</td>";
			
			
			echo "<td>".$row["StartDate"]."</td>";
			echo "<td>".$row["EndDate"]."</td>";
			echo "<td>".$row["comments"]."</td>";

		
		if ($duration >1){
		echo "<td>".floor($duration)."</td>";
		
		}
		else{
		echo "<td>".floor($duration)."</td>";
			
		}
		
			
		
			echo "</tr>";
    		
			}
	
		echo "</table>";
		echo "</center>";
		echo "<BR><b>Task Database (for reports) </b><BR><BR>";
	}
	else {
    		echo "No results";
	}
	
	
	
	
	
	
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
?>

</body>
</html>
