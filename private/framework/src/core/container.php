<?php
/**
 * Container class for managers, tools beans etc.
 * @package core
 */
class Container {

    /**
     * @var ServiceManager
     */
    private $serviceManager;

    /**
     * @var ModelManager
     */
    private $modelManager;

    /**
     * @var ActionManager
     */
    private $actionManager;

    /**
     * @var ViewManager
     */
    private $viewManager;

    /**
     * @var StackManager
     */
    private $stackManager;

    /**
     * @var string
     */
    private $configXmlFile;

    /**
     * @var string
     */
    private $contextXmlFile;

    /**
     * @var string
     */
    private $stackXmlFile;

    /**
     * @var array
     */
    private $contextArray;

    /**
     * @var array
     */
    private $stackArray;

    /**
     * @var LocaleTool
     */
    private $localeTool;

    /**
     * @var SessionTool
     */
    private $sessionTool;

    /**
     * @var AuthenticationAuthorizationTool
     */
    private $authenticationAuthorizationTool;

    /**
     * @var XmlXslTool
     */
    private $xmlXslTool;

    /**
     * @var CurrencyTool
     */
    private $currencyTool;

    /**
     * @var WebAppTool
     */
    private $webAppTool;

    /**
     * @var Db
     */
    private $db;

    /**
     * @var ExtendedException
     */
    private $extendedException;

    /**
     * @var XmlGenerator
     */
    private $xmlGenerator;

    /**
     * @var JSONGenerator
     */
    private $jsonGenerator;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var array
     */
    private $beanTypes = array("tool", "manager", "database");

    /**
     * @var array
     */
    private $languageArray = array();

    /**
     * @var array
     */
    private $configArray = array();

    /*SETTER & GETTERS*/


