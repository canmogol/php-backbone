<?
$output = "<?php
/**
 * @package action
 */
interface " . $CLASS_NAME . "Action extends Action{
	
}
";

$actionFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "action/" . $FILE_NAME . "action.php";
if (!file_exists($actionFileName)) {
    file_put_contents($actionFileName, $output);
    chmod($actionFileName, 0755);
}
