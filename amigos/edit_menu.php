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
		  <h2>Edit or Delete Menu Items</h2>
          <article class="wide">
            <?php  
                //connecting to database
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

    // load the entire menu
    $sql = "SELECT * FROM menu ORDER BY cat_sort, name";
    $results = mysql_query( $sql );


            //DISPLAY THE RESULTS
            //the following code adapted from http://www.tutorialspoint.com/php/mysql_select_php.htm


               //specify field and add HTML tags
               while($row = mysql_fetch_array($results, MYSQL_ASSOC)) {
                   $name = $row['name'];
                   $category = $row['category'];
                   $id = $row['id'];
                   
                   $edit = "<a href='edit_dish.php?id=$id'>Edit</a>";
                   $delete = "<a href='delete_dish.php?id=$id'>Delete</a>";
                   
                   echo "<p class='price'>Name: $name &nbsp; &nbsp; Category: $category &nbsp; &nbsp; $edit $delete</p>";
                  
               }

               //USe NEXT LINE WHEN TESTING. COMMENT OUT WHEN RUNNING OKAY.
              //echo "Fetched data successfully\n";

               //CLOSE THE CONNECTION TO DATABASE
               //mysql_close($conn);

            ?>
		</article>		

	  </main>
		
  </div> <!-- wrapper -->
</body>
</html>