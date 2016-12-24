<?php
/**
 * @package service
 */
class NodeServiceImpl extends SupportService implements NodeService {
	
	
	/**
	 * @var Node node
	 * */
	private $node;


	/**
	* @param Node node
	* @return void
	*/
	public function setNode(Node $node){
		$this->setModel($node);
		$this->node=$node;
	}//end of setNode
	
	/**
	* @return Node
	*/
	public function getNode(){
		if (is_null($this->node)) {
			$this->setNode($this->getContainer()->getModelManager()->getNode());
		}
		return $this->node;
	}//end of getNode
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNode();
	}//end of getModel

	
}


?>