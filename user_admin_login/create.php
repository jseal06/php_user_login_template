
<?php
    // Include the first block of HTML (beginning of page)
    include 'includes/header.php';
    if (!$_SESSION['data'] == 'privileged'){
    // if ($_SESSION['data'] != 'privileged') or ($_SESSION['data'] != 'teacher'){
    header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}   elseif (!$_SESSION['data'] == 'teacher'){
     header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}  // include 'includes/functions.php';
?>
<div class="nav">
    <?php
        // Include the dynamic menu script
        include 'includes/menu.php';
    ?>
</div>

<h2>Create a new user:</h2>

<?php
    $self = htmlentities($_SERVER['PHP_SELF']); 

    $form_is_submitted = false; 
    $errors_detected = false; 
    $CleanData = array();  
    $errors = array();     
    
    if (isset($_POST['SubmitStatus'])) { 
    
        $form_is_submitted = true;

        if (isset($_POST['UserName'])) { 
             $var1 = Admin1($_POST['UserName']);
            if(!$var1){
            $html = test_input($_POST['UserName']);
                if (validUserName($html)) {
                    $CleanData['UserName'] = $html;
                } else {
                    $errors['UserName'] = $html . 'Username is not valid.';
                }
            } else {
                    $errors['UserName'] = 'User name taken please try another.';
            }
        } else {
            $errors['UserName'] = 'not submitted.';
        }
        if (isset($_POST['UserTitle'])) { 
            $html = test_input($_POST['UserTitle']);
            if (validUserTitle($html)) {
                $CleanData['UserTitle'] = $html;
            } else {
                $errors['UserTitle'] = $html . 'User Title is not valid.';
            }
        } else {
                $errors['UserTitle'] = 'not submitted.';
        }
        if (isset($_POST['FirstName'])) { 
            $html = test_input($_POST['FirstName']);
            if (validFirstName($html)) {
                $CleanData['FirstName'] = $html;
            } else {
                $errors['FirstName'] = $html . 'First name is not valid.';
            }
        } else {
                $errors['FirstName'] = 'not submitted.';
        }
        if (isset($_POST['surName'])) { 
            $html = test_input($_POST['surName']);
            if (validSurName($html)) {
                $CleanData['surName'] = $html;
            } else {
                $errors['surName'] = $html . 'surname is not valid.';
            }
        } else {
                $errors['surName'] = 'not submitted.';
        }       
        if (isset($_POST['userEmail'])) { 
            $trimmed = trim($_POST['userEmail']);
            $html = htmlentities($trimmed);
            if (validEmail($html)) {
                $CleanData['userEmail'] = $html;
            } else {
                $errors['userEmail'] = $html . ' is not valid.';
            }
        } else {
                $errors['userEmail'] = 'not submitted.';
        }
        if (isset($_POST['Password'])) { 
            $html = test_input($_POST['Password']);
            if (validPassword($html)) {
                $CleanData['Password'] = $html;
            } else {
                $errors['Password'] = $html . ' Password is not valid.';
            }
        } else {
                $errors['Password'] = 'not submitted.';
        }
        if (isset($_POST['ReadTerms'])) { 
            $trimmed = trim($_POST['ReadTerms']);
            $html = htmlentities($trimmed);
            if (validTerms($html)) {
                $CleanData['ReadTerms'] = $html;
            } else {
                $errors['ReadTerms'] = $html . ' is not valid.';
            }
        } else {
                $errors['ReadTerms'] = 'not submitted';
        }
    } #end of code to validate submitted data
    
    #this section of code is responsible for processing clean or invalid data               
    if ($form_is_submitted === true && empty($errors)) {
    # Valid submission THEN process the valid data
        echo '<p>Thank you for submitting a new Teacher</p>';
        
        //delete the comment tags below to view the information when submitting
        //echo '<pre>',print_r($_POST),'</pre>';

        newUser();

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
        if (isset($CleanData['UserTitle'])) { 
            $UserTitle = htmlentities($CleanData['UserTitle']);
        } else { 
            $UserTitle = '';
        }

        if (isset($CleanData['FirstName'])) { 
            $FirstName = htmlentities($CleanData['FirstName']);
        } else { 
            $FirstName = '';
        }

         if (isset($CleanData['surName'])) {
            $surName = htmlentities($CleanData['surName']);
        } else { 
            $surName = '';
        }

        if (isset($CleanData['userEmail'])) { 
            $userEmail = htmlentities($CleanData['userEmail']);
        } else { 
            $userEmail = '';
        }
        if (isset($CleanData['Password'])) { 
            $Password = htmlentities($CleanData['Password']);
        } else { 
            $Password = '';
        }
        
        if (isset($CleanData['DataFormat'])) { 
            $UserDataFormat = htmlentities($CleanData['DataFormat']);
        } else { 
            $UserDataFormat = '';
        }
        
        if (isset($CleanData['ReadTerms'])) { 
            $UserReadTerms = htmlentities($CleanData['ReadTerms']);
        } else { 
            $UserReadTerms = '';
        }
        
        //erroe section make null if error for user to re enter data
        if (isset($errors['UserName'])) {
            $UserNameError = htmlentities($errors['UserName']);
        } else {
            $UserNameError = '';
        }
        if (isset($errors['UserTitle'])) {
            $UserTitleError = htmlentities($errors['UserTitle']);
        } else {
            $UserTitleError = '';
        }
        if (isset($errors['FirstName'])) {
            $FirstNameError = htmlentities($errors['FirstName']);
        } else {
            $FirstNameError = '';
        }
        if (isset($errors['surName'])) {
            $surNameError = htmlentities($errors['surName']);
        } else {
            $surNameError = '';
        }
        if (isset($errors['userEmail'])) {
            $userEmailError = htmlentities($errors['userEmail']);
        } else {
            $userEmailError = '';
        }
        if (isset($errors['Password'])) {
            $PasswordError = htmlentities($errors['Password']);
        } else {
            $PasswordError = '';
        }
        
        if (isset($errors['ReadTerms'])) {
            $ReadTermsError = htmlentities($errors['ReadTerms']);
        } else {
            $ReadTermsError = '';
        }
        
?>        
<form action="<?php echo $self; ?>" method="post"> 
<fieldset>
<legend>Sign Up</legend>
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
    <div>
        <label for="UserTitle">Title :</label>
        <br/>
        <input value="<?php echo $UserTitle ?>" 
                        type="text" 
                        name="UserTitle" 
                        id="UserTitle" 
                        placeholder="Mr/Mrs/Miss/Dr"
                        size="20"/>
                        <?php echo '<span style="color:red">' . $UserTitleError . '</span>'?>
    </div>                    
    <div>
        <label for="first_name">First Name :</label>
        <br/>
        <input value="<?php echo $FirstName ?>" 
                        type="text" 
                        name="FirstName" 
                        id="first_name" 
                        size="20"/>
                        <?php echo '<span style="color:red">' . $FirstNameError . '</span>'?>
    </div>
    <div>
        <label for="sur_name">Surname :</label>
        <br/>
        <input value="<?php echo $surName ?>" 
                        type="text" 
                        name="surName" 
                        id="sur_name" 
                        size="20"/>
                        <?php echo '<span style="color:red">' . $surNameError . '</span>'?>
    </div>
    <div>            
        <label for="email">Email :</label>
        <br/>
        <input value="<?php echo $userEmail ?>" 
                        type="text" 
                        name="userEmail" 
                        id="email" size="40"/>
                        <?php echo '<span style="color:red">' . $userEmailError . '</span>'?>
    </div>
    <br/>
    <div>
        <!-- the php here leaves the previous checkbox option selected if the form is redisplayed -->
        <input  type="checkbox" 
                name="ReadTerms" 
                id="terms" 
                value="yes">
                <?php   if($UserReadTerms == 'yes'){    
                            echo(" checked");
                        }?>
        <label for="terms">Is the above information correct?</label>
        <?php echo '<span style="color:red">' . $ReadTermsError . '</span>'?>
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

