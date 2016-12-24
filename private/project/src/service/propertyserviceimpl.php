<?php
/**
 * @package service
 */
class PropertyServiceImpl extends SupportService implements PropertyService {
	
	
	/**
	 * @var Property property
	 * */
	private $property;


	/**
	* @param Property property
	* @return void
	*/
	public function setProperty(Property $property){
		$this->setModel($property);
		$this->property=$property;
	}//end of setProperty
	
	/**
	* @return Property
	*/
	public function getProperty(){
		if (is_null($this->property)) {
			$this->setProperty($this->getContainer()->getModelManager()->getProperty());
		}
		return $this->property;
	}//end of getProperty
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getProperty();
	}//end of getModel

	
}


?>