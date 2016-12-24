<?
class LocaleTool {

    /**
     * @var array
     */
    public $sortedSiteLocaleArray = null;

    /**
     * @var array
     */
    public $siteLocaleArray = array("en", "tr", "de", "fr");

    /**
     * @var string
     */
    public $activeLocale = "en";

    /**
     * @container
     * */
    private $container;

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
     * @return array
     */
    public function getSiteLocale() {
        if (is_null($this->sortedSiteLocaleArray)) {
            $this->sortedSiteLocaleArray = array();
            foreach ($this->siteLocaleArray as $val) {
                if ($val != $this->getActiveLocale()) {
                    $this->sortedSiteLocaleArray[] = $val;
                }
            }
            $this->sortedSiteLocaleArray[] = $this->getActiveLocale();
        }
        return $this->sortedSiteLocaleArray;
    }

    /**
     * @return string
     */
    public function getActiveLocale() {
        return $this->activeLocale;
    }

}

