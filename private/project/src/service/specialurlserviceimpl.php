<?php
/**
 * @package service
 */
class SpecialUrlServiceImpl extends SupportService implements SpecialUrlService {
	
	
	/**
	 * @var SpecialUrl specialUrl
	 * */
	private $specialUrl;


	/**
	* @param SpecialUrl specialUrl
	* @return void
	*/
	public function setSpecialUrl(SpecialUrl $specialUrl){
		$this->setModel($specialUrl);
		$this->specialUrl=$specialUrl;
	}//end of setSpecialUrl
	
	/**
	* @return SpecialUrl
	*/
	public function getSpecialUrl(){
		if (is_null($this->specialUrl)) {
			$this->setSpecialUrl($this->getContainer()->getModelManager()->getSpecialUrl());
		}
		return $this->specialUrl;
	}//end of getSpecialUrl
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getSpecialUrl();
	}//end of getModel

	
}


?>