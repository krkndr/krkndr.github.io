<?php
$data = json_decode(file_get_contents('php://input'), true);
$events = $data['events'];
$logEntries = array();
foreach ($events as $event) {
    $localTime = strtotime($event['timestamp']) + 3600; // Додаємо одну годину (60 секунд * 60 хвилин)
    $logEntry = sprintf("[%s] Event #%d: %s\n", date('Y-m-d H:i:s', $localTime), $event['eventNumber'], $event['message']);
    $logEntries[] = $logEntry;
}
file_put_contents('events2.txt', implode('', $logEntries), FILE_APPEND | LOCK_EX);
http_response_code(200);
?>
