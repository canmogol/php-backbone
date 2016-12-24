<?php
/**
 * @package model
 */
class Node implements Model {

	/**
	 * @var int
	 * */
	private $id;
	
	/**
	 * @var int
	 * */
	private $nodeTypeId;
	
	/**
	 * @var string
	 * */
	private $isVisible;
	
	/**
	 * @var string
	 * */
	private $creationDate;
	
	/**
	 * @var string
	 * */
	private $lastUpdate;
	
	
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
	private $tableName="node";
	
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
	private $dbProperties = array("id","node_type_id","is_visible","creation_date","last_update",);
	

	/**
	 * @var array
	 */
	private $columnProperties = array(
		"id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"node_type_id"=>array(
			"type"=>"int",
			"default_value"=>"",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"is_visible"=>array(
			"type"=>"boolean",
			"default_value"=>"true",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>false),
	
		"creation_date"=>array(
			"type"=>"timestamp with time zone",
			"default_value"=>"now()",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>false),
	
		"last_update"=>array(
			"type"=>"timestamp with time zone",
			"default_value"=>"now()",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>false),
	);
	
	/**
	 * @var array
	 */
	private $mutators = array(
		"id"=> "Id",
		"node_type_id"=> "NodeTypeId",
		"is_visible"=> "IsVisible",
		"creation_date"=> "CreationDate",
		"last_update"=> "LastUpdate",);
	
	/**
	 * @var NodeType
	 * */
	private $nodeType;
	

	/**
	 * @var array
	 */
	private $relationsArray = array(
		"node_type_id"=>array(
			'relationTable'=>'node_type',
			'relationField'=>'id',
			'relationClass'=>'NodeType',
			'viewField'=>'name',
			),
		);
	
	/**
	 * @var array
	 */
	private $dbPropertiesUpdate = array("node_type_id","is_visible","creation_date","last_update",);
	
	/**
	 * @var array
	 */
	private $dbPropertiesInsert = array("node_type_id","is_visible","creation_date","last_update",);

	/**
	* @param array $attributesArray
	*/
	public function Node(array $attributesArray = array()){
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
	* @param int $nodeTypeId
	* @return void
	*/
	public function setNodeTypeId($nodeTypeId){
		$this->nodeTypeId=$nodeTypeId;
	}//end of setNodeTypeId
	
	/**
	* @return int
	*/
	public function getNodeTypeId(){
		return $this->nodeTypeId;
	}//end of getNodeTypeId
		
	
	/**
	* @param string $isVisible
	* @return void
	*/
	public function setIsVisible($isVisible){
		$this->isVisible=$isVisible;
	}//end of setIsVisible
	
	/**
	* @return string
	*/
	public function getIsVisible(){
		return $this->isVisible;
	}//end of getIsVisible
		
	
	/**
	* @param string $creationDate
	* @return void
	*/
	public function setCreationDate($creationDate){
		$this->creationDate=$creationDate;
	}//end of setCreationDate
	
	/**
	* @return string
	*/
	public function getCreationDate(){
		return $this->creationDate;
	}//end of getCreationDate
		
	
	/**
	* @param string $lastUpdate
	* @return void
	*/
	public function setLastUpdate($lastUpdate){
		$this->lastUpdate=$lastUpdate;
	}//end of setLastUpdate
	
	/**
	* @return string
	*/
	public function getLastUpdate(){
		return $this->lastUpdate;
	}//end of getLastUpdate
		
	
	/**
	* @param NodeType $nodeType
	* @return void
	*/
	public function setNodeType($nodeType){
		$this->nodeType=$nodeType;
	}//end of setNodeType
	
	/**
	* @return NodeType
	*/
	public function getNodeType(){
		return $this->nodeType;
	}//end of getNodeType
		
	
	
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
		$methodsArray = get_class_methods("Node");
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