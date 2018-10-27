<?php

function get_param($name, $default)
{
    if (!isset($_GET[$name])) {
        return $default;
    }
    return urldecode($_GET[$name]);
}

function add_param($url, $name, $value)
{
    if (strpos($url, '?') !== false) {
        $sep = '&';
    } else {
        $sep = '?';
    }
    return $url . $sep . $name . "=" . urlencode($value);
}

function test()
{
    echo "adsfaldfjl";
}

function navigation($language, $pageId)
{
    $menu = array
        (
        array('Arbeitskleidung', "Handschuhe", "Schuhe", "Helme"),
        array("Kleingeräte", "Bohrmaschinen", "Winkelschleifer", "Rührwerk"),
        array("Signalisation", "Signalisationstafeln", "Absperrlatten", "Faltsignale", "Markierungshut"),

    );
    $urlbase = add_param($_SERVER['PHP_SELF'], "lang", $language);

    $currentCategory = 0;
    $currentSubCategory = 0;

    for ($currentSubCategory; $currentSubCategory < 6; $currentSubCategory++) {
        $currentCategory = array_search($pageId, array_column($menu, $currentSubCategory));
        if ($currentCategory !== false) {
            break;
        }
    }

    for ($i = 0; $i <= count($menu) - 1; $i++) {
        for ($j = 0; $j <= count($menu[$i]) - 1; $j++) {
            $url = add_param($urlbase, "id", $menu[$i][$j]);
            $class = $pageId == $menu[$i][$j] ? 'active' : 'inactive';
            if ($j == 0) {
                echo "<a class=  $class  href=   $url >" . $menu[$i][$j] . "</a>";
            }
            if ($currentCategory == $i & $pageId !== -1 & $j > 0) {
                $class = $pageId == $menu[$i][$j] ? 'sub_active' : 'sub_inactive';
                echo "<a class=  $class  href=   $url >" . $menu[$currentCategory][$j] . "</a>";
            }
        }
    }
}

