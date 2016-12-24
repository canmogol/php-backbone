<?


$resultConstraint = pg_query("SELECT kcu.column_name, ccu.table_name AS references_table, ccu.column_name AS references_field FROM information_schema.table_constraints tc LEFT JOIN information_schema.key_column_usage kcu ON tc.constraint_catalog = kcu.constraint_catalog AND tc.constraint_schema = kcu.constraint_schema AND tc.constraint_name = kcu.constraint_name LEFT JOIN information_schema.referential_constraints rc ON tc.constraint_catalog = rc.constraint_catalog AND tc.constraint_schema = rc.constraint_schema AND tc.constraint_name = rc.constraint_name LEFT JOIN information_schema.constraint_column_usage ccu ON rc.unique_constraint_catalog = ccu.constraint_catalog AND rc.unique_constraint_schema = ccu.constraint_schema AND rc.unique_constraint_name = ccu.constraint_name WHERE tc.table_name = '" . $TABLE_NAME . "' and constraint_type='FOREIGN KEY'");
$RELATIONS_ARRAY = array();
if (pg_num_rows($resultConstraint) > 0) {
    foreach (pg_fetch_all($resultConstraint) as $valueArray) {
        $relationClassName = "";
        $strArr = explode("_", $valueArray["references_table"]);
        foreach ($strArr as $vl) {
            $relationClassName .= ucfirst($vl);
        }

        $resultConstraintColumns = pg_query("SELECT * FROM information_schema.columns WHERE table_name = '" . $valueArray["references_table"] . "' and data_type='character varying' and is_nullable='NO'");
        if (pg_num_rows($resultConstraintColumns) > 0) {
            $rowConstraintColumns = pg_fetch_all($resultConstraintColumns);
            $columnName = $rowConstraintColumns[0]["column_name"];
        } else {
            $resultConstraintColumns = pg_query("SELECT * FROM information_schema.columns WHERE table_name = '" . $valueArray["references_table"] . "' and data_type='character varying'");
            if (pg_num_rows($resultConstraintColumns) > 0) {
                $rowConstraintColumns = pg_fetch_all($resultConstraintColumns);
                $columnName = $rowConstraintColumns[0]["column_name"];
            } else {
                $columnName = $valueArray["column_name"];
            }
        }

        $RELATIONS_ARRAY[$valueArray["column_name"]] = array(
            "relationTable" => $valueArray["references_table"],
            "relationField" => $valueArray["references_field"],
            "relationClass" => $relationClassName,
            "viewField" => $columnName,
        );

    }
}


$CLASS_NAME = "";
$strArr = explode("_", $TABLE_NAME);
$i = 0;
$OBJECT_NAME = "";
foreach ($strArr as $vl) {
    if ($i > 0) {
        $OBJECT_NAME .= ucfirst($vl);
    } else {
        $OBJECT_NAME .= $vl;
    }
    $CLASS_NAME .= ucfirst($vl);
    $i++;
}
$FILE_NAME = strtolower($CLASS_NAME);

$result = pg_query("SELECT * FROM information_schema.columns WHERE table_name ='" . $TABLE_NAME . "'");
$dbPropertiesArray = array();
$PRIMARY_KEY = "";

while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {

    $methodName = "";
    $variableName = "";
    $strArr = explode("_", $row['column_name']);
    $i = 0;
    foreach ($strArr as $vl) {
        if ($i > 0) {
            $variableName .= ucfirst($vl);
        } else {
            $variableName .= $vl;
        }
        $methodName .= ucfirst($vl);
        $i++;
    }

    $searchArray = array("float4", "float8", "varchar", "int2", "int4", "int8");
    $replaceArray = array("float", "double", "string", "int", "int", "int");
    if (in_array($row['udt_name'], $searchArray)) {
        $phpVariable = str_replace($searchArray, $replaceArray, $row['udt_name']);
    } else {
        $phpVariable = "string";
    }
    $row['column_default'] = trim($row['column_default']);
    $columDefaultArray = array();
    if (!is_null($row['column_default']) && substr($row['column_default'], 0, 7) == "nextval") {
        $PRIMARY_KEY = $row['column_name'];
    }
    $dbPropertiesArray[$row['column_name']] = array(
        "columnName" => $row['column_name'],
        "columnDefault" => $row['column_default'],
        "isNullable" => $row['is_nullable'],
        "dataType" => $row['data_type'],
        "udtName" => $row['udt_name'],
        "methodName" => $methodName,
        "variableName" => $variableName,
        "phpVariable" => $phpVariable,
        "sequence" => $columDefaultArray[1],
    );
}
$tableColumnPropsSql = "SELECT table_name,column_name,column_default as default_value,is_nullable,
					data_type,character_maximum_length 
					FROM 
					information_schema.columns WHERE table_name = '" . $TABLE_NAME . "'";
$tableColumnPropsResult = pg_query($tableColumnPropsSql);
$tableColumnProps = pg_fetch_all($tableColumnPropsResult);

$FRAMEWORK_ROOT_DIR_NAME = $_POST["framework_root_dir_name"];
$FRAMEWORK_SRC_DIR_NAME = $FRAMEWORK_ROOT_DIR_NAME . "src/";

$PROJECT_DIR_NAME = $_POST["project_root_dir_name"];
$PROJECT_SRC_DIR_NAME = $PROJECT_DIR_NAME . "src/";
$PROJECT_XSL_DIR_NAME = $PROJECT_DIR_NAME . "xsl/";
$PROJECT_XML_DIR_NAME = $PROJECT_DIR_NAME . "xml/";

$PROJECT_ROOT = substr(__FILE__, 0, strrpos(__FILE__, '/') + 1);

$XSL_DIR_NAME = $_POST["xsl_dir"];
if ($_POST["model"] == "on") {
    include("private/framework/src/include/modelgen.php");
}
if ($_POST["serviceinterface"] == "on") {
    include("private/framework/src/include/servicegen.php");
}
if ($_POST["serviceimpl"] == "on") {
    include("private/framework/src/include/serviceimplgen.php");
}
if ($_POST["actioninterface"] == "on") {
    include("private/framework/src/include/actiongen.php");
}
if ($_POST["actionimpl"] == "on") {
    include("private/framework/src/include/actionimplgen.php");
}
if ($_POST["modelmanager"] == "on") {
    include("private/framework/src/include/modelmanagergen.php");
}
if ($_POST["servicemanager"] == "on") {
    include("private/framework/src/include/servicemanagergen.php");
}
if ($_POST["actionmanager"] == "on") {
    include("private/framework/src/include/actionmanagergen.php");
}
if ($_POST["context"] == "on") {
    include("private/framework/src/include/contextgen.php");
}
if ($_POST["views"] == "on") {
    include("private/framework/src/include/viewsgen.php");
}

