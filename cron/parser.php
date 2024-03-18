<?php

include '../vendor/autoload.php';


$parser = new \Aleks\Devtask\Parser();
$xml_data = $parser->getDataFromCB();
$valute = json_decode(json_encode($xml_data), true)["Valute"];
$today = date("d_m_y");
$buffer = fopen(__DIR__.'/../data/'.$today.'.csv', 'w');

foreach($valute as $val) {
    unset($val['@attributes']);
    fputcsv($buffer, $val, ';');
}

