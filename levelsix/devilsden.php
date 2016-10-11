<!DOCTYPE>
<?php include( '../savegame.php' ); ?>
<html>
    <head>
        <title>Where he lives 3:)</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center><img id = "image" src="level8.jpeg" usemap="#myMap" /></center>
        <map name="myMap">
			
        <area shape="rect" coords="329,7,381,57" onmouseover="alert('1 out of 4')">
        <area shape="rect" coords="89,2,151,49" onmouseover="alert('4 out of 4')" >
        <area shape="rect" coords="227,66,292,110" onmouseover="alert('3 out of 4')">
        <area shape="rect" coords="106,319,168,359" onmouseover="alert('2 out of 4')">
        </map>

        <style>
            div
            {
                width: 30px;
                height: 30px;
                position: absolute;
            }
        </style>
        
    </body>
</html>
