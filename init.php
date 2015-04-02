<?php

    require_once('./config.php');




    echo 'connecting to: '.$E['database']['hostaddr']."...";

    $database = database_estab();
                    
    if($database -> connect_errno){
        die("\nfatal: unable to connect to database [".($db->connect_error)."]");
    } else {
        echo "done.\n";
    }
    
    
    
    
    echo 'setting up database...';
    
    $res = $database -> query('CREATE DATABASE IF NOT EXISTS '.$E['database']['database'].';');
    
    if($res){
        echo "done.\n";
    } else {
        die("\nfatal: failed to create database.");
    }
    
    
    
    
    $database -> select_db($E['database']['database']);
    echo 'using database '.$E['database']['database'].".\n";
    
    
    
    echo "creating tables: auth...";
    
    $res = $database -> query('CREATE TABLE auth (
        identifi INT(12) NOT NULL AUTO_INCREMENT,
        username VARCHAR(64) NOT NULL,
        nickname VARCHAR(64) NOT NULL,
        password VARCHAR(64) NOT NULL,
        fbalance INT,
        PRIMARY KEY(identifi)
        );');
        
    if (!$res){
        die("\nfatal: failed to create table: auth.");
    } else {
        echo "done.\n";
    }

    $P = password_hash('bar', PASSWORD_BCRYPT);

    $res = $database -> query('INSERT INTO auth
    (username, nickname, password, fbalance) VALUES
    ("foo", "THOR THE GOD OF THUNDER", "'.$P.'", 0);');
    
    if(!$res){ echo "integrity test failed on table: auth"; }
    




    echo "creating tables: merch...";
    
    $res = $database -> query('CREATE TABLE merch (
        identifi INT(12) NOT NULL AUTO_INCREMENT,
        name TEXT,
        manu VARCHAR(64),
        info TEXT,
        imag VARCHAR(2049),
        ptag INT,
        PRIMARY KEY(identifi)
        );');
        
    if (!$res){
        die("\nfatal: failed to create table: merch.");
    } else {
        echo "done.\n";
    }
        
        
    $lorem_ipsum =
'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        
    $res = $database -> query('INSERT INTO merch
    (name, manu, info, imag, ptag) VALUES
    ("Utah Teapot", "foo", "'.$lorem_ipsum.'", "http://i.imgur.com/MR6CWvQ.jpg", 1024);');
    
    $res = $database -> query('INSERT INTO merch
    (identifi, name, manu, info, imag, ptag) VALUES
    (-999, "Mystery Box", "foo", "'.$lorem_ipsum.'", "http://i.imgur.com/sZWy5ls.jpg", 512);');


    if(!$res){ echo "integrity test failed on table: merch"; }
    
    
    
    

    echo "creating tables: flow...";
    
    $res = $database -> query('CREATE TABLE flow (
        target VARCHAR(64) NOT NULL,
        item INT,
        value INT,
        timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
        PRIMARY KEY(timestamp)
        );');
        
    if (!$res){
        die("\nfatal: failed to create table: flow.");
    } else {
        echo "done.\n";
    }
    
    $res = $database -> query('INSERT INTO flow (target, item, value) VALUES ("foo", 1, 128);');
    
    if(!$res){ echo "integrity test failed on table: flow"; }
    
    
    echo 'complete.';
?>