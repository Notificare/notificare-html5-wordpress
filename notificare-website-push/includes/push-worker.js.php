<?php
header("Content-Type: application/javascript;charset=utf-8");
header("Service-Worker-Allowed: " . $_GET['serviceWorkerScope']);
include(dirname(dirname(__FILE__)) . '/public/js/push-worker.js');
