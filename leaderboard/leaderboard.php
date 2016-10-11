<?php  
     require("../common.php");

     

     $query = "SELECT username FROM data ORDER by level DESC LIMIT 10";
    
     
    
     
      $stmt = $db->prepare($query); 
      $result = $stmt->execute();
    
    
     $username = array();
     while($row = $stmt->fetch())
     {
        $username[] = $row['username'];
     }
    
?>
<!-- 
I see you are a nosy little prick. Looking at other people's source code huh ? 
 ________  ________  ________  _____ ______   ___  ________  ___  ___          ________  ________      ___    ___ ________           ___  ___  ___     
|\   __  \|\   __  \|\   __  \|\   _ \  _   \|\  \|\   ____\|\  \|\  \        |\   ____\|\   __  \    |\  \  /  /|\   ____\         |\  \|\  \|\  \    
\ \  \|\  \ \  \|\  \ \  \|\  \ \  \\\__\ \  \ \  \ \  \___|\ \  \\\  \       \ \  \___|\ \  \|\  \   \ \  \/  / | \  \___|_        \ \  \\\  \ \  \   
 \ \   _  _\ \   __  \ \   __  \ \  \\|__| \  \ \  \ \_____  \ \   __  \       \ \_____  \ \   __  \   \ \    / / \ \_____  \        \ \   __  \ \  \  
  \ \  \\  \\ \  \ \  \ \  \ \  \ \  \    \ \  \ \  \|____|\  \ \  \ \  \       \|____|\  \ \  \ \  \   \/  /  /   \|____|\  \        \ \  \ \  \ \  \ 
   \ \__\\ _\\ \__\ \__\ \__\ \__\ \__\    \ \__\ \__\____\_\  \ \__\ \__\        ____\_\  \ \__\ \__\__/  / /       ____\_\  \        \ \__\ \__\ \__\
    \|__|\|__|\|__|\|__|\|__|\|__|\|__|     \|__|\|__|\_________\|__|\|__|       |\_________\|__|\|__|\___/ /       |\_________\        \|__|\|__|\|__|
                                                     \|_________|                \|_________|        \|___|/        \|_________|                       
                                                                                                                                                       
                                                                                                                                                       
 ___  ________  ___  ___  ________  ________           ___  ________           ___  ___  ___  ________  ___  ___                                       
|\  \|\   ____\|\  \|\  \|\   __  \|\   ___  \        |\  \|\   ____\         |\  \|\  \|\  \|\   ____\|\  \|\  \                                      
\ \  \ \  \___|\ \  \\\  \ \  \|\  \ \  \\ \  \       \ \  \ \  \___|_        \ \  \\\  \ \  \ \  \___|\ \  \\\  \                                     
 \ \  \ \_____  \ \   __  \ \   __  \ \  \\ \  \       \ \  \ \_____  \        \ \   __  \ \  \ \  \  __\ \   __  \                                    
  \ \  \|____|\  \ \  \ \  \ \  \ \  \ \  \\ \  \       \ \  \|____|\  \        \ \  \ \  \ \  \ \  \|\  \ \  \ \  \                                   
   \ \__\____\_\  \ \__\ \__\ \__\ \__\ \__\\ \__\       \ \__\____\_\  \        \ \__\ \__\ \__\ \_______\ \__\ \__\                                  
    \|__|\_________\|__|\|__|\|__|\|__|\|__| \|__|        \|__|\_________\        \|__|\|__|\|__|\|_______|\|__|\|__|                                  
        \|_________|                                          \|_________|                                                                             
                                                                                                                                                       
                                                                                                                                                    
psssst , zooming out might help



 -->

<html >
  <head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style >
      body {
        color: black;
      }
    </style>
    
    
    
    
  </head>

  <body>
      <!-- starts here -->  
    <div class="table">
    <div class="table-cell">
    <ul class="leader">
      <!--<div id="decoration"></div>
      <div id="decoration2"></div>
      <div id="decoration3"></div>-->
      
      <?php 
			for($i=0; $i<sizeOf($username); $i++)
			{
				echo '<li>
        <span class="list_num">'.($i+1).'</span>
        <h2>';
			echo $username[$i];
        echo '</h2>
      </li>';
      }
		?>
    </ul>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		var v;
		$(function() {
				$("li").hover(function()
				{
					var myvar = this;
					v = setTimeout(function(){
					$(myvar).animate({
							backgroundColor: "#b3b3b3",
							color: "#515151"
						}, 300)
					}, 150);
				}, function()
				{
					clearTimeout(v);
					$(this).animate({
					  backgroundColor: "#fff",
					  color: "#000"
					}, 300);
				});
			});
	</script>

	<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
		<script src="js/index.js"></script> -->

    
    
  </body>
</html>
