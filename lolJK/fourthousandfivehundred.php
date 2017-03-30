<!DOCTYPE>
<?php include( '../savegame.php' ); ?>
<?php
	if(isset($_POST["answer"]))
	{
		$var = $_POST["answer"];
		if($var == "lies")
			header("Location: anagram.php");
		else
			header("Location: ../loser.php");
	}
?>
<html>
    <head>
        <title>Upside down</title>
        <link rel="stylesheet" href= "../css/style.css">
        <script src="../js/callSubmit.js"></script>
    </head>
    <body>
        <center><img id = "image" src="../images/level48.jpeg" usemap="#myMap" /><br></center>
        <map name="myMap">
			<area shape="rect" coords="0,0,100,100" style="cursor:pointer" onclick="myfunction()">
        </map>
        
		<script>
			function myfunction()
			{
				var answer = prompt("35 33 49 37");
				if(answer)
					callSubmit(answer);
			}			
		</script>
    </body>
</html>
