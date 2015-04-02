<?php

    session_start();

    require_once('../config.php');
    
    $database = database_estab();
    $database -> select_db($E['database']['database']);

    
    $manu = $_SESSION['username'];

    $identifi = $_POST['identifi'];    
    $name = $_POST['name'];
    $info = $_POST['info'];
    $ptag = $_POST['ptag'];
    $imag = $_POST['imag'];
    
    if($identifi == 0){ //new item

        $res = $database -> query(
        "INSERT INTO merch
        (name, manu, info, imag, ptag) VALUES
        ('$name', '$manu', '$info', '$imag', '$ptag');");
        
        $nowi = $database -> query("SELECT MAX(identifi) FROM merch;");
        $row = $nowi -> fetch_array();
        
        $i = $row[0];
        
    } else { //edit item

        $res = $database -> query("UPDATE merch SET
        name = '$name',
        manu = '$manu',
        info = '$info',
        imag = '$imag',
        ptag = '$ptag'
        WHERE
        identifi = $identifi");

        $i = $identifi;

    }

    header("Location: ../shelf.php?i=$i");
?>