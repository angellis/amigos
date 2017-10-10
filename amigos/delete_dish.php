<?php
//checks if loggedin, if not goes to login pg
    require("pass.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>
	
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
            //grabs id from previous page's url seen when hover over delete button
            $id = $_GET['id'];
            
                //isset checks to see if the variable is set
            if( isset ( $_GET['confirm'] ) and $_GET['confirm'] == "yes" ) {
                
                //delete record from table where id matches $id
                require(dbconnect.php);
                
                $sql = "DELETE FROM menu WHERE id='$id' LIMIT 1";
                $result = mysql_query( $sql );
                
                if( $result === TRUE) {
        ?>
          
          <p>Item deleted successfully</p>
          <p><a href='edit_menu.php'>Return to Edit</a></p>
          
          <?php
                
                } else if ($result === FALSE) {
         ?>
        
          <p>Unable to delete item</p>
          <p>Error: <?php echo mysql_error(); ?></p>
          
          <?php
            }
            
            } else {
                
          ?> 
          <article>
            <h2>Please Confirm</h2>
            <p>Do you want to delete this item? &nbsp;
            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>'>Yes</a> &nbsp;  
            <a href='edit_menu.php'>No</a></p>
          </article>
          
          <?php
            }
        ?>


	  </main>
		
  </div> <!-- wrapper -->
</body>
</html>