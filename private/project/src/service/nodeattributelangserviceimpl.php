<?php
/**
 * @package service
 */
class NodeAttributeLangServiceImpl extends SupportService implements NodeAttributeLangService {
	
	
	/**
	 * @var NodeAttributeLang nodeAttributeLang
	 * */
	private $nodeAttributeLang;


	/**
	* @param NodeAttributeLang nodeAttributeLang
	* @return void
	*/
	public function setNodeAttributeLang(NodeAttributeLang $nodeAttributeLang){
		$this->setModel($nodeAttributeLang);
		$this->nodeAttributeLang=$nodeAttributeLang;
	}//end of setNodeAttributeLang
	
	/**
	* @return NodeAttributeLang
	*/
	public function getNodeAttributeLang(){
		if (is_null($this->nodeAttributeLang)) {
			$this->setNodeAttributeLang($this->getContainer()->getModelManager()->getNodeAttributeLang());
		}
		return $this->nodeAttributeLang;
	}//end of getNodeAttributeLang
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNodeAttributeLang();
	}//end of getModel

	
}


?>