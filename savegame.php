<?php 
	
	// First we execute our common code to connection to the database and start the session
	require("common.php");
	// Require the get-level-from-url script
	require("getlevelfunction.php");


	// A simple php command to output the current URL


    $page = $_SERVER["REQUEST_URI"];
    $_SESSION['page'] = $page;
    $current_url =  "  ".$_SESSION['page'];
    echo $current_url;

    $check_flag = false;
    echo "\n\n\n\n";
    $level = getLevel($current_url);
    echo $level;


    if($_SESSION['user']==NULL) 
    { 

        header("Location: login.php"); 

        die("Redirecting to login.php"); 
    }

    else
    {
		// This query retreives the user's information from the database using 
        // their username. 
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
        echo "\n\n\n\n\n";
       	echo $level_preload['level'];
        $random_flag = true;

       	if ($level <= $level_preload['level']) {
            $random_flag = false;
        } 
        elseif( ($level - $level_preload['level'] != 1) ) 
        {
            header("Location: /index2.php");
        }
        elseif( ($level - $level_preload['level'] == 1) ) 
        {
            $query2 = " 
            UPDATE
                data 
            SET  
                level = :level 
            WHERE 
                username= :username 
            "; 
             
            // The parameter values 
            $query_params2 = array( 
                ':username' => $_SESSION['user']['username'] ,
                ':level' => $level
            ); 
             
            try 
            { 
                // Execute the query against the database 
                $stmt2 = $db->prepare($query2); 
                $result2 = $stmt2->execute($query_params2); 
            } 
            catch(PDOException $ex) 
            { 
                // Note: On a production website, you should not output $ex->getMessage(). 
                // It may provide an attacker with helpful information about your code.  
                die("Failed to run query: " ); 
            }

            
            $level_preload = $stmt->fetch();
            

        }
	 	// echo $_SESSION['user']['username'];

    }

?>