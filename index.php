<!DOCTYPE HTML>
<?php

session_start();

if(!isset($_SESSION['UID'])){ header('Location: login.php'); }


?>
<html>
<head>
    <meta charset = 'utf-8'>
    <title>TSP V0</title>
    
    <link href = 'http://fonts.googleapis.com/css?family=Lato:300,400,900' rel = 'stylesheet' type = 'text/css'>
    <link href = 'theme.css' rel = 'stylesheet' type = 'text/css'>
    
    <style>
    
    .add-newblok {
        width: 320px;
        height: 320px;
        margin: 16px;
        overflow: hidden;
        float: left;
    
        background-color: #ccc;
        transition: 0.2s;
    }
    .add-newblok:hover {
        cursor: pointer;
        background-color: #aaa;
    }
    
    .prodblok {
        width: 320px;
        height: 320px;
        margin: 16px;
        overflow: hidden;
        float: left;
        
        background-color: #fff;
        transition: 0.2s;
    }

    </style>
    
</head>

<body>

    <!-- HEADER -->
    <div style = "width: 100%; padding: 24px; background-color: #fff;">
        <center style = "font-weight: 300; font-size: 60px">THE SALES PROJECT</center>
    </div>

    <!--CONTAINER-->
    <div>
    
    <br>
    
        <!-- new product-->
        <div class = "add-newblok">
        <div style = "width: 304px; height: 304px; margin: 4px; border: 4px dashed #fff;">
            <center style = "font-size: 40px;font-weight: 900; color: #fff"><br><br><u>ADD NEW</u></center>
        </div>
        </div>
    
    
        <!--catalogue -->
        <?php
        
            require_once('config.php');
            $database = database_estab();
            $database -> select_db($E['database']['database']);
            
            $res = $database -> query('SELECT * FROM merch WHERE manu = "'.$_SESSION['username'].'";');
            
            while($row = $res -> fetch_assoc()){
        ?>
    
        <div class = "prodblok"
        style = "background: url(<?php echo $row['imag'] ?>) no-repeat center; background-size: cover;">
        
            <!--
            
            +-----------+
            |           |
            |   IMAGE   |
            |           |
            +-----------+
            
            -->
            
            <!-- <h2><?php echo strtoupper($row['name']); ?></h2> -->

        </div>
        
        <?php } ?>
        
        
    </div>



</body>

</html>