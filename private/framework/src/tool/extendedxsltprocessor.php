<?

class ExtendedXSLTProcessor extends XSLTProcessor {

    private $_extensions = array();

    private $xmlContent;


    public function registerExtension($name, $callback) {
        $this->_extensions[$name] = $callback;
    }

    /**
     * (PHP 5)<br/>
     * Transform to XML
     * @link http://php.net/manual/en/xsltprocessor.transformtoxml.php
     * @param DOMDocument $doc <p>
     * The transformed document.
     * </p>
     * @return string The result of the transformation as a string or <b>FALSE</b> on error.
     */
    public function transformToXml (DOMDocument $doc){
        $partial = $this->transformToDoc($doc);
        $nodes = $partial->getElementsByTagNameNS('http://www.generated-content.com/xsl/process', '*');
        $nodesArray = array();
        for ($i = 0; $i < $nodes->length; $i++) {
            $node = $nodes->item($i);
            $nodesArray[] = $node;
            if (isset($this->_extensions[$node->prefix])) {
                $this->transform($node);
            }
        }
        for ($i = 0; $i < count($nodesArray); $i++) {
            $n = $nodesArray[$i];
            $n->parentNode->removeChild($n);
        }

        return str_replace(array("&lt;", "&gt;", ";amp;"), array("<", ">", ";"), $partial->saveXML());
    }

    /**
     * @param DOMNode $node
     */
    public function transform(DOMNode $node) {
        $doc = $node->ownerDocument;
        $new = $doc->createTextNode($this->generateHTML($node));
        $node->parentNode->insertBefore($new, $node);
    }

    /**
     * @param $node
     * @return mixed
     */
    private function generateHTML($node) {
        $dom = new DOMDocument();
        $xsl = new XSLTProcessor();
        $dom->load($node->textContent . ".xsl");
        $xsl->importStyleSheet($dom);
        $dom->loadXML($this->xmlContent);
        $arr = explode("<?xml version=\"1.0\" encoding=\"utf-8\"?>", $xsl->transformToXML($dom));
        return $arr[1];
    }

    /**
     * @param $xmlContent
     */
    public function setXML($xmlContent) {
        $this->xmlContent = $xmlContent;
    }
}

?>