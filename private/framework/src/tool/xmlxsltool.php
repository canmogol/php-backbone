<?
class XmlXslTool {

    const ERROR_MESSAGE = "errors";
    const NOTICE_MESSAGE = "notices";
    const DEVEL_KEY = "development";
    const CURRENT_NODE = "current_node";

    /**
     * @var array $xmlArray
     */
    public $xmlArray = array();

    /**
     * @container
     * */
    private $container;

    /**
     * @param Container container
     * @return void
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    //end of setContainer

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    //end of getContainer

    /**
     * @param $xml
     * @return string
     */
    function addXmlHeaderFooter($xml) {
        $string = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<root>\n";
        $string .= $xml;
        $string .= "</root>\n";
        return $string;
    }

    /**
     * @param $xmlContent
     * @param $xslFile
     * @return string
     */
    function echoXmlXslOutput($xmlContent, $xslFile) {
        $output = "";
        if (file_exists($xslFile)) {
            $xmlContent .= array_to_xml($this->xmlArray);
            $xmlContent = $this->addXmlHeaderFooter($xmlContent);
            $this->getContainer()->getLogger()->log($xmlContent);

            $dom = new DOMDocument();
            $xsl = new ExtendedXSLTProcessor();
            $xsl->registerExtension('pre', array($xsl, 'transform'));
            $xsl->setXML($xmlContent);
            $dom->load($xslFile);
            $xsl->importStyleSheet($dom);
            $dom->loadXML($xmlContent);

            $output = $xsl->transformToXML($dom);
            $output = str_replace('xmlns:pre="http://www.generated-content.com/xsl/process"', "", $output);
            $position = strpos($output, "\n");
            if ($position !== false) {
                $output = substr($output, $position + 1);
            }
        }
        return $output;
    }

    /**
     * @param string $parentName
     * @param array $children
     */
    public function add($parentName, $children = array()) {
        if (!is_null($parentName) && is_array($children)) {
            if (array_key_exists($parentName, $this->xmlArray)) {
                $this->xmlArray[$parentName] = array_merge($this->xmlArray[$parentName], $children);
            } else {
                $this->xmlArray[$parentName] = $children;
            }
        }
    }


}

