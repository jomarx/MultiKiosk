<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/submit.js"></script>
</head>
<?php

session_start();

if ($_SESSION["id"]!=""){

	header('location:home.php');

}

?>
<body>

<form action="login.php" method="post" id="myform">
<input type="text" name="userid" id="userid" placeholder="userid">

<button id="submit" >SUBMIT</button>



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
</form>

   <div id="result1"></div>
</body>
</html>