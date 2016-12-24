<?php
/**
 * @package service
 */
class UserGroupServiceImpl extends SupportService implements UserGroupService {
	
	
	/**
	 * @var UserGroup userGroup
	 * */
	private $userGroup;


	/**
	* @param UserGroup userGroup
	* @return void
	*/
	public function setUserGroup(UserGroup $userGroup){
		$this->setModel($userGroup);
		$this->userGroup=$userGroup;
	}//end of setUserGroup
	
	/**
	* @return UserGroup
	*/
	public function getUserGroup(){
		if (is_null($this->userGroup)) {
			$this->setUserGroup($this->getContainer()->getModelManager()->getUserGroup());
		}
		return $this->userGroup;
	}//end of getUserGroup
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getUserGroup();
	}//end of getModel

	
}


?>