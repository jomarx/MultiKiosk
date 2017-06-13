<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/submit.js"></script>
</head>

<body>

<form action="report.php" method="post" id="myform">

<select name="mbcode" id="mbcode">
<?php

include("config.php");
$sql = "SELECT * FROM mbcode_db";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){ 

?>
 <option value="<?php echo $row["id"] ?>"><?php echo $row["details"] ?></option>

<?php

}


?>



</select>

<select name="location" id="location">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>

<button name="submit" id="submit" >SUBMIT</button>

<script>

$('#myform').submit(function(){
 return false;
});
 
$('#submit').click(function(){


 $.post( 
 $('#myform').attr('action'),
 $('#myform :input').serializeArray(),
 function(result){
 $('#result1').html(result);
 }
 );

 
});

</script>
 

 <p class="alert alert-success" id='result1'></p>



</form>

<a href="home.php">back</a>
</body>
</html>