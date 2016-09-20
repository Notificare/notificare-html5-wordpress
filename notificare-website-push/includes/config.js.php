<?php
header("Content-Type: application/javascript;charset=utf-8");

$contents = array(
      "appHost" => $_GET['appHost'],
      "appVersion" => $_GET['appVersion'],
      "appKey" => $_GET['appKey'],
      "appSecret" => $_GET['appSecret'],
      "allowSilent" => $_GET['allowSilent'],
      "soundsDir" => $_GET['soundsDir'],
      "serviceWorker" => $_GET['serviceWorker'],
      "serviceWorkerScope" => $_GET['serviceWorkerScope'],
      "geolocationOptions" => array(
          "timeout" => $_GET['timeout'],
          "enableHighAccuracy" => $_GET['enableHighAccuracy'],
          "maximumAge" => $_GET['maximumAge']
        )
);

echo 'NOTIFICARE_PLUGIN_OPTIONS = ' . json_encode( $contents ) . ';' ;
?>