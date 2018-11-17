<?php include_once "authentication.inc.php";?>
<header>
	<nav class=navigation-bar>
		<a href="../pages/contact.html">Kontakt </a>
		<a href="../pages/help.html">Hilfe </a>
		<a href="../pages/aboutus.html">Über uns</a>
		<a href=https://www.facebook.com/>Social Media</a>
		<span class=right> | </span>
		<?php check_session();?>
		<span class=right> | </span>
	</nav>
		<div class=logobar>
		<a href=main.php> <img src="../images/Logo.png" width=120 alt=logo></a>
		<input type=text placeholder=Search.. name=search>
		<a href=shopping_cart.php ><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
	</div>
