

<?php
    if (isset( $_POST['submit'] ) ) {
        $u = $_POST['username'];
        $p= $_POST['password'];
        if( $u == "milo" && $p == "cute") {
            //if those match, create a session called loggedin and make it true.
            session_start();
            $_SESSION['loggedin'] = true;
            header ( "Location: admin.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!--    sets DTD to XHTML 1.0 strict-->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 	<meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login | Casa de Amigos</title>
	
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

            <div>
              <div class="loginnav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_dish_form.php">add to menu</a></li>
                    <li><a href="edit_menu.php">edit menu</a></li>
                    <li><a href="login.php">login</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
              </div>
            </div>

         <main class="clearfix">
             
           <article>
                
                <h3>Login</h3>
                
                <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'> 
                    <!--post method keeps password from appearing in address bar of browser-->
                <p><label for='username'>Username</label>
                    <input type='text' name='username' /></p>
               <p><label for='password'>Password&nbsp;</label>
                   <input type='password' name='password'/>
                  </p> <br>
                <p><input type='submit' name='submit' value='Login'/></p>
                </form>

            </article>

	  </main>
         
    <?php include 'footer.php';?>

  </div> <!-- wrapper -->     
</body>
</html>