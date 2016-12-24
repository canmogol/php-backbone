<?
/**
 * @package exception
 */
class ExtendedExceptionImpl extends Exception implements ExtendedException {

    /**
     * @var Container
     */
    private $container;

    /**
     * Last Exception object
     *
     * @var Exception
     */
    private $exception;

    /**
     * Array contains Exception objects
     *
     * @var array
     */
    private $exceptionsArray = array();


    /**
     * Throws exception from Exception Object $exception
     *
     * @param Exception $exception
     * @return void
     */
    public function throwException(Exception $exception) {
        $this->setException($exception);
        $this->log($exception);
        exit();
    }

    /**
     * Throws exception from Exception Object $exception
     *
     * @return void
     */
    public function throwLastException() {
        $this->log($this->exception);
    }


    /**
     * @param Exception exception
     * @throws Exception
     * @return void
     */
    public function setException(Exception $exception) {
        try {
            if (!is_null($exception) && $exception instanceof Exception) {
                $this->exception = $exception;
                array_push($this->getExceptionsArray(), $exception);
            } else {
                throw new Exception("Exception object: " . $exception . " is Null or Not an object or Not an instance of Exception Class");
            }
        } catch (Exception $e) {
            $this->log($e);
        }
    }

    //end of setException

    /**
     * @throws Exception
     * @return \Exception
     */
    public function getException() {
        try {
            if (is_null($this->exception) || !is_object($this->exception)) {
                throw new Exception("Exception object: " . $this->exception . " is Null or Not an object or Not an instance of Exception Class");
            }
        } catch (Exception $e) {
            $this->log($e);
        }
        return $this->exception;
    }

    //end of getException

    /**
     * @param array $exceptionsArray
     * @return void
     */
    public function setExceptionsArray(array $exceptionsArray) {
        $this->exceptionsArray = $exceptionsArray;
    }

    //end of setExceptionsArray

    /**
     * @return array
     */
    public function getExceptionsArray() {
        return $this->exceptionsArray;
    }

    //end of getExceptionsArray

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
     * @param Exception $exception
     * @return void
     */
    private function log($exception) {
        $this->getContainer()->getLogger()->log("\r\n");
        $this->getContainer()->getLogger()->log($exception->getMessage());
        $this->getContainer()->getLogger()->log($exception->getTraceAsString());
        $this->getContainer()->getLogger()->log("\r\n");
    }

}
