<?

function __autoload($className) {
    global $__GLOBAL_OBJECTS_ARRAY__;
    $className = strtolower($className);
    if (array_key_exists($className, $__GLOBAL_OBJECTS_ARRAY__)) {
        include_once($__GLOBAL_OBJECTS_ARRAY__[$className]);
    } else {
        print(" unable to find " . $className . ".php in \$__GLOBAL_OBJECTS_ARRAY__");
    }
}



?>