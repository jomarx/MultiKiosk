<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/submit.js"></script>
</head>

<body>

<p>Problem type :</p>
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
<br>
<p>Cell Location</p>
<select name="location" id="location">
<option value="999">999</option>
 <!–– <option value="2">2</option> ––>
<option value="3">3</option>
 <!–– <option value="4">4</option> ––>
 <!–– <option value="5">5</option> ––>
 <!–– <option value="6">6</option> ––>
 <!–– <option value="7">7</option> ––>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
 <!–– <option value="11">11</option> ––>
<option value="12">12</option>
<option value="13">13</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
 <!–– <option value="18">18</option> ––>
 <!–– <option value="19">19</option> ––>
<option value="20">20</option>
 <!–– <option value="21">21</option> ––>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
 <!–– <option value="26">26</option> ––>
 <!–– <option value="27">27</option> ––>
<option value="28">28</option>
 <!–– <option value="29">29</option> ––>
 <!–– <option value="30">30</option> ––>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
</select>
<br><br>
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
<BR><BR>
<a href="signout.php">Exit Session</a>
</body>
</html>
