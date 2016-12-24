<?php
/**
 * @package service
 */
class LangServiceImpl extends SupportService implements LangService {
	
	
	/**
	 * @var Lang lang
	 * */
	private $lang;


	/**
	* @param Lang lang
	* @return void
	*/
	public function setLang(Lang $lang){
		$this->setModel($lang);
		$this->lang=$lang;
	}//end of setLang
	
	/**
	* @return Lang
	*/
	public function getLang(){
		if (is_null($this->lang)) {
			$this->setLang($this->getContainer()->getModelManager()->getLang());
		}
		return $this->lang;
	}//end of getLang
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getLang();
	}//end of getModel

	
}


?>