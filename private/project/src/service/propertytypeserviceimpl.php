<?php
/**
 * @package service
 */
class PropertyTypeServiceImpl extends SupportService implements PropertyTypeService {
	
	
	/**
	 * @var PropertyType propertyType
	 * */
	private $propertyType;


	/**
	* @param PropertyType propertyType
	* @return void
	*/
	public function setPropertyType(PropertyType $propertyType){
		$this->setModel($propertyType);
		$this->propertyType=$propertyType;
	}//end of setPropertyType
	
	/**
	* @return PropertyType
	*/
	public function getPropertyType(){
		if (is_null($this->propertyType)) {
			$this->setPropertyType($this->getContainer()->getModelManager()->getPropertyType());
		}
		return $this->propertyType;
	}//end of getPropertyType
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getPropertyType();
	}//end of getModel

	
}


?>