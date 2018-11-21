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
<h2>Admin Login :</h2>
<?php
    $self = htmlentities($_SERVER['PHP_SELF']); 
    //arrays for the errors and clean data
    $form_is_submitted = false; 
    $errors_detected = false; 
    $CleanData = array();  
    $errors = array();     

    if (isset($_POST['SubmitStatus'])) { 
        //form status
        $form_is_submitted = true;
        //if statments for form
        if (isset($_POST['UserName'])) { 
            $admin1 = Admin1($_POST['UserName']);
            if($admin1){
                $html = test_input($_POST['UserName']);
                if (validUserName($html)) {
                    $CleanData['UserName'] = $html;
                    $user1 = $html;
                    $_SESSION['data'] = 'privileged';
                } else {
                    $errors['UserName'] = $html . 'Username is not valid.';
                }
            } else {
                    $errors['UserName'] = 'That Username is not known please try again.';
            }
        } else {
                    $errors['UserName'] = 'not submitted.';
        }
    //if (isset($_POST['Password']) && ($user1 == $admin[1])) {
        if (isset($_POST['Password'])) { 
            // echo $admin1[1];
            if ($admin1[1] == $_POST['Password']){
                $html = test_input($_POST['Password']);
                if (validPassword($html)) {
                    $CleanData['Password'] = $html;
                } else {
                    $errors['Password'] = $html . 'Password is not valid.';
                }
            } else {
                $errors['Password'] = $html . 'Password is not valid.';
            }
        } else {
                    $errors['Password'] = 'Password does not match.';
        }
    } #end of code to validate submitted data

    #this section of code is responsible for processing clean or invalid data               
if ($form_is_submitted === true && empty($errors)) {
    // set new session id
    //session_regenerate_id(true);// Store data against new session ID
    session_regenerate_id(true);
    // session_start();
    //  if(ini_get("session.use_cookies")){
    //         $yesterday = time() - (24*60*60);
    //         $params = session_get_cookie_params();
    //         setcookie(session_name(),'',$yesterday,
    //         $params["path"],
    //         $params["domain"],
    //         $params["secure"],
    //         $params["httponly"]);
    // }
    // session_destroy();
    // session_start();
    $_SESSION['data']='privileged';
    $_SESSION['name']= $user1;
    echo "<p>Welcome Thanks for logging on.</p>";
    
     ?>
     <li><a href="index2.php">Lets go to the untranet main menu</a></li><?php  PHP_EOL;
     header("Refresh:2; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/index2.php");






    } else { 
        # (re)or display form
        if (!empty($errors)) { #errors in the errors() arrary
            echo '<p style="color:red"> Please correct the highlighted errors below:</p>';                  
        } 
        //if not cleanData make null ready for re enter from the user
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
<!-- redisplying the form use self method-->
<form action="<?php echo $self; ?>" method="post"> <!-- This file will receive the data; post means data will be passed to server as a seperate file -->
    <fieldset>
    <legend>Log in : </legend>
        <!-- important to use meaningful names for the name tags, as they are the $_POST array keys -->
        <!-- NOTE THE ADDITION OF THE DATA ERROR VARIABLES -->
        <div>
            <label for="user">Username :</label>
            <br/>
            <input value="Admin" 
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
} // close of else for redisplay
?>

<?php
    // Include the footer and closing body/html tags
    include 'includes/footer.php';
?>

