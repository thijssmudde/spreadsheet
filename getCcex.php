<?php

header('Content-Type: application/json');

$data = file_get_contents('https://c-cex.com/t/prices.json');
$json = json_decode($data, true);
$array = [];

//var_dump($data);
foreach ($json as $value => $element) {
	foreach($element as $valuer => $elementer) { 
		if ($valuer == 'lastprice') {		
			$rounded = number_format($elementer, 8, '.', ' ');
			array_push($array, array($value => "$rounded"));
		}
	}
}

$encoded = json_encode($array);
print_r($encoded);