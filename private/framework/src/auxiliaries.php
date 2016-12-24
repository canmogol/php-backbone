<?

function array_to_xml($array = array()) {
    $xml = "";
    foreach ($array as $key => $value) {
        $xml .= "<" . $key . ">";
        if (is_array($value)) {
            $xml .= array_to_xml($value);
        } else {
            $xml .= $value;
        }
        $xml .= "</" . $key . ">\n";
    }
    return $xml;
}

function array_to_xml_with_key($key = "key", $array = array()) {
    $xml = "";
    foreach ($array as $value) {
        $xml .= "<" . $key . ">";
        if (is_array($value)) {
            $xml .= array_to_xml($value);
        } else {
            $xml .= $value;
        }
        $xml .= "</" . $key . ">\n";
    }
    return $xml;
}

?>