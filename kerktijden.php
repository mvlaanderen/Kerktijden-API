<?php

/* ==================================================================================
Name    : Kerktijden API
Version : 2.0
Auhtor  : M. Vlaanderen
Date    : 2020/01/21
Purpose : Retrieve churchservices from the all famous kerktijden.nl website and 
          output it in JSON for use in various apps.
====================================================================================*/

# Check if a parameter has given in.
if(isset($_GET['churchid']))
{
  $idChurch = $_GET['churchid'];
} else {
    header("HTTP/1.0 405 Method Not Allowed");
    echo "Parameter missing.";
    exit();
}

// Let's call the DOM parser and other functions to assist us.
include('library/simple_html_dom.php');
include('library/functions.php');

// Now let's call the website with data.
$html = file_get_html("https://www.kerktijden.nl/gem/" . $idChurch . "/");

// Define the array to put in some data.
$items = array();

// Iterate through data and fetch every li.day
foreach($html->find('li.day') as $rawChurchEvent) {
    $item['date'] = date("d-m-Y", convertDutch($rawChurchEvent->find('span.dayText', 0)->plaintext));
    $item['timeAM'] = strstr($rawChurchEvent->find('span.time', 0)->plaintext, ' uur', true);
    $item['preacherAM'] = $rawChurchEvent->find('span.preacher', 0)->plaintext;
    $item['timePM'] = strstr($rawChurchEvent->find('span.time', 1)->plaintext, ' uur', true);
    $item['preacherPM'] = $rawChurchEvent->find('span.preacher', 1)->plaintext;
    $items[] = $item;
}

// Convert the array with data into JSON and prettyfy it.
$json_string = json_encode($items, JSON_PRETTY_PRINT);

// And print it.. 8-)
echo $json_string

?>