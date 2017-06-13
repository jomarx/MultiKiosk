<?php


error_reporting(0);
include("config.php");
$mbcode=$_POST["mbcode"];
$location=$_POST["location"];

$date=date("Y-m-d H:i:s");
session_start();
$id=$_SESSION["id"];

$sql1 = "INSERT INTO task_db (EmpNo,location,recorded,details)
VALUES ('$id','$location','$date','$mbcode')";

if ($conn->query($sql1) === TRUE) {
//header("location:home.php");
echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();




?>