<?php
	header("Content-Type: application/json");
	$gcm_sender_id = preg_replace('/[^0-9]/', '', $_GET["gcm_sender_id"]);
?>
{
  "name": "Website Push",
  "short_name": "Website Push",
  "display": "standalone",
  "gcm_sender_id": "<?php echo $gcm_sender_id; ?>",
  "gcm_user_visible_only": true
}