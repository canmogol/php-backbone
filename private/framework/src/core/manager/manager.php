<?

/*
* interface Manager
*/
interface  Manager{
	
	/**
	* @param Container container
	* @return void
	*/
	public function setContainer(Container $container);
	
	/**
	* @return Container
	*/
	public function getContainer();
	
	
}
