<?php        
    // The pages of the website. 
    // added pages from normal browsing for diffrent admin and teachers.
    //for a normal user
    $pages = array(
        'index.php' => 'Home'
    );
    //meanu for admin
    $adminPages = array(
        'index2.php' => 'Home',
        //if logged in as admin show these
        'database.php' => 'Database Results',
        'programming.php' => 'Programming Results',
        'psp.php' => 'Problem Solving Results',
        'create.php' => 'Add User'
        //if logged in as adim show all and :
        //create new user area...
    );
    //menu for a teacher
    $teachers = array(
        'index2.php' => 'Home',
        //if logged in as teacher show these
        'database.php' => 'Database Results',
        'programming.php' => 'Programming Results',
        'psp.php' => 'Problem Solving Results'
    );
    // html menu for the top menu bar in a foreach loop
    $menu = '<ul>' . PHP_EOL;
    if ($_SESSION['data'] == 'privileged'){
        //for each loop to display each meanu for the correct login
        foreach ($adminPages as $url => $title) {
            $menu .= '<li><a href="' . $url . '">' . $title . '</a></li>' . PHP_EOL;
        }
        $menu .= '</ul>' . PHP_EOL;
        echo $menu;
        ?>
        <br/>
        <li><a href="contactUs.php">Contact Us</a></li><?php  PHP_EOL;
    } elseif ($_SESSION['data'] == 'teacher'){
            foreach ($teachers as $url => $title) {
            $menu .= '<li><a href="' . $url . '">' . $title . '</a></li>' . PHP_EOL;
        }
        $menu .= '</ul>' . PHP_EOL;
        echo $menu;
         ?>
        <br/>
        <li><a href="contactUs.php">Contact Us</a></li><?php  PHP_EOL;
    } else {
            foreach ($pages as $url => $title) {
            $menu .= '<li><a href="' . $url . '">' . $title . '</a></li>' . PHP_EOL;
        }
        $menu .= '</ul>' . PHP_EOL;
        echo $menu;
         ?>
        <br/>
        <li><a href="contactUs.php">Contact Us</a></li><?php  PHP_EOL;

    }
?>






















