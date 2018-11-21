
<?php
    // Include the first block of HTML (beginning of page)
    include 'includes/header.php';
    // include 'includes/functions.php';
?>

<div class="nav">
    <?php
        // Include the dynamic menu script
        include 'includes/menu.php';
    ?>
</div>

<h2>Teacher Login :</h2>
     
<?php
    $self = htmlentities($_SERVER['PHP_SELF']); 

    $form_is_submitted = false; 
    $errors_detected = false; 
    $CleanData = array();  
    $errors = array();     
    

    if (isset($_POST['SubmitStatus'])) { 
    
        $form_is_submitted = true;
        //username 
        if (isset($_POST['UserName'])) { 
                 $var1 = Admin2($_POST['UserName']);
                 $var2 = $var1[1];
                 // changed != so that the fucntion does the reverise and finds the adnim user name.
                if($var1){
                $html = test_input($_POST['UserName']);
                    if (validUserName($html)) {
                        $CleanData['UserName'] = $html;
                        $user1 = $html;
                    } else {
                        $errors['UserName'] = $html . 'Username is not valid.';
                    }
                } else {
                        $errors['UserName'] = 'That Username is not known please try again.';
                }
            } else {
                        $errors['UserName'] = 'not submitted.';
        }  
        //pasword
        if (isset($_POST['Password'])) { 
                 $var1 = Admin2($_POST['UserName']);
                 $var2 = newPW2($_POST['Password']);
                if($var2 && $var1){
                $html = test_input($_POST['Password']);
                    if (validPassword($html)) {
                        $CleanData['Password'] = $html;
                    } else {
                        $errors['Password'] = $html . 'Password is not valid.';
                    }
                } else {
                        $errors['Password'] = 'That Password is not known please try again.';
                }
             } else {
                    $errors['Password'] = 'not submitted.';
         } 
    } //end of validation
            
    if ($form_is_submitted === true && empty($errors)) {
        //restart session and set new data
    //        if(ini_get("session.use_cookies")){
    //         $yesterday = time() - (24*60*60);
    //         $params = session_get_cookie_params();
    //         setcookie(session_name(),'',$yesterday,
    //         $params["path"],
    //         $params["domain"],
    //         $params["secure"],
    //         $params["httponly"]);
    // }
    // session_destroy();
    session_regenerate_id(true);
    //session_start();
        $_SESSION['data']='teacher';
        $_SESSION['name']= $user1;
        echo "<p>Welcome Thanks for logging on.</p>";
    
     ?>
     <li><a href="index2.php">Lets go to the main menu</a></li><?php  PHP_EOL;
     header("Refresh:2; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/index2.php");


    } else { 
        # (re)or display form
        if (!empty($errors)) { 
            echo '<p style="color:red"> Please correct the highlighted errors below:</p>';                  
        } 
        if (isset($CleanData['UserName'])) { 
            $UserName = htmlentities($CleanData['UserName']);
        } else { 
            $UserName = '';
        }
        if (isset($CleanData['Password'])) { 
            $Password = htmlentities($CleanData['Password']);
        } else { 
            $Password = '';
        }
        if (isset($errors['UserName'])) {
            $UserNameError = htmlentities($errors['UserName']);
        } else {
            $UserNameError = '';
        }
        if (isset($errors['Password'])) {
            $PasswordError = htmlentities($errors['Password']);
        } else {
            $PasswordError = '';
        }
?>          
    <form action="<?php echo $self; ?>" method="post"> <!-- This file will receive the data; post means data will be passed to server as a seperate file -->
        <fieldset>
        <legend>Log In</legend>
            <!-- important to use meaningful names for the name tags, as they are the $_POST array keys -->
            <!-- NOTE THE ADDITION OF THE DATA ERROR VARIABLES -->
            <div>
                <label for="user">Username :</label>
                <br/>
                <input value="<?php echo $UserName ?>" 
                                type="text" 
                                name="UserName" 
                                id="user" 
                                size="20"/>
                                <?php echo '<span style="color:red">' . $UserNameError . '</span>'?>
            </div>
            <div>
                <label for="password_">Password :</label>
                <br/>
                <input value="<?php echo $Password ?>" 
                                type="password" 
                                name="Password" 
                                id="password_"
                                placeholder="1 Cap, 1 Lower, 1 No, min 8" 
                                size="40"/>
                                <?php echo '<span style="color:red">' . $PasswordError . '</span>'?>
            </div>
            <br/>
            <div>            
                <input type="submit" name="SubmitStatus" value="Submit" />
            </div>
        </fieldset>
    </form>
    <?php
    } #this closes the else (re)display php block which includes the relevant html
    ?>
<?php
    // Include the footer and closing body/html tags
    include 'includes/footer.php';
?>

