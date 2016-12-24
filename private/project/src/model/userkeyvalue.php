<?php
/**
 * @package model
 */
class UserKeyValue implements Model {

	/**
	 * @var int
	 * */
	private $id;
	
	/**
	 * @var int
	 * */
	private $userId;
	
	/**
	 * @var string
	 * */
	private $key;
	
	/**
	 * @var string
	 * */
	private $value;
	
	
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
	private $orderSelection="id";
	
	/**
	* @var string
	**/
	private $primaryKey="id";
	
	/**
	 * @var string
	 * */
	private $tableName="user_key_value";
	
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
	private $dbProperties = array("id","user_id","key","value",);
	

	/**
	 * @var array
	 */
	private $columnProperties = array(
		"id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('user_key_value_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"user_id"=>array(
			"type"=>"int",
			"default_value"=>"",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"key"=>array(
			"type"=>"string",
			"default_value"=>"",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	
		"value"=>array(
			"type"=>"string",
			"default_value"=>"",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	);
	
	/**
	 * @var array
	 */
	private $mutators = array(
		"id"=> "Id",
		"user_id"=> "UserId",
		"key"=> "Key",
		"value"=> "Value",);
	
	/**
	 * @var User
	 * */
	private $user;
	

	/**
	 * @var array
	 */
	private $relationsArray = array(
		"user_id"=>array(
			'relationTable'=>'user',
			'relationField'=>'id',
			'relationClass'=>'User',
			'viewField'=>'user_name',
			),
		);
	
	/**
	 * @var array
	 */
	private $dbPropertiesUpdate = array("user_id","key","value",);
	
	/**
	 * @var array
	 */
	private $dbPropertiesInsert = array("user_id","key","value",);

	/**
	* @param array $attributesArray
	*/
	public function UserKeyValue(array $attributesArray = array()){
		$this->setAttributesArray($attributesArray);
	}
	

	/**
	* @param int $id
	* @return void
	*/
	public function setId($id){
		$this->id=$id;
	}//end of setId
	
	/**
	* @return int
	*/
	public function getId(){
		return $this->id;
	}//end of getId
		
	
	/**
	* @param int $userId
	* @return void
	*/
	public function setUserId($userId){
		$this->userId=$userId;
	}//end of setUserId
	
	/**
	* @return int
	*/
	public function getUserId(){
		return $this->userId;
	}//end of getUserId
		
	
	/**
	* @param string $key
	* @return void
	*/
	public function setKey($key){
		$this->key=$key;
	}//end of setKey
	
	/**
	* @return string
	*/
	public function getKey(){
		return $this->key;
	}//end of getKey
		
	
	/**
	* @param string $value
	* @return void
	*/
	public function setValue($value){
		$this->value=$value;
	}//end of setValue
	
	/**
	* @return string
	*/
	public function getValue(){
		return $this->value;
	}//end of getValue
		
	
	/**
	* @param User $user
	* @return void
	*/
	public function setUser($user){
		$this->user=$user;
	}//end of setUser
	
	/**
	* @return User
	*/
	public function getUser(){
		return $this->user;
	}//end of getUser
		
	
	
	/**
	* @param string $orderSelection
	* @return void
	*/
	public function setOrderSelection($orderSelection){
		$this->orderSelection=$orderSelection;
	}//end of setOrderSelection
	
	/**
	* @return string
	*/
	public function getOrderSelection(){
		return $this->orderSelection;
	}//end of getOrderSelection
	
	/**
	* @param string $primaryKey
	* @return void
	*/
	public function setPrimaryKey($primaryKey){
		$this->primaryKey=$primaryKey;
	}//end of setPrimaryKey
	
	/**
	* @return string
	*/
	public function getPrimaryKey(){
		return $this->primaryKey;
	}//end of getPrimaryKey
	
	/**
	* @param string $tableName
	* @return void
	*/
	public function setTableName($tableName){
		$this->tableName=$tableName;
	}//end of setTableName
	
	/**
	* @return string
	*/
	public function getTableName(){
		return $this->tableName;
	}//end of getTableName
	
	/**
	* @param array $formVariables
	* @return void
	*/
	public function setFormVariables(array $formVariables){
		$this->formVariables=$formVariables;
	}//end of setFormVariables

	/**
	* @return array
	*/
	public function getFormVariables(){
		return $this->formVariables;
	}//end of getFormVariables
	
	
	/**
	* @param array $attributesArray
	* @return void
	*/
	public function setAttributesArray(array $attributesArray){
		$this->attributesArray=$attributesArray;
		$methodsArray = get_class_methods("UserKeyValue");
		foreach ($this->attributesArray as $key => $value){
			if(in_array("set".ucfirst($key), $methodsArray)){
				$method = "set".ucfirst($key);
				$this->$method($value);
			}
		}
	}//end of setAttributesArray
	
	/**
	* @return array
	*/
	public function getAttributesArray(){
		return $this->attributesArray;
	}//end of getAttributesArray
	
	
	/**
	* @param array $dbProperties
	* @return void
	*/
	public function setDbProperties(array $dbProperties){
		$this->dbProperties=$dbProperties;
	}//end of setDbProperties

	/**
	* @return array
	*/
	public function getDbProperties(){
		return $this->dbProperties;
	}//end of getDbProperties
	
	/**
	* @param array $columnProperties
	* @return void
	*/
	public function setColumnProperties($columnProperties){
		$this->columnProperties=$columnProperties;
	}//end of setcolumnProperties
	
	/**
	* @return array
	*/
	public function getColumnProperties(){
	    return $this->columnProperties;
	}//end of getDbColumnProperties
	
	/**
	* @param array $mutators
	* @return void
	*/
	public function setMutators($mutators){
		$this->mutators=$mutators;
	}//end of setMutators
	
	/**
	* @return array
	*/
	public function getMutators(){
	    return $this->mutators;
	}//end of getMutators
	
	/**
	* @param array $dbPropertiesUpdate
	* @return void
	*/
	public function setDbPropertiesUpdate(array $dbPropertiesUpdate){
	    $this->dbPropertiesUpdate=$dbPropertiesUpdate;
	}//end of setDbPropertiesUpdate
	
	/**
	* @return array
	*/
	public function getDbPropertiesUpdate(){
	    return $this->dbPropertiesUpdate;
	}//end of getDbPropertiesUpdate
	
	
	/**
	* @param array $dbPropertiesInsert
	* @return void
	*/
	public function setDbPropertiesInsert(array $dbPropertiesInsert){
	    $this->dbPropertiesInsert=$dbPropertiesInsert;
	}//end of setDbPropertiesInsert
	
	/**
	* @return array
	*/
	public function getDbPropertiesInsert(){
	    return $this->dbPropertiesInsert;
	}//end of getDbPropertiesInsert
	
	/**
	* @param array $relationsArray
	* @return void
	*/
	public function setRelationsArray(array $relationsArray){
	    $this->relationsArray=$relationsArray;
	}//end of setRelationsArray
	
	/**
	* @return array
	*/
	public function getRelationsArray(){
	    return $this->relationsArray;
	}//end of getRelationsArray
	
	/**
	* @param bool $force
	* @return array
	*/
	public function getArray($force = false){
		if(is_null($this->arrayValue) || $force == true){
			foreach ($this->getMutators() as $dbFiled => $mutator) {
				$methodName = "get".$mutator;
				$this->arrayValue[$dbFiled]=$this->$methodName();
			}
			$this->arrayValue["orderSelection"]=$this->getOrderSelection();
			$this->arrayValue["primaryKey"]=$this->getPrimaryKey();
			$this->arrayValue["tableName"]=$this->getTableName();
			$this->arrayValue["attributesArray"]=$this->getAttributesArray();
			$this->arrayValue["columnProperties"]=$this->getColumnProperties();
			$this->arrayValue["mutators"]=$this->getMutators();
			$this->arrayValue["relationsArray"]=$this->getRelationsArray();
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
	public function getXML($nodeName=null, $force = false){
		if(is_null($nodeName)){
			$nodeName = $this->getTableName();
		}
		if(is_null($this->xmlValue) || $force == true){
			$this->xmlValue = $this->getXmlGenerator()->generateXml($this->getArray($force),$nodeName);
		}
		return $this->xmlValue;
	}
	
	/**
	* @param XmlGenerator $xmlGenerator
	* @return void
	*/
	public function setXmlGenerator($xmlGenerator){
		$this->xmlGenerator=$xmlGenerator;
	}//end of setXmlGenerator
	
	/**
	* @return XmlGenerator
	*/
	public function getXmlGenerator(){
		return $this->xmlGenerator;
	}//end of getXmlGenerator
	

	
}