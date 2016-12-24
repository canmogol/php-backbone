<?php
/**
 * @package model
 */
class NodeAttributeLang implements Model {

	/**
	 * @var int
	 * */
	private $id;
	
	/**
	 * @var int
	 * */
	private $nodeAttributeId;
	
	/**
	 * @var int
	 * */
	private $langId;
	
	/**
	 * @var string
	 * */
	private $value;
	
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
	private $orderSelection="lang_id";
	
	/**
	* @var string
	**/
	private $primaryKey="lang_id";
	
	/**
	 * @var string
	 * */
	private $tableName="node_attribute_lang";
	
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
	private $dbProperties = array("id","node_attribute_id","lang_id","value","is_visible","creation_date","last_update",);
	

	/**
	 * @var array
	 */
	private $columnProperties = array(
		"id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_lang_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"node_attribute_id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_lang_node_attribute_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"lang_id"=>array(
			"type"=>"int",
			"default_value"=>"nextval('node_attribute_lang_lang_id_seq'::regclass)",
			"max"=>"",
			"validator"=>"isInteger",
			"notnull"=>true),
	
		"value"=>array(
			"type"=>"string",
			"default_value"=>"",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	
		"is_visible"=>array(
			"type"=>"boolean",
			"default_value"=>"true",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	
		"creation_date"=>array(
			"type"=>"timestamp with time zone",
			"default_value"=>"now()",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	
		"last_update"=>array(
			"type"=>"timestamp with time zone",
			"default_value"=>"now()",
			"max"=>"",
			"validator"=>"isString",
			"notnull"=>false),
	);
	
	/**
	 * @var array
	 */
	private $mutators = array(
		"id"=> "Id",
		"node_attribute_id"=> "NodeAttributeId",
		"lang_id"=> "LangId",
		"value"=> "Value",
		"is_visible"=> "IsVisible",
		"creation_date"=> "CreationDate",
		"last_update"=> "LastUpdate",);
	
	/**
	 * @var Lang
	 * */
	private $lang;
	
	
	/**
	 * @var NodeAttribute
	 * */
	private $nodeAttribute;
	

	/**
	 * @var array
	 */
	private $relationsArray = array(
		"lang_id"=>array(
			'relationTable'=>'lang',
			'relationField'=>'id',
			'relationClass'=>'Lang',
			'viewField'=>'name',
			),
		"node_attribute_id"=>array(
			'relationTable'=>'node_attribute',
			'relationField'=>'id',
			'relationClass'=>'NodeAttribute',
			'viewField'=>'node_attribute_id',
			),
		);
	
	/**
	 * @var array
	 */
	private $dbPropertiesUpdate = array("id","node_attribute_id","value","is_visible","creation_date","last_update",);
	
	/**
	 * @var array
	 */
	private $dbPropertiesInsert = array("id","node_attribute_id","value","is_visible","creation_date","last_update",);

	/**
	* @param array $attributesArray
	*/
	public function NodeAttributeLang(array $attributesArray = array()){
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
	* @param int $nodeAttributeId
	* @return void
	*/
	public function setNodeAttributeId($nodeAttributeId){
		$this->nodeAttributeId=$nodeAttributeId;
	}//end of setNodeAttributeId
	
	/**
	* @return int
	*/
	public function getNodeAttributeId(){
		return $this->nodeAttributeId;
	}//end of getNodeAttributeId
		
	
	/**
	* @param int $langId
	* @return void
	*/
	public function setLangId($langId){
		$this->langId=$langId;
	}//end of setLangId
	
	/**
	* @return int
	*/
	public function getLangId(){
		return $this->langId;
	}//end of getLangId
		
	
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
	* @param Lang $lang
	* @return void
	*/
	public function setLang($lang){
		$this->lang=$lang;
	}//end of setLang
	
	/**
	* @return Lang
	*/
	public function getLang(){
		return $this->lang;
	}//end of getLang
		
	
	/**
	* @param NodeAttribute $nodeAttribute
	* @return void
	*/
	public function setNodeAttribute($nodeAttribute){
		$this->nodeAttribute=$nodeAttribute;
	}//end of setNodeAttribute
	
	/**
	* @return NodeAttribute
	*/
	public function getNodeAttribute(){
		return $this->nodeAttribute;
	}//end of getNodeAttribute
		
	
	
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
		$methodsArray = get_class_methods("NodeAttributeLang");
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