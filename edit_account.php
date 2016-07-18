<?php 


    require("common.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 

    //submitting the edit form
    if(!empty($_POST)) 
    { 
        
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        //checking for conflict of new email with old one
        if($_POST['email'] != $_SESSION['user']['email']) 
        { 
            
            $query = " 
                SELECT 1 
                FROM users 
                WHERE 
                email = :email 
            "; 
             
            
            $query_params = array( 
                ':email' => $_POST['email'] 
            ); 
             
            try 
            { 
                // query execution 
                $stmt = $db->prepare($query); 
                $result = $stmt->execute($query_params); 
            } 
            catch(PDOException $ex) 
            { 

                die("Failed to run query: " ); 
            } 
             
            // Retrieve results (if any) 
            $row = $stmt->fetch(); 
            if($row) 
            { 
                die("This E-Mail address is already in use"); 
            } 
        } 
         
       //new password hashing 
        if(!empty($_POST['password'])) 
        { 
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
            $password = hash('sha256', $_POST['password'] . $salt); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $password = hash('sha256', $password . $salt); 
            } 
        } 
        else 
        { 
            //reverting back to old password if no new password
            $password = null; 
            $salt = null; 
        } 
         
       
        $query_params = array( 
            ':email' => $_POST['email'], 
            ':user_id' => $_SESSION['user']['id'], 
        ); 
         
 		//if new password 
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            $query_params[':salt'] = $salt; 
        } 
         
        //  We will dynamically construct the rest of the query depending on whether or not the user is changing heir password. 
        $query = " 
            UPDATE users 
            SET 
                email = :email 
        "; 
         
        //extending the query
        if($password !== null) 
        { 
            $query .= " 
                , password = :password 
                , salt = :salt 
            "; 
        } 
         
        $query .= " 
            WHERE 
                id = :user_id 
        "; 
         
        try 
        { 
            //query execution
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            
            die("Failed to run query: " ); 
        } 
         
        //updateing session
        $_SESSION['user']['email'] = $_POST['email']; 
         
        header("Location: index2.html"); 
         
        die("Redirecting to index2.html"); 
    } 
     
?> 
<h1>Edit Account</h1> 
<form action="edit_account.php" method="post"> 
    Username:<br /> 
    <b><?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></b> 
    <br /><br /> 
    E-Mail Address:<br /> 
    <input type="text" name="email" value="<?php echo htmlentities($_SESSION['user']['email'], ENT_QUOTES, 'UTF-8'); ?>" /> 
    <br /><br /> 
    Password:<br /> 
    <input type="password" name="password" value="" /><br /> 
    <i>(leave blank if you do not want to change your password)</i> 
    <br /><br /> 
    <input type="submit" value="Update Account" /> 
</form>