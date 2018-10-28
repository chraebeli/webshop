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
            <a href="pages/contact.html" class="left">Kontakt</a>
            <a href="pages/help.html" class="left">Hilfe</a>
            <a href="pages/aboutus.html" class="left">Über uns</a>
            <a href="https://www.facebook.com/" class="left">Social Media</a>
            <a href="pages/register.html" class="right">Registrieren</a>
            <a href="pages/login.html" class="right">Anmelden</a>
        </nav>
        <div class="logobar">
            <a href="index.php"> <img src="images/Logo.png" width="120" alt="logo"></a>
            <input type="text" placeholder="Search.." name="search">
            <a href="#result" class="material-icons" style=" vertical-align: middle;text-decoration:none">search</a>
            <a href="pages/shoppingcart.html" class="material-icons right" style="vertical-align: middle; text-decoration: none">shopping_cart</a>

            </a>
        </div>
    </header>
    <main class="main">
		<div id="main_nav">
			<nav class="navigation_main">
				<?php navigation($language, $pageId);?>
				<?php languages($language, $pageId);?>
			</nav>
		</div>
		<div id="main_content">
			<?php content($pageId);?>
			<table class="table">
				<tr>
					<?php itemsHeader($pageId, $language);?>
				</tr>
			<?php items($pageId, $language);?>
			</table>
		</div>
        <div id="sales">
        </div>
    </main>

    <footer>
        <h3>Kontakt</h3>
        <h3>Hilfe</h3>
        <h3>Über uns</h3>
        <h3>Social Media</h3>
    </footer>
</body>
</html>