<?php
/**
 * @package service
 */
class GroupActionMethodServiceImpl extends SupportService implements GroupActionMethodService {
	
	
	/**
	 * @var GroupActionMethod groupActionMethod
	 * */
	private $groupActionMethod;


	/**
	* @param GroupActionMethod groupActionMethod
	* @return void
	*/
	public function setGroupActionMethod(GroupActionMethod $groupActionMethod){
		$this->setModel($groupActionMethod);
		$this->groupActionMethod=$groupActionMethod;
	}//end of setGroupActionMethod
	
	/**
	* @return GroupActionMethod
	*/
	public function getGroupActionMethod(){
		if (is_null($this->groupActionMethod)) {
			$this->setGroupActionMethod($this->getContainer()->getModelManager()->getGroupActionMethod());
		}
		return $this->groupActionMethod;
	}//end of getGroupActionMethod
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getGroupActionMethod();
	}//end of getModel

	
}


?>