<?php
$filePath1 = 'events.txt';
file_put_contents($filePath1, '');
$filePath2 = 'events2.txt';
file_put_contents($filePath2, '');
http_response_code(200);
?>
