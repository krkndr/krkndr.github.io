<?php
// Шлях до файлу
$filePath1 = 'events.txt';

// Очищення файлу
file_put_contents($filePath1, '');
$filePath2 = 'events2.txt';

// Очищення файлу
file_put_contents($filePath2, '');
// Відповідь на клієнта
http_response_code(200);
?>
