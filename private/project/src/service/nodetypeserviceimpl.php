<?php
/**
 * @package service
 */
class NodeTypeServiceImpl extends SupportService implements NodeTypeService {
	
	
	/**
	 * @var NodeType nodeType
	 * */
	private $nodeType;


	/**
	* @param NodeType nodeType
	* @return void
	*/
	public function setNodeType(NodeType $nodeType){
		$this->setModel($nodeType);
		$this->nodeType=$nodeType;
	}//end of setNodeType
	
	/**
	* @return NodeType
	*/
	public function getNodeType(){
		if (is_null($this->nodeType)) {
			$this->setNodeType($this->getContainer()->getModelManager()->getNodeType());
		}
		return $this->nodeType;
	}//end of getNodeType
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNodeType();
	}//end of getModel

	
}


?>