<?php
include "php/functions.php";
$language = get_param('lang', 'en');
$pageId = get_param('id', -1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/layout_2.css">
    <link rel="shortcut icon" href="images/logo.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home SK CE</title>
</head>

<body>
    <header>
        <nav class="navigation-bar">
            <a href="pages/contact.html">Kontakt</a>
            <a href="pages/help.html">Hilfe</a>
            <a href="pages/aboutus.html">Über uns</a>
            <a href="https://www.facebook.com/">Social Media</a>
            <?php languages($language, $pageId);?>
            <span class="right"> | </span>
            <a class="right" href="pages/register.html">Registrieren</a>
            <a class="right" href="pages/login.html" >Anmelden</a>

        </nav>
        <div class="logobar">
            <a href="index.php"> <img src="images/Logo.png" width="120" alt="logo"></a>
            <input type="text" placeholder="Search.." name="search">
            <a href="#result" class="material-icons" style=" vertical-align: middle;text-decoration:none">search</a>
            <?php content($pageId);?>
            <a href="pages/shoppingcart.html" class="material-icons right" style="vertical-align: middle; text-decoration: none">shopping_cart</a>
        </div>
    </header>


    <div class="main">
        <nav class="navigation_main">
            <?php navigation($language, $pageId);?>
        </nav>
        <div>
            <?php items($language, $pageId);?>
        </div>
        <span class="sales">
            <span>adsfasfaf</span>
</span>
    </div>

    <footer>
        <h3>Kontakt</h3>
        <h3>Hilfe</h3>
        <h3>Über uns</h3>
        <h3>Social Media</h3>
    </footer>
</body>

</html>