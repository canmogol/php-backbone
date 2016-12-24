<?php
/**
 * @package service
 */
class GroupServiceImpl extends SupportService implements GroupService {
	
	
	/**
	 * @var Group group
	 * */
	private $group;


	/**
	* @param Group group
	* @return void
	*/
	public function setGroup(Group $group){
		$this->setModel($group);
		$this->group=$group;
	}//end of setGroup
	
	/**
	* @return Group
	*/
	public function getGroup(){
		if (is_null($this->group)) {
			$this->setGroup($this->getContainer()->getModelManager()->getGroup());
		}
		return $this->group;
	}//end of getGroup
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getGroup();
	}//end of getModel

	
}


?>