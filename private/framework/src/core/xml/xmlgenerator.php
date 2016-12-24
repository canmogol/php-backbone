<?
/**
 * @package tool
 */
interface XmlGenerator {


    /**
     *
     * @param array $nodesArray
     * @param string $nodeName
     * @return string
     * @access public
     */
    public function generateXml(array $nodesArray, $nodeName);


}
