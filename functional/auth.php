<?php

    session_start();

    require_once('../config.php');
    
    $database = database_estab();
    $database -> select_db($E['database']['database']);

    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $database -> query('SELECT * FROM auth WHERE username = "'.$username.'";');
    $row = $res -> fetch_assoc();

    echo '<br>';
    if(password_verify($password, $row['password'])){
        //authenticated
        $_SESSION['UID'] = $row['identifi']; $_SESSION['username'] = $row['username'];
        
        header('location: ../index.php');
    } else {
        header('location: ../login.php');
    }
    

?>