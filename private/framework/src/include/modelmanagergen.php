<?

$modelManagerFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "manager/modelmanager.php";
if (!file_exists($modelManagerFileName)) {
    $output = "<?

class ModelManager extends BaseModelManager {


	/*
	Models
	*/


	/*
	setters getters
	*/


}

";
    file_put_contents($modelManagerFileName, $output);
    chmod($modelManagerFileName, 0755);
}

$modelManagerContent = file_get_contents($modelManagerFileName);

$modelManagerContent = str_replace(
    "	/*
	Models
	*/
",
    "	/*
	Models
	*/
	
	/**
	 * @var " . $CLASS_NAME . "
	 */
	private $" . $OBJECT_NAME . ";
", $modelManagerContent);


$modelManagerContent = str_replace(
    "	/*
	setters getters
	*/
",
    "	/*
	setters getters
	*/
	
	/**
	* @param " . $CLASS_NAME . " " . $OBJECT_NAME . "
	* @return void
	*/
	public function set" . $CLASS_NAME . "(" . $CLASS_NAME . " $" . $OBJECT_NAME . "){
		\$this->" . $OBJECT_NAME . "=$" . $OBJECT_NAME . ";
	}//end of set" . $CLASS_NAME . "
	
	/**
	* @return " . $CLASS_NAME . "
	*/
	public function get" . $CLASS_NAME . "(){
		return \$this->" . $OBJECT_NAME . ";
	}//end of get" . $CLASS_NAME . "
", $modelManagerContent);


file_put_contents($modelManagerFileName, $modelManagerContent);

