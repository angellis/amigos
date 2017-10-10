<?php
    session_start();
        //opens session by making loggedin variable available
        //if the login info is false, go to login.php page
    if($_SESSION['loggedin'] != true ) {
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '\//');
        $extra = 'login.php';
        header( "Location: http://$host$uri/$extra");
        exit();
    }
?>


<!DOCTYPE html>
<html>
<head>
<!--    sets DTD to XHTML 1.0 strict-->
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Oscar's Admin</title>
</head>

<body>
    <h3>You are logged in to the Admin page.</h3>
      
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="admin.php">Admin</a></li>
    </ul>
          
</body>
</html>