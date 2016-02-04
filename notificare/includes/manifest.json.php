<?php
require('../../../../wp-blog-header.php');
$contents = array(
      "name" => get_option('notificare_applicationName'),
      "short_name" => get_option('notificare_applicationName'),
      "display" => 'standalone',
      "gcm_user_visible_only" => true,
      "gcm_sender_id" => get_option('notificare_gcmSender')
);

header("Content-Type: application/json;charset=utf-8");
echo json_encode( $contents ) ;
?>