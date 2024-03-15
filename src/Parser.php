<?php

namespace Aleks\Devtask;

class Parser {
    public function getDataFromCB() {
        $data = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
        $xml_data = simplexml_load_string($data);

        return $xml_data;
    }

}