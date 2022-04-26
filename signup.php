<?php

    require 'database.php';

    if (isset($_POST["signup"])) {
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"]) && empty($_POST["password"])) {
        echo '<html><div style="color: red; margin-left: 100px;">Username / Password is Required</div></html>';
        }
        else if(empty($_POST["username"])){
        echo '<html><div style="color: red; margin-left: 130px;">Username is Required</div></html>';        
        }
        else if(empty($_POST["password"])){
        echo '<html><div style="color: red; margin-left: 130px;">Password is Required</div></html>';        
        }
        else {

            $username = htmlspecialchars($_POST['username']);
            $password  = htmlspecialchars($_POST['password']);
            $role  = htmlspecialchars($_POST['role']);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            
            $query = "INSERT INTO user(username, password, role, hash) VALUES (?, ?, ?, ?)";
            $values = array($username, $password, $role, $hash);
            $stmt = $db->prepare($query);
            $row = $stmt->execute($values);

            if($row == true){
                echo '<script>alert("Signup Successful");</script>';
            }
            else{
                echo '<script>alert("Signup Failed");</script>';
            }
            echo '<script>window.location="index.php";</script>';
            }
        }

    }