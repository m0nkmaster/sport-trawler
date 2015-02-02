<?php

$file = 'football-teams.csv';
$folder = 'gatling-load-tests/src/test/resources/sport/'; 
    
$prefix = 'http://m.bbc.co.uk';
$suffix = '';

$data = file($folder . $file);
echo '**' . trim($data[0]) . "**\n\n";
array_shift($data);

foreach ($data as $url) {
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $prefix . trim($url)); 
    curl_setopt($ch, CURLOPT_HEADER, TRUE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    $head = curl_exec($ch); 
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    curl_close($ch); 

    if ($httpCode != 200) {
        echo "\n[" . $httpCode . '] ' . $prefix . $url . "\n";
    } else {
        echo '.';
    }
}