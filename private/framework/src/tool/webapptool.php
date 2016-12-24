<?
class WebAppTool {

    /**
     * @var array
     */
    private $getPostArray = array();

    /**
     * @container
     * */
    private $container;

    /**
     * @string
     * */
    private $remoteAddress;


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
     * @param array $getPostArray
     * @return void
     */
    public function setGetPostArray($getPostArray) {
        $this->getPostArray = $getPostArray;
    }

    //end of setGetPostArray

    /**
     * @return array
     */
    public function getGetPostArray() {
        return $this->getPostArray;
    }

    //end of getGetPostArray

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function addToGetPostArray($key, $value) {
        $this->getPostArray[$key] = $value;
    }

    //end of getGetPostArray

    /**
     * @param string $key
     * @return mixed
     */
    public function getValueFromGetPostArray($key) {
        return $this->getPostArray[$key];
    }

    //end of getGetPostArray

    /**
     * @param string $key
     * @return boolean
     */
    public function isKeyInGetPostArray($key) {
        return array_key_exists($key, $this->getPostArray);
    }

    //end of getGetPostArray

    /**
     * @param string $key
     * @return boolean
     */
    public function isValueInGetPostArray($key) {
        return in_array($key, $this->getPostArray);
    }

    //end of getGetPostArray

    /**
     * @return string
     */
    public function getRemoteAddress() {
        if (is_null($this->remoteAddress)) {
            $this->remoteAddress = getenv('REMOTE_ADDR');
        }
        return $this->remoteAddress;
    }

    //end of getRemoteAddress

    /**
     * @param $variable
     * @return string
     */
    public function getSecureVariable($variable) {
        $variable = strip_tags($variable);
        $variable = htmlspecialchars($variable);
        $variable = @eregi_replace("'", "", $variable);
        $variable = @eregi_replace("%27", "", $variable);
        $variable = @eregi_replace("%3C", "", $variable);
        $variable = @eregi_replace("%3E", "", $variable);
        $variable = @eregi_replace("%5B", "[", $variable);
        $variable = @eregi_replace("%5D", "]", $variable);
        return $variable;
    }
    //end of getSecureVariable


}


