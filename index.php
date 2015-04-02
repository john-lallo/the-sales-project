<!DOCTYPE HTML>
<?php

session_start();

if(!isset($_SESSION['UID'])){ header('Location: login.php'); }


?>
<html>
<head>
    <meta charset = 'utf-8'>
    <title>TSP V0</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    
        function backdrop(id, flag){
            if(flag){
                $('#backdrop_' + id).fadeIn(200);
            }else{
                $('#backdrop_' + id).fadeOut(200);
            }
        }
    </script>
    
    <link href = 'http://fonts.googleapis.com/css?family=Lato:300,400,900' rel = 'stylesheet' type = 'text/css'>
    <link href = 'theme.css' rel = 'stylesheet' type = 'text/css'>
    
    <style>
    
    .add-newblok {
        position: relative;
    
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
        position: relative;
    
        width: 320px;
        height: 320px;
        margin: 16px;
        overflow: hidden;
        float: left;
        
        background-color: #fff;
        transition: 0.2s;
    }
    
    .backdrop{
        cursor: pointer;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
        display: none;
    }

    </style>
    
</head>

<body>

   <!-- HEADER -->
    <div style = "width: 100%; padding: 24px; background-color: #fff">
        <center style = "font-weight: 300; font-size: 60px; cursor: default" onclick = "window.location = '/the-sales-project/'">THE SALES PROJECT</center>
    </div>

    <!--CONTAINER-->
    <div>
    
    <br>
    
        <!-- new product-->
        <div class = "add-newblok" onclick = "window.location = 'itemedit.php?i=0';">
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
        style = "background: url(<?php echo $row['imag'] ?>) no-repeat center; background-size: cover;"
        
        onmouseenter = "backdrop(<?php echo $row['identifi']?>, true);"
        onmouseleave = "backdrop(<?php echo $row['identifi']?>, false);"
        onclick = "window.location = 'shelf.php?i=<?php echo $row['identifi']; ?>';"
        >
        
            <div class = "backdrop" id = "backdrop_<?php echo $row['identifi']?>">
            
            </div>
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