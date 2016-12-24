<?

$output = "<?php
/**
 * @package service
 */
interface " . $CLASS_NAME . "Service extends Service{

}";

$serviceFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "service/" . $FILE_NAME . "service.php";
if (!file_exists($serviceFileName)) {
    file_put_contents($serviceFileName, $output);
    chmod($serviceFileName, 0755);
}

