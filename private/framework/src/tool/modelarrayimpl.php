<?php


/**
 * @package tool
 */
class ModelArrayImpl implements ModelArray {

    /**
     * Model Objects array
     *
     * @var array
     */
    private $modelArray = array();

    /**
     * Model Objects as array
     *
     * @var array
     */
    private $array = null;

    /**
     * Model Objects as XML
     *
     * @var string
     */
    private $xml;

    /**
     * Model Objects as JSON
     *
     * @var string
     */
    private $json;

    /**
     * XmlGenerator Object
     *
     * @var XmlGenerator
     */
    private $xmlGenerator;

    /**
     * JSONGenerator Object
     *
     * @var JSONGenerator
     */
    private $jsonGenerator;

    /**
     * @var int
     */
    private $size = null;

    /**
     * @param array modelArray
     * @return void
     */
    public function setModelArray($modelArray) {
        $this->modelArray = $modelArray;
    }

    //end of setModelArray

    /**
     * @return array
     */
    public function getModelArray() {
        return $this->modelArray;
    }

    //end of getModelArray

    /**
     * @param Model $model
     * @access public
     */
    public function add(Model $model) {
        $this->modelArray[] = $model;
    }

    /**
     * Returns Model Objects as array
     *
     * @param boolean $force
     * @return array
     */
    public function getArray($force = false) {
        if (is_null($this->array) || $force == true) {
            $this->array = array();
            foreach ($this->modelArray as $modelObject) {
                if (!is_null($modelObject)) {
                    $this->array[] = $this->generateArray($modelObject);
                }
            }
        }
        return $this->array;
    }

    /**
     * @param Model $modelObject
     * @return array
     */
    private function generateArray(Model $modelObject) {
        foreach ($modelObject->getMutators() as $dbFiled => $mutator) {
            $methodName = "get" . $mutator;
            $objectArray[$dbFiled] = $modelObject->$methodName();
        }
        if (method_exists($modelObject, "getRelationsArray")) {
            foreach ($modelObject->getRelationsArray() as $valueArray) {
                $methodName = "get" . $valueArray["relationClass"];
                if (!is_null($modelObject->$methodName())) {
                    $objectArray[$valueArray["relationClass"]] = $this->generateArray($modelObject->$methodName());
                }
            }
        }
        $objectArray["orderSelection"] = $modelObject->getOrderSelection();
        $objectArray["tableName"] = $modelObject->getTableName();
        return $objectArray;
    }

    /**
     * Returns Model Objects as XML
     *
     * @param string $nodeName
     * @param boolean $force
     * @return string
     */
    public function getXML($nodeName = null, $force = false) {
        if (is_null($nodeName) && count($this->modelArray) > 0) {
            $nodeName = $this->modelArray[0]->getTableName();
        }
        if (!is_null($nodeName)) {
            $array = $this->getArray($force);
            if ((is_null($this->xml) || $force == true) && is_array($array)) {
                $this->xml .= "\n<" . $nodeName . "s>";
                foreach ($array as $model) {
                    $this->xml .= $this->getXmlGenerator()->generateXml($model, $nodeName, 1);
                }
                $this->xml .= "\n</" . $nodeName . "s>";
            }
        }
        return $this->xml;
    }

    /**
     * Returns Model Objects as JSON
     *
     * @param boolean $force
     * @return string
     */
    public function getJSON($force = false) {
        $array = $this->getArray($force);
        if ((is_null($this->json) || $force == true) && is_array($array)) {
            $this->json = "";
            foreach ($array as $model) {
                $this->json .= $this->getJSONGenerator()->generateJSON($model);
            }
        }
        return $this->json;
    }

    /**
     * @param XmlGenerator xmlGenerator
     * @return void
     */
    public function setXmlGenerator($xmlGenerator) {
        $this->xmlGenerator = $xmlGenerator;
    }

    //end of setXmlGenerator

    /**
     * @return XmlGenerator
     */
    public function getXmlGenerator() {
        return $this->xmlGenerator;
    }

    /**
     * @param \JSONGenerator $jsonGenerator
     */
    public function setJsonGenerator($jsonGenerator) {
        $this->jsonGenerator = $jsonGenerator;
    }

    /**
     * @return \JSONGenerator
     */
    public function getJsonGenerator() {
        return $this->jsonGenerator;
    }

    /**
     *
     * @return bool
     * @access public
     */
    public function serializeModel() {
        return false;
    } // end of member function serializeModel

    /**
     *
     * @return bool
     * @access public
     */
    public function unserializeModel() {
        return false;
    } // end of member function unserializeModel


    /**
     * returns the size of the Model Object Collection
     *
     * @return int
     */
    public function size() {
        if (is_null($this->size)) {
            $this->size = count($this->getArray());
        }
        return $this->size;
    }

    /**
     * returns the Model object in that index
     *
     * @param int $index
     * @throws Exception
     * @return Model
     */
    public function get($index) {
        try {
            if ($index > $this->size() - 1) {
                throw new Exception(SystemErrorMessage::ARRAY_OUT_OF_BOUNDS);
            } else {
                return $this->modelArray[$index];
            }
        } catch (Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
            echo "</pre>";
            echo "<pre>";
            print_r($e->getTraceAsString());
            echo "</pre>";
        }
        return null;
    }


}
