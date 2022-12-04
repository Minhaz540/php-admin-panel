<?php
    $username = $email = $password = $phoneCode = $phone = $encrypted_password = NULL;
    $username_error = $email_error = $password_error = $phone_error = NULL;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = clean_data($_POST["username"]);
        $email = clean_data($_POST["email"]);
        $password = clean_data($_POST["password"]);
        $phonCode = clean_data($_POST["phoneCode"]);
        $phone = clean_data($_POST["phone"]);

        
        if(!empty($username)) {
           if(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
                $username_error = "Username must be start with letter and length must be 5 - 31 <br>";
            } else {
                $username_error = "";
            }
        } else {
            $username_error = "Username is required <br>";
        }

        if(!empty($email)) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            } else {
                $email_error = "";
            }
        } else {
            $email_error = "Email is required <br>";
        }

        if(!empty($password)) {
            if(!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password)) {
                $password_error = "Password doesn't match the pattern <br>";
            } else {
                $encrypted_password = md5($password);
                $password_error = "";
            }
        } else {
            $password_error = "Password is required <br>";
        }

        if(!empty($phonCode) && !empty($phone)) {
            $phone_number = $phonCode . $phone;
            $phone_error = "";
        } else {
            $phone_error = "Phone number and phone code are required <br>";
        }

        if(empty($username_error) && empty($password_error) && empty($email_error) && empty($phone_error)) {
            try {
                include("db/dbConnect.php");
                // include("../db/dbConnect.php");

                // echo dirname(__FILE__);
                # C:\xampp\htdocs\lab-final\src\controllers

                $query = "INSERT INTO `user_table`(`username`,`email`,`password`,`phone`) VALUES(:uname, :email, :psw, :phn)";

                $stmt = $con->prepare($query);

                $stmt->bindValue(':uname', $username);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':psw', $encrypted_password);
                $stmt->bindValue(':phn', $phone);

                $stmt->execute();

                header("location: views/login.php");

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