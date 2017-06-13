<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/submit.js"></script>
</head>
<?php

session_start();

if ($_SESSION["id"]==""){

	header('location:index.php');

}

?>
<body>

<a href="#">Kaizen</a>
<a href="#">Near Miss Reporting</a>
<a href="reportproblem.php">Sewing Problem Reporting</a>

<?php


error_reporting(0);
include("config.php");


$userid=$_SESSION["id"];





$sql = "SELECT * FROM mech_db where empID='$userid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 
if ($result->num_rows > 0) {

	if ($row["status"]=='1'){

		?>

<a href="breakstart.php">breakstart</a>
		<?php

	}
	else if ($row["status"]=='2'){
		?>

<a href="breakend.php">breakend</a>
		<?php


	}

}



?>


<a href="logout.php">Logout</a>



</body>
</html>