<?php


error_reporting(0);
include("config.php");
session_start();
$userid=$_SESSION["id"];

$sql1 = "UPDATE mech_db set status='0' where empID='$userid'";

if ($conn->query($sql1) === TRUE) {

session_destroy();
	?>
<script>

window.location.replace("index.php");

</script>
<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>