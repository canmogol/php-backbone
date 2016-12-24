<?php
/**
 * @package service
 */
class AttributeServiceImpl extends SupportService implements AttributeService {
	
	
	/**
	 * @var Attribute attribute
	 * */
	private $attribute;


	/**
	* @param Attribute attribute
	* @return void
	*/
	public function setAttribute(Attribute $attribute){
		$this->setModel($attribute);
		$this->attribute=$attribute;
	}//end of setAttribute
	
	/**
	* @return Attribute
	*/
	public function getAttribute(){
		if (is_null($this->attribute)) {
			$this->setAttribute($this->getContainer()->getModelManager()->getAttribute());
		}
		return $this->attribute;
	}//end of getAttribute
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getAttribute();
	}//end of getModel

	
}


?>