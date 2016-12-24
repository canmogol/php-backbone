<?
/////////// ONLY FOR DEVELOPMENT ///////////
include("private/framework/src/development.php");
?>
<?
/////////// ONLY FOR CACHE ///////////
$requestKeys = array_keys($_GET);
if (count($requestKeys) > 0) {
    $requestURL = $requestKeys[0];
    if (substr(trim($requestURL), 0, 3) != "/_/") {
        $webAppRoot = substr($_SERVER["SCRIPT_FILENAME"], 0, strrpos($_SERVER["SCRIPT_FILENAME"], "/"));
        $requestURLFileName = $webAppRoot . "/private/cache/" . strtolower(trim(@ereg_replace("[^A-Za-z0-9]", "", $requestURL))) . ".html";
        if (file_exists($requestURLFileName)) {
            echo file_get_contents($requestURLFileName);
            exit();
        }
    }
}
?>
<?
/////////// EXECUTION STARTS HERE ///////////
include_once("private/objectarray.php");
include_once("private/framework/src/overrides.php");
include_once("private/framework/src/auxiliaries.php");

// Container
$container = new Container();

// Config File
$container->setConfigXmlFile("private/project/xml/config.xml");
$container->readConfig();

// Context XML File
$container->setContextXmlFile("private/project/xml/context.xml");
$container->readContext();

// Stack XML File
$container->setStackXmlFile("private/project/xml/stack.xml");
$container->readStack();

// Bean initialization
$container->initializeBeans();

// fill with GET POST variables
$container->fillGetPostVariables();

// Database Connection
$container->getDb()->setConnectionArray($container->getConfigArray());
$container->getDb()->connect();

// set appropriate variables to models
$container->getModelManager()->fillModels();

// set appropriate variables to actions
$container->getActionManager()->fillActions();

// run the stack/action/method
$container->runRequest();

?>