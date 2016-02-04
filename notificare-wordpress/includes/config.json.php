<?php
require('../../../../wp-blog-header.php');
$contents = array(
      "apiUrl" => "https://cloud.notifica.re/api",
      "awsStorage" => "https://s3-eu-west-1.amazonaws.com/notificare-storage",
      "appHost" => get_option('notificare_applicationHost'),
      "appVersion" => get_option('notificare_applicationVersion'),
      "appKey" => get_option('notificare_applicationKey'),
      "appSecret" => get_option('notificare_applicationSecret'),
      "allowSilent" => get_option('notificare_allowSilent'),
      "soundsDir" => get_option('notificare_soundsDir'),
      "serviceWorker" => get_option('notificare_serviceWorker'),
      "serviceWorkerScope" => get_option('notificare_serviceWorkerScope'),
      "geolocationOptions" => array(
          "timeout" => get_option('notificare_geolocationOptionsTimeout'),
          "enableHighAccuracy" => get_option('notificare_geolocationOptionsEnableHighAccuracy'),
          "maximumAge" => get_option('notificare_geolocationOptionsMaximumAge')
        )
);
header("Content-Type: application/json;charset=utf-8");
echo json_encode( $contents ) ;
?>