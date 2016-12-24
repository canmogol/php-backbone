<?
$PROJECT_ROOT = substr($HTTP_SERVER_VARS['SCRIPT_FILENAME'], 0, strrpos($HTTP_SERVER_VARS['SCRIPT_FILENAME'], '/') + 1);

if (isset($_GET)) {
    extract($_GET);
    foreach ($_GET as $key => $value) {
        $$key = $value;
    }

} else if (isset($HTTP_GET_VARS)) {
    extract($HTTP_GET_VARS);
    foreach ($HTTP_GET_VARS as $key => $value) {
        $$key = $value;
    }
}

if (!empty($_POST)) {
    extract($_POST);
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
} else if (!empty($HTTP_POST_VARS)) {
    extract($HTTP_POST_VARS);
    foreach ($HTTP_POST_VARS as $key => $value) {
        $$key = $value;
    }
}

if (!empty($_FILES)) {
    extract($_FILES);
    foreach ($_FILES as $key => $value) {
        $$key = $value;
    }
} else if (!empty($HTTP_POST_FILES)) {
    extract($HTTP_POST_FILES);
    foreach ($HTTP_POST_FILES as $key => $value) {
        $$key = $value;
    }
}

global $objectArrayText;
$objectArrayText = "<?
\$__GLOBAL_OBJECTS_ARRAY__=array(";


function objectArrayGenerator($objectDirectory, $upperLevelDirectory = null)
{
    global $objectArrayText;
    if (!is_null($upperLevelDirectory)) {
        $separator = "/";
    } else {
        $separator = "";
    }
    $dir = $upperLevelDirectory . "" . $separator . "" . $objectDirectory;
    if (is_dir($dir)) {
        if ($handle = opendir($dir)) {
            while (false !== ($node = readdir($handle))) {
                if ($node != "." && $node != "..") {
                    objectArrayGenerator($node, $dir);
                }
            }
            closedir($handle);
        }
    } else {
        $objectName = substr($objectDirectory, 0, strlen($objectDirectory) - 4);
        $len = strlen($objectDirectory);
        $suffix = substr($objectDirectory, $len - 3, $len);
        if ($suffix == "php") {
            $objectArrayText .= "
		'" . $objectName . "'=>'" . $upperLevelDirectory . "/" . $objectDirectory . "',";
        }
    }
}

objectArrayGenerator($PROJECT_ROOT . 'private');

$objectArrayText .= "
	);
?>";


$filename = $PROJECT_ROOT . 'private/objectarray.php';

if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'w')) {
        echo "Cannot open file ($filename)";
        exit();
    }
    if (fwrite($handle, $objectArrayText) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit();
    }
    fclose($handle);
} else {
    echo "The file $filename is not writable";
}
