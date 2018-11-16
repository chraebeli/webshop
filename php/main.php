<?php
include_once "authentication.inc.php";
include "functions.php";

$language = get_param('lang', 'en');
$pageId = get_param('id', -1);
?>

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
        </nav>
        <div>
            <?php allocate($language, $pageId);?>
        </div>
        <!--<span class="sales">
            <span>adsfasfaf</span>
        </span>-->
    </div>
    <footer class="footer">
        <?php include "footer.php";?>
    </footer>
</body>

</html>