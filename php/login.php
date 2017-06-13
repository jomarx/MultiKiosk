<?php


error_reporting(0);
include("config.php");
$userid=$_POST["userid"];
session_start();


$sql = "SELECT * FROM mech_db where empID='$userid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 

if ($result->num_rows > 0) {

$sql1 = "UPDATE mech_db set status='1' where empID='$userid'";

if ($conn->query($sql1) === TRUE) {


	$_SESSION["id"]=$userid;
	?>
<script>

window.location.replace("home.php");

</script>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
else{

	echo "User not found";
}


?>