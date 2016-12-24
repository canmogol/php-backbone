<?

$output = "<?php
/**
 * @package service
 */
class " . $CLASS_NAME . "ServiceImpl extends SupportService implements " . $CLASS_NAME . "Service {
	
	
	/**
	 * @var " . $CLASS_NAME . " " . $OBJECT_NAME . "
	 * */
	private \$" . $OBJECT_NAME . ";


	/**
	* @param " . $CLASS_NAME . " " . $OBJECT_NAME . "
	* @return void
	*/
	public function set" . $CLASS_NAME . "(" . $CLASS_NAME . " \$" . $OBJECT_NAME . "){
		\$this->setModel(\$" . $OBJECT_NAME . ");
		\$this->" . $OBJECT_NAME . "=\$" . $OBJECT_NAME . ";
	}//end of set" . $CLASS_NAME . "
	
	/**
	* @return " . $CLASS_NAME . "
	*/
	public function get" . $CLASS_NAME . "(){
		if (is_null(\$this->" . $OBJECT_NAME . ")) {
			\$this->set" . $CLASS_NAME . "(\$this->getContainer()->getModelManager()->get" . $CLASS_NAME . "());
		}
		return \$this->" . $OBJECT_NAME . ";
	}//end of get" . $CLASS_NAME . "
	
	/**
	* @return Model
	*/
	public function getModel(){
		return \$this->get" . $CLASS_NAME . "();
	}//end of getModel

	
}


?>";

$serviceImplFileName = $PROJECT_ROOT . $PROJECT_SRC_DIR_NAME . "service/" . $FILE_NAME . "serviceimpl.php";
if (!file_exists($serviceImplFileName)) {
    file_put_contents($serviceImplFileName, $output);
    chmod($serviceImplFileName, 0755);
}


