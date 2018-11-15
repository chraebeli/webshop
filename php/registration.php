<?php

include "functions.php";

$language = get_param('lang', 'en');
$pageId = get_param('id', -1);

?>

<!DOCTYPE  html>
<html lang="en">


<head>
    <?php include "head.php";?>
</head>

<body>
    <header>
        <?php include "header.php";?>
    </header>


    <div class="main">
        <nav class="navigation_main">
            <?php include "navigation.php";?>
            <h3>Please Login</h3>
        </nav>
        <form action="writedb.php" method="post">
            <p>Anrede<select required name="title">
                    <option disabled selected>Bitte wählen</option>
                    <option>Frau</option>
                    <option>Herr</option>
                </select> </p>
            <p><label>Vorname</label><input type="text" name="firstname" required> </p>
            <p><label>Nachname</label><input type="text" name="lastname" required> </p>
            <p><label>Geburtstag</label><input type="date" name="birthday" required> </p>
            <p><label>Adresse</label><input type="text" name="address" required> </p>
            <p><label>Ort</label><input type="text" name="city" required> </p>
            <p><label>Postleitzahl</label><input type="text" name="zip" required> </p>
            <p><label>E-Mail</label><input type="email" name="email"> </p>
            <p><label>Password</label> <input type="password" name="pw" minlength="6" maxlength="12" required
                    placeholder="6-12 characters"> </p>
            <p><label>Password wiederholen</label> <input type="password" name="pw"> </p>
            <p><input type="submit" value="Registrieren"></p>
            <p><input type="checkbox" name="agb"> <label>Ja, ich akzeptiere die Allgemine Geschäftsbedingungen</label></p>
        </form>
    </div>
</body>