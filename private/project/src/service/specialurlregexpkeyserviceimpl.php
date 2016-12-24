<?php
/**
 * @package service
 */
class SpecialUrlRegexpKeyServiceImpl extends SupportService implements SpecialUrlRegexpKeyService {
	
	
	/**
	 * @var SpecialUrlRegexpKey specialUrlRegexpKey
	 * */
	private $specialUrlRegexpKey;


	/**
	* @param SpecialUrlRegexpKey specialUrlRegexpKey
	* @return void
	*/
	public function setSpecialUrlRegexpKey(SpecialUrlRegexpKey $specialUrlRegexpKey){
		$this->setModel($specialUrlRegexpKey);
		$this->specialUrlRegexpKey=$specialUrlRegexpKey;
	}//end of setSpecialUrlRegexpKey
	
	/**
	* @return SpecialUrlRegexpKey
	*/
	public function getSpecialUrlRegexpKey(){
		if (is_null($this->specialUrlRegexpKey)) {
			$this->setSpecialUrlRegexpKey($this->getContainer()->getModelManager()->getSpecialUrlRegexpKey());
		}
		return $this->specialUrlRegexpKey;
	}//end of getSpecialUrlRegexpKey
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getSpecialUrlRegexpKey();
	}//end of getModel

	
}


?>