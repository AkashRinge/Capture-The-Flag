<?php
	$dsn = "mysql:host=localhost;dbname=smoked";
    try{
        $db = new PDO($dsn, "root", "root");                
        // $db = new PDO($dsn, "root", "");              
    }
    catch(Exception $e){
     die($e->getMessage());
    }
    include "js/getlevelfunction.php"
?>
<?php
	if(! $db ) {
      die('Could not connect: ' . mysql_error());
   }
   
	if(isset($_POST["btnsubmit"]) && $_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST["f1-first-name"]." ".$_POST["f1-last-name"];
		$email = $_POST["f1-email"];
		$regno = $_POST["f1-numberR"];
		$phone = $_POST["f1-numberP"];
		
		$linkname = $_POST["f1-link"];
		$level = getLevel($linkname);
		
		$SQL = "select count(*) from data where regno = '$regno'";
		$count = $db->query($SQL)->fetch()[0];
		
		if($count == 1)
		{
			$SQL = "update data set name = '$name', email = '$email', phone = '$phone', level = $level where regno = '$regno'";
			$result = $db->query($SQL);
		}
		else
		{
			$SQL = "insert into data(regno, name, email, phone, level) values ('$regno', '$name', '$email', '$phone', $level)";
			$result = $db->query($SQL);
		}
		
		header('Location: success.php');
		die();
	}

?>
<!DOCTYPE>
<html>
	<head><title>Update Progress</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link type="text/css" href="css/style.css" rel="stylesheet">
        <link type="text/css" href="css/style3.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/form-elements.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
			function validateNumber(event) {
				var key = window.event ? event.keyCode : event.which;

				if (event.keyCode === 8 || event.keyCode === 46
				 || event.keyCode === 37 || event.keyCode === 39) {
					return true;
				}
				else if ( key < 48 || key > 57 ) {
					return false;
				}
				else return true;
			};
			
			$(document).ready(function(){
				$('[id^=f1-number]').keypress(validateNumber);
			});
        </script>
        </head>
        <style>
        .navbar
        {
            background: -moz-radial-gradient(#030F11, #033141);
            color: white;
            text-align: center;
            border-color: #033141;
            margin-bottom: 0;
        }
        #logo
        {
            float: left;
            height: 15%;
            width: auto;
        }
        h1
        {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 50px;
            text-align: center;
            color: darkgrey;
        } 
        </style>
        <body>
			<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <a href="index2.html"><img id="logo" src="images/logo.gif" /></a>
                <h1 style="font-family: 'Ubuntu', sans-serif; font-weight: bold; color: white">Update Progress</h1></div>
            </nav>
      
            
            <div class=container>
            <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" class="f1">

                    		<h3>Register To Update your Progress</h3>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>about</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-key"></i></div>
                    				<p>account</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                    				<p>level link</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Tell us who you are:</h4>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">First name</label>
                                    <input type="text" name="f1-first-name" placeholder="First name..." class="f1-first-name form-control" id="f1-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Last name</label>
                                    <input type="text" name="f1-last-name" placeholder="Last name..." class="f1-last-name form-control" id="f1-last-name">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Set up your participation:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email</label>
                                    <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-numberR">Registration number</label>
                                    <input type="text" name="f1-numberR" placeholder="Registration number..." class="f1-email form-control" id="f1-numberR">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-numberP">Phone number</label>
                                    <input type="text" name="f1-numberP" placeholder="Phone number (Add a 0 before)..." class="f1-email form-control" id="f1-numberP">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Enter the link of the last level you've reached</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-link">Enter here</label>
                                    <input type="text" name="f1-link" placeholder="Link..." class="f1-facebook form-control" id="f1-link">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                    	
                    	</form>
                    </div>
                </div>
              </div>
         <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/retina-1.1.0.min.js"></script>
        <script src="js/scripts.js"></script>
                
        </body>      
</html>
