<?php 

    //var_dump($_SESSION['user']);
    //die();
    require("common.php"); 
    require("redirect.php");
     
    if($_SESSION['user']==NULL) 
    { 

        header("Location: login.php"); 

        die("Redirecting to login.php"); 
    } 

    $query = " 
            SELECT 
                regno,
                level 
            FROM data 
            WHERE 
                username = :username 
        "; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $_SESSION['user']['username'] 
        ); 
         
        try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " ); 
        }

        
        $level_preload = $stmt->fetch();
        //echo "\n\n\n\n\n";
        //echo $level_preload['level'];
        $redirect_url = getLevelUrl($level_preload['level']);
        $redirect_url = $redirect_url;
        //echo $redirect_url;


     
?>
<!--<br>Hello <?php //echo $_SESSION['user']['username']?></br> -->
<html>
    <head>
        <title> The real homepage</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/tidy.css">
		<link rel="stylesheet" href="css/animate.css">
        <style>
            body
            {
                overflow: hidden;
                color: white;
            }
            .header
            {
                padding: 0;
                margin: 10px;
                height: 100px;
                line-height: 40px;
            }
            .block
            {
                display: inline-block;
                height: 100px;
                width: 24%;
                background: -moz-radial-gradient(#030F11, #033141);
                border-radius: 5px;
                text-align: center;
                color: aliceblue;
            }
            .block a
            {
                text-decoration: none;
                font-family: sans-serif;
                font-size: 18;
                line-height: 100px;
                vertical-align: middle;
                color: inherit;
            }
            .block:hover
            {
                font-weight: bolder;
                color: coral;
                background: black;
            }
            .start
            {
                width: 100%;
                height: 100%;
                max-width: 25%;
                max-height: 07%;
                line-height: 200px;
                color: red;
                border-radius: 17px;
                vertical-align: middle;
                text-align: center;
                background-image: url('images/mist_smoked_crop.png'); /* Not aesthetically appealing but BIHARI approved :D */
                background-size: cover; 
                opacity: 0.8;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                margin: auto;
            }

            .start:hover
            {
            	opacity: 1.0;
            }
            #starter
            {
                text-decoration: none;
                font-family:sans-serif;
                font-size: 24;
            }
            .start:hover
            {
                color: yellow;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>
	    <div class = "container">
	        <div class="header">
	            <div class="block">
	                <a href = "index.html">Home</a>
	            </div>
	            <div class="block">
	                <a href = "rules.html">Rules/Hints</a>
	            </div>
	            <div class="block">
	                 <a href="leaderboard/leaderboard.php">Leaderboard</a>
	            </div>
	            <div class="block">
	                 <a href="logout.php">Logout</a>
	            </div>
	        </div>
	        
	        <a href="<?php echo $redirect_url?>" id="starter"><div class="start"></div></a>
	    
	    </div>



    </body>

</html>
<!-- <a href="memberlist.php">Memberlist</a><br /> 
<a href="edit_account.php">Edit Account</a><br /> 
<a href="logout.php">Logout</a> -->
