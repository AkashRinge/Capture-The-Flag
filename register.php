<?php 

    
    require("common.php"); 
     
    
    if(!empty($_POST)) 
    { 
        
        if(strlen($_POST['username']) < 6 ) 
        { 
            $_SESSION['error'] = "Entered username too short";
            header("Location: register.php");
            die("Please enter a username."); 
        } 
         
    
        if(strlen($_POST['password']) < 6) 
        { 
            $_SESSION['error'] = "Entered password too short";
            header("Location: register.php");
            die("Please enter a password."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            $_SESSION['error'] = "Enter Valid Email";
            header("Location: register.php");
            die("Invalid E-Mail Address"); 
        } 

        if(strlen((string)($_POST['regno'])) <= 8 || strlen((string)($_POST['regno'])) >11 || $_POST['regno'] <0 ) 
        { 
            $_SESSION['error'] = "Entered Registration No. is wrong";
            header("Location: register.php");
            die("Please enter a password."); 
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
            $_SESSION['error'] = "An error occured. Please try again.";
            header("Location: register.php");
            die("Exception in running query");         } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            $_SESSION['error'] = "The username is already in use.";
            header("Location: register.php");
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
            $_SESSION['error'] = "An error occured. Please try again.";
            header("Location: register.php");
            die("Exception in running query");  
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            $_SESSION['error'] = "The email is already in use.";
            header("Location: register.php");
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
              
            $_SESSION['error'] = "An error occured. Please try again.";
            header("Location: register.php");
            die("Exception in running query");  
        } 
         
        $query2 = " 
            INSERT INTO data ( 
                regno,
                username, 
                name,
                email,
                phone,
                level,
                college
            ) VALUES ( 
                :regno, 
                :username, 
                :name, 
                :email,
                :phone,
                :level,
                :college 
            ) 
        ";

        $level_init = 1;

        $query_params2 = array( 
            ':regno' => $_POST['regno'], 
            ':username' => $_POST['username'], 
            ':name' => $_POST['name'], 
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone'], 
            ':level' => $level_init, 
            ':college' => $_POST['college']
        ); 

        try 
        { 
            // Execute the query to create the user 
            $stmt2 = $db->prepare($query2); 
            $result2 = $stmt2->execute($query_params2); 
        } 
        catch(PDOException $ex2) 
        { 
              
            // $_SESSION['error'] = "An error occured. Please try again.";
            // header("Location: register.php");
           // echo $ex2;
            die("Exception in running query");  
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
  padding-top: 20px;
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
h8{
    padding-left: 100px;
}
#logo
{
    float: left;
    height: 15%;
    width: auto;
}
::-webkit-input-placeholder { /* WebKit browsers */
     opacity: 100;
     color: grey;
     opacity: 1;
     font-size: 14px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>
    <body>
            <a href="login.php" class="brand-logo"><img id="logo" src="images/logo.gif" /></a>

        <div class = "container" >
            <div class = "sign-in">
                <h1 >Register</h1> 
                <h8 >
                <?php
                    if (isset($_SESSION['error']))
                    {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </h8>
                <form class = "form-signin" action="register.php" method="post"> 
                    Registration No.:<br /> 
                    <input type="number" name="regno" value="" required autofocus placeholder="College Registration Number" /> 
                    <br /><br /> 
                    Username:<br /> 
                    <input type="text" name="username" value="" required autofocus placeholder="Minimum 6 characters" /> 
                    <br /><br /> 
                    Password:<br /> 
                    <input type="password" name="password" value="" required autofocus placeholder="Minimum 6 characters" /> 
                    <br /><br /> 
                    Full Name:<br /> 
                    <input type="text" name="name" value="" required autofocus /> 
                    <br /><br /> 
                    Phone:<br /> 
                    <input type="number" name="phone" value="" required autofocus /> 
                    <br /><br /> 
                    E-Mail:<br />
                    <input type="email" name="email" value="" required autofocus/>  
                    <br /><br /> 
                    College:<br />
                    <input type="text" name="college" value="" required autofocus/>  
                    <br /><br /> 
                    <br /><br /> 
                    <button id="btnSignIn" class="waves-effect waves-light btn" type="submit">Register</button>
                    <!-- <input type="submit" value="Register" />  -->

                </form>
            </div>
            
        </div>
    </body>
</html> 
