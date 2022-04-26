<?php 

session_start();

include 'database.php';

$username = $_SESSION['username'];
$userid = $_SESSION['id'];

if(!isset($_SESSION['id'])){
    echo '<script>window.location="../index.php";</script>';
    }
    else{
    
    $session_id = $_SESSION['id'];
    $session_username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username =:username AND role =:role";
    $stmt = $db->prepare($query);
    $stmt->execute([':username' => $username, ':role' => 'User']);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    }

?>