<?php
/**
 * @package model
 */
class User implements Model {

    /**
     * @var int
     * */
    private $id;

    /**
     * @var string
     * */
    private $userName;

    /**
     * @var string
     * */
    private $password;

    /**
     * @var string
     * */
    private $sessionId;

    /**
     * @var string
     * */
    private $remoteAddress;

    /**
     * @var string
     * */
    private $sessionLastUpdate;


    /**
     * @var array
     * */
    private $arrayValue;

    /**
     * @var string
     * */
    private $xmlValue;

    /**
     * @var XmlGenerator
     * */
    private $xmlGenerator;

    /**
     * @var string
     * */
    private $orderSelection = "id";

    /**
     * @var string
     **/
    private $primaryKey = "id";

    /**
     * @var string
     * */
    private $tableName = "user";

    /**
     * @var array
     * */
    private $attributesArray = array();

    /**
     * @var array
     */
    private $formVariables = array();

    /**
     * @var array
     */
    private $groups = array();

    /**
     * @var array
     */
    private $dbProperties = array("id", "user_name", "password", "session_id", "remote_address", "session_last_update",);


    /**
     * @var array
     */
    private $columnProperties = array(
        "id" => array(
            "type" => "int",
            "default_value" => "nextval('user_id_seq'::regclass)",
            "max" => "",
            "validator" => "isInteger",
            "notnull" => true),

        "user_name" => array(
            "type" => "string",
            "default_value" => "",
            "max" => "",
            "validator" => "isString",
            "notnull" => false),

        "password" => array(
            "type" => "string",
            "default_value" => "",
            "max" => "",
            "validator" => "isString",
            "notnull" => false),

        "session_id" => array(
            "type" => "string",
            "default_value" => "",
            "max" => "",
            "validator" => "isString",
            "notnull" => false),

        "remote_address" => array(
            "type" => "string",
            "default_value" => "",
            "max" => "",
            "validator" => "isString",
            "notnull" => false),

        "session_last_update" => array(
            "type" => "timestamp with time zone",
            "default_value" => "now()",
            "max" => "",
            "validator" => "isString",
            "notnull" => false),
    );

    /**
     * @var array
     */
    private $mutators = array(
        "id" => "Id",
        "user_name" => "UserName",
        "password" => "Password",
        "session_id" => "SessionId",
        "remote_address" => "RemoteAddress",
        "session_last_update" => "SessionLastUpdate",);

    /**
     * @var array
     */
    private $relationsArray = array();

    /**
     * @var array
     */
    private $dbPropertiesUpdate = array("user_name", "password", "session_id", "remote_address", "session_last_update",);

    /**
     * @var array
     */
    private $dbPropertiesInsert = array("user_name", "password", "session_id", "remote_address", "session_last_update",);

    /**
     * @param array $attributesArray
     */
    public function User(array $attributesArray = array()) {
        $this->setAttributesArray($attributesArray);
    }


    /**
     * @param int $id
     * @return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    //end of setId

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    //end of getId


    /**
     * @param string $userName
     * @return void
     */
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    //end of setUserName

    /**
     * @return string
     */
    public function getUserName() {
        return $this->userName;
    }

    //end of getUserName


    /**
     * @param string $password
     * @return void
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    //end of setPassword

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    //end of getPassword


    /**
     * @param string $sessionId
     * @return void
     */
    public function setSessionId($sessionId) {
        $this->sessionId = $sessionId;
    }

    //end of setSessionId

    /**
     * @return string
     */
    public function getSessionId() {
        return $this->sessionId;
    }

    //end of getSessionId


    /**
     * @param string $remoteAddress
     * @return void
     */
    public function setRemoteAddress($remoteAddress) {
        $this->remoteAddress = $remoteAddress;
    }

    //end of setRemoteAddress

    /**
     * @return string
     */
    public function getRemoteAddress() {
        return $this->remoteAddress;
    }

    //end of getRemoteAddress


    /**
     * @param string $sessionLastUpdate
     * @return void
     */
    public function setSessionLastUpdate($sessionLastUpdate) {
        $this->sessionLastUpdate = $sessionLastUpdate;
    }

    //end of setSessionLastUpdate

    /**
     * @return string
     */
    public function getSessionLastUpdate() {
        return $this->sessionLastUpdate;
    }

    //end of getSessionLastUpdate


    /**
     * @param string $orderSelection
     * @return void
     */
    public function setOrderSelection($orderSelection) {
        $this->orderSelection = $orderSelection;
    }

    //end of setOrderSelection

    /**
     * @return string
     */
    public function getOrderSelection() {
        return $this->orderSelection;
    }

    //end of getOrderSelection

    /**
     * @param string $primaryKey
     * @return void
     */
    public function setPrimaryKey($primaryKey) {
        $this->primaryKey = $primaryKey;
    }

    //end of setPrimaryKey

    /**
     * @return string
     */
    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    //end of getPrimaryKey

    /**
     * @param string $tableName
     * @return void
     */
    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    //end of setTableName

    /**
     * @return string
     */
    public function getTableName() {
        return $this->tableName;
    }

    //end of getTableName

