<?php
/**
 * @package model
 */
class NodeAttribute implements Model {

	/**
	 * @var int
	 * */
	private $id;
	
	/**
	 * @var int
	 * */
	private $nodeId;
	
	/**
	 * @var int
	 * */
	private $attributeId;
	
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
	private $orderSelection="attribute_id";
	
	/**
	* @var string
	**/
	private $primaryKey="attribute_id";
	
	/**
	 * @var string
	 * */
	private $tableName="node_attribute";
	
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
	private $dbProperties = array("id","node_id","attribute_id","is_visible","creation_date","last_update",);
	

	/**
	 * @var array
	 */
	private $columnProperties = array(
		"id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"node_id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_node_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"attribute_id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_attribute_id_seq'::regclass)",
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
		"node_id"=> "NodeId",
		"attribute_id"=> "AttributeId",
		"is_visible"=> "IsVisible",
		"creation_date"=> "CreationDate",
		"last_update"=> "LastUpdate",);
	
	/**
	 * @var Attribute
	 * */
	private $attribute;
	
	
	/**
	 * @var Node
	 * */
	private $node;
	

	/**
	 * @var array
	 */
	private $relationsArray = array(
		"attribute_id"=>array(
			'relationTable'=>'attribute',
			'relationField'=>'id',
			'relationClass'=>'Attribute',
			'viewField'=>'name',
			),
		"node_id"=>array(
			'relationTable'=>'node',
			'relationField'=>'id',
			'relationClass'=>'Node',
			'viewField'=>'node_id',
			),
		);
	
	/**
	 * @var array
	 */
	private $dbPropertiesUpdate = array("id","node_id","is_visible","creation_date","last_update",);
	
	/**
	 * @var array
	 */
	private $dbPropertiesInsert = array("id","node_id","is_visible","creation_date","last_update",);

	/**
	* @param array $attributesArray
	*/
	public function NodeAttribute(array $attributesArray = array()){
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
	* @param int $nodeId
	* @return void
	*/
	public function setNodeId($nodeId){
		$this->nodeId=$nodeId;
	}//end of setNodeId
	
	/**
	* @return int
	*/
	public function getNodeId(){
		return $this->nodeId;
	}//end of getNodeId
		
	
	/**
	* @param int $attributeId
	* @return void
	*/
	public function setAttributeId($attributeId){
		$this->attributeId=$attributeId;
	}//end of setAttributeId
	
	/**
	* @return int
	*/
	public function getAttributeId(){
		return $this->attributeId;
	}//end of getAttributeId
		
	
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
	* @param Attribute $attribute
	* @return void
	*/
	public function setAttribute($attribute){
		$this->attribute=$attribute;
	}//end of setAttribute
	
	/**
	* @return Attribute
	*/
	public function getAttribute(){
		return $this->attribute;
	}//end of getAttribute
		
	
	/**
	* @param Node $node
	* @return void
	*/
	public function setNode($node){
		$this->node=$node;
	}//end of setNode
	
	/**
	* @return Node
	*/
	public function getNode(){
		return $this->node;
	}//end of getNode
		
	
	
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
		$methodsArray = get_class_methods("NodeAttribute");
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