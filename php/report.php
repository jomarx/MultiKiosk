<?php


error_reporting(0);
include("config.php");
$mbcode=$_POST["mbcode"];
$location=$_POST["location"];

$date=date("Y-m-d H:i:s");
session_start();
$id=$_SESSION["id"];

$sql1 = "INSERT INTO task_db (EmpNo,BreakStartTime,location,recorded,details,Status,StartDate)
VALUES ('$id','$date','$location','$date','$mbcode','0',(now()))";

if ($conn->query($sql1) === TRUE) {
//header("location:home.php");
echo "Report Successfully submitted! ";
sleep(1);
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
