<?
/**
 * @package manager
 */
abstract class BaseServiceManager implements Manager {


    /**
     * @var Container
     */
    private $container;

    /*
     Services
     */




    /**
     * @var array
     */
    private $initiallyLoadServicesArray = array();


    /**
     * @param Container container
     * @return void
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    //end of setContainer

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    //end of getContainer

    /**
     * @return void
     */
    public function loadInitialsArray() {
        foreach ($this->initiallyLoadServicesArray as $value) {
            $this->$value = $this->getContainer()->getBean($value);
            $this->$value->setContainer($this->getContainer());
        }
    }


    /*
     setters getters
     */


}

