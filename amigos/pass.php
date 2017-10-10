<?php
//checks if loggedin, if not goes to login pg
    session_start();
    if( $_SESSION['loggedin'] != true ) {
        header("Location: login.php");
        exit();
    }
?>
