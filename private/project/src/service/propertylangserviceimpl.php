<?php
/**
 * @package service
 */
class PropertyLangServiceImpl extends SupportService implements PropertyLangService {
	
	
	/**
	 * @var PropertyLang propertyLang
	 * */
	private $propertyLang;


	/**
	* @param PropertyLang propertyLang
	* @return void
	*/
	public function setPropertyLang(PropertyLang $propertyLang){
		$this->setModel($propertyLang);
		$this->propertyLang=$propertyLang;
	}//end of setPropertyLang
	
	/**
	* @return PropertyLang
	*/
	public function getPropertyLang(){
		if (is_null($this->propertyLang)) {
			$this->setPropertyLang($this->getContainer()->getModelManager()->getPropertyLang());
		}
		return $this->propertyLang;
	}//end of getPropertyLang
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getPropertyLang();
	}//end of getModel

	
}


?>