<?php

include 'database.php';

session_start();

$datetime = new DateTime('now', new DateTimeZone('Europe/London'));
$datetime->setTimezone(new DateTimeZone('Africa/Accra'));
$checkout = $datetime->format('Y-m-d H:i:s');

$id = $_SESSION['id'];

$query = "UPDATE user_entry SET checkout='$checkout' WHERE userid='$id'";
$stmt = $db->prepare($query);
$values = array($checkout);
$row = $stmt->execute($values);

session_destroy();
echo '<script>window.location="../index.php";</script>';

?>