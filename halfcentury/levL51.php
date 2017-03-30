<!DOCTYPE>
<?php include( '../savegame.php' ); ?>
<?php
	if(isset($_POST["answer"]))
	{
		$var = $_POST["answer"];
		if($var == "ernesthemingway")
			header("Location: ../lastfolderofthegame/lastFile.php");
		else
			header("Location: ../loser.php");
	}
?>
<html>
    <head>
        <title>Artist</title>
        <link rel="stylesheet" href= "../css/style.css">
        <script src="../js/callSubmit.js"></script>
    </head>
    <body>
        <center><img id = "image" src="five.png" usemap="#myMap" /><br></center>
        <map name="myMap">
			<area shape="rect" coords="0,0,70,70" style="cursor:pointer" onclick="myfunction()">
        </map>
        
		<script>
			function myfunction()
			{
				var answer = prompt("suicide");
				if(answer)
					callSubmit(answer);
			}			
		</script>
    </body>
</html>
