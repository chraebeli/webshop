<?php require 'functions.php';?>

<head>
    <link rel=stylesheet href=../css/layout_2.css>
    <link rel=shortcut icon href=../images/logo.ico>
    <meta charset=UTF-8>
    <meta name=viewport content=width=device-width, initial-scale=1.0>
    <meta http-equiv=X-UA-Compatible content=ie=edge>
    <title></title>
    <link rel='stylesheet prefetch' href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

  <header>
    <nav class=navigation-bar>
        <a href=pages/contact.html>Kontakt</a>
        <a href=pages/help.html>Hilfe</a>
        <a href=pages/aboutus.html>Über uns</a>
        <a href=https://www.facebook.com/>Social Media</a>

        <span class=right> | </span>
        <a class=right href=pages/register.html>Registrieren</a>
        <a class=right href=logout.php >Abmelden</a>

    </nav>
    <div class=logobar>
        <a href=index.php> <img src=../images/Logo.png width=120 alt=logo></a>
        <input type=text placeholder=Search.. name=search>
        <a href=#result class=material-icons style= vertical-align: middle;text-decoration:none>search</a>
         content($pageId);
        <a href=pages/shoppingcart.html class=material-icons right style=vertical-align: middle; text-decoration: none>shopping_cart</a>
    </div>
</header>

<?php

function side_navigation()
{
    echo "<ul class=accordion-menu>
    <li>
        <div class=dropdownlink><i class=fa fa-tshirt aria-hidden=true></i> Arbeitskleidung
            <i class=fa fa-chevron-down aria-hidden=true></i>
        </div>
        <ul class=submenuItems>
            <li><a href=#>History book 1</a></li>
            <li><a href=#>History book 2</a></li>
            <li><a href=#>History book 3</a></li>
        </ul>
    </li>
    <li>
        <div class=dropdownlink><i class=fa fa-plane aria-hidden=true></i> Kleingeräte
            <i class=fa fa-chevron-down aria-hidden=true></i>
        </div>
        <ul class=submenuItems>
            <li><a href=#>Fiction book 1</a></li>
            <li><a href=#>Fiction book 2</a></li>
            <li><a href=#>Fiction book 3</a></li>
        </ul>
    </li>
    <li>
        <div class=dropdownlink><i class=fa fa-traffic-light aria-hidden=true></i> Signalisation
            <i class=fa fa-chevron-down aria-hidden=true></i>
        </div>
        <ul class=submenuItems>
            <li><a href=#>Fantasy book 1</a></li>
            <li><a href=#>Fantasy book 2</a></li>
            <li><a href=#>Fantasy book 3</a></li>
        </ul>
    </li>
</ul>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'> </script>
<script src=../js/index.js>
</script>";

}

function footer()
{
    echo "    <footer class=footer>
    <h3>Kontakt</h3>
    <h3>Hilfe</h3>
    <h3>Über uns</h3>
    <h3>Social Media</h3>
</footer>
";

}
