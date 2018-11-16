<?php session_start();

if (isset($_POST["email"]) && isset($_POST["pw"])) {
    $email = $_POST["email"];
    $pw = $_POST["pw"];
    if (checklogin($email, $pw)) {
        $_SESSION["email"] = $email;
    }

}
if (!isset($_SESSION["email"])) {
    echo "<!DOCTYPE  html>\n";
    echo '<a href="../index.php">Please log in</a>.';
    exit;
}

function checklogin($email, $password)
{
    $db = new mysqli("localhost", "root", "", "webshop");
	if (!$db) {
		throw new Exception("Verbindung fehlgeschlagen: " . mysqli_connect_error());
	}
	try {
		$stmt = $db->prepare(
			"SELECT  *  FROM  customer  WHERE  email=?"
		);
		$stmt->bind_param('s', $email);
		$stmt->execute();
	} catch (Exception $e){
		echo "Bei der Passwortprüfung ist ein Fehler aufgetreten. Fehlercode: ",$e->getMessage(), "\n";
	}
    $result = $stmt->get_result();
    if (!$result || $result->num_rows !== 1) {
        return false;}

    $row = $result->fetch_assoc();
    return password_verify($password, $row["password_hash"]);
}
