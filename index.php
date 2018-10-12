<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/layout_2.css">
	<link rel="icon" href="images/logo.png" type="image/png" sizes="32x32">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php include('php/navigation_builder.php'); ?>
    <title>Home SK CE</title>
</head>

<body>
    <header>
        <nav class="navigation-bar">
			<a href="pages/contact.php" class="left">Kontakt</a>
            <a href="pages/help.php" class="left">Hilfe</a>
            <a href="pages/aboutus.php" class="left">Über uns</a>
            <a href="https://www.facebook.com/" class="left">Social Media</a>
            <a href="pages/register.php" class="right">Registrieren</a>
            <a href="pages/login.php" class="right">Anmelden</a>
        </nav>
        <div class="logobar">
            <a href="index.php"> <img src="images/Logo.png" width="120" alt="logo"></a>
            <input type="text" placeholder="Search.." name="search">
            <button type="button" oneclick=> Suchen </button>
            <a class="right" href="pages/shoppingcart.html">
				<img src="images/shoppingcart.png" alt="shoppingcart">
			</a>
        </div>
    </header>

    <div class="content">
        <div class="categories">
            <ul>
                <li>
                    <h2>Kategorien</h2>
                </li>
            </ul>
			<?php $navigation->showCategories();?>
        </div>

        <div class="mainArea">
            <h2>MainArea</h2>
        </div>

        <div class="sales">
            <h2>Aktionen</h2>
        </div>
    </div>

    <footer>
        <h3>Kontakt</h3>
        <h3>Hilfe</h3>
        <h3>Über uns</h3>
        <h3>Social Media</h3>
    </footer>
</body>

</html>