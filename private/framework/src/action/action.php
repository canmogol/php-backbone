<?php

/**
 * class Action
 */
interface Action {

    /**
     *
     * @param Container container
     * @return
     * @access public
     */
    public function setContainer(Container $container);

    /**
     *
     * @return Container
     * @access public
     */
    public function getContainer();

    /**
     * @param Service $service
     * @return void
     */
    public function setService(Service $service);

    /**
     * @return Service
     */
    public function getService();

    /**
     * @return array
     */
    public function lists();

    /**
     * @return array
     */
    public function insert();

    /**
     * @return array
     */
    public function update();

    /**
     * @return array
     */
    public function delete();

    /**
     * @return array
     */
    public function search();

    /**
     * @return array
     */
    public function save();

    /**
     * @param string $message
     * @param array $params
     * @return void
     */
    public function log($message, $params = array());


}
