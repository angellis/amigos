<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Menu | Casa de Amigos</title>
	
<!-- Links to Google Fonts -->
<!--	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,700' rel='stylesheet' type='text/css'>-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif|Roboto" rel="stylesheet">
	
<!-- Link to Eric Meyer's Reset code from http://meyerweb.com/eric/tools/css/reset/ -->
	<link rel="stylesheet" href="css/meyerreset20.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    
<!-- Link to TouchPunch to enable touch screen touches -->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>

<!--[if lt IE 9]>
<script src="html5shiv-master/dist/html5shiv.js"></script>
<![endif]-->
</head>

<body>
  <div id="wrapper"> 

<?php include 'header.php';?>

      <main class="clearfix bgcreamlt">
		  
		  <div class="clearfix col-1-3 nopad"> 
              <div class="col-1-4 nopad col-1-4-mobile-none">&nbsp;</div>
              <aside class="col-1-2 nopad">
                  <div class="exclamation">&#161;menu!</div>

                  <ul>
                      <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">All Items</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=starters"; ?>">Starters</a></li>
                      <li><a href="<?php echo $_SERVER['PHP_SELF'] . "?category=salads"; ?>">Salads</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=burgers"; ?>">Burgers</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=sandwiches"; ?>">Sandwiches</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=mexican"; ?>">Mexican</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=steakribs"; ?>">Steak &amp; Ribs</a></li>
                      <li><a href="<?php echo "{$_SERVER['PHP_SELF']}?category=desserts"; ?>">Desserts</a></li>
                  </ul>	  
              </aside>
              <div class="col-1-4 nopad col-1-4-mobile-none">&nbsp;</div>
		  </div>		  
		  <section class="col-2-3  bgcream">

			<dl>
				<?php  
					//DISPLAYS DATA FROM DATABASE ON WESTHOST
				
				//connecting to database WORKED IN M5B_OSCARS.PHP FILE
				include 'dbconnect.php';
				
				   //begin category code
				   	if ( isset( $_GET['category'] ) ) {
					
					// category is set so load only menu items that match the category chosen. Order them alphabetically by name.
					$results = mysql_query( "SELECT * FROM menu
					
					WHERE category='{$_GET['category']}' ORDER BY name" );
					
					} else {
					
					// Category is not set so load the entire menu
					$results = mysql_query( "SELECT * FROM menu ORDER BY cat_sort, name" );
					}
				   //end category code
					

                   //DISPLAY THE RESULTS
                   //the following code adapted from http://www.tutorialspoint.com/php/mysql_select_php.htm
				
				   //variable holds name of current category. Empty "" is an empty string.
				   $current_cat = "";
				   
				   //specify field and add HTML tags
				   while($row = mysql_fetch_array($results, MYSQL_ASSOC)) {
					  
					  if ( $row['category'] != $current_cat ) {
					  	 echo "<h3>{$row['category']}</h3>";
					  	 $current_cat = $row['category'];
					  } 
				      echo "<dt> {$row['name']} </dt>".
				         "<dd> {$row['about']} &nbsp; <span class='price'>{$row['price']} </span> </dd> ";
				   }
				   
				   //USE NEXT LINE WHEN TESTING. COMMENT OUT WHEN RUNNING WELL.
				   //echo "Fetched data successfully\n";
				   
				   //CLOSE THE CONNECTION TO DATABASE
				   mysql_close($conn);
                
				?>
			</dl>
		  </section>
	  </main>
      
   <?php include 'footer.php';?>

  </div> <!-- wrapper -->
</body>
</html>