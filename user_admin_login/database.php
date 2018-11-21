<?php
    // Include the first block of HTML (beginning of page)
    include 'includes/header.php';
    if (!$_SESSION['data'] == 'privileged'){
    // if ($_SESSION['data'] != 'privileged') or ($_SESSION['data'] != 'teacher'){
    header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}   elseif (!$_SESSION['data'] == 'teacher'){
     header("Refresh:0; url=http://titan.dcs.bbk.ac.uk/~jseal06/p1fma/log_in.php");

}
?>

 <link rel="stylesheet" type="text/css" href="css/light.css"/>


<div class="nav">
    <?php
    // Include the dynamic menu script
    include 'includes/menu.php';
        //     if ($_SESSION['data'] == 'privileged'){
        // } 
    ?>
</div>        
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<!-- </head>
<body> -->
<br/>
<br/>
<h1>Introduction to Database Technology - Results</h1>
<table>
  <tr>
    <th>Year</th>
    <th>Students</th>
    <th>Pass</th>
    <th>Fail (no resit)</th>
    <th>Resit</th>
    <th>Withdrawn</th>
  </tr>
  <tr>
    <td>2012/13</td>
    <td>60</td>
    <td>40</td>
    <td>7</td>
    <td>3</td>
    <td>10</td>
  </tr>
  <tr>
    <td>2013/14</td>
    <td>45</td>
    <td>25</td>
    <td>5</td>
    <td>15</td>
    <td>0</td>
  </tr>
  <tr>
    <td>2014/15</td>
    <td>50</td>
    <td>35</td>
    <td>3</td>
    <td>7</td>
    <td>5</td>
  </tr>
  <tr>
    <td>2015/16</td>
    <td>48</td>
    <td>30</td>
    <td>8</td>
    <td>3</td>
    <td>7</td>
  </tr>
</table>
<?php
    // Include the footer and closing body/html tags
    include 'includes/footer.php';
?>