    /**
     * @param ServiceManager serviceManager
     * @return void
     */
    public function setServiceManager(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    //end of setServiceManager

    /**
     * @return ServiceManager
     */
    public function getServiceManager() {
        return $this->serviceManager;
    }

    //end of getServiceManager

    /**
     * @param ModelManager modelManager
     * @return void
     */
    public function setModelManager(ModelManager $modelManager) {
        $this->modelManager = $modelManager;
    }

    //end of setModelManager

    /**
     * @return ModelManager
     */
    public function getModelManager() {
        return $this->modelManager;
    }

    //end of getModelManager

    /**
     * @param ActionManager actionManager
     * @return void
     */
    public function setActionManager($actionManager) {
        $this->actionManager = $actionManager;
    }

    //end of setActionManager

    /**
     * @return ActionManager
     */
    public function getActionManager() {
        return $this->actionManager;
    }

    //end of getActionManager

    /**
     * @param ViewManager viewManager
     * @return void
     */
    public function setViewManager($viewManager) {
        $this->viewManager = $viewManager;
    }

    //end of setViewManager

    /**
     * @return ViewManager
     */
    public function getViewManager() {
        return $this->viewManager;
    }

    //end of getViewManager

    /**
     * @param StackManager stackManager
     * @return void
     */
    public function setStackManager($stackManager) {
        $this->stackManager = $stackManager;
    }

    //end of setStackManager

    /**
     * @return StackManager
     */
    public function getStackManager() {
        return $this->stackManager;
    }

    //end of getStackManager

    /**
     * @param string $configXmlFile
     * @return void
     */
    public function setConfigXmlFile($configXmlFile) {
        $this->configXmlFile = $configXmlFile;
    }

    //end of setConfigXmlFile

    /**
     * @return string
     */
    public function getConfigXmlFile() {
        return $this->configXmlFile;
    }

    //end of getConfigXmlFile


    /**
     * @param string $contextXmlFile
     * @return void
     */
    public function setContextXmlFile($contextXmlFile) {
        $this->contextXmlFile = $contextXmlFile;
    }

    //end of setContextXmlFile

    /**
     * @return string
     */
    public function getContextXmlFile() {
        return $this->contextXmlFile;
    }

    //end of getContextXmlFile

    /**
     * @param string $stackXmlFile
     * @return void
     */
    public function setStackXmlFile($stackXmlFile) {
        $this->stackXmlFile = $stackXmlFile;
    }

    //end of setStackXmlFile

    /**
     * @return string
     */
    public function getStackXmlFile() {
        return $this->stackXmlFile;
    }

    //end of getStackXmlFile

    /**
     * @param array $contextArray
     * @return void
     */
    public function setContextArray(array $contextArray) {
        $this->contextArray = $contextArray;
    }

    //end of setContextArray

    /**
     * @return array
     */
    public function getContextArray() {
        return $this->contextArray;
    }

    //end of getContextArray

    /**
     * @param array $stackArray
     * @return void
     */
    public function setStackArray($stackArray) {
        $this->stackArray = $stackArray;
    }

    //end of setStackArray

    /**
     * @return array
     */
    public function getStackArray() {
        return $this->stackArray;
    }

    //end of getStackArray

    /**
     * @param LocaleTool localeTool
     * @return void
     */
    public function setLocaleTool($localeTool) {
        $this->localeTool = $localeTool;
    }

    //end of setLocaleTool

    /**
     * @return LocaleTool
     */
    public function getLocaleTool() {
        return $this->localeTool;
    }

    /**
     * @param \SessionTool $sessionTool
     */
    public function setSessionTool($sessionTool) {
        $this->sessionTool = $sessionTool;
    }

    /**
     * @return \SessionTool
     */
    public function getSessionTool() {
        return $this->sessionTool;
    }

    /**
     * @param \AuthenticationAuthorizationTool $authenticationAuthorizationTool
     */
    public function setAuthenticationAuthorizationTool($authenticationAuthorizationTool) {
        $this->authenticationAuthorizationTool = $authenticationAuthorizationTool;
    }

    /**
     * @return \AuthenticationAuthorizationTool
     */
    public function getAuthenticationAuthorizationTool() {
        return $this->authenticationAuthorizationTool;
    }


    /**
     * @param XmlXslTool xmlXslTool
     * @return void
     */
    public function setXmlXslTool($xmlXslTool) {
        $this->xmlXslTool = $xmlXslTool;
    }

    //end of setXmlXslTool

    /**
     * @return XmlXslTool
     */
    public function getXmlXslTool() {
        return $this->xmlXslTool;
    }

    //end of getXmlXslTool

    /**
     * @param CurrencyTool currencyTool
     * @return void
     */
    public function setCurrencyTool($currencyTool) {
        $this->currencyTool = $currencyTool;
    }

    //end of setCurrencyTool

    /**
     * @return CurrencyTool
     */
    public function getCurrencyTool() {
        return $this->currencyTool;
    }

    //end of getCurrencyTool

    /**
     * @param WebAppTool webAppTool
     * @return void
     */
    public function setWebAppTool($webAppTool) {
        $this->webAppTool = $webAppTool;
    }

    //end of setWebAppTool

    /**
     * @return WebAppTool
     */
    public function getWebAppTool() {
        return $this->webAppTool;
    }

    //end of getWebAppTool

    /**
     * @param Db Db
     * @return void
     */
    public function setDb(Db $db) {
        $this->db = $db;
    }

    //end of setdb

    /**
     * @return db
     */
    public function getDb() {
        return $this->db;
    }

    //end of getDb

    /**
     * @param ExtendedException extendedException
     * @return void
     */
    public function setExtendedException(ExtendedException $extendedException) {
        $this->extendedException = $extendedException;
    }

    //end of setExtendedException

    /**
     * @return ExtendedException
     */
    public function getExtendedException() {
        return $this->extendedException;
    }

    //end of getExtendedException

    /**
     * @param array $beanTypes
     * @return void
     */
    public function setBeanTypes(array $beanTypes) {
        $this->beanTypes = $beanTypes;
    }

    //end of setBeanTypes

    /**
     * @return array
     */
    public function getBeanTypes() {
        return $this->beanTypes;
    }

    //end of getBeanTypes

    /**
     * @param XmlGenerator xmlGenerator
     * @return void
     */
    public function setXmlGenerator(XmlGenerator $xmlGenerator) {
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
     * @param Logger logger
     * @return void
     */
    public function setLogger($logger) {
        $this->logger = $logger;
    }

    //end of setLogger

    /**
     * @return Logger
     */
    public function getLogger() {
        return $this->logger;
    }

    //end of getLogger

    /**
     * @param array $languageArray
     * @return void
     */
    public function setLanguageArray($languageArray) {
        $this->languageArray = $languageArray;
    }

    //end of setLanguageArray

    /**
     * @return array
     */
    public function getLanguageArray() {
        return $this->languageArray;
    }

    //end of getLanguageArray

    /**
     * @param string $key
     * @return string
     */
    public function getValueFromLanguageArray($key) {
        return $this->languageArray[$key];
    }

    //end of getValueFromLanguageArray

    /**
     * @param array $configArray
     * @return void
     */
    public function setConfigArray($configArray) {
        $this->configArray = $configArray;
    }

    //end of setConfigArray

    /**
     * @return array
     */
    public function getConfigArray() {
        return $this->configArray;
    }

    //end of getConfigArray


    /**
     * initializes the beans that has any manager or container has appropriate setter
     *
     * @return void
     */
    public function fillGetPostVariables() {
        $arrayContainingPostsGetsAndOthers = array();
        // GET HANDLER
        if (sizeof($_GET) > 0) {
            foreach ($_GET as $key => $variable) {
                if (!is_array($variable)) $arrayContainingPostsGetsAndOthers[$key] = $this->getWebAppTool()->getSecureVariable($variable);
                else {
                    foreach ($variable as $keyVr => $vr) {
                        $arrayContainingPostsGetsAndOthers[$key][$keyVr] = $this->getWebAppTool()->getSecureVariable($vr);
                    }
                }
                //echo $key.":".$variable."<br>";
                //else
            }
        }
        // POST HANDLER -
        if (sizeof($_POST) > 0) {
            foreach ($_POST as $key => $variable) {
                if (!is_array($variable)) {
                    $arrayContainingPostsGetsAndOthers[$key] = $this->getWebAppTool()->getSecureVariable($variable);
                } else {
                    foreach ($variable as $keyVr => $vr) {
                        $arrayContainingPostsGetsAndOthers[$key][$keyVr] = $this->getWebAppTool()->getSecureVariable($vr);
                    }
                }
            }
        }
        $this->getWebAppTool()->setGetPostArray($arrayContainingPostsGetsAndOthers);
    }

    /**
     * initializes the beans that has any manager or container has appropriate setter
     *
     * @throws Exception
     * @return void
     */
    public function initializeBeans() {

        $beansArray = array();
        foreach ($this->contextArray as $valueArray) {
            if ($valueArray["type"] == "manager") {

                /**
                 * prepare the setter method name
                 * example: setModelManager
                 */
                $setterMethodName = "set" . ucfirst($valueArray["name"]);

                /**
                 * create bean with name $valueArray["name"] and set via $setterMethodName
                 * example: $this->setModelManager($this->getBean("modelManager"))
                 */
                $this->$setterMethodName($this->getBean($valueArray["name"]));

                /**
                 * prepare the getter method name
                 * example: getModelManager
                 */
                $getterMethodName = "get" . ucfirst($valueArray["name"]);

                /**
                 * set container object ($this) to Manager
                 * example: $this->getModelManager()->setContainer($this);
                 */
                $this->$getterMethodName()->setContainer($this);

            } else if ($valueArray["type"] == "tool") {

                /**
                 * prepare the setter method name
                 * example: setTool
                 */
                $setterMethodName = "set" . ucfirst($valueArray["name"]);

                /**
                 * create bean with name $valueArray["name"] and set via $setterMethodName
                 * example: $this->setTool($this->getBean("tool"))
                 */
                $this->$setterMethodName($this->getBean($valueArray["name"]));

                /**
                 * prepare the getter method name
                 * example: getTool
                 */
                $getterMethodName = "get" . ucfirst($valueArray["name"]);


                if (method_exists($this->$getterMethodName(), "setContainer")) {
                    /**
                     * set container object ($this) to Manager
                     */
                    $this->$getterMethodName()->setContainer($this);
                }

            } else {
                array_push($beansArray, $valueArray);
            }
        }


        /**
         * private loadLanguages() method loads active language file
         * and sets $this->languageArray from $languageArray variable
         * $this->languageArray is necessary for i18n of services
         */
        $this->loadLanguages();


        /**
         * initialize all other beans rather than "manager" and "tool" types
         */
        foreach ($beansArray as $valueArray) {

            //Setter method name
            $setterMethodName = "set" . ucfirst($valueArray["name"]);

            //Getter method name
            $getterMethodName = "get" . ucfirst($valueArray["name"]);

            /**
             * if the type of the bean is "service" and ServiceManager has a method to set this bean
             * than creates an object for that bean via $this->getBean($beanName) and sets
             * if there is no such method, there is an exception (METHOD_NOT_FOUND)
             */
            if ($valueArray["type"] == "service") {
                try {
                    if (method_exists($this->getServiceManager(), $setterMethodName)) {
                        $this->getServiceManager()->$setterMethodName($this->getBean($valueArray["name"]));
                        $this->getServiceManager()->$getterMethodName()->setContainer($this);
                        if (!is_null($this->languageArray[$valueArray["name"]])) {
                            $this->getServiceManager()->$getterMethodName()->setLanguageArray($this->languageArray[$valueArray["name"]]);
                        }
                    } else {
                        $this->getLogger()->log(SystemErrorMessage::METHOD_NOT_FOUND, array("methodName" => $setterMethodName));
                        throw new Exception("there is no method called: " . $setterMethodName . "(" . $valueArray["impl"] . " " . $valueArray["name"] . ") in ServiceManager");
                    }
                } catch (Exception $e) {
                    echo "<pre>";
                    print_r($e->getMessage());
                    echo "</pre>";
                    echo "<pre>";
                    print_r($e->getTraceAsString());
                    echo "</pre>";
                }

            } /**
             * if the type of the bean is "model" and ModelManager has a method to set this bean
             * than creates an object for that bean via $this->getBean($beanName) and sets
             * if there is no such method, there is an exception (METHOD_NOT_FOUND)
             */
            else if ($valueArray["type"] == "model") {
                try {
                    if (method_exists($this->getModelManager(), $setterMethodName)) {
                        $this->getModelManager()->$setterMethodName($this->getBean($valueArray["name"]));
                        if (method_exists($this->getModelManager()->$getterMethodName(), "setXmlGenerator")) {
                            $this->getModelManager()->$getterMethodName()->setXmlGenerator($this->getXmlGenerator());
                        }
                        if (method_exists($this->getModelManager()->$getterMethodName(), "setJsonGenerator")) {
                            $this->getModelManager()->$getterMethodName()->setJsonGenerator($this->getJsonGenerator());
                        }
                    } else {
                        $this->getLogger()->log(SystemErrorMessage::METHOD_NOT_FOUND, array("methodName" => $setterMethodName));
                        throw new Exception("there is no method called: " . $setterMethodName . "(" . $valueArray["impl"] . " " . $valueArray["name"] . ") in ModelManager");
                    }
                } catch (Exception $e) {
                    echo "<pre>";
                    print_r($e->getMessage());
                    echo "</pre>";
                    echo "<pre>";
                    print_r($e->getTraceAsString());
                    echo "</pre>";
                }

            } /**
             * if the type of the bean is "action" and ActionManager has a method to set this bean
             * than creates an object for that bean via $this->getBean($beanName) and sets
             * if there is no such method, there is an exception (METHOD_NOT_FOUND)
             */
            else if ($valueArray["type"] == "action") {
                try {
                    if (method_exists($this->getActionManager(), $setterMethodName)) {
                        $this->getActionManager()->$setterMethodName($this->getBean($valueArray["name"]));
                        $this->getActionManager()->$getterMethodName()->setContainer($this);
                    } else {
                        $this->getLogger()->log(SystemErrorMessage::METHOD_NOT_FOUND, array("methodName" => $setterMethodName));
                        throw new Exception("there is no method called: " . $setterMethodName . "(" . $valueArray["impl"] . " " . $valueArray["name"] . ") in ActionManager");
                    }
                } catch (Exception $e) {
                    echo "<pre>";
                    print_r($e->getMessage());
                    echo "</pre>";
                    echo "<pre>";
                    print_r($e->getTraceAsString());
                    echo "</pre>";
                }


            } /**
             * if the type of the bean is "database", Container creates an object for that bean
             * via $this->getBean($beanName) and sets $this to container reference via $this->$setterMethodName->setContainer
             * if there is no such method, there is an exception (METHOD_NOT_FOUND)
             */
            else if ($valueArray["type"] == "database") {
                try {
                    if (method_exists($this, $setterMethodName)) {
                        $this->$setterMethodName($this->getBean($valueArray["name"], $this));
                    } else {
                        $this->getLogger()->log(SystemErrorMessage::METHOD_NOT_FOUND, array("methodName" => $setterMethodName));
                        throw new Exception("there is no method called: " . $setterMethodName . "(" . $valueArray["impl"] . " " . $valueArray["name"] . ") in Container");
                    }
                } catch (Exception $e) {
                    echo "<pre>";
                    print_r($e->getMessage());
                    echo "</pre>";
                    echo "<pre>";
                    print_r($e->getTraceAsString());
                    echo "</pre>";
                }


            } /**
             * if the type of the bean is in $this->beanTypes array and Container has a method to set this bean
             * than creates an object for that bean via $this->getBean($beanName) and sets
             * if there is no such method, there is an exception (METHOD_NOT_FOUND)
             */
            else if (in_array($valueArray["type"], $this->getBeanTypes())) {
                try {
                    if (method_exists($this, $setterMethodName)) {
                        $this->$setterMethodName($this->getBean($valueArray["name"]));
                    } else {
                        $this->getLogger()->log(SystemErrorMessage::METHOD_NOT_FOUND, array("methodName" => $setterMethodName));
                        throw new Exception("there is no method called: " . $setterMethodName . "(" . $valueArray["impl"] . " " . $valueArray["name"] . ") in Container");
                    }
                } catch (Exception $e) {
                    echo "<pre>";
                    print_r($e->getMessage());
                    echo "</pre>";
                    echo "<pre>";
                    print_r($e->getTraceAsString());
                    echo "</pre>";
                }

            } /**
             * These are the beans that does not fit to any specification
             * They may be reached by $container->getBean($beanName)
             */
            else {
                // do nothing for these beans
            }
        }

    }

    /**
     * Reads config file and prepares $this->configArray array
     *
     * @param string $configXmlFile
     * @return void
     */
    public function readConfig($configXmlFile = null) {
        if (!is_null($configXmlFile) && is_string($configXmlFile)) {
            $this->setConfigXmlFile($configXmlFile);
        }
        $this->configArray = (Array)simplexml_load_file($this->configXmlFile);
        $this->configArray = $this->configArray["entry"];
        $tmpArray = array();
        foreach ($this->configArray as $value) {
            $tmpArray2 = (Array)$value;
            $tmpArray[$tmpArray2["@attributes"]["key"]] = $tmpArray2["@attributes"]["value"];
        }
        $this->configArray = $tmpArray;
    }

    /**
     * Reads context file and prepares $this->contextArray array
     *
     * @param string $contextXmlFile
     * @return void
     */
    public function readContext($contextXmlFile = null) {
        if (!is_null($contextXmlFile) && is_string($contextXmlFile)) {
            $this->setContextXmlFile($contextXmlFile);
        }
        $this->contextArray = (Array)simplexml_load_file($this->contextXmlFile);
        $this->contextArray = $this->contextArray["bean"];
        $tmpArray = array();
        foreach ($this->contextArray as $value) {
            $tmpArray2 = (Array)$value;
            array_push($tmpArray, $tmpArray2["@attributes"]);
        }
        $this->contextArray = $tmpArray;
    }

    /**
     * Reads stack file and prepares $this->stackArray array
     *
     * @param string $stackXmlFile
     * @return void
     */
    public function readStack($stackXmlFile = null) {
        if (!is_null($stackXmlFile) && is_string($stackXmlFile)) {
            $this->setStackXmlFile($stackXmlFile);
        }
        $this->stackArray = (Array)simplexml_load_file($this->stackXmlFile);
        $this->stackArray = $this->stackArray["stack"];
        $tmpArray = array();
        foreach ($this->stackArray as $value) {
            $tmpArray2 = (Array)$value;
            foreach ((Array)$tmpArray2["beans"] as $valueArray) {
                if (!is_array($valueArray)) {
                    $valueArray = array($valueArray);
                }
                foreach ($valueArray as $v) {
                    $vArray = (Array)$v;
                    $tmpArray[$tmpArray2["@attributes"]["name"]][] = $vArray["@attributes"];
                }
            }
        }
        $this->stackArray = $tmpArray;
    }

    /**
     * @return void
     */
    private function loadLanguages() {
        $languageArray = array(); // $languageArray variable should be overridden by the below include
        include("private/project/src/i18n/" . $this->getLocaleTool()->getActiveLocale() . ".php");
        $this->languageArray = $languageArray;
    }

    /**
     * If the beanName is in the $this->contextArray, it returns the bean with name beanName
     * if beanName is not in the $this->contextArray, return null
     *
     * @param string $beanName
     * @param mixed $constructorVariable
     * @return object
     */
    public function getBean($beanName, $constructorVariable = null) {
        foreach ($this->getContextArray() as $valueArray) {
            if ($valueArray["name"] == $beanName) {
                if (is_null($constructorVariable)) {
                    return new $valueArray["impl"]();
                } else {
                    return new $valueArray["impl"]($constructorVariable);
                }
            }
        }
        return null;
    }

    public function runRequest() {

        $this->getLogger()->log(" ------- will run new request -------");

        // flag for special url request
        $isSpecialRequest = false;

        /*
         * http://localhost/~alicanmogol/index.php?/_/stack1/action1/method1/name/john/surname/doe/age//height/5',1%22
         * http://localhost/~alicanmogol/index.php?/welcome/here/all
         */
        $requestKeys = array_keys($this->getWebAppTool()->getGetPostArray());
        if (count($requestKeys) > 0) {
            // there is only one request key, the whole request is one string
            // something like this: /_/stack1/action1/method1/name/john/surname/doe/age//height/5',1%22
            $requestURL = trim($requestKeys[0]);

            // if the request url starts with '/_/' than it is a standard request
            // in form of /stack/action/method/k1/v1/.../kn/vn
            if (substr($requestURL, 0, 3) == "/_/") {

                // first remove the '/_/'
                $requestURL = trim(substr($requestURL, 3));
                // then remove the '/' from the end
                if (substr($requestURL, strlen($requestURL) - 1) == "/") {
                    $requestURL = substr($requestURL, 0, strlen($requestURL) - 1);
                }
                // split the request url with '/'
                $stackActionMethodKeyValuePairs = @split("/", $requestURL);

                // get the first three values as stack, action, method names
                list($stackName, $actionName, $methodName) = $stackActionMethodKeyValuePairs;
                $stackName = trim($stackName);
                $actionName = trim($actionName);
                $methodName = trim($methodName);

                // first add/expose the key value pairs in url
                $restOfParams = array_splice($stackActionMethodKeyValuePairs, 3);
                for ($i = 0; $i < count($restOfParams); $i = $i + 2) {
                    $this->getWebAppTool()->addToGetPostArray($restOfParams[$i], $restOfParams[$i + 1]);
                }

                // re-set appropriate variables to models
                $this->getModelManager()->fillModels();

                // check if the $stackName exists in stack
                if (strlen($stackName) > 0) {
                    // run stack
                    try {
                        $this->getStackManager()->runStack($stackName);
                        $this->getStackManager()->setSelectedStackName($stackName);
                    } catch (Exception $e) {
                        $this->getLogger()->log("Exception: " . $e->getMessage());
                    }
                } else {
                    $this->getLogger()->log("there is no stack name in this request");
                }

                // check if the action/method pair exists
                if (strlen($actionName) > 0 && strlen($methodName) > 0) {
                    try {
                        $this->getActionManager()->runActionMethod($actionName, $methodName);
                    } catch (Exception $e) {
                        $this->getLogger()->log("Exception: " . $e->getMessage());
                    }
                } else {
                    $this->getLogger()->log("there is no action/method in this request");
                }

            } else {
                // check if there is a special url exists with this request URL
                $specialURL = strtolower(trim(@ereg_replace("[^A-Za-z0-9]", "", $requestURL)));
                $specialUrlModels = $this->getServiceManager()->getSpecialUrlService()->findByKeyValue("url", $specialURL);

                // there should be one(1) special URL with this url, url is unique,
                // therefore only one special url with this url may exists
                if ($specialUrlModels->size() == 1) {
                    /**
                     * @var SpecialUrl $specialUrlModel
                     */
                    $specialUrlModel = $specialUrlModels->get(0);

                    // process url with regexp
                    $specialUrlRequestValues = @split($specialUrlModel->getRegexp(), $requestURL);

                    // set special url' regexp keys with values
                    $specialUrlRegexpKeyModelArray = $this->getServiceManager()->getSpecialUrlRegexpKeyService()->findByKeyValue("special_url_id", $specialUrlModel->getId());
                    if ($specialUrlRegexpKeyModelArray->size() > 0) {
                        for ($i = 0; $i < $specialUrlRegexpKeyModelArray->size(); $i++) {
                            /**
                             * @var SpecialUrlRegexpKey $specialUrlRegexpKeyModel
                             */
                            $specialUrlRegexpKeyModel = $specialUrlRegexpKeyModelArray->get($i);
                            $this->getWebAppTool()->addToGetPostArray(
                                $specialUrlRegexpKeyModel->getKey(),
                                $specialUrlRequestValues[$i]
                            );
                        }

                        // re-set appropriate variables to models
                        $this->getModelManager()->fillModels();

                    }

                    // find the stack for this special url and execute stack
                    /**
                     * @var Stack $stackModel
                     */
                    $stackModel = $this->getServiceManager()->getStackService()->findById($specialUrlModel->getStackId());
                    try {
                        $this->getStackManager()->runStack($stackModel->getName());
                        $this->getStackManager()->setSelectedStackName($stackModel->getName());
                    } catch (Exception $e) {
                        $this->getLogger()->log("Exception: " . $e->getMessage());
                    }

                    // find the action/method for this special url and execute action/method
                    if ($specialUrlModel->getActionMethodId() != null) {
                        /**
                         * @var ActionMethod $actionMethodModel
                         */
                        $actionMethodModel = $this->getServiceManager()->getActionMethodService()->findById($specialUrlModel->getActionMethodId());
                        $this->getActionManager()->runActionMethod($actionMethodModel->getAction(), $actionMethodModel->getMethod());
                    }

                    // set $isSpecialRequest to true, since this is a special url and it executed correctly
                    $isSpecialRequest = true;

                } else {
                    // there is no special url in db
                    $this->getLogger()->log("there is no special url, will run default stack");
                    try {
                        $this->getStackManager()->runStack(
                            $this->getStackManager()->getDefaultStack()->getName()
                        );
                        $this->getStackManager()->setSelectedStackName($this->getStackManager()->getDefaultStack()->getName());
                    } catch (Exception $e) {
                        $this->getLogger()->log("Exception: " . $e->getMessage());
                    }
                }
            }

        }

        if ($this->getStackManager()->getSelectedStackName() == null) {
            $this->getLogger()->log("there is no selected stack, will run default stack");
            try {
                $this->getStackManager()->runStack(
                    $this->getStackManager()->getDefaultStack()->getName()
                );
                $this->getStackManager()->setSelectedStackName($this->getStackManager()->getDefaultStack()->getName());
            } catch (Exception $e) {
                $this->getLogger()->log("Exception: " . $e->getMessage());
            }
        }

        // generate the response according to requested response type
        //      if no response type requested, generate html
        //      else generate response according to requested response type (xml or json)
        $responseType = "";
        if ($this->getWebAppTool()->isKeyInGetPostArray("_responseType")) {
            $responseType = $this->getWebAppTool()->getValueFromGetPostArray("_responseType");
        }
        $responseType = strtolower($responseType);

        if ($responseType == "xml") {

            if (is_array($this->getViewManager()->getViewArrays())) {
                $finalXML = "";
                /**
                 * @var ModelArray $xml
                 */
                foreach ($this->getViewManager()->getViewArrays() as $xml) {
                    $finalXML .= $xml->getXML();
                }
                echo $finalXML;
            }

        } else if ($responseType == "json") {

            if (is_array($this->getViewManager()->getViewArrays())) {
                $finalJSON = "";
                /**
                 * @var ModelArray $xml
                 */
                foreach ($this->getViewManager()->getViewArrays() as $xml) {
                    $finalJSON .= $xml->getJSON();
                }
                echo $finalJSON;
            }

        } else {
            if (is_array($this->getViewManager()->getViewArrays())) {
                $finalXML = "";
                $finalXSL = "<xsls>";
                /**
                 * @var ModelArray $xml
                 */
                foreach ($this->getViewManager()->getViewArrays() as $xsl => $xml) {
                    $actionStackName = substr($xsl, 0, strpos($xsl, "-"));
                    $xslFileName = substr($xsl, strpos($xsl, "-") + 1);
                    $finalXSL .= "<xsl name='" . $actionStackName . "' fileName='" . $xslFileName . "'>private/project/xsl/" . substr($xsl, 0, strpos($xsl, "-")) . "/" . substr($xsl, strpos($xsl, "-") + 1) . ".xsl</xsl>";
                    if (!is_null($xml) && $xml instanceof ModelArray) {
                        $finalXML .= $xml->getXML();
                    }
                }
                $finalXSL .= "</xsls>";
                $finalXML .= $finalXSL;
                $responseContent = $this->getXmlXslTool()->echoXmlXslOutput($finalXML, "private/project/xsl/stack/" . $this->getStackManager()->getSelectedStackName() . ".xsl");

                // save the content if it is a special request
                if ($isSpecialRequest) {
                    try {
                        $requestKeys = array_keys($_GET);
                        if (count($requestKeys) > 0) {
                            $requestURL = $requestKeys[0];
                            if (substr(trim($requestURL), 0, 3) != "/_/") {
                                $webAppRoot = substr($_SERVER["SCRIPT_FILENAME"], 0, strrpos($_SERVER["SCRIPT_FILENAME"], "/"));
                                $requestURLFileName = $webAppRoot . "/private/cache/" . strtolower(trim(@ereg_replace("[^A-Za-z0-9]", "", $requestURL))) . ".html";
                                if (file_exists($requestURLFileName)) {
                                    try {
                                        chmod($requestURLFileName, 0777);
                                    } catch (Exception $e) {
                                        $this->getLogger()->log("Exception: file exists, exception occurred while writing to change the mode to 0777, e: " . $e->getMessage());
                                    }
                                }
                                file_put_contents($requestURLFileName, $responseContent);
                            }
                        }
                    } catch (Exception $e) {
                        $this->getLogger()->log("Exception: exception occurred while writing the content to file, e: " . $e->getMessage());
                    }
                }

                // send response content to client
                echo $responseContent;
            }
        }

        // after this point, no code can be execute
        $this->getLogger()->log("------- end of the execution -------");
        exit();
    }

    public function redirect($stackName, $action = "", $method = "", $params = array()) {
        $paramKeyValues = "";
        foreach ($params as $key => $value) {
            $paramKeyValues .= "/" . $key . "/" . $value;
        }
        $this->getLogger()->log("redirect called with stack: '" . $stackName . "', action: '" . $action . "', method: '" . $method . "', params: '" . $paramKeyValues . "'");

        $url = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 4)) . "://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["PHP_SELF"] . "?/_/" . $stackName . "/" . $action . "/" . $method . $paramKeyValues;
        $this->getLogger()->log("will redirect to url: " . $url);
        header("Location: " . $url);
        $this->getLogger()->log("------- end of the execution - redirected -------");
        exit();
    }

}


