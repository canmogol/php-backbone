<?php
/**
 * @package service
 */
class NodeLangServiceImpl extends SupportService implements NodeLangService {
	
	
	/**
	 * @var NodeLang nodeLang
	 * */
	private $nodeLang;


	/**
	* @param NodeLang nodeLang
	* @return void
	*/
	public function setNodeLang(NodeLang $nodeLang){
		$this->setModel($nodeLang);
		$this->nodeLang=$nodeLang;
	}//end of setNodeLang
	
	/**
	* @return NodeLang
	*/
	public function getNodeLang(){
		if (is_null($this->nodeLang)) {
			$this->setNodeLang($this->getContainer()->getModelManager()->getNodeLang());
		}
		return $this->nodeLang;
	}//end of getNodeLang
	
	/**
	* @return Model
	*/
	public function getModel(){
		return $this->getNodeLang();
	}//end of getModel

	
}


?>