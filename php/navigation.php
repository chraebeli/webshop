<?php

$db = new mysqli("localhost", "root", "", "webshop");
if ($db->connect_errno > 0) {
    die("Unable  to  connect  to  database  [" . $db->connect_error . "]");
}

if (!$result = $db->query("SELECT  *  FROM  category ORDER BY main_category, stufe, category ASC;")) {
    die("There  was  an  error  running  the  query  [" . $db->error . "]");
}

echo "<ul class=accordion-menu>";
$category = $result->fetch_assoc();
$counter = 0;
while ($counter++ < $result->num_rows) {

    echo "<li>
        <div class='dropdownlink'><i class='$category[icon]' aria-hidden='true'></i>$category[category]
        <i class='$category[icon]' aria-hidden='true'></i>
        </div>
        <ul class=submenuItems>";
    while ($category = $result->fetch_assoc()) {
        if ($category["stufe"] == 1) {
            break;
        }
        $counter++;
        $url = createURL($language, $category["category"]);
        echo "<li><a href=$url><i class='$category[icon]' aria-hidden='true'></i>$category[category]</a></li>";
    }
    echo "</ul></li>";
}

echo "</ul>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'> </script>
<script src=../js/index.js></script>";

$db->close();
