<?php
/**
 * @package service
 */
class UserKeyValueServiceImpl extends SupportService implements UserKeyValueService {
	
	
	/**
	 * @var UserKeyValue userKeyValue
	 * */
	private $userKeyValue;


	/**
	* @param UserKeyValue userKeyValue
	* @return void
	*/
	public function setUserKeyValue(UserKeyValue $userKeyValue){
		$this->setModel($userKeyValue);
		$this->userKeyValue=$userKeyValue;
	}//end of setUserKeyValue
	
	/**
	* @return UserKeyValue
	*/
	public function getUserKeyValue(){
		if (is_null($this->userKeyValue)) {
			$this->setUserKeyValue($this->getContainer()->getModelManager()->getUserKeyValue());
		}
		return $this->userKeyValue;
	}//end of getUserKeyValue
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getUserKeyValue();
	}//end of getModel

	
}


?>