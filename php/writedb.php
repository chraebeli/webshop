<?php

$password = password_hash($_POST["pw"], PASSWORD_BCRYPT);

$db = new mysqli("localhost", "root", "", "webshop");
if (!$db) {
    throw new Exception("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

//echo "Connected successfully";

try {
$stmt = $db->prepare("INSERT INTO customer(email, password_hash, title, firstname, lastname, birthday, address, city, zip) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss", $_POST['email'], $password, $_POST['title'], $_POST['firstname'], $_POST['lastname'], $_POST['birthday'], $_POST['address'], $_POST['city'], $_POST['zip']);
$stmt->execute();
} catch (Exception $e) {
	echo "Beim Schreiben der Daten in die Datenbank ist ein Fehler aufgetreten. Fehlercode: ",$e->getMessage(), "\n";
}

//echo "New records created successfully";

$stmt->close();
$db->close();
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
