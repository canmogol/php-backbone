<?
/**
 * @package tool
 */
class LoggerServerImpl implements Logger {

    /**
     * @var resource
     */
    private $resource;

    /**
     * logs the $message
     *
     * @param string $message
     * @param array $params
     * @return void
     */
    public function log($message, $params = array()) {
        $host = "127.0.0.1";
        $port = 4321;
        $timeout = 30;

        if (is_null($this->resource)) {
            $this->resource = @fsockopen($host, $port, $errorNumber, $errorString, $timeout);
            if ($this->resource === false && $errorNumber == 0) {
                // problem initializing the socket
                echo "<pre>";
                print_r($errorString);
                echo "</pre>";
            }
        }

        $parameters = "";
        if (!is_null($params)) {
            foreach ($params as $key => $value) {
                $parameters .= $key . ": " . $value . ", ";
            }
        }

        $message .= $message . "||" . $parameters;
        if (!is_null($this->resource)) {
            @fputs($this->resource, $this->traverse($message) . "\n");
        }

        // DO NOT CLOSE THE SOCKET, IT GETS REALLY SLOOOOOOOOOOOOWW
        // @fclose($this->resource) ;
    }

    /**
     * @param mixed $message
     * @param int $level
     * @return String
     */
    private function traverse($message, $level = 0) {
        $returnString = "";
        if (is_array($message)) {
            foreach ($message as $key => $value) {
                if (is_array($value)) {
                    $returnString .= $key . ":" . $this->traverse($value, $level + 1) . "\n";
                } else {
                    $returnString .= str_repeat("\t", $level) . "key: " . $key . "  value:" . $value . "\n";
                }
            }
        } else {
            $returnString = $message;
        }
        return $returnString;
    }
}

