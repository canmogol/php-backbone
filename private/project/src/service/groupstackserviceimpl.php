<?php
/**
 * @package service
 */
class GroupStackServiceImpl extends SupportService implements GroupStackService {
	
	
	/**
	 * @var GroupStack groupStack
	 * */
	private $groupStack;


	/**
	* @param GroupStack groupStack
	* @return void
	*/
	public function setGroupStack(GroupStack $groupStack){
		$this->setModel($groupStack);
		$this->groupStack=$groupStack;
	}//end of setGroupStack
	
	/**
	* @return GroupStack
	*/
	public function getGroupStack(){
		if (is_null($this->groupStack)) {
			$this->setGroupStack($this->getContainer()->getModelManager()->getGroupStack());
		}
		return $this->groupStack;
	}//end of getGroupStack
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getGroupStack();
	}//end of getModel

	
}


?>