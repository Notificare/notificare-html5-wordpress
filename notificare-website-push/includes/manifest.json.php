<?php
$contents = array(
      "name" => $_GET['app'],
      "short_name" => $_GET['app'],
      "display" => 'standalone',
      "gcm_user_visible_only" => true,
      "gcm_sender_id" => $_GET['gcmSender']
);

header("Content-Type: application/json;charset=utf-8");
echo json_encode( $contents ) ;
?>