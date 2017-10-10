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
    $id = $_GET['id'];

    if($_GET['confirm']=="yes") {
        //update record
        $name = escape_data($_POST['name']); 
        $price = escape_data($_POST['price']); 
        $about = escape_data($_POST['about']); 
        $category = escape_data($_POST['category']);
        
        $sql ="UPDATE menu SET name='$name', about='$about', category='$category', price='$price' WHERE id='$id' LIMIT 1";
        $result=mysql_query($sql);
        
        if($result) {
    ?>  
        <article>
            <h2>Thank You</h2>
            <p>Item successfully updated</p>
            <p><a href='edit_menu.php'>Return to Edit More</a></p>
        </article>
    <?php
        } else {
    ?>
        <p>Unable to update item</p>
        <p>Error: <?php echo mysql_error(); ?></p>
    <?php
        }
   } else {
        $sql="SELECT * FROM menu WHERE id='$id' LIMIT 1";
        $result = mysql_query( $sql );
        $row = mysql_fetch_array($result);
  
        $name = $row['name']; 
        $price = $row['price']; 
        $about = $row['about']; 
        $category = $row['category'];     
        $cat_array = array("starters", "salads", "sandwiches", "burgers", "mexican", "steakribs", "desserts" );
   ?> 
    <article>
     <h2>Edit Menu Item</h2>

    <form action='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>' method='post'>
        <p><label for='name'>Name </label> <br/>
            <input type='text' name='name' id='name' value='<?php echo $name; ?>'/></p>
        <p><label for='price'>Price </label> <br/>
            <input type='text' name='price' value='<?php echo $price; ?>'/></p>
        <p><label for='about'>Description </label> <br/>
            <textarea id='about' name='about'> <?php echo $about;?></textarea></p>
        <p> <label for='category'>Choose a category </label> <br/>
            <select id="category" name="category">
    <?php 
        foreach($cat_array as $cat_name) {
            if($cat_name==$category){
                echo "<option value='$cat_name' selected='selected'>$cat_name</option>";
            } else {
                echo "<option value='$cat_name'>$cat_name</option>";
            }
        }
    ?>
        </select> </p>
        <p><input type='submit' name='submit' value='Submit'/></p>
    </form>
    </article>
<?php
    }
?>
    </main>
   </div> <!-- wrapper-->

</body>
</html>
    
