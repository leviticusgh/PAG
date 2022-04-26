<?php
            require 'database.php';

            if (isset($_POST["add_member"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $fullname = htmlspecialchars($_POST['fullname']);
                    $dob  = htmlspecialchars($_POST['dob']);
                    $gender  = htmlspecialchars($_POST['gender']);
                    $marital_status  = htmlspecialchars($_POST['marital_status']);
                    $department  = htmlspecialchars($_POST['department']);
                    $role  = htmlspecialchars($_POST['role']);
                    $occupation  = htmlspecialchars($_POST['occupation']);
                    $address  = htmlspecialchars($_POST['address']);
                    $phone_number  = htmlspecialchars($_POST['phone_number']);
                    
                    $query = "INSERT INTO members(fullname, dob, gender, marital_status, department, role, occupation, address, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $values = array($fullname, $dob, $gender, $marital_status, $department, $role, $occupation, $address, $phone_number);
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute($values);

                    if($row == true){
                        header("location:membership.php");
                      }
                    else{
                      header("location:add_member.php");  
                    }
                  }
                }
?>

<?php
            require 'database.php';

            if (isset($_POST["add_account"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $item = htmlspecialchars($_POST['item']);
                    $department  = htmlspecialchars($_POST['department']);
                    $amount  = htmlspecialchars($_POST['amount']);
                    $date = date('Y-m-d H:i:s'); 
                    
                    $query = "INSERT INTO accounts(item, department, amount, date) VALUES (?, ?, ?, ?)";
                    $values = array($item, $department, $amount, $date);
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute($values);

                    if($row == true){
                        header("location:accounts.php");
                      }
                    else{
                      header("location:add_account.php");  
                    }
                  }
                }
?>

<?php
            require 'database.php';

            if (isset($_POST["add_tithe"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = htmlspecialchars($_POST['name']);
                    $phone_number  = htmlspecialchars($_POST['phone_number']);
                    $amount  = htmlspecialchars($_POST['amount']);
                    $date = date('Y-m-d H:i:s'); 
                    
                    $query = "INSERT INTO tithe(name, phone_number, amount, date) VALUES (?, ?, ?, ?)";
                    $values = array($name, $phone_number, $amount, $date);
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute($values);

                    if($row == true){
                        header("location:tithe.php");
                      }        
                    else{
                      header("location:add_tithe.php");  
                    }
                  }
                }
?>

<?php
            require 'database.php';

            if (isset($_POST["add_offering"])) {
                
              if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $amount  = htmlspecialchars($_POST['amount']);
                    $date = date('Y-m-d H:i:s'); 
                    
                    $query = "INSERT INTO offering(amount, date) VALUES (?, ?)";
                    $values = array($amount, $date);
                    $stmt = $db->prepare($query);
                    $row = $stmt->execute($values);

                    if($row == true){
                        header("location:offering.php");
                      }
                    else{
                      header("location:add_offering.php");  
                    }
                  }
                }
?>
