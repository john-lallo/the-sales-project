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

    </style>
    
</head>

<body>

   <!-- HEADER -->
    <div style = "width: 100%; padding: 24px; background-color: #fff">
        <center style = "font-weight: 300; font-size: 60px; cursor: default" onclick = "window.location = '/the-sales-project/'">THE SALES PROJECT</center>
    </div>

    <!--CONTAINER-->
    <div>

        <!-- ITEM CONTENTS -->
        <div style = "width: 800px; background-color: #fff; margin: 16px auto; padding: 4px; overflow: hidden;">

            <?php
            $i = $_GET['i'];
            
            if($i){
                require_once('config.php');
                $database = database_estab();
                $database -> select_db($E['database']['database']);
                
                $res = $database -> query('SELECT * FROM merch WHERE identifi = '.$i);
                
                $row = $res -> fetch_assoc();
            }
            ?>
        
            <form action = "functional/modif.php" method = "POST">
        
            <h2>ITEM INFO</h2>
        
            <input name = "name" type = "text" value = "<?php echo ($i?$row['name']:null);?>" placeholder = "item name" style = "width: 792px"/><br>

            <textarea name = "info" placeholder = "description" style = "width: 792px" rows = 12><?php echo ($i?$row['info']:null);?></textarea>

            <h2>DETAILS</h2>

            <input name = "ptag" type = "text" value = "<?php echo ($i?$row['ptag']:null);?>" placeholder = "pricetag(NTD)" style = "width: 792px"/><br>
            <input name = "imag" type = "text" value = "<?php echo ($i?$row['imag']:null);?>" placeholder = "image(url)" style = "width: 792px"/><br>
            
            <br>
            
            <!-- hidden field -->
            <input name = "identifi" type = "text" value = "<?php echo $i;?>" style = "display: none"/>
            
            <hr>
            
            <div style = "display: inline-block; float: left; padding: 8px;">
            <?php if($i){ ?>
                EDITING: <?php echo $row['name']; ?>
            <?php } else { ?>
                CREATING NEW ITEM
            <?php } ?>
            </div>
            
            <div style = "display: inline-block; float: right">
            <input class = "buttn G" type = "submit" value = "→"/>
            </div>
            
            </form>
    
        
        </div>

    </div>



</body>

</html>