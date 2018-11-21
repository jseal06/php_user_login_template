<?php
    // Include the first block of HTML (beginning of page)
    include 'includes/header.php';
    if (!$_SESSION['data'] == 'privileged'){
    // if ($_SESSION['data'] != 'privileged') or ($_SESSION['data'] != 'teacher'){
    header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}   elseif (!$_SESSION['data'] == 'teacher'){
     header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}   // include 'includes/functions.php';
?>
<div class="nav">
    <?php
        // Include the dynamic menu script
        include 'includes/menu.php';
        //set session data
        echo "<p>".$_SESSION['name']." Thanks for logging off .</p>";
        // $_SESSION ();
        if(ini_get("session.use_cookies")){
            $yesterday = time() - (24*60*60);
            $params = session_get_cookie_params();
            setcookie(session_name(),'',$yesterday,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]);
        }
        session_destroy();
        header("Refresh:1; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/index.php");


        // $_SESSION['data']='normal';
        // $_SESSION['name']='';

        
      // $_SESSION=array();
      //   if(ini_get("session.use_cookies")){
      //       $yesterday=time()-(24*60*60);
      //       $params=session_get_cookie_params();
      //       setcookie(session_name(),'',$yesterday,
      //           $params["path"],
      //           $params["domain"],
      //           $params["secure"],
      //           $params["httponly"]);}
      //       session_destroy();
      //       header('Location: '.$_SERVER['PHP_SELF']);
      //       //Reload current (or any other) page to force PHP to generate a new SID

      //   // self refresh page

    ?>
</div>
<?php
    // Include the footer and closing body/html tags
    include 'includes/footer.php';
?>
