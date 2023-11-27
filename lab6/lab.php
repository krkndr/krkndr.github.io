<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photoUrls = json_decode($_POST["photoUrls"], true);
    $filename = 'saved_photos.txt';
    file_put_contents($filename, '');
    file_put_contents($filename, implode("\n", $photoUrls), FILE_APPEND | LOCK_EX);
    echo "Photos saved successfully!";   
}
?>
