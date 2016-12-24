<?

class ViewManager {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var array
     */
    private $viewArrays = array();

    /*
     Views
     */


    /**
     * @var array
     */
    private $initiallyLoadViewsArray = array();


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
        foreach ($this->initiallyLoadViewsArray as $value) {
            $this->$value = $this->getContainer()->getBean($value);
            $this->$value->setContainer($this->getContainer());
        }
    }


    /**
     * pushes the viewArray to viewArrays viewArray[0] contains information about xsl, viewArray[1] contains xml
     *
     * @param array $viewArray
     */
    public function addView(array $viewArray) {
        $this->viewArrays[$viewArray[0]] = $viewArray[1];
    }

    /**
     * @param array $viewArrays
     * @return void
     */
    public function setViewArrays($viewArrays) {
        $this->viewArrays = $viewArrays;
    }

    //end of setViewArrays

    /**
     * @return array
     */
    public function getViewArrays() {
        return $this->viewArrays;
    }
    //end of getViewArrays


}

