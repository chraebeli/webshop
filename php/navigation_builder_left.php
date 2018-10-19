<?php
require_once('classes.php');

// Create left navigation
$navigation = new Navigation();
$navigation->addHeadCategorie("Signalisation");
$navigation->addHeadCategorie("Arbeitskleidung");
$navigation->addHeadCategorie("Kleingeraete");
$navigation->addChildCategorie("Signalisation", "Signalisationstafeln");
$navigation->addChildCategorie("Signalisation", "Absperrlatten");
$navigation->addChildCategorie("Arbeitskleidung", "Handschuhe");
$navigation->addChildCategorie("Arbeitskleidung", "Schuhe");
$navigation->addChildCategorie("Arbeitskleidung", "Helme");
$navigation->addChildCategorie("Kleingeraete", "Bohrmaschinen");
$navigation->addChildCategorie("Kleingeraete", "Winkelschleifer");
$navigation->addChildCategorie("Kleingeraete", "Ruehrwerk");