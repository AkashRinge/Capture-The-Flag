<?php 

    
    require("common.php"); 
     
    
    if(!empty($_POST)) 
    { 
        
        if(empty($_POST['username'])) 
        { 
         
            die("Please enter a username."); 
        } 
         
    
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
    
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " ); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This username is already in use"); 
        } 
        
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
         
        // A salt is randomly generated here
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
         
        // The output of this next statement is a 64 byte hex 
        // string representing the 32 byte sha256 hash of the password.
        $password = hash('sha256', $_POST['password'] . $salt); 
         
        // Next we hash the hash value 65536 more times.
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
         
        // Not Storing the original password; only the hashed version of it.  We do store the salt.
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            // Execute the query to create the user 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
              
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        
        header("Location: login.php"); 
         
        die("Redirecting to login.php"); 
    } 
     
?> 
<html>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<style>
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  font-family: "Raleway";
  color: white;
  padding-right: 520px;
  /*padding-left: 220px;*/
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
h1{
    padding-left: 100px;
}
</style>
    <body>    
        <div class = "container" >
            <div class = "sign-in">
                <h1 >Register</h1> 
                <form class = "form-signin" action="register.php" method="post"> 
                    Username:<br /> 
                    <input type="text" name="username" value="" required autofocus /> 
                    <br /><br /> 
                    E-Mail:<br /> 
                    <input type="email" name="email" value="" required autofocus /> 
                    <br /><br /> 
                    Password:<br /> 
                    <input type="password" name="password" value="" required autofocus /> 
                    <br /><br /> 
                    <button id="btnSignIn" class="waves-effect waves-light btn" type="submit">Register</button>
                    <!-- <input type="submit" value="Register" />  -->

                </form>
            </div>
            <a style="padding-left:102px" href="login.php">
                <button id="btnSignIn" class="waves-effect waves-light btn">login</button>
            </a>
        </div>
    </body>
</html> 