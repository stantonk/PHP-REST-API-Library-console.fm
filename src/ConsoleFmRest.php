<?php

$base = 'http://console.fm/api/v1';
$action = array(
	'genres' => '/genres/',
	'users' => '/users/'
);
$query_string = "";

$params = array(
	'api_key' => 'YOUR_API_KEY_HERE'
);

foreach ($params as $key => $value) {
    $query_string .= "$key=" . urlencode($value) . "&";
}

$url .= $base . $action['genres'] . '?' . $query_string;
//$url .= $base . $action['users'] . '?' . $query_string;
$output = file_get_contents($url);
echo $output;
