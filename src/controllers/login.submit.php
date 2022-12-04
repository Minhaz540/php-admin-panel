<?php
    $username = $password = $encrypted_password = NULL;
    $username_error = $password_error = NULL;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = clean_data($_POST["username"]);
        $password = clean_data($_POST["password"]);

        
        if(!empty($username)) {
           if(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
                $username_error = "Username must be start with letter and length must be 5 - 31 <br>";
            } else {
                $username_error = "";
            }
        } else {
            $username_error = "Username is required <br>";
        }

        if(!empty($password)) {
            $encrypted_password = md5($password);
            $password_error = "";
        } else {
            $password_error = "Password is required <br>";
        }

        if(empty($username_error) && empty($password_error)) {
            try {
                include("../db/dbConnect.php");

                $query = "SELECT * FROM `user_table` WHERE username = :uname AND password = :psw";
                $stmt = $con->prepare($query);

                $stmt->bindValue(':uname', $username);
                $stmt->bindValue(':psw', $encrypted_password);

                $stmt->execute();
                $result = $stmt->fetchAll();

                if(count($result)) {
                    header("location: dashboard.php");
                } else {
                    header("location: login.php");
                }

            } catch (PDOException $err) {
                echo "<p style='color:red; font-weight:bold'>Problem: {$err->getMessage()}; </p>";
            }
        } else {
            echo "Error! Some fields are required";
        }
        
    }

    function clean_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>