<?
$output = "<?php
/**
 * @package service
 */
class " . $CLASS_NAME . "ActionImpl extends SupportAction implements " . $CLASS_NAME . "Action{
	
	/**
	*@return array
	*/
	public function " . $OBJECT_NAME . "(){
		return array(\"" . $OBJECT_NAME . "-" . $OBJECT_NAME . "\",\"\");
	}


}
?>
";

$actionImplFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "action/" . $FILE_NAME . "actionimpl.php";
if (!file_exists($actionImplFileName)) {
    file_put_contents($actionImplFileName, $output);
    chmod($actionImplFileName, 0755);
}
