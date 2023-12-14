<?php
$data = json_decode(file_get_contents('php://input'), true);
$localTime = strtotime($data['timestamp']) + 3600;
$logEntry = sprintf("[%s] Event #%d: %s\n", date('Y-m-d H:i:s', $localTime), $data['eventNumber'], $data['message']);
file_put_contents('events.txt', $logEntry, FILE_APPEND | LOCK_EX);
http_response_code(200);
?>
