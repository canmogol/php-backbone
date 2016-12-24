<?php
/**
 * @package service
 */
class UserServiceImpl extends SupportService implements UserService {
	
	
	/**
	 * @var User user
	 * */
	private $user;


	/**
	* @param User user
	* @return void
	*/
	public function setUser(User $user){
		$this->setModel($user);
		$this->user=$user;
	}//end of setUser
	
	/**
	* @return User
	*/
	public function getUser(){
		if (is_null($this->user)) {
			$this->setUser($this->getContainer()->getModelManager()->getUser());
		}
		return $this->user;
	}//end of getUser
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getUser();
	}//end of getModel

	
}


?>