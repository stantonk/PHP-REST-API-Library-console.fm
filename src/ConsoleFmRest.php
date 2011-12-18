<?php

require_once('./config.php');

class ConsoleFmRest
{
	const BASE = 'http://console.fm/api';

	public $version;

	private $actions = array(
		'artists' => '/artists/',
		'genres' => '/genres/',
		'users' => 'users'
	);

	/**
	 *
	 *
	 */
	public function __construct($apiVersion='v1') {
		$this->version = $apiVersion;
	}

	/**
	 *
	 *
	 */
	//TODO: Should be: private function genUri($desiredAction) {
	public function genUri($desiredAction) {
		$url = self::BASE . '/' . $this->version;

		if (array_key_exists($desiredAction, $this->actions)) {
			$url .= $this->actions[$desiredAction];
		} else {
			throw new Exception("Exception: Unknown desiredAction: $desiredAction");
		}

		return $url;
	}


/*
	public function getGenres() {
	}
*/

}

$myConsoleFm = new ConsoleFmRest();

try {
	echo $myConsoleFm->genUri('genres') . "\n";
	echo $myConsoleFm->genUri('ducks') . "\n";
} catch (Exception $e) {
	echo "Whoops\n";
}



/*
$base = 'http://console.fm/api/v1';
$action = array(
	'genres' => '/genres/',
	'users' => '/users/'
);
$query_string = "";

$params = array(
	'api_key' => $API_KEY
);

foreach ($params as $key => $value) {
    $query_string .= "$key=" . urlencode($value) . "&";
}

$url = $base . $action['genres'] . '?' . $query_string;
//$url = $base . $action['users'] . '?' . $query_string;
$output = file_get_contents($url);
echo $output;
*/
