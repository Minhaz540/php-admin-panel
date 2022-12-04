<?php 
    $host="localhost";
    $dbname="php_project_db";
    $dbuser="root";
    $dbpass="";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);