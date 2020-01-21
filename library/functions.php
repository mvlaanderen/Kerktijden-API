<?php

/* ===========================================================================
Name      : ChurchServiceFetcher - Functions
Version   : 1.0
Auhtor    : M. Vlaanderen
Date      : 2019/06/26
Functions : convertDutch    - Convert dutch formated timestamp into english
=============================================================================*/

function convertDutch($datetime) {
    $days = array(
        "maandag"   => "Monday",
        "dinsdag"   => "Tuesday",
        "woensdag"  => "Wednesday",
        "donderdag" => "Thursday",
        "vrijdag"   => "Friday",
        "zaterdag"  => "Saturday",
        "zondag"    => "Sunday"
    );

    $months = array(
        "januari"   => "January",
        "februari"  => "February",
        "maart"     => "March",
        "april"     => "April",
        "mei"       => "May",
        "juni"      => "June",
        "juli"      => "July",
        "augustus"  => "August",
        "september" => "September",
        "oktober"   => "October",
        "november"  => "November",
        "december"  => "December"
    );

    $array = explode(" ", $datetime);
    $array[0] = $days[strtolower($array[0])];
    $array[2] = $months[strtolower($array[2])];
    return strtotime(implode(" ", $array));
}

?>