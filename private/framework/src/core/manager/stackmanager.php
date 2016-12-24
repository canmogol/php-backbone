<?

class StackManager {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var array
     */
    private $stackArray;

    /**
     * @var string
     */
    private $selectedStackName = null;

    /**
     * @var Stack
     */
    private $defaultStack = null;

    /**
     * @var array
     */
    private $freeStacks;

    /*
     Stacks
     */


    /**
     * @var array
     */
    private $initiallyLoadStacksArray = array();

    /**
     * @return Stack
     */
    public function getDefaultStack() {
        if (is_null($this->defaultStack)) {
            $this->defaultStack = $this->getContainer()->getServiceManager()->getStackService()->findByKeyValue("default_stack", "true")->get(0);
        }
        return $this->defaultStack;
    }

    /**
     * @return array
     */
    public function getFreeStacks() {
        return $this->freeStacks;
    }

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
        foreach ($this->initiallyLoadStacksArray as $value) {
            $this->$value = $this->getContainer()->getBean($value);
            $this->$value->setContainer($this->getContainer());
        }
    }


    /**
     * pushes the stackArray to stackArray stackArray[0] contains information about xsl, stackArray[1] contains xml
     *
     * @param array $stackArray
     */
    public function addStack(array $stackArray) {
        $this->stackArray[] = $stackArray;
    }

    /**
     * @param array $stackArray
     * @return void
     */
    public function setStackArray($stackArray) {
        $this->stackArray = $stackArray;
    }

    //end of setStackArray

    /**
     * @param string $selectedStackName
     * @return void
     */
    public function setSelectedStackName($selectedStackName) {
        $this->selectedStackName = $selectedStackName;
    }

    //end of setSelectedStackName

    /**
     * @return string
     */
    public function getSelectedStackName() {
        return $this->selectedStackName;
    }

    //end of getSelectedStackName

    /**
     * @return array
     */
    public function getStackArray() {
        if (is_null($this->stackArray)) {
            $stackArray = $this->getContainer()->getStackArray();
            $this->setStackArray($stackArray[$this->getSelectedStackName()]);
        }
        return $this->stackArray;
    }

    //end of getStackArray

    /**
     * @return void
     */
    public function executeStack() {
        if (is_array($this->getStackArray())) {
            foreach ($this->getStackArray() as $valueArray) {
                $getActionMethod = "get" . ucfirst($valueArray["name"]) . "Action";
                $actionMethodName = $valueArray["method"];
                $this->getContainer()->getViewManager()->addView($this->getContainer()->getActionManager()->$getActionMethod()->$actionMethodName());
            }
        }
    }

    /**
     * string stack'name as key, value as ModelArray of Stack
     * @var array
     */
    private $stackModels = array();

    /**
     * @param string $stackName
     * @return ModelArray
     */
    public function getStackModels($stackName) {
        if (!array_key_exists($stackName, $this->stackModels)) {
            // stackName should be defined at the DB
            // there should be only one stack model
            $modelArray = $this->getContainer()->getServiceManager()->getStackService()->findByKeyValue("name", $stackName);
            $this->stackModels[$stackName] = $modelArray;
        }
        return $this->stackModels[$stackName];
    }

    /**
     * @param string $stackName
     * @throws Exception
     */
    public function runStack($stackName) {

        // get stack models for this stack name, there should be one
        $stackModels = $this->getStackModels($stackName);

        // there should be one(1) stack with this name, name is unique,
        // therefore only one stack with this name may exists
        if ($stackModels->size() == 1) {
            /**
             * @var Stack $stackModel
             */
            $stackModel = $stackModels->get(0);

            // check if this stack can be executable by this user
            if ($this->getContainer()->getAuthenticationAuthorizationTool()->isAuthorizedStack(
                $stackModel,
                $this->getContainer()->getSessionTool()->getUser())
            ) {
                // user is authorized, execute stack
                // find the action/methods in this stack
                $stackActionMethods = $this->getContainer()->getServiceManager()->getStackActionMethodService()->findByKeyValue("stack_id", $stackModel->getId());

                /**
                 * @var StackActionMethod $stackActionMethodModel
                 */
                $this->getContainer()->getLogger()->log("starting execution of stack: ".$stackName." >>>");
                foreach ($stackActionMethods->getModelArray() as $stackActionMethodModel) {
                    /**
                     * @var ActionMethod $actionMethodModel
                     */
                    $actionMethodModel = $this->getContainer()->getServiceManager()->getActionMethodService()->findById($stackActionMethodModel->getActionMethodId());
                    // action's name at db in camel notation
                    $actionName = $actionMethodModel->getAction();
                    // the method of this action in camel notation
                    $methodName = $actionMethodModel->getMethod();
                    $this->getContainer()->getActionManager()->runActionMethod($actionName, $methodName, false);
                }
                $this->getContainer()->getLogger()->log("finished execution of stack: ".$stackName." <<<");
            } else {
                throw new Exception("user is not authorized to execute this stack: " . $stackName);
            }
        } else {
            throw new Exception("there is no stack in DB with this name: " . $stackName);
        }

    }


}
