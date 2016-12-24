<?php
/**
 * @package service
 */
class StackServiceImpl extends SupportService implements StackService {
	
	
	/**
	 * @var Stack stack
	 * */
	private $stack;


	/**
	* @param Stack stack
	* @return void
	*/
	public function setStack(Stack $stack){
		$this->setModel($stack);
		$this->stack=$stack;
	}//end of setStack
	
	/**
	* @return Stack
	*/
	public function getStack(){
		if (is_null($this->stack)) {
			$this->setStack($this->getContainer()->getModelManager()->getStack());
		}
		return $this->stack;
	}//end of getStack
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getStack();
	}//end of getModel

	
}


?>