<?php

$password = password_hash($_POST["pw"], PASSWORD_BCRYPT);

$db = new mysqli("localhost", "root", "", "webshop");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

$stmt = $db->prepare("INSERT INTO customer(email, password_hash, title, firstname, lastname, birthday, address, city, zip) VALUES (?,?,?,?,?,?,?,?,?)");
echo var_dump($stmt);
$stmt->bind_param("sssssssss", $_POST['email'], $password, $_POST['title'], $_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['address'], $_POST['city'], $_POST['zip']);
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$db->close();
