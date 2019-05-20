<?php
header("Content-Type: application/javascript;charset=utf-8");

$contents = array(
    "appHost" => $_GET['appHost'],
    "appVersion" => $_GET['appVersion'],
    "appKey" => $_GET['appKey'],
    "appSecret" => $_GET['appSecret'],
    "soundsDir" => $_GET['soundsDir'],
    "serviceWorker" => $_GET['serviceWorker'],
    "serviceWorkerScope" => $_GET['serviceWorkerScope'],
    "googleMapsAPIKey" => $_GET['googleMapsAPIKey'],
    "geolocationOptions" => array(
        "timeout" => 0,
        "enableHighAccuracy" => false,
        "maximumAge" => 0
    )
);

if (!empty($_GET['timeout'])) {
    $contents["geolocationOptions"]["timeout"] = intval($_GET['timeout']);
}
if (!empty($_GET['enableHighAccuracy']) && $_GET['enableHighAccuracy'] == 'true') {
    $contents["geolocationOptions"]["enableHighAccuracy"] = true;
}
if (!empty($_GET['maximumAge'])) {
    $contents["geolocationOptions"]["maximumAge"] = intval($_GET['maximumAge']);
}

echo 'NOTIFICARE_PLUGIN_OPTIONS = ' . json_encode( $contents ) . ';' ;
