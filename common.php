<?php 
    
    //Change the below username and password according to your mysql settings
    $username = "root"; 
    $password = "root"; 
    $host = "localhost"; 
    $dbname = "smoked"; 

    
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
     
    try 
    { 
        // opens a connection to your database using the PDO library 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        
        die("Failed to connect to the database: " . $ex->getMessage());
    } 
     
    // This configures PDO to throw an exception when it encounters 
    // an error.  This allows us to use try/catch blocks to trap database errors. 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    // This statement configures PDO to return database rows from your database using an associative 
    // array.  This means the array will have string indexes, where the string value 
    // represents the name of the column in your database. 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
     
    // This block of code is used to undo magic quotes.  Magic quotes are a terrible 
    // feature that was removed from PHP as of PHP 5.4. 
        if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
     
    header('Content-Type: text/html; charset=utf-8'); 
     
    
    session_start(); 

//common practice to not end the document with a php ending tag
