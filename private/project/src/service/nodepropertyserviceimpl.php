<?php
/**
 * @package service
 */
class NodePropertyServiceImpl extends SupportService implements NodePropertyService {
	
	
	/**
	 * @var NodeProperty nodeProperty
	 * */
	private $nodeProperty;


	/**
	* @param NodeProperty nodeProperty
	* @return void
	*/
	public function setNodeProperty(NodeProperty $nodeProperty){
		$this->setModel($nodeProperty);
		$this->nodeProperty=$nodeProperty;
	}//end of setNodeProperty
	
	/**
	* @return NodeProperty
	*/
	public function getNodeProperty(){
		if (is_null($this->nodeProperty)) {
			$this->setNodeProperty($this->getContainer()->getModelManager()->getNodeProperty());
		}
		return $this->nodeProperty;
	}//end of getNodeProperty
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNodeProperty();
	}//end of getModel

	
}


?>