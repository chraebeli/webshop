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
    <form action="main.php" method="post">
        <p><label>E-Mail</label><input type="email" name="email">
        </p>
        <p><label>Password</label>
            <input type="password" name="pw">
        </p>
        <p><input type="submit" value="Login"></p>
    </form>
    </div>
</body>
