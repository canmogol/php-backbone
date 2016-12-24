<?php
/**
 * @package service
 */
class ActionMethodServiceImpl extends SupportService implements ActionMethodService {
	
	
	/**
	 * @var ActionMethod actionMethod
	 * */
	private $actionMethod;


	/**
	* @param ActionMethod actionMethod
	* @return void
	*/
	public function setActionMethod(ActionMethod $actionMethod){
		$this->setModel($actionMethod);
		$this->actionMethod=$actionMethod;
	}//end of setActionMethod
	
	/**
	* @return ActionMethod
	*/
	public function getActionMethod(){
		if (is_null($this->actionMethod)) {
			$this->setActionMethod($this->getContainer()->getModelManager()->getActionMethod());
		}
		return $this->actionMethod;
	}//end of getActionMethod
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getActionMethod();
	}//end of getModel

	
}


?>