<?php

    //inport fucntions page
    require_once 'includes/functions.php';
    // variables to store data/errors
    sess();
    $clean = array();
    $errors = array();
    //submit status
    $form_is_submitted = false;
    $errors_detected = false;

    

    //if the form has been submitted and correct
    if ($form_is_submitted == true && $errors_detected == false) {
    // delete the cookie called "logName"
    $yesterday = time() - (24 * 60 * 60);
    setcookie('logName', '', $yesterday);
    }
?>

<!-- <?php
    //start session
    session_start();
    //echo $_SESSION['name'];
    $logName = $_SESSION['name'];

?> -->
<!-- FMA Web Programming PHP (p1) -->
<!-- James Seal 13031507    2017  -->
<!DOCTYPE HTML>
<html>
<head>
    <title>Web Programming using PHP</title>
    <link rel="stylesheet" type="text/css" href="css/light.css"/>
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
	<div id="page">
    <div id="textbox">

        <?php 
            $log = "LOG OUT";
            $location = "log_off_admin.php";
            $location2 = "index.php";
            ?>

            <p>Admin : <a href="<?php echo $location?>">
                <input  type="submit"
                        name="log_out"
                        value="<?php echo $log?>"/></a></p>

            <p>Teacher : <a href="<?php echo $location?>">
                <input  type="submit"
                        name="log_out"
                        value="<?php echo $log?>"/></a></p>
       
</div>

<h1>Welcome <?php echo $_SESSION['name']; ?></h1>


            
    

      
      
  
   




















