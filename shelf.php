<!DOCTYPE HTML>
<?php

session_start();

//if(!isset($_SESSION['UID'])){ header('Location: login.php'); }


?>
<html>
<head>
    <meta charset = 'utf-8'>
    <title>TSP V0</title>
    
    <link href = 'http://fonts.googleapis.com/css?family=Lato:300,400,900' rel = 'stylesheet' type = 'text/css'>
    <link href = 'theme.css' rel = 'stylesheet' type = 'text/css'>
    
</head>

<body>

   <!-- HEADER -->
    <div style = "width: 100%; padding: 24px; background-color: #fff">
        <center style = "font-weight: 300; font-size: 60px; cursor: default" onclick = "window.location = '/the-sales-project/'">THE SALES PROJECT</center>
    </div>

    <!--CONTAINER-->
    <div>
        <?php
        
            require_once('config.php');
            $database = database_estab();
            $database -> select_db($E['database']['database']);
            
            $res = $database -> query('SELECT * FROM merch WHERE identifi = '.$_GET['i']);
            
            $row = $res -> fetch_assoc();
        ?>
        
        <!-- item description -->
        <div style = "width: 800px; background-color: #fff; margin: 16px auto; overflow: hidden;">
            
            <img src = "<?php echo $row['imag'] ?>" width = "100%">
            
            <!--
            
            +-----------+
            |           |
            |   IMAGE   |
            |           |
            +-----------+
            
            -->
            
            <h1>
            <?php echo strtoupper($row['name']); ?>
            <a style = "font-size: 24px" href = "itemedit.php?i=<?php echo $row['identifi'];?>">EDIT</a>
            </h1>
    
            <hr>
        
            <div style = "padding: 0 16px">   <!-- description -->
        
                <p><?php echo $row['info']; ?></p>
        
            </div>
    
        
        </div>

        <!-- item details -->
        <div style = "width: 800px; background-color: #fff; margin: 16px auto; overflow: hidden;">
        
        <h2>DETAILS</h2>      
        
        <hr>
        
        <div>
            <table style = "padding: 16px;">
        
            <tr>
                <td style = "text-align: right"><b>PRICE TAG: </b><td>
                <td><?php echo $row['ptag']; ?> NTD</td>
            </tr>
        
            <tr>
                <td style = "text-align: right"><b>MANUFACTURER: </b><td>
                <td><?php echo $row['manu']; ?></td>
            </tr>
        
            <tr>
                <td style = "text-align: right"><b>ITEM ID: </b><td>
                <td><?php echo $row['identifi']; ?></td>
            </tr>
            
            <tr>
                <td style = "text-align: right"><b>NET PROFIT: </b><td>
                <td><?php echo "N/A"; ?></td>
            </tr>
            
            </table>
        </div>
        
        </div>

    </div>



</body>

</html>