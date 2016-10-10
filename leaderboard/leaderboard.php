<?php  
     require("../common.php");

     

     $query = "SELECT username FROM data ORDER by level DESC LIMIT 10";
    
     
    
     
      $stmt = $db->prepare($query); 
      $result = $stmt->execute();
    
    
     $username = array();
     $i = 0; 
     while($row = $stmt->fetch())
     {
        $username[$i] = $row['username'];
        $i++;
     }
    
?>


<html >
  <head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
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
      <div id="decoration"></div>
      <div id="decoration2"></div>
      <div id="decoration3"></div>
      <li>
        <span class="list_num">1</span>
        <h2><?php echo $username[2] ?></h2>
      </li>
      <li>
        <span class="list_num">2</span>
        
        <h2><?php echo $username[1] ?></h2>
      </li>
      <li>
        <span class="list_num">3</span>
        <h2><?php echo $username[0] ?></h2>
      </li>
      <li>
        <span class="list_num">4</span>
        <h2><?php echo $username[3] ?></h2>
      </li>
      <li>
        <span class="list_num">5</span>
        <h2><?php echo $username[4] ?></h2>
      </li>
      <li>
        <span class="list_num">6</span>
        
        <h2><?php echo $username[5] ?></h2>
      </li>
      <li>
        <span class="list_num">7</span>
        
        <h2><?php echo $username[6] ?></h2>
      </li>
      <li>
        <span class="list_num">8</span>
        
        <h2><?php echo $username[7] ?></h2>
      </li>
      <li>
        <span class="list_num">9</span>
        
        <h2><?php echo $username[8] ?></span</h2>
      </li>
      <li>
        <span class="list_num">10</span>
        
        <h2><?php echo $username[9] ?></h2>
      </li>
    </ul>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
