<?php
interface DB {

    /**
     * @param array $connectionArray
     * @return void
     */
    public function setConnectionArray($connectionArray);

    /**
     * @return array
     */
    public function getConnectionArray();

    /**
     * @param string $hostname
     * @return void
     */
    public function setHostname($hostname);

    /**
     * @return string
     */
    public function getHostname();

    /**
     * @param string $dbName
     * @return void
     */
    public function setDbName($dbName);

    /**
     * @return string
     */
    public function getDbName();

    /**
     * @param string $username
     * @return void
     */
    public function setUsername($username);

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @param string $password
     * @return void
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param boolean $connected
     * @return void
     */
    public function setConnected($connected);

    /**
     * @param resource $resourceArray
     * @return void
     */
    public function setResourceArray($resourceArray);

    /**
     * @return resource
     */
    public function getResourceArray();

    /**
     * @param resource $connectionResource
     * @return void
     */
    public function setConnectionResource($connectionResource);

    /**
     * @return resource
     */
    public function getConnectionResource();

    /**
     * @return boolean
     * @access public
     */
    public function connect();

    /**
     * returns true if connected
     * @return boolean
     */
    public function isConnected();

    /**
     * @param string $sql
     * @return resource
     * @access public
     */
    public function dbQuery($sql);

    /**
     * @param resource $result
     * @return int
     * @access public
     */
    public function getNumRows($result);

    /**
     * @param resource $result
     * @return int
     * @access public
     */
    public function getNumFields($result);

    /**
     * @param resource $result
     * @param int $fieldNumber
     * @return String
     * @access public
     */
    public function getFieldType($result, $fieldNumber);

    /**
     *
     * @param resource $result
     * @return array
     * @access public
     */
    public function fetchAll($result);

    /**
     *
     * @param resource $result
     * @param int $row
     * @param string $field
     * @return object
     * @access public
     */
    public function fetchResult($result, $row, $field);

    /**
     *
     * @param string $tableName
     * @param array $resourceArray
     * @example resourceArray("key(columnName)"=>"value(value)")
     * @param string $condition
     * @return void
     * @access public
     */
    public function buildUpdateQuery($tableName, $resourceArray, $condition);

    /**
     *
     * @param Model model
     * @param string $condition
     * @return resource
     * @access public
     */
    public function buildFilledUpdateQuery(Model $model, $condition = null);

    /**
     *
     * @param string $tableName
     * @param array $resourceArray
     * @return void
     * @access public
     */
    public function buildInsertQuery($tableName, $resourceArray);

    /**
     *
     * @param Model model
     * @return Resource resource
     * @access public
     */
    public function buildFilledInsertQuery(Model $model);

    /**
     *
     * @param string $tableName
     * @param string $field
     * @param string $value
     * @return void
     * @access public
     */
    public function removeQuery($tableName, $field, $value);

    /**
     *
     * @param string $tableName
     * @param string $field
     * @return int
     * @access public
     */
    public function maxColumnId($tableName, $field);

} // end of Db
