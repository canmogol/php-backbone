<?php
/**
 * @package service
 */
class AttributeLangServiceImpl extends SupportService implements AttributeLangService {
	
	
	/**
	 * @var AttributeLang attributeLang
	 * */
	private $attributeLang;


	/**
	* @param AttributeLang attributeLang
	* @return void
	*/
	public function setAttributeLang(AttributeLang $attributeLang){
		$this->setModel($attributeLang);
		$this->attributeLang=$attributeLang;
	}//end of setAttributeLang
	
	/**
	* @return AttributeLang
	*/
	public function getAttributeLang(){
		if (is_null($this->attributeLang)) {
			$this->setAttributeLang($this->getContainer()->getModelManager()->getAttributeLang());
		}
		return $this->attributeLang;
	}//end of getAttributeLang
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getAttributeLang();
	}//end of getModel

	
}


?>