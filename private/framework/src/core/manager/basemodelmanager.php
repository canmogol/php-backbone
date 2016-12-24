<?
/**
 * @package manager
 */
abstract class BaseModelManager implements Manager {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var array
     */
    private $propertyModelMap = array();

    /*
     Models
     */


    /**
     * @var array
     */
    private $initiallyLoadModelsArray = array();


    public function ModelManager() {
    }

    /**
     * @param Container container
     * @return void
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * @return ModelArray
     */
    public function getNewModelArray() {
        // "modelArray" is the name of the bean that implements the ModelArray interface
        $modelArray = $this->getContainer()->getBean("modelArray");
        // ModelArray interface has the "setXmlGenerator(...)" method
        $modelArray->setXmlGenerator($this->getContainer()->getXmlGenerator());
        return $modelArray;
    }

    /**
     * @return void
     */
    public function loadInitialsArray() {
        foreach ($this->initiallyLoadModelsArray as $value) {
            $this->$value = $this->getContainer()->getBean($value);
            $this->$value->setContainer($this->getContainer());
        }
    }

    /**
     * @param array $propertyModelMap
     * @return void
     */
    public function setPropertyModelMap($propertyModelMap) {
        $this->propertyModelMap = $propertyModelMap;
    }

    /**
     * @return array
     */
    public function getPropertyModelMap() {
        return $this->propertyModelMap;
    }

    public function addToPropertyModelMap($key, $value) {
        $propertyModelMap = $this->getPropertyModelMap();
        $propertyModelMap[$key] = $value;
        $this->setPropertyModelMap($propertyModelMap);
    }

    /**
     * @param array $keyValueArray
     * @return void
     */
    public function fillModels(array $keyValueArray = null) {
        if (is_null($keyValueArray)) {
            $keyValueArray = $this->getContainer()->getWebAppTool()->getGetPostArray();
        }

        $classAttributes = array();
        $allMethodNames = array_reverse(get_class_methods(get_class($this)));
        foreach ($allMethodNames as $methodName) {
            if($methodName != "getContainer" &&
                $methodName != "getPropertyModelMap" &&
                $methodName != "getNewModelArray" &&
                substr($methodName,0,3)=="get"){
                array_push($classAttributes, lcfirst(substr($methodName,3)));
            }
        }

        foreach ($classAttributes as $value) {
            // prepare the getSomeModel() method
            $modelClassName = ucfirst($value);
            $objectMethodName = "get" . $modelClassName;
            // get db properties that are defined in this Model
            $dbProperties = $this->$objectMethodName()->getDbProperties();
            // mutators are the setters for this Model
            $mutators = $this->$objectMethodName()->getMutators();
            foreach ($keyValueArray as $key2 => $value2) {
                if (array_key_exists($key2, $mutators)) {
                    $this->addToPropertyModelMap($key2, $modelClassName);
                    $methodName = "set" . $mutators[$key2];
                    // set values via setter and add key:value pairs
                    $this->$objectMethodName()->$methodName($value2);
                    $dbProperties[$key2] = $value2;
                }
            }
            $this->$objectMethodName()->setFormVariables($dbProperties);
        }
    }


    /*
     setters getters
     */


}

