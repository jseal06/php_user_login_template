<?php
    //start session
    // session_start();

    // $_SESSION['name'] = '';
    // $_SESSION['data'] = '';
    // $logName = $_SESSION['name'];

?>
<?php
    // Include the first block of HTML (beginning of page and h1)
    include 'includes/header2.php';
    //include 'includes/functions.php';
?>
<div class="nav">
    <?php
        // Include the dynamic menu script
        include 'includes/menu.php';

       


    ?>
</div>

<div class="nav">
<?php
         
 include 'includes/content.php';

?>
</div>    
<?php
    // Include the footer and closing body/html tags
    include 'includes/footer.php';
?>
