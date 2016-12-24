<?php
/**
 * @package service
 */
class AttributeTypeServiceImpl extends SupportService implements AttributeTypeService {
	
	
	/**
	 * @var AttributeType attributeType
	 * */
	private $attributeType;


	/**
	* @param AttributeType attributeType
	* @return void
	*/
	public function setAttributeType(AttributeType $attributeType){
		$this->setModel($attributeType);
		$this->attributeType=$attributeType;
	}//end of setAttributeType
	
	/**
	* @return AttributeType
	*/
	public function getAttributeType(){
		if (is_null($this->attributeType)) {
			$this->setAttributeType($this->getContainer()->getModelManager()->getAttributeType());
		}
		return $this->attributeType;
	}//end of getAttributeType
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getAttributeType();
	}//end of getModel

	
}


?>