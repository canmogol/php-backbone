<?
if (!function_exists("classNames")) {
    function classNames($name)
    {
        $className = null;
        $exp = explode("_", $name);
        foreach ($exp as $value) {
            $value = ucfirst($value);
            $className .= $value;
        }
        return $className;
    }

}
$outputClass = "<?php
/**
 * @package model
 */
class " . $CLASS_NAME . " implements Model {
";

$outputVariables = "";
foreach ($dbPropertiesArray as $key => $valueArray) {
    $outputVariables .= "
	/**
	 * @var " . $valueArray['phpVariable'] . "
	 * */
	private $" . $valueArray['variableName'] . ";
	";
}
$outputStaticVariables = "
	
	/**
	 * @var array
	 * */
	private \$arrayValue;
	
	/**
	 * @var string
	 * */
	private \$xmlValue;
	
	/**
	 * @var XmlGenerator
	 * */
	private \$xmlGenerator;
	
	/**
	 * @var string
	 * */
	private \$orderSelection=\"" . $PRIMARY_KEY . "\";
	
	/**
	* @var string
	**/
	private \$primaryKey=\"" . $PRIMARY_KEY . "\";
	
	/**
	 * @var string
	 * */
	private \$tableName=\"" . $TABLE_NAME . "\";
	
	/**
	 * @var array
	 * */
	private \$attributesArray = array();
	
	/**
	 * @var array
	 */
	private \$formVariables = array();
	
