<?php
    session_start();
    if($_SESSION['loggedin'] != true ) {
        header( "Location: login.php" );
        exit();
    } else {
            //end the session
        session_destroy();
            //delete the session cookie
        setcookie( session_name(), '', time() -4200, '/' );
    }
?>


<!DOCTYPE html>
<html>
<head>
<!--    sets DTD to XHTML 1.0 strict-->
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 	<meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Oscar's Logged Out</title>
	
<!-- Links to Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700' rel='stylesheet' type='text/css'>
	
<!-- Link to Eric Meyer's Reset code from http://meyerweb.com/eric/tools/css/reset/ -->
	<link rel="stylesheet" href="css/meyerreset20.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    
<!-- Link to TouchPunch to enable touch screen touches -->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
	<script src="jquery.ui.touch-punch.min.js"></script>

<!--[if lt IE 9]>
<script src="html5shiv-master/dist/html5shiv.js"></script>
<![endif]-->
</head>

<body>
     <div id="wrapper"> 
        
     <?php include 'header.php';?>

	  <main class="clearfix">
                  
                <h2>You are all logged out. Thanks for playing.</h2>

         </main>
    </div>      
</body>
</html>