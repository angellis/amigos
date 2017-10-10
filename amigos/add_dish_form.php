<?php
//checks if loggedin, if not goes to login pg
    require("pass.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Oscar's Admin Page</title>
	
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


<?php
    if ( isset( $_POST['submit'])) {

    require("dbconnect.php");
    
    //THIS IS A CRITICAL PHASE OF ACCEPTING DATA INTO A DATABASE
    //HACKERS CAN SEND IN VIRUSES WITHOUT IT
    function escape_data( $data ) {
        
        //if magic quotes is turned on with host, remove slashes it added
        if (ini_get( 'magic_quotes_gpc')) {
            $data = stripslashes($data);
        }
        //if data's not a number, this escapes the string properly
        if (!is_numeric($data)) {
            $data = mysql_real_escape_string( $data );
        }
        //returns the properly escaped string
        return $data;
    }
    
    //run all data collected through the above function
    $name = escape_data($_POST['name'] ); 
    $price = escape_data($_POST['price'] ); 
    $about = escape_data($_POST['about'] ); 
    $category = escape_data($_POST['category'] );
    


    $sql = "INSERT INTO menu ( id, name, price, about, category ) VALUES ( '', '$name', '$price', '$about', '$category');";

    $result = mysql_query( $sql );

        //the following code informs the user if their data entry succeeded.
    if ( $result ) {

    ?>
<!--    close php and write normal html-->
    <p class="price"> The menu table has been submitted successfully.</p>
    
<?php
    
    } else {
?>
    <p> There has been an error updating the menu table. Contact your web developer with the following error code:</p> <p><?php echo mysql_error(); ?> </p>
    
<?php
    }

    } else {
?>
    <article>
        <h2>Add Menu Item</h2>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
        <p><label for='name'>Name </label> <br/>
            <input type='text' name='name' id='name'/></p>
        <p><label for='price'>Price </label> <br/>
            <input type='text' name='price'/></p>
        <p><label for='about'>Description </label> <br/>
            <textarea name='about' placeholder='Type the description of the new dish here.'></textarea></p>
        <p><label for='category'>Choose a category </label> <br/>
          <select name="category">
            <option value="starters">Starters</option>
            <option value="salads">Salads</option>
            <option value="burgers">Burgers</option>
            <option value="sandwiches">Sandwiches</option>
            <option value="mexican">Mexican</option>
            <option value="steakribs">Steak & Ribs</option>
            <option value="desserts">Desserts</option>
        </select>
            </p>
        <p><input type='submit' name='submit' value='Submit'/></p>
    </form>
    </article>
<?php
    }
?>
      </main>
  </div> <!--wrapper-->
</body>
</html>
    
