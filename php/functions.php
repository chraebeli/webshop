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

function allocate($language, $pageId)
{
    switch ($pageId) {
        case "item_Order":
            shipping_address();
            break;
        case "next_OrderAddress":
            payment();
            break;
        case "next_Pay":
            shipping();
            break;
        case "confirm_Order":
            confirm_shipping();
            break;
        case is_string($pageId):
            /*echo "$pageId is string";*/
            items($language, $pageId);
            break;
        case -1:
            items($language, $pageId);
            break;
    }

}

function createURL($language, $name)
{
    $urlbase = add_param($_SERVER['PHP_SELF'], "lang", $language);
    $url = add_param($urlbase, "id", $name);
    return $url;
}

function show_item()
{
}

function shipping_address()
{
    echo "<div><form><h3>Lieferung</h3><p>
            <input type=checkbox id=Abholen name=feature value=Abholen />
            <label for=Abholen>Abholen</label>
        </p>
        <p>
            <input type=checkbox id=Lieferung Post name=feature value=Lieferung Post />
            <label for=Lieferung Post>Lieferung Post</label>
        </p>
        <p>
            <label for=comment>Kommentar: </label> </p>
        <p> <textarea id=advanced name=advanced rows=10 cols=33 maxlength=200 wrap=hard>
          </textarea>
        </p>
</div>

</form>
<form action=" . createURL($language, "sendMail") . ">
    <input class=button_forward type=submit value=Bestellen style=width: 600px;height: 150px>
     </form>";
}

function payment()
{
    echo "<div><form><h3>Lieferung</h3><p>
            <input type=checkbox id=Abholen name=feature value=Abholen />
            <label for=Abholen>Abholen</label>
        </p>
        <p>
            <input type=checkbox id=Lieferung Post name=feature value=Lieferung Post />
            <label for=Lieferung Post>Lieferung Post</label>
        </p>
        <p>
            <label for=comment>Kommentar: </label> </p>
        <p> <textarea id=advanced name=advanced rows=10 cols=33 maxlength=200 wrap=hard>
          </textarea>
        </p>
</div>

</form>
<form action=" . createURL($language, "sendMail") . ">
    <input class=button_forward type=submit value=Bestellen style=width: 600px;height: 150px>
     </form>";
}

function shipping()
{

}

function confirm_shipping()
{
    echo "<div><form><h3>Lieferung</h3><p>
            <input type=checkbox id=Abholen name=feature value=Abholen />
            <label for=Abholen>Abholen</label>
        </p>
        <p>
            <input type=checkbox id=Lieferung Post name=feature value=Lieferung Post />
            <label for=Lieferung Post>Lieferung Post</label>
        </p>
        <p>
            <label for=comment>Kommentar: </label> </p>
        <p> <textarea id=advanced name=advanced rows=10 cols=33 maxlength=200 wrap=hard>
          </textarea>
        </p>
</div>

</form>
<form action=" . createURL($language, "sendMail") . ">
    <input class=button_forward type=submit value=Bestellen style=width: 600px;height: 150px>
     </form>";
}

function items($language, $pageId)
{

    $headers = array("Bild", "Art. Nr.", "Beschreibung", "Preis", " ", " ");

    if ($pageId == "Order") {
        include 'shippingForm.php';
    }

    if ($pageId > 10000) {
		/*
        

        foreach ($items as $item) {
            if (count($item) == 3 && $pageId == $item[0]) {
                $options = "";
                break;
            }
            if ($pageId == $item[0]) {
                for ($i = 3; $i < count($item); $i++) {
                    $options = $options . "<option value=3>$item[$i]</option>";
                }
            }

        }
        ;
		*/
		$options = "<select class=dropdown_seize><option value=1 selected disabled hidden>Grössen wählen</option>";
		$db = new mysqli("localhost", "root", "", "webshop");
		if ($db->connect_errno > 0) {die("Unable  to  connect  to  database  [" . $db->connect_error . "]");
        }
		$result = $db->query("SELECT * FROM `item` WHERE `art.-Nr.` =".$pageId.";");
		if (!$result) {
            die("There  was  an  error  running  the  query  [" . $db->error . "]");
        }
		$item = $result->fetch_assoc();
		$db->close();
		echo 
			"<article>
				<div class=product_img>
					<img src=../images/Items/$pageId.jpg width=450px> 
				</div>" . 
				"<div class=product_descritpion>
					<h2>" . $item["beschreibung"] . "</h2>
					<h3>CHF  " . $item['preis'] . "</h3>" .
					$options . " <select/>
					<a class=  item  href=" . createURL($language, "item_Order") . "><input class=button_order type=submit value=Bestellen />
			</article>";
    } else {

        $headers = array("Bild", "Art. Nr.", "Beschreibung", "Preis", "", "");
        echo "<table class=mainTable><tr><th>" . implode('</th><th>', $headers) . "</tr>";

        $db = new mysqli("localhost", "root", "", "webshop");
        if ($db->connect_errno > 0) {die("Unable  to  connect  to  database  [" . $db->connect_error . "]");
        }

        if (!$result = $db->query("SELECT  *  FROM  item;")) {
            die("There  was  an  error  running  the  query  [" . $db->error . "]");
        }
        while ($item = $result->fetch_assoc()) {
            if ($item["category"] == $pageId || $pageId == -1) {
                $url = createURL($language, $item["art.-Nr."]);
                echo "
            <tr><td> <a class=  item  href=   $url >" . "<img src=../images/Items/" . $item["art.-Nr."] . ".jpg width=150> </a>
            </td><td>" . $item["art.-Nr."] . "
            </td><td>" . $item["beschreibung"] . "
            </td><td>" . $item["preis"] . "
            </td><td><input  type=text placeholder=Stückzahl></td>
            <td><a class=  item  href= $url ><input  type=submit value='In den Warbenkorb'></td><a/>";
            }
        }

        echo "</tbody> </table>";
        $db->close();
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
