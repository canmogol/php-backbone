<?

$actionManagerFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "manager/actionmanager.php";
if (!file_exists($actionManagerFileName)) {
    $output = "<?

class ActionManager extends BaseActionManager {


	/*
	Actions
	*/


	/*
	setters getters
	*/


}

";
    file_put_contents($actionManagerFileName, $output);
    chmod($actionManagerFileName, 0755);
}

$actionManagerContent = file_get_contents($actionManagerFileName);

$actionManagerContent = str_replace(
    "	/*
	Actions
	*/
",
    "	/*
	Actions
	*/
	
	/**
	 * @var " . $CLASS_NAME . "Action
	 */
	private $" . $OBJECT_NAME . "Action;
", $actionManagerContent);


$actionManagerContent = str_replace(
    "	/*
	setters getters
	*/
",
    "	/*
	setters getters
	*/
	
	/**
	* @param " . $CLASS_NAME . "Action " . $OBJECT_NAME . "Action
	* @return void
	*/
	public function set" . $CLASS_NAME . "Action(" . $CLASS_NAME . "Action $" . $OBJECT_NAME . "Action){
		\$this->" . $OBJECT_NAME . "Action=$" . $OBJECT_NAME . "Action;
	}//end of set" . $CLASS_NAME . "Action
	
	/**
	* @return " . $CLASS_NAME . "Action
	*/
	public function get" . $CLASS_NAME . "Action(){
		return \$this->" . $OBJECT_NAME . "Action;
	}//end of get" . $CLASS_NAME . "Action
", $actionManagerContent);


file_put_contents($actionManagerFileName, $actionManagerContent);

