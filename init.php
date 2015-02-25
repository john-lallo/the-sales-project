<?php

    require_once('./config.php');




    echo 'connecting to: '.$E['database']['hostaddr']."...";

    $database = new mysqli(
                    $E['database']['hostaddr'],
                    $E['database']['username'],
                    $E['database']['password']
                    );
                    
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
        identifi INT,
        username VARCHAR(64) NOT NULL,
        password VARCHAR(64) NOT NULL,
        revenue INT,
        expense INT,
        PRIMARY KEY(identifi)
        );');
        
    if (!$res){
        die("\nfatal: failed to create table: auth.");
    } else {
        echo "done.\n";
    }





    echo "creating tables: merch...";
    
    $res = $database -> query('CREATE TABLE merch (
        identifi INT,
        name TEXT,
        info TEXT,
        ptag INT,
        PRIMARY KEY(identifi)
        );');
        
    if (!$res){
        die("\nfatal: failed to create table: merch.");
    } else {
        echo "done.\n";
    }
        
    
    
    echo 'complete.';
?>