<?php
/**
 * @package service
 */
class StackActionMethodServiceImpl extends SupportService implements StackActionMethodService {
	
	
	/**
	 * @var StackActionMethod stackActionMethod
	 * */
	private $stackActionMethod;


	/**
	* @param StackActionMethod stackActionMethod
	* @return void
	*/
	public function setStackActionMethod(StackActionMethod $stackActionMethod){
		$this->setModel($stackActionMethod);
		$this->stackActionMethod=$stackActionMethod;
	}//end of setStackActionMethod
	
	/**
	* @return StackActionMethod
	*/
	public function getStackActionMethod(){
		if (is_null($this->stackActionMethod)) {
			$this->setStackActionMethod($this->getContainer()->getModelManager()->getStackActionMethod());
		}
		return $this->stackActionMethod;
	}//end of getStackActionMethod
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getStackActionMethod();
	}//end of getModel

	
}


?>