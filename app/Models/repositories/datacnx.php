<?php

        define('servername', 'localhost');
        define('username', 'root');
        define('password', '');
        define('db_name', 'bank');

                    //Creat Connection
        $cnx = mysqli_connect (servername, username, password);
        if(!$cnx){
            die("Could not connect : "  . mysqli_connect_error());
        }
        // echo "Connected successfully<br>";

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS " . db_name;
        if (mysqli_query($cnx, $sql)) {
            // echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . mysqli_error($cnx);
        }
        
        $cnx = mysqli_connect(servername, username, password, db_name );
        // Close the connection



        $sql = "CREATE TABLE IF NOT EXISTS user(
        id VARCHAR(258) NOT NULL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        naissance VARCHAR(255) NOT NULL,
        nationalite VARCHAR(255) NOT NULL,
        genre VARCHAR(255) NOT NULL,
        role VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        pass VARCHAR(255) NULL,
        agency_id VARCHAR(255) NOT NULL,

        FOREIGN KEY (agency_id) REFERENCES agency(id)
        ON DELETE CASCADE 
        ON UPDATE CASCADE
        )";

        if ($cnx->query($sql) === TRUE) {
            // echo "Table user created successfully<br>";
        } else {
            echo "Error creating table: " . $cnx->error;
        }


        $sql = "CREATE TABLE IF NOT EXISTS agency(
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        longitude VARCHAR(255) NOT NULL,
        latitude VARCHAR(255) NOT NULL,
        adress VARCHAR(255) NOT NULL,
        bank_id VARCHAR(255) NOT NULL,
        FOREIGN KEY (bank_id) REFERENCES bank(id) 
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";
          
        if ($cnx->query($sql) === TRUE) {
        // echo "Table agency created successfully<br>";
        } else {
        echo "Error creating table: " . $conn->error;
        }


        $sql = "CREATE TABLE IF NOT EXISTS account(
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        balance FLOAT NOT NULL,
        devise VARCHAR(255) NOT NULL,
        rib VARCHAR(255) NOT NULL,
        user_id VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES user(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";

        if ($cnx->query($sql) === TRUE) {
        // echo "Table account created successfully<br>";
        } else {
        echo "Error creating table: " . $conn->error;
        }



        $sql = "CREATE TABLE IF NOT EXISTS adresse(
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        ville VARCHAR(255) NOT NULL,
        quartier VARCHAR(255) NOT NULL,
        rue VARCHAR(255) NOT NULL,
        codepostal INT(255) NOT NULL,
        agency_id VARCHAR(255)NOT NULL,
        FOREIGN KEY (agency_id) REFERENCES agency(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";
        
        if($cnx->query($sql) === TRUE){
            // echo "Table adresse created successfully<br>";
        }else{
            echo "Table adresse not created successfully";
        }
            


            
        $sql = "CREATE TABLE IF NOT EXISTS bank (
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        logo VARCHAR(255) NOT NULL
        )";

        if ($cnx->query($sql) === TRUE){
        //   echo "Table bank  created successfully<br>";
        }else{
          echo "bank table cdoes not created successfully";
        }




        $sql = "CREATE TABLE IF NOT EXISTS distributeur(
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        longitude VARCHAR(255) NOT NULL,
        latitude VARCHAR(255) NOT NULL,
        adress VARCHAR(255) NOT NULL,
        agency_id VARCHAR(255) NOT NULL,
        FOREIGN KEY (agency_id) REFERENCES agency(id)
        ON DELETE CASCADE 
        ON UPDATE CASCADE
        )";
    
        if($cnx->query($sql) === TRUE) {
            //  echo "Table distributeur created successfully<br>";
        }else{
            echo "distributeur table created failed";
        }



        $sql = "CREATE TABLE IF NOT EXISTS transactions (
        id VARCHAR(255) NOT NULL PRIMARY KEY,
        montant FLOAT NOT NULL,
        type VARCHAR(255) NOT NULL,
        account_id VARCHAR(255) NOT NULL,
        FOREIGN KEY (account_id) REFERENCES account(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
        )";
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Execute your query
        if($cnx->query($sql) === TRUE) {
            // echo "Table transactions created successfully<br>";
        } else {
            echo "Error creating table: " . $cnx->error;
        }

       
    
?>