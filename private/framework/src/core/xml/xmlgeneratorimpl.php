<?
/**
 * @package tool
 */
class XmlGeneratorImpl implements XmlGenerator {


    /**
     * @var int
     */
    private $xmlLevel = 0;

    /**
     * @var int
     */
    private $totalNodes;

    /**
     * @var string
     */
    private $xml;

    /**
     * @var string
     */
    private $nodeName;

    /**
     * @var array
     */
    private $nodesArray;


    /**
     *
     * @param array $nodesArray
     * @param string $nodeName
     * @param int $level
     * @return string
     * @access public
     */
    public function generateXml(array $nodesArray, $nodeName, $level = 0) {

        $this->xml = "";
        $this->setNodeName($nodeName);
        $this->setNodesArray($nodesArray);
        $this->setTotalNodes(count($nodesArray));

        return $this->generator($nodesArray, $nodeName, $level);
    }


    /**
     * @param array $array
     * @param string $nodeName
     * @param int $level
     * @return String
     * @access public
     */
    private function generator(array $array, $nodeName, $level) {

        if (!is_null($nodeName)) {
            $this->xml .= "
" . str_repeat("\t", $level) . "<" . $nodeName . ">";
        }

        foreach ($array as $key => $value) {

            if (is_array($value)) {
                $this->generator($value, $key, $level + 1);
            } else {
                $this->xml .= "
" . str_repeat("\t", $level + 1) . "<" . $key . ">" . (!is_numeric($value) ? "<![CDATA[" . $value . "]]>" : $value) . "</" . $key . ">";
            }
        }

        if (!is_null($nodeName)) {
            $this->xml .= "
" . str_repeat("\t", $level) . "</" . $nodeName . ">";
        }
        return $this->xml;
    }


    /**
     * @param int $xmlLevel
     * @return void
     */
    public function setXmlLevel($xmlLevel) {
        $this->xmlLevel = $xmlLevel;
    }

    //end of setXmlLevel

    /**
     * @return int
     */
    public function getXmlLevel() {
        return $this->xmlLevel;
    }

    //end of getXmlLevel

    /**
     * @param int $totalNodes
     * @return void
     */
    public function setTotalNodes($totalNodes) {
        $this->totalNodes = $totalNodes;
    }

    //end of setTotalNodes

    /**
     * @return int
     */
    public function getTotalNodes() {
        return $this->totalNodes;
    }

    //end of getTotalNodes

    /**
     * @param string $xml
     * @return void
     */
    public function setXml($xml) {
        $this->xml = $xml;
    }

    //end of setXml

    /**
     * @return string
     */
    public function getXml() {
        return $this->xml;
    }

    //end of getXml

    /**
     * @param string $nodeName
     * @return void
     */
    public function setNodeName($nodeName) {
        $this->nodeName = $nodeName;
    }

    //end of setNodeName

    /**
     * @return string
     */
    public function getNodeName() {
        return $this->nodeName;
    }

    //end of getNodeName

    /**
     * @param array $nodesArray
     * @return void
     */
    public function setNodesArray($nodesArray) {
        $this->nodesArray = $nodesArray;
    }

    //end of setNodesArray

    /**
     * @return array
     */
    public function getNodesArray() {
        return $this->nodesArray;
    }
    //end of getNodesArray


}
