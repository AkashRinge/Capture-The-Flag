<!DOCTYPE>
<?php include( '../savegame.php' ); ?>
<?php
	if(isset($_POST["answer"]))
	{
		$var = $_POST["answer"];
		if($var == "pneumonoultramicroscopicsilicovolcanoconiosis")
			header("Location: levL51.php");
		else
			header("Location: ../loser.php");
	}
?>
<html>
    <head>
        <title>loooooooong</title>
        <link rel="stylesheet" href= "../css/style.css">
        <script src="../js/callSubmit.js"></script>
    </head>
    <body>
        <center><img id = "image" src="../images/lungdisease.jpg" usemap="#myMap" /><br></center>
        <map name="myMap">
			<area shape="rect" coords="0,0,70,70" style="cursor:pointer" onclick="myfunction()">
        </map>
        
		<script>
			function myfunction()
			{
				var answer = prompt("3 x 10 + 5 - 2 + 3 x 4 ");
				if(answer)
					callSubmit(answer);
				return;
			}			
		</script>
    </body>
</html>