	/**
	 * @var array
	 */
	private \$dbProperties = array(";

$outputDbProperties = "";
foreach ($dbPropertiesArray as $key => $valueArray) {
    $outputDbProperties .= "\"" . $key . "\",";
}
$outputDbProperties .= ");
	";

$outputColumnProps = "

	/**
	 * @var array
	 */
	private \$columnProperties = array(";

$outputMutators = "
	
	/**
	 * @var array
	 */
	private \$mutators = array(";

foreach ($tableColumnProps as $value) {
    $search = array("integer", "smallint", "character varying", "character", "bigint", "real");
    $replace = array("int", "int", "string", "string", "int", "double");
    $value["data_type"] = str_replace($search, $replace, $value["data_type"]);

    if ($value["data_type"] == "string") {
        $validator = "isString";
    }
    if ($value["data_type"] == "int") {
        $validator = "isInteger";
    }
    if ($value["data_type"] == "double") {
        $validator = "isDouble";
    }

    if ($value["is_nullable"] == "YES") {
        $nn = "false";
    } else {
        $nn = "true";
    }


    $outputColumnProps .= "
		\"$value[column_name]\"=>array(
			\"type\"=>\"$value[data_type]\",
			\"default_value\"=>\"$value[default_value]\",
			\"max\"=>\"$value[character_maximum_length]\",
			\"validator\"=>\"$validator\",
			\"notnull\"=>$nn),
	";

    $outputMutators .= "
		\"$value[column_name]\"=> \"" . classNames($value["column_name"]) . "\",";


}
$outputColumnProps .= ");";
$outputMutators .= ");";


$outputRelationSetterGetter = "";

$outputRelationVariables = "";

$outputRelations = "";
$outputRelations .= "

	/**
	 * @var array
	 */
	private \$relationsArray = array(";

foreach ($RELATIONS_ARRAY as $keyout => $valueArray) {

    $valueArray['relationClass'] = trim($valueArray['relationClass']);
    $relationVariableName = strtolower(substr($valueArray['relationClass'], 0, 1)) . substr($valueArray['relationClass'], 1);

    $outputRelationVariables .= "
	
	/**
	 * @var " . $valueArray['relationClass'] . "
	 * */
	private \$" . $relationVariableName . ";
	";


    $outputRelationSetterGetter .= "
	/**
	* @param " . $valueArray['relationClass'] . " \$" . $relationVariableName . "
	* @return void
	*/
	public function set" . $valueArray['relationClass'] . "($" . $relationVariableName . "){
		\$this->" . $relationVariableName . "=$" . $relationVariableName . ";
	}//end of set" . $valueArray['relationClass'] . "
	
	/**
	* @return " . $valueArray['relationClass'] . "
	*/
	public function get" . $valueArray['relationClass'] . "(){
		return \$this->" . $relationVariableName . ";
	}//end of get" . $valueArray['relationClass'] . "
		
	";


    $outputRelations .= "\n		\"" . $keyout . "\"=>array(";
    foreach ($valueArray as $key => $value) {
        $outputRelations .= "\n			'" . $key . "'=>'" . $value . "',";
    }
    $outputRelations .= "";
    $outputRelations .= "\n			),";


}
$outputRelations .= "\n		);";


/**
 * setting updateProp
 */
$outputDbPropertiesUpdate = "
	
	/**
	 * @var array
	 */
	private \$dbPropertiesUpdate = array(";

foreach ($dbPropertiesArray as $key => $valueArray) {
    if ($key != $PRIMARY_KEY) {
        $outputDbPropertiesUpdate .= "\"" . $key . "\",";
    }

}
$outputDbPropertiesUpdate .= ");";
////////


$outputDbPropertiesInsert = "
	
	/**
	 * @var array
	 */
	private \$dbPropertiesInsert = array(";

foreach ($dbPropertiesArray as $key => $valueArray) {
    if ($key != $PRIMARY_KEY) {
        $outputDbPropertiesInsert .= "\"" . $key . "\",";
    }
}
$outputDbPropertiesInsert .= ");
";


$outputConstructor = "";
$outputConstructor .= "
	/**
	* @param array \$attributesArray
	*/
	public function " . $CLASS_NAME . "(array \$attributesArray = array()){
		\$this->setAttributesArray(\$attributesArray);
	}
	
";

$outputSetGet = "";
foreach ($dbPropertiesArray as $key => $valueArray) {
    $outputSetGet .= "
	/**
	* @param " . $valueArray['phpVariable'] . " \$" . $valueArray['variableName'] . "
	* @return void
	*/
	public function set" . $valueArray['methodName'] . "($" . $valueArray['variableName'] . "){
		\$this->" . $valueArray['variableName'] . "=$" . $valueArray['variableName'] . ";
	}//end of set" . $valueArray['methodName'] . "
	
	/**
	* @return " . $valueArray['phpVariable'] . "
	*/
	public function get" . $valueArray['methodName'] . "(){
		return \$this->" . $valueArray['variableName'] . ";
	}//end of get" . $valueArray['methodName'] . "
		
	";
}

$outputMethods = "";
$outputMethods .= "
	
	/**
	* @param string \$orderSelection
	* @return void
	*/
	public function setOrderSelection(\$orderSelection){
		\$this->orderSelection=\$orderSelection;
	}//end of setOrderSelection
	
	/**
	* @return string
	*/
	public function getOrderSelection(){
		return \$this->orderSelection;
	}//end of getOrderSelection
	
	/**
	* @param string \$primaryKey
	* @return void
	*/
	public function setPrimaryKey(\$primaryKey){
		\$this->primaryKey=\$primaryKey;
	}//end of setPrimaryKey
	
	/**
	* @return string
	*/
	public function getPrimaryKey(){
		return \$this->primaryKey;
	}//end of getPrimaryKey
	
	/**
	* @param string \$tableName
	* @return void
	*/
	public function setTableName(\$tableName){
		\$this->tableName=\$tableName;
	}//end of setTableName
	
	/**
	* @return string
	*/
	public function getTableName(){
		return \$this->tableName;
	}//end of getTableName
	
	/**
	* @param array \$formVariables
	* @return void
	*/
	public function setFormVariables(array \$formVariables){
		\$this->formVariables=\$formVariables;
	}//end of setFormVariables

	/**
	* @return array
	*/
	public function getFormVariables(){
		return \$this->formVariables;
	}//end of getFormVariables
	
	
	/**
	* @param array \$attributesArray
	* @return void
	*/
	public function setAttributesArray(array \$attributesArray){
		\$this->attributesArray=\$attributesArray;
		\$methodsArray = get_class_methods(\"" . $CLASS_NAME . "\");
		foreach (\$this->attributesArray as \$key => \$value){
			if(in_array(\"set\".ucfirst(\$key), \$methodsArray)){
				\$method = \"set\".ucfirst(\$key);
				\$this->\$method(\$value);
			}
		}
	}//end of setAttributesArray
	
	/**
	* @return array
	*/
	public function getAttributesArray(){
		return \$this->attributesArray;
	}//end of getAttributesArray
	
	
	/**
	* @param array \$dbProperties
	* @return void
	*/
	public function setDbProperties(array \$dbProperties){
		\$this->dbProperties=\$dbProperties;
	}//end of setDbProperties

	/**
	* @return array
	*/
	public function getDbProperties(){
		return \$this->dbProperties;
	}//end of getDbProperties
	
	/**
	* @param array \$columnProperties
	* @return void
	*/
	public function setColumnProperties(\$columnProperties){
		\$this->columnProperties=\$columnProperties;
	}//end of setcolumnProperties
	
	/**
	* @return array
	*/
	public function getColumnProperties(){
	    return \$this->columnProperties;
	}//end of getDbColumnProperties
	
	/**
	* @param array \$mutators
	* @return void
	*/
	public function setMutators(\$mutators){
		\$this->mutators=\$mutators;
	}//end of setMutators
	
	/**
	* @return array
	*/
	public function getMutators(){
	    return \$this->mutators;
	}//end of getMutators
	
	/**
	* @param array \$dbPropertiesUpdate
	* @return void
	*/
	public function setDbPropertiesUpdate(array \$dbPropertiesUpdate){
	    \$this->dbPropertiesUpdate=\$dbPropertiesUpdate;
	}//end of setDbPropertiesUpdate
	
	/**
	* @return array
	*/
	public function getDbPropertiesUpdate(){
	    return \$this->dbPropertiesUpdate;
	}//end of getDbPropertiesUpdate
	
	
	/**
	* @param array \$dbPropertiesInsert
	* @return void
	*/
	public function setDbPropertiesInsert(array \$dbPropertiesInsert){
	    \$this->dbPropertiesInsert=\$dbPropertiesInsert;
	}//end of setDbPropertiesInsert
	
	/**
	* @return array
	*/
	public function getDbPropertiesInsert(){
	    return \$this->dbPropertiesInsert;
	}//end of getDbPropertiesInsert
	
	/**
	* @param array \$relationsArray
	* @return void
	*/
	public function setRelationsArray(array \$relationsArray){
	    \$this->relationsArray=\$relationsArray;
	}//end of setRelationsArray
	
	/**
	* @return array
	*/
	public function getRelationsArray(){
	    return \$this->relationsArray;
	}//end of getRelationsArray
	
	/**
	* @param bool \$force
	* @return array
	*/
	public function getArray(\$force = false){
		if(is_null(\$this->arrayValue) || \$force == true){
			foreach (\$this->getMutators() as \$dbFiled => \$mutator) {
				\$methodName = \"get\".\$mutator;
				\$this->arrayValue[\$dbFiled]=\$this->\$methodName();
			}
			\$this->arrayValue[\"orderSelection\"]=\$this->getOrderSelection();
			\$this->arrayValue[\"primaryKey\"]=\$this->getPrimaryKey();
			\$this->arrayValue[\"tableName\"]=\$this->getTableName();
			\$this->arrayValue[\"attributesArray\"]=\$this->getAttributesArray();
			\$this->arrayValue[\"columnProperties\"]=\$this->getColumnProperties();
			\$this->arrayValue[\"mutators\"]=\$this->getMutators();
			\$this->arrayValue[\"relationsArray\"]=\$this->getRelationsArray();
		}
		return \$this->arrayValue;
	}

	/**
	 * Returns Model Objects as XML
	 *
	 * @param null \$nodeName
	 * @param boolean \$force
	 * @return string
	 */
	public function getXML(\$nodeName=null, \$force = false){
		if(is_null(\$nodeName)){
			\$nodeName = \$this->getTableName();
		}
		if(is_null(\$this->xmlValue) || \$force == true){
			\$this->xmlValue = \$this->getXmlGenerator()->generateXml(\$this->getArray(\$force),\$nodeName);
		}
		return \$this->xmlValue;
	}
	
	/**
	* @param XmlGenerator \$xmlGenerator
	* @return void
	*/
	public function setXmlGenerator(\$xmlGenerator){
		\$this->xmlGenerator=\$xmlGenerator;
	}//end of setXmlGenerator
	
	/**
	* @return XmlGenerator
	*/
	public function getXmlGenerator(){
		return \$this->xmlGenerator;
	}//end of getXmlGenerator
	

	
}";

$output = $outputClass . $outputVariables . $outputStaticVariables . $outputDbProperties . $outputColumnProps . $outputMutators . $outputRelationVariables . $outputRelations . $outputDbPropertiesUpdate . $outputDbPropertiesInsert . $outputConstructor . $outputSetGet . $outputRelationSetterGetter . $outputMethods;

$modelFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "model/" . $FILE_NAME . ".php";
if (!file_exists($modelFileName)) {
    file_put_contents($modelFileName, $output);
    chmod($modelFileName, 0755);
}

