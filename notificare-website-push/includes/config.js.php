<?php
header("Content-Type: application/javascript;charset=utf-8");

$contents = array(
      "apiUrl" => "https://cloud.notifica.re/api",
      "awsStorage" => "https://s3-eu-west-1.amazonaws.com/notificare-storage",
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

echo 'PLUGIN_OPTIONS = ' . json_encode( $contents ) . ';' ;
?>