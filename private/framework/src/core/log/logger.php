<?

interface Logger {

    /**
     * logs the $message
     *
     * @param string $message
     * @param array $params
     * @return void
     */
    public function log($message, $params = array());

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
