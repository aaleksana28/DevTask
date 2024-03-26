<?php

namespace Aleks\Devtask;

class Parser {
    public function getDataFromCB() {
        $data = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
        $xml_data = simplexml_load_string($data);

        return $xml_data;
    }

    public static function getDataFromFile() {
        $date = date('d_m_y');

        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/data/' . $date . '.csv')) {
            shell_exec('php ' . $_SERVER['DOCUMENT_ROOT'] . '/cron/parser.php');
        }
        $f = fopen($_SERVER['DOCUMENT_ROOT'] . '/data/' . $date . '.csv', 'r');

        $data = [];
        while ($item = fgetcsv($f, null, ';')) {
            $data[$item[1]] = [
                "SHORT_KEY" => $item[1],
                "RUB_COUNT" => $item[2],
                "NAME" => $item[3],
                "VALUTE_VALUE" => $item[5]
            ];
        }

        return $data;
    }

}