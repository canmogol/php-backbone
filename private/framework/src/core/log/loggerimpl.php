<?

class LoggerImpl implements Logger {

    /**
     * @var string logFileName
     */
    public $logFileName;

    /**
     * @var Container $container
     */
    private $container;

    /**
     * logs the $message
     *
     * @param string $message
     * @param array $params
     * @return void
     */
    public function log($message, $params = array()) {
        $handle = fopen($this->getLogFileName(), 'a');
        $parameters = "";
        if (!is_null($params)) {
            foreach ($params as $key => $value) {
                $parameters .= $key . ": " . $value . ", ";
            }
        }
        $trace = debug_backtrace();
        $traceCount = count($trace);
        if ($traceCount == 1) {
            // direct call from file
            $className = $trace[0]["file"] . ":";
            $methodName = "";
            $lineNumber = $trace[0]["line"];
        } else if ($traceCount > 1) {
            // call from a class
            $className = $trace[1]["class"] . ":";
            $methodName = $trace[1]["function"] . "():";
            $lineNumber = $trace[0]["line"];
        } else {
            $className = "";
            $methodName = "";
            $lineNumber = "";
        }

        if (!is_null($handle)) {
            fwrite($handle, "[" . @date("H:i:s") . "] [" . getmypid() . "] [" . $className . $methodName . $lineNumber . "] " . $message . (count($params) > 0 ? "  params(" . $parameters . ")\n" : "\n"));
            fclose($handle);
        }
    }

    /**
     * @param Container $container
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    /**
     * @return \Container
     */
    public function getContainer() {
        return $this->container;
    }

    private function getLogFileName() {
        if (is_null($this->logFileName)) {
            $this->logFileName = substr($_SERVER["SCRIPT_FILENAME"], 0, strrpos($_SERVER["SCRIPT_FILENAME"], "/")) . "/private/project/log/" . @date("Y-m-d") . ".txt";
        }
        return $this->logFileName;
    }


}
