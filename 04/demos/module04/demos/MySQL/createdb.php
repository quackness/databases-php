<?php

    $servername = "srvmariadbps01.mariadb.database.azure.com";
    $username = "dbadmin";
    $password = "KpassPS!2009";       
    
    // open MySQL connection
    $conn = new mysqli($servername, $username, $password);
    
    // only proceed if connection is healthy
    if ($conn->connect_error) {
        die("MySQL Connection failed: " . $conn->connect_error);
    }
    
    // prepare and bind the INSERT query - protects against SQL injection attacks
    $sql = "CREATE DATABASE PersonalDB";

    if(!$conn->query($sql))
    {
        echo("database creation failed!");
        echo($conn->error);
    }

    $sql="CREATE TABLE person (
        Id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        Firstname varchar(50) NOT NULL,
        Lastname varchar(50) NOT NULL,
        email varchar(255) NOT NULL
      )";

    $conn->select_db("PersonalDB");

    if(!$conn->query($sql))
    {
        echo($conn->error);
    }

?>