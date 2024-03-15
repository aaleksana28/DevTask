<?php

namespace Aleks\Devtask;

class Parser {
    public function getDataFromCB() {
        $data = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp");
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($data), $xml_values);
        xml_parser_free($parser);
        return $xml_values;
    }

}