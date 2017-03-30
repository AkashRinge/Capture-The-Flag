<?php include( '../savegame.php' ); ?>
<?php
	if(isset($_POST["answer"]))
	{
		$var = $_POST["answer"];
		if($var == "quarterback")
			header("Location: ../halfcentury/nextLevel.php");
		else
			header("Location: ../loser.php");
	}
?>
<!DOCTYPE>
<html>
    <head>
        <title>Dash attract</title>
        <link rel="stylesheet" href= "../css/style.css">
        <script src="../js/callSubmit.js"></script>
    </head>
    <body>
        <center><img id = "image" src="../images/level49.jpg" /><br>
        <h1 onclick="myfunction()" style="cursor:pointer; color:white">49</h1></center>
		<script>
			function myfunction()
			{
				var answer = prompt("rtnfo");
				if(answer)
					callSubmit(answer);
				return;
			}			
		</script>
    </body>
</html>
