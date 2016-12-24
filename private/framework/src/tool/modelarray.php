<?php
/**
 * class ModelArray
 */
interface ModelArray {


    /**
     * @param array modelArray
     * @return void
     */
    public function setModelArray($modelArray);

    /**
     * @return array
     */
    public function getModelArray();

    /**
     * @param Model $model
     * @access public
     */
    public function add(Model $model);

    /**
     *
     * @param string $nodeName
     * @param bool $force
     * @return string
     * @access public
     */
    public function getXML($nodeName = null, $force = false);

    /**
     *
     * @param bool $force
     * @return string
     * @access public
     */
    public function getJSON($force = false);

    /**
     *
     * @return bool
     * @access public
     */
    public function serializeModel();

    /**
     *
     * @return bool
     * @access public
     */
    public function unserializeModel();

    /**
     *
     * @return int
     * @access public
     */
    public function size();

    /**
     *
     * @param int $index
     * @return Model
     * @access public
     */
    public function get($index);


} // end of ModelArray
