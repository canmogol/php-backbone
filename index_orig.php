<?
/////////// ONLY FOR DEVELOPMENT ///////////
include("private/framework/src/development.php");
?>
<?
include_once("private/objectarray.php");
include_once("private/framework/src/autoload.php");

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


////////////////// RUN ACTION ////////////////

// find action class name
$actionName = "get" . ucfirst($action) . "Action";
$serviceName = "get" . ucfirst($action) . "Service";

// execute action->method
if (method_exists($container->getActionManager(), $actionName)) {
    $container->getActionManager()->$actionName()->setOrderSelection($orderSelection);
    if (!is_null($method) && method_exists($container->getActionManager()->$actionName(), $method)) {
        $container->getServiceManager()->$serviceName()->setContainer($container);
        $container->getActionManager()->$actionName()->setService($container->getServiceManager()->$serviceName());
        $actionArray = $container->getActionManager()->$actionName()->$method();
    } else {
        $container->getServiceManager()->$serviceName()->setContainer($container);
        $container->getActionManager()->$actionName()->setService($container->getServiceManager()->$serviceName());
        $actionArray = $container->getActionManager()->$actionName()->$action();
    }
    // add actionArray to viewArrays
    $container->getViewManager()->addView($actionArray);
}


////////////////// EXECUTE STACK ////////////////
// execution of all action->methods in the selected stack
$container->getStackManager()->setSelectedStackName($stack);
$container->getStackManager()->executeStack();

// check if everything is ok
if(is_array($container->getViewManager()->getViewArrays())){
    $finalXML = "";
    $finalXSL = "<xsls>";
    foreach ($container->getViewManager()->getViewArrays() as $xsl => $xml) {
        $finalXSL .= "<xsl name='" . $xsl . "'>" . $xsl . "</xsl>";
        $finalXML .= $xml->getXML();
    }
    $finalXSL .= "</xsls>";
    $finalXML .= $finalXSL;
// main.xsl js css
    echo $container->getXmlXslTool()->echoXmlXslOutput($finalXML, "private/project/xsl/stack/" . $container->getStackManager()->getSelectedStackName() . ".xsl");
}else{
    echo "no xml xsl rendering";
}

?>