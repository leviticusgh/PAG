<?php

session_start();

include 'database.php';

if (isset($_POST["login"])) {
    
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) && empty($_POST["password"])) {
      echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Username / Password is Required </div></html>';
    }
    else if(empty($_POST["username"])){
      echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Username is Required </div></html>';      
    }
    else if(empty($_POST["password"])){
      echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Password is Required </div></html>';      
    }
    else {

        $username = htmlspecialchars($_POST['username']);
        $password  = htmlspecialchars($_POST['password']);
        
        $query = "SELECT * FROM user WHERE username = '$username'";
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $pass_verify = password_verify($password, $row['hash']);
          if($pass_verify == true){
            
            if($row['role'] === 'Admin'){

              $_SESSION['id'] = $row['userid'];
              $_SESSION['username'] = $row['username'];
  
              $username = $_SESSION['username'];
              $userid = $_SESSION['id'];
              
              echo '<script>window.location="admin/dashboard.php";</script>';
            }
            elseif($row['role'] === 'User'){

              $_SESSION['id'] = $row['userid'];
              $_SESSION['username'] = $row['username'];
  
              $username = $_SESSION['username'];
              $userid = $_SESSION['id'];

              $datetime = new DateTime('now', new DateTimeZone('Europe/London'));
              $datetime->setTimezone(new DateTimeZone('Africa/Accra'));
              $checkin = $datetime->format('Y-m-d H:i:s');
              $checkout = date('0000-00-00 00:00:00');
              
              $query1 = "INSERT INTO user_entry(username, userid, checkin, checkout) VALUES (?, ?, ?, ?)";
              $values = array($username, $userid, $checkin, $checkout);
              $stmt = $db->prepare($query1);
              $row = $stmt->execute($values);
              
              if($row == true){
                
                echo '<script>window.location="view/dashboard.php";</script>';
              }else{
                echo '<script>alert("Signup Failed");</script>';
                echo '<script>window.location="view/dashboard.php";</script>';
              }
            }
            else{
                echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Invalid Username / Password </div></html>';
            }
        }
            else{
                echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Password Verification Failed</div></html>';
          }
      }
      else{
        echo '<html><div style="color: red; font-size: 20px; margin-bottom: 20px; text-align: center;">Invalid Access to Username / Password </div></html>';
      }
      }
    }
  }