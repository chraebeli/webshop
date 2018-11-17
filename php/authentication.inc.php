<?php session_start();

if (isset($_POST["email"]) && isset($_POST["pw"])) {
    $email = $_POST["email"];
    $pw = $_POST["pw"];
    if (checklogin($email, $pw)) {
        $_SESSION["email"] = $email;
    }

}
/*if (!isset($_SESSION["email"])) {
echo "<!DOCTYPE  html>\n";
echo '<a href="../index.php">Please log in</a>.';
exit;
}
 */

function check_session()
{
    if (!isset($_SESSION["email"])) {
        echo "<!DOCTYPE html>\n";
        echo "<form action='main.php' method='post'>
        <p><label>E-Mail</label><input type='email' name='email'>
        </p>
        <p><label>Password</label>
            <input type='password' name='pw'>
        </p>
        <p><input type='submit' value='Anmelden'></p>
    </form>";
        echo "<a class=right href='registration.php'>Registrieren</a>";
    }
    if (isset($_SESSION["email"])) {
        echo "<!DOCTYPE html>\n";
        echo "<a class=right href='logout.php'>Abmelden</a>";
    }
}
function checklogin($email, $password)
{
    $db = new mysqli("localhost", "root", "", "webshop");
    if (!$db) {
        throw new Exception("Verbindung fehlgeschlagen: " . mysqli_connect_error());
    }
    try {
        $stmt = $db->prepare(
            "SELECT  *  FROM  user  WHERE  email=?"
        );
        $stmt->bind_param('s', $email);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Bei der Passwortprüfung ist ein Fehler aufgetreten. Fehlercode: ", $e->getMessage(), "\n";
    }
    $result = $stmt->get_result();
    if (!$result || $result->num_rows !== 1) {
        return false;}

    $row = $result->fetch_assoc();
    return password_verify($password, $row["password_hash"]);
}
