<?php

/**
 * class SupportAction
 */
abstract class SupportAction implements Action {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var Service
     */
    private $service;

    /**
     * @var String
     */
    private $actionName;


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
     * @param Service $service
     * @return void
     */
    public function setService(Service $service) {
        $this->service = $service;
    }

    //end of setService

    /**
     * @return Service
     */
    public function getService() {
        return $this->service;
    }

    //end of getService

    /**
     * @param String $actionName
     * @return void
     */
    public function setActionName($actionName) {
        $this->actionName = $actionName;
    }

    //end of setActionName

    /**
     * @return String
     */
    public function getActionName() {
        if ($this->actionName == null) {
            $actionNameArray = explode("Action", get_class($this));
            $this->actionName = strtolower($actionNameArray[0]);
        }
        return $this->actionName;
    }

    //end of getActionName

    /**
     * @param string $orderSelection
     * @return void
     */
    public function setOrderSelection($orderSelection) {
        $this->getService()->setOrderSelection($orderSelection);
    }

    //end of setOrderSelection

    /**
     * @return string
     */
    public function getOrderSelection() {
        return $this->getService()->getOrderSelection();
    }

    //end of getOrderSelection

    /**
     * @return array
     */
    public function lists() {
        return array($this->getActionName() . "-lists", $this->getService()->findAll());
    }

    /**
     * @return array
     */
    public function edit() {
        $this->getService()->setModel($this->getService()->findById($this->getService()->getModel()->getId()));
        return array($this->getActionName() . "-edit", clone $this->getService()->getModel());
    }

    /**
     * @return array
     */
    public function insert() {
        $this->getService()->insert();
        return $this->lists();
    }

    /**
     * @return array
     */
    public function update() {
        $this->getService()->update();
        return $this->lists();
    }

    /**
     * @return array
     */
    public function delete() {
        $this->getService()->setModel($this->getService()->findById($this->getService()->getModel()->getId()));
        $this->getService()->delete();
        return $this->lists();
    }

    /**
     * @return array
     */
    public function search() {
        $dbProperties = $this->getService()->getModel()->getDbProperties();
        $keyValueArray = array();
        foreach ($this->getContainer()->getWebAppTool()->getGetPostArray() as $key => $value) {
            if (in_array($key, $dbProperties)) {
                $keyValueArray[$key] = $value;
            }
        }
        if (count($keyValueArray) > 0) {
            return array($this->getActionName() . "-search", $this->getService()->findByKeyValueArray($keyValueArray));
        }
        return $this->lists();
    }

    /**
     * @return array
     */
    public function save() {
        if ($this->getService()->getModel()->getId() == null) {
            $this->getService()->insert();
        } else {
            $this->getService()->update();
        }
        return $this->lists();
    }

    /**
     * @param string $message
     * @param array $params
     * @return void
     */
    public function log($message, $params = array()) {
        $this->getContainer()->getLogger()->log($message, $params);
    }


}