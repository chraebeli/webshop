<?php

$password = password_hash($_POST["pw"], PASSWORD_BCRYPT);

$db = new mysqli("localhost", "root", "", "webshop");
if ($db->connect_errno) {
    die("Unable  to  connect  to  database  [" . $db->connect_error . "]");
}
$role = 2;
$stmt = $db->prepare("INSERT INTO user(email, password_hash, r_id, title, firstname, lastname, birthday, address, city, zip) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssisssssss", $_POST['email'], $password, $role, $_POST['title'], $_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['address'], $_POST['city'], $_POST['zip']);
$stmt->execute();

$stmt->close();
$db->close();

header("location:../index.php");
