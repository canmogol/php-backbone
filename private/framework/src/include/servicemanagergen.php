<?

$serviceManagerFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "manager/servicemanager.php";
if (!file_exists($serviceManagerFileName)) {
    $output = "<?

class ServiceManager extends BaseServiceManager {


	/*
	Services
	*/


	/*
	setters getters
	*/


}

";
    file_put_contents($serviceManagerFileName, $output);
    chmod($serviceManagerFileName, 0755);
}

$serviceManagerContent = file_get_contents($serviceManagerFileName);

$serviceManagerContent = str_replace(
    "	/*
	Services
	*/
",
    "	/*
	Services
	*/
	
	/**
	 * @var " . $CLASS_NAME . "Service
	 */
	private $" . $OBJECT_NAME . "Service;
", $serviceManagerContent);


$serviceManagerContent = str_replace(
    "	/*
	setters getters
	*/
",
    "	/*
	setters getters
	*/
	
	/**
	* @param " . $CLASS_NAME . "Service " . $OBJECT_NAME . "Service
	* @return void
	*/
	public function set" . $CLASS_NAME . "Service(" . $CLASS_NAME . "Service $" . $OBJECT_NAME . "Service){
		\$this->" . $OBJECT_NAME . "Service=$" . $OBJECT_NAME . "Service;
	}//end of set" . $CLASS_NAME . "Service
	
	/**
	* @return " . $CLASS_NAME . "Service
	*/
	public function get" . $CLASS_NAME . "Service(){
		return \$this->" . $OBJECT_NAME . "Service;
	}//end of get" . $CLASS_NAME . "Service
", $serviceManagerContent);


file_put_contents($serviceManagerFileName, $serviceManagerContent);

