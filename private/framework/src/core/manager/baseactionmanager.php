<?
/**
 * @package manager
 */
abstract class BaseActionManager implements Manager {

    /**
     * @var Container
     */
    private $container;

    /*
     Actions
     */


    /**
     * @var array
     */
    private $initiallyLoadActionsArray = array();

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
     * @return void
     */
    public function loadInitialsArray() {
        foreach ($this->initiallyLoadActionsArray as $value) {
            $this->$value = $this->getContainer()->getBean($value);
            $this->$value->setContainer($this->getContainer());
        }
    }


    /**
     * @return void
     */
    public function fillActions() {
        $allMethodNames = get_class_methods(get_class($this));

        $getMethodNames = array();
        foreach ($allMethodNames as $methodName) {
            if ($methodName != "getContainer" &&
                substr($methodName, 0, 3) == "get"
            ) {
                array_push($getMethodNames, $methodName);
            }
        }

        foreach ($getMethodNames as $getActionMethodName) {
            // here the $obj variable is an instance of a Class that extended "SupportAction" Class
            $obj = ($this->$getActionMethodName());
            $className = substr($getActionMethodName, 3, strlen($getActionMethodName) - 9);
            $getServiceMethodName = "get" . $className . "Service";
            $obj->setService($this->getContainer()->getServiceManager()->$getServiceMethodName());
        }

    }

    /**
     * @param $actionName
     * @param $methodName
     * @param bool $checkAuthorized
     * @throws Exception
     */
    public function runActionMethod($actionName, $methodName, $checkAuthorized = true) {
        if (!$checkAuthorized || $this->getContainer()->getAuthenticationAuthorizationTool()->isAuthorizedActionMethod(
            $actionName,
            $methodName,
            $this->getContainer()->getSessionTool()->getUser())
        ) {
            $getActionMethod = "get" . ucfirst($actionName) . "Action";
            // the action manager should have this method
            if (method_exists($this->getContainer()->getActionManager(), $getActionMethod)) {
                // then check if this action is not null and is instance of a class implements Action interface
                if (!is_null($this->getContainer()->getActionManager()->$getActionMethod()) &&
                    ($this->getContainer()->getActionManager()->$getActionMethod() instanceof Action)
                ) {
                    // check if this action object has this method
                    if (method_exists($this->getContainer()->getActionManager()->$getActionMethod(), $methodName)) {
                        try {
                            // execute the method of this action
                            $actionArray = $this->getContainer()->getActionManager()->$getActionMethod()->$methodName();
                            // add actionArray to viewArrays
                            $this->getContainer()->getViewManager()->addView($actionArray);
                            $this->getContainer()->getLogger()->log("execution of action: " . $actionName . " with method: " . $methodName . " successful");
                        } catch (Exception $exception) {
                            $this->getContainer()->getLogger()->log("could not execute the action: " . $actionName . " with method: " . $methodName);
                            throw new Exception("could not execute the action: " . $actionName . " with method: " . $methodName);
                        }
                    } else {
                        throw new Exception("the method: " . $methodName . " does not exists in " . $actionName);
                    }
                } else {
                    throw new Exception("the action: " . $actionName . " is null in ActionManager or it is not an instance of Action interface");
                }
            } else {
                throw new Exception("the action's method is not defined in ActionManager, method name: " . $getActionMethod);
            }
        } else {
            throw new Exception("user is not authorized to execute this action: " . $actionName . " method: " . $methodName);
        }

    }


    /*
     setters getters
     */


}