    /**
     * @param array $formVariables
     * @return void
     */
    public function setFormVariables(array $formVariables) {
        $this->formVariables = $formVariables;
    }

    //end of setFormVariables

    /**
     * @return array
     */
    public function getFormVariables() {
        return $this->formVariables;
    }

    //end of getFormVariables


    /**
     * @param array $attributesArray
     * @return void
     */
    public function setAttributesArray(array $attributesArray) {
        $this->attributesArray = $attributesArray;
        $methodsArray = get_class_methods("User");
        foreach ($this->attributesArray as $key => $value) {
            if (in_array("set" . ucfirst($key), $methodsArray)) {
                $method = "set" . ucfirst($key);
                $this->$method($value);
            }
        }
    }

    //end of setAttributesArray

    /**
     * @return array
     */
    public function getAttributesArray() {
        return $this->attributesArray;
    }

    //end of getAttributesArray


    /**
     * @param array $dbProperties
     * @return void
     */
    public function setDbProperties(array $dbProperties) {
        $this->dbProperties = $dbProperties;
    }

    //end of setDbProperties

    /**
     * @return array
     */
    public function getDbProperties() {
        return $this->dbProperties;
    }

    //end of getDbProperties

    /**
     * @param array $columnProperties
     * @return void
     */
    public function setColumnProperties($columnProperties) {
        $this->columnProperties = $columnProperties;
    }

    //end of setcolumnProperties

    /**
     * @return array
     */
    public function getColumnProperties() {
        return $this->columnProperties;
    }

    //end of getDbColumnProperties

    /**
     * @param array $mutators
     * @return void
     */
    public function setMutators($mutators) {
        $this->mutators = $mutators;
    }

    //end of setMutators

    /**
     * @return array
     */
    public function getMutators() {
        return $this->mutators;
    }

    //end of getMutators

    /**
     * @param array $dbPropertiesUpdate
     * @return void
     */
    public function setDbPropertiesUpdate(array $dbPropertiesUpdate) {
        $this->dbPropertiesUpdate = $dbPropertiesUpdate;
    }

    //end of setDbPropertiesUpdate

    /**
     * @return array
     */
    public function getDbPropertiesUpdate() {
        return $this->dbPropertiesUpdate;
    }

    //end of getDbPropertiesUpdate


    /**
     * @param array $dbPropertiesInsert
     * @return void
     */
    public function setDbPropertiesInsert(array $dbPropertiesInsert) {
        $this->dbPropertiesInsert = $dbPropertiesInsert;
    }

    //end of setDbPropertiesInsert

    /**
     * @return array
     */
    public function getDbPropertiesInsert() {
        return $this->dbPropertiesInsert;
    }

    //end of getDbPropertiesInsert

    /**
     * @param array $relationsArray
     * @return void
     */
    public function setRelationsArray(array $relationsArray) {
        $this->relationsArray = $relationsArray;
    }

    //end of setRelationsArray

    /**
     * @return array
     */
    public function getRelationsArray() {
        return $this->relationsArray;
    }

    //end of getRelationsArray

    /**
     * @param bool $force
     * @return array
     */
    public function getArray($force = false) {
        if (is_null($this->arrayValue) || $force == true) {
            foreach ($this->getMutators() as $dbFiled => $mutator) {
                $methodName = "get" . $mutator;
                $this->arrayValue[$dbFiled] = $this->$methodName();
            }
            $this->arrayValue["orderSelection"] = $this->getOrderSelection();
            $this->arrayValue["primaryKey"] = $this->getPrimaryKey();
            $this->arrayValue["tableName"] = $this->getTableName();
            $this->arrayValue["attributesArray"] = $this->getAttributesArray();
            $this->arrayValue["columnProperties"] = $this->getColumnProperties();
            $this->arrayValue["mutators"] = $this->getMutators();
            $this->arrayValue["relationsArray"] = $this->getRelationsArray();
        }
        return $this->arrayValue;
    }

    /**
     * Returns Model Objects as XML
     *
     * @param null $nodeName
     * @param boolean $force
     * @return string
     */
    public function getXML($nodeName = null, $force = false) {
        if (is_null($nodeName)) {
            $nodeName = $this->getTableName();
        }
        if (is_null($this->xmlValue) || $force == true) {
            $this->xmlValue = $this->getXmlGenerator()->generateXml($this->getArray($force), $nodeName);
        }
        return $this->xmlValue;
    }

    /**
     * @param XmlGenerator $xmlGenerator
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
     * @param array $groups
     */
    public function setGroups($groups) {
        $this->groups = $groups;
    }

    /**
     * returns an array of Group model
     * @return array
     */
    public function getGroups() {
        return $this->groups;
    }

    /**
     * @param Group $group
     * @return void
     */
    public function addGroup($group) {
        array_push($this->groups, $group);
    }

    /**
     * @param int $groupId
     * @return bool
     */
    public function hasGroupId($groupId){
        /**
         * @var Group $groupModel
         */
        foreach ($this->getGroups() as $groupModel) {
            if($groupModel->getId() == $groupId){
                return true;
            }
        }
        return false;
    }
}