function items($pageId, $language)
{

    $headers = array("Bild", "Art. Nr.", "Beschreibung", "Preis");

    $items = array
        (
        array(107010, "Handschuhe Top-Flex rot, 12 Paar", "36.00"),
        array(107011, "Handschuhe Top- FlexThermo, 10 Paar", "45.00"),
        array(107059.1, "Sicherheitsschuh Stuco Hiking, Blau", "109.50"),
        array(107059.2, "Sicherheitsschuh Stuco Hiking, Beige", "109.50"),
        array(107059.3, "Sicherheitsschuh Stuco Hiking, Gelb", "109.50"),
        array(107059.4, "Sicherheitsschuh Stuco Hiking, Grau", "109.50"),
        array(107059.5, "Sicherheitsschuh Stuco Hiking, Grün", "109.50"),
        array(107059.6, "Sicherheitsschuh Stuco Hiking, Orange", "109.50"),
        array(107059.7, "Sicherheitsschuh Stuco Hiking, Rot", "109.50"),
        array(107127.1, "Schutzhelm ELITE mit Drehrad, Blau", "14.05"),
        array(107127.2, "Schutzhelm ELITE mit Drehrad, Gelb", "14.05"),
        array(107127.3, "Schutzhelm ELITE mit Drehrad, Weiss", "14.05"),
        array(107437, "Softshell- Jacke Kl. 1 orange/anthrazit", "122.65"),
        array(107510, "Warnlatzhose Kl. 2 orange/anthrazit", "65.90"),
        array(120001, "BS 18 LTX BL QI Kar Akku-Bohrschrauber", "120.00"),
        array(120003, "SB 18 LTX BL QI Set Akku-Schlagbohrmaschine", "529.00"),
        array(120019, "KHA 36 Set Akku-Kombihammer Metabo", "919.00"),
        array(120033, "WE 24-230 MVT Set Winkelschleifer Metabo", "239.00"),
        array(120049, "WEA 24-230 MVT Quick Winkelschleifer", "289.00"),
        array(120050, "WE 17-125 Quick 230 V Winkelschleifer", "189.00"),
        array(108011, "Markierungshut PVC 50 cm rot/weiss", "11.00"),
        array(108017, "Faltsignal 90 cm Baustelle tagesleuchtend ", "109.00"),
        array(108027, "Absperrlatte rot-weiss FRUTIGER", "18.90"),
        array(108108, "Gefahrensignal 90 cm Baustelle", "47.00"),
        array(108109, "Gefahrensignal 90 cm kein Vortritt", "52.50"),
        array(108110, "Gefahrensignal 90 cm Lichtsignale", "52.00"),
        array(108201, "Vorschriftssignale Ø 60 cm allg. Fahrverbot", "48.00"),
        array(108202, "Vorschriftssignale Ø 60 cm Einfahrt verboten", "55.00"),
    );

    $itemsCategory = array
        (
        array(107010, "Arbeitskeidung", "Handschuhe"),
        array(107011, "Arbeitskleidung", "Handschuhe"),
        array(107059.1, "Arbeitskleidung", "Schuhe"),
        array(107059.2, "Arbeitskleidung", "Schuhe"),
        array(107059.3, "Arbeitskleidung", "Schuhe"),
        array(107059.4, "Arbeitskleidung", "Schuhe"),
        array(107059.5, "Arbeitskleidung", "Schuhe"),
        array(107059.6, "Arbeitskleidung", "Schuhe"),
        array(107059.7, "Arbeitskleidung", "Schuhe"),
        array(107127.1, "Arbeitskleidung", "Helme"),
        array(107127.2, "Arbeitskleidung", "Helme"),
        array(107127.3, "Arbeitskleidun", "Helme"),
        array(107437, "Arbeitskleidung", "Arbeitskleidung"),
        array(107510, "Arbeitskleidung", "Arbeitskleidung"),
        array(120001, "Kleingeräte", "Bohrmaschinen"),
        array(120003, "Kleingeräte", "Bohrmaschinen"),
        array(120019, "Kleingeräte", "Bohrmaschinen"),
        array(120033, "Kleingeräte", "Winkelschleifer"),
        array(120049, "Kleingeräte", "Winkelschleifer"),
        array(120050, "Kleingeräte", "Winkelschleifer"),
        array(108011, "Signalisation", "Markierungshut"),
        array(108017, "Signalisation", "Faltsignale"),
        array(108027, "Signalisation", "Absperrlatten"),
        array(108108, "Signalisation", "Signalisationstafeln"),
        array(108109, "Signalisation", "Signalisationstafeln"),
        array(108110, "Signalisation", "Signalisationstafeln"),
        array(108201, "Signalisation", "Signalisationstafeln"),
        array(108202, "Signalisation", "Signalisationstafeln"),
    );

    $headers = array("Bild", "Art. Nr.", "Beschreibung", "Preis", " ", " ");

    if ($pageId > 10000) {
        echo "<article><div class=product_img><img src=images/Items/$pageId.jpg width=420px> </div>" . "<div class=product_descritpion><h2>" . $items[array_search($pageId, array_column($items, '0'))][1] . "<h3>CHF  " . $items[array_search($pageId, array_column($items, '0'))][2] .
            "<select class=dropdown_seize>
        <option value=1 selected disabled hidden>Grössen wählen</option>
        <option value=S>S</option>
        <option value=M>M</option>
        <option value=L>L</option>
        <option value=XL>XL</option>
        type=submit value='Bestellen'/> <input class=button_order type=submit value='Bestellen'/><a/>";
    } else {
        echo "<table class=mainTable><tr><th>" . implode('</th><th>', $headers) . "</tr>";
        $i = 0;
        foreach ($itemsCategory as $item) {
            $urlbase = add_param($_SERVER['PHP_SELF'], "lang", $language);
            $url = add_param($urlbase, "id", $item[0]);

            if ($pageId == $item[1] | $pageId == $item[2] | $pageId == -1) {
                echo "<tr><td>
            <a class=  item  href=   $url >" . "<img src=images/Items/$item[0].jpg width=150> </a>" . '</td><td>' . implode('</td><td>', $items[$i]) . '<td><input  type="text" placeholder="Stückzahl"/>' . "<a class=  item  href=   $url >" . "<td><input  type=submit value='In den Warbenkorb'/><a/>";
            }
            $i++;
        }
        echo "</tbody> </table>";
    }

}

function languages($language, $pageId)
{
    $languages = ['en', 'fr', 'de'];
    $urlbase = add_param($_SERVER['PHP_SELF'], 'id', $pageId);
    foreach ($languages as $l) {
        $class = $language == $l ? 'active' : 'inactive';
        echo '<a class="right", ' . $class . '" href="';
        echo add_param($urlbase, 'lang', $l) . '">';
        echo strtoupper($l) . '</a>';
    }
}

function content($pageId)
{
    echo t('content') . " $pageId";
}

function t($key)
{
    global $language;
    $texts = array(
        'page' => array(
            'de' => 'Seite', 'fr' => 'Page', 'en' => 'Page'),
        'content' => array(
            'de' => 'Willkommen auf der Seite',
            'fr' => 'Bienvenue `a la page ',
            'en' => 'Welcome to the page '),
    );
    return $texts[$key][$language] ?? "[$key]";
}
