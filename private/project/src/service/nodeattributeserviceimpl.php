<?php
/**
 * @package service
 */
class NodeAttributeServiceImpl extends SupportService implements NodeAttributeService {
	
	
	/**
	 * @var NodeAttribute nodeAttribute
	 * */
	private $nodeAttribute;


	/**
	* @param NodeAttribute nodeAttribute
	* @return void
	*/
	public function setNodeAttribute(NodeAttribute $nodeAttribute){
		$this->setModel($nodeAttribute);
		$this->nodeAttribute=$nodeAttribute;
	}//end of setNodeAttribute
	
	/**
	* @return NodeAttribute
	*/
	public function getNodeAttribute(){
		if (is_null($this->nodeAttribute)) {
			$this->setNodeAttribute($this->getContainer()->getModelManager()->getNodeAttribute());
		}
		return $this->nodeAttribute;
	}//end of getNodeAttribute
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNodeAttribute();
	}//end of getModel

	
}


?>