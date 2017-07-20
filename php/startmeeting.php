<html>
<?php
error_reporting(0);
session_start();

if ($_SESSION["id"]==""){

	header('location:meeting.php');

}

?>
<body>

<form action="meetingstart.php" method="POST" id="myform">

<input type="text" name="id" id="id" placeholder="Meeting ID">

<input type="text" name="name" id="name" placeholder="User ID">

<input type="submit" value="submit" name="submit" id="submit" >



</form>

<?php
if (isset($_SESSION["success"])){
echo "Success";
unset($_SESSION["success"]);

}

if (isset($_SESSION["not"])){
echo "Meeting ID or Employer ID does not match any record or already inside meeting";
unset($_SESSION["not"]);

}

?>
<br>
<a href="meetinghome.php">BACK</a>
</body>
</html>