<?php

require __DIR__.'config.php';


header('Content-Type: application/json; charset=utf-8');


$context = stream_context_create([
    'http' => ['header' => "User-Agent: Mozilla/5.0\r\n"]
]);

$list = $baseURL . '/seismoi-lista';
$html = file_get_contents($list, false, $context);


$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);
$items = $xpath->query($regxQry);

$quakes = [];

foreach ($items as $i => $a) {
    $magnitude = '';
    $title = '';
    $timeAgo = '';
    $href = $a->getAttribute('href');

  foreach ($a->getElementsByTagName('span') as $span) {
   $magnitude =  trim($span->textContent);
}

    foreach ($a->getElementsByTagName('h4') as $h4) {
        $title = trim($h4->textContent);
    }

    foreach ($a->getElementsByTagName('small') as $small) {
        $timeAgo = trim($small->textContent);
    }

    $quakes[] = [
        'id' => $i + 1,
        'magnitude' => $magnitude,
        'title' => $title,
        'timeAgo' => $timeAgo,
        'detailbaseURL' => $baseURL . '/' . $href
    ];
}

echo json_encode($quakes, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);