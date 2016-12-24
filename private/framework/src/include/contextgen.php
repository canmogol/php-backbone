<?

$contextManagerFileName = $PROJECT_ROOT . $PROJECT_XML_DIR_NAME . "context.xml";

$contextFileContent = file_get_contents($contextManagerFileName);

$contextFileContent = str_replace(
    "	<!-- Services -->
",
    "	<!-- Services -->
	<bean name=\"" . $OBJECT_NAME . "Service\" impl=\"" . $CLASS_NAME . "ServiceImpl\" type=\"service\" />
",
    $contextFileContent);

$contextFileContent = str_replace(
    "	<!-- Models -->
",
    "	<!-- Models -->
	<bean name=\"" . $OBJECT_NAME . "\" impl=\"" . $CLASS_NAME . "\" type=\"model\" />
",
    $contextFileContent);


$contextFileContent = str_replace(
    "	<!-- Actions -->
",
    "	<!-- Actions -->
	<bean name=\"" . $OBJECT_NAME . "Action\" impl=\"" . $CLASS_NAME . "ActionImpl\" type=\"action\" />
",
    $contextFileContent);


file_put_contents($contextManagerFileName, $contextFileContent);
