<?php
/**
 * class DbPgSql
 */
class DbPgSql implements DB {
    /**
     * @var string
     */
    private $hostname;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $connected;

    /**
     * @var resource
     */
    private $resourceArray;

    /**
     * @var resource
     */
    private $connectionResource;

    /**
     * @var array
     */
    private $connectionArray;

    /*** Attributes: ***/

    /**
     * @param array $connectionArray
     * @return void
     */
    public function setConnectionArray($connectionArray) {
        $this->connectionArray = $connectionArray;
        $this->setHostname($this->connectionArray["db_hostname"]);
        $this->setPort($this->connectionArray["db_port"]);
        $this->setDbName($this->connectionArray["db_database"]);
        $this->setUsername($this->connectionArray["db_username"]);
        $this->setPassword($this->connectionArray["db_password"]);
    }

    //end of setConnectionArray

    /**
     * @return array
     */
    public function getConnectionArray() {
        return $this->connectionArray;
    }

    //end of getConnectionArray

    /**
     * @param string $hostname
     * @return void
     */
    public function setHostname($hostname) {
        $this->hostname = $hostname;
    }

    //end of setHostname

    /**
     * @return string
     */
    public function getHostname() {
        return $this->hostname;
    }

    //end of getHostname

    /**
     * @param int $port
     * @return void
     */
    public function setPort($port) {
        $this->port = $port;
    }

    //end of setPort

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    //end of getPort


    /**
     * @param string $dbName
     * @return void
     */
    public function setDbName($dbName) {
        $this->dbName = $dbName;
    }

    //end of setDbName

    /**
     * @return string
     */
    public function getDbName() {
        return $this->dbName;
    }

    //end of getDbName

    /**
     * @param string $username
     * @return void
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    //end of setUsername

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    //end of getUsername

    /**
     * @param string $password
     * @return void
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    //end of setPassword

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    //end of getPassword

    /**
     * @param boolean $connected
     * @return void
     */
    public function setConnected($connected) {
        $this->connected = $connected;
    }

    //end of setConnected

    /**
     * @param resource $resourceArray
     * @return void
     */
    public function setResourceArray($resourceArray) {
        $this->resourceArray = $resourceArray;
    }

    //end of setResourceArray

    /**
     * @return resource
     */
    public function getResourceArray() {
        return $this->resourceArray;
    }

    //end of getResourceArray

    /**
     * @param resource $connectionResource
     * @return void
     */
    public function setConnectionResource($connectionResource) {
        $this->connectionResource = $connectionResource;
    }

    //end of setConnectionResource

    /**
     * @return resource
     */
    public function getConnectionResource() {
        return $this->connectionResource;
    }

    //end of getConnectionResource

    /**
     * @return boolean
     * @access public
     */
    public function connect() {
        $connection = pg_connect("host=" . $this->getHostname() . " port=" . $this->getPort() . " dbname=" . $this->getDbName() . " user=" . $this->getUsername() . " password=" . $this->getPassword() . "");
        if ($connection == false) {
            return false;
        } else {
            $this->setConnectionResource($connection);
            $this->setConnected(true);
            return true;
        }
    } // end of member function connect

    /**
     * returns true if connected
     * @return boolean
     */
    public function isConnected() {
        return $this->connected;
    }

    /**
     * @param string $sql
     * @return resource
     * @access public
     */
    public function dbQuery($sql) {
        $query = pg_query($sql);
        if (!$query) {
            return false;
        } else {
            $this->setResourceArray($query);
            return $query;
        }
    } // end of member function dbQuery

    /**
     * @param resource $result
     * @return int
     * @access public
     */
    public function getNumRows($result) {
        return pg_num_rows($result);

    } // end of member function getNumRows

    public function getNumFields($result) {
        return pg_num_fields($result);
    }

    public function getFieldType($result, $fieldNumber) {
        return pg_field_type($result, $fieldNumber);
    }

    /**
     *
     * @param resource $result
     * @return array
     * @access public
     */
    public function fetchAll($result) {
        $resultArray = pg_fetch_all($result);
        if ($resultArray) {
            return $resultArray;
        } else {
            return false;
        }
    } // end of member function fetchAll

    /**
     *
     * @param resource $result
     * @param int $row
     * @param string $field
     * @return array|bool|object|string
     * @access public
     */
    public function fetchResult($result, $row, $field) {
        $resultArray = pg_fetch_result($result, $row, $field);
        if (!$resultArray) {
            return false;
        }
        return $resultArray;
    } // end of member function fetchResult

    /**
     *
     * @param string $tableName
     * @param array $resourceArray
     * @example resourceArray("key(columnName)"=>"value(value)")
     * @param string $condition
     * @return void
     * @access public
     */
    public function buildUpdateQuery($tableName, $resourceArray, $condition) {
        $sqlHead = "UPDATE " . $tableName . " SET ";
        $sqlBody = "";
        $arraySize = sizeof($resourceArray);
        $counter = 0;
        foreach ($resourceArray as $key => $value) {
            if ($counter != $arraySize) {
                $sqlBody .= $key . "='" . $value . "',";
            } else {
                $sqlBody .= $key . "='" . $value . "'";
            }
            $counter++;
        }
        $sql = $sqlHead . $sqlBody . $condition;
        $this->dbQuery($sql);
    } // end of member function buildUpdateQuery

    /**
     *
     * @param Model model
     * @param string $condition
     * @return resource
     * @access public
     */
    public function buildFilledUpdateQuery(Model $model, $condition = null) {
        $sqlHead = "UPDATE \"" . $model->getTableName() . "\" SET ";
        $sqlBody = "";
        $methods = $model->getMutators();
        unset($methods[$model->getPrimaryKey()]);
        $arraySize = sizeof($methods);
        $counter = 0;
        foreach ($methods as $key => $value) {
            if ($counter != $arraySize - 1) {
                $methodName = "get" . $value;
                $sqlBody .= $key . "='" . $model->$methodName() . "',";
            } else {
                $methodName = "get" . $value;
                $sqlBody .= $key . "='" . $model->$methodName() . "'";
            }
            $counter++;
        }
        if (is_null($condition)) {
            $sql = $sqlHead . $sqlBody . " where id='" . $model->getId() . "'";
        } else {
            $sql = $sqlHead . $sqlBody . " where " . $condition;
        }
        return $this->dbQuery($sql);
    } // end of member function buildFilledUpdateQuery

    /**
     *
     * @param string $tableName
     * @param array $resourceArray
     * @return void
     * @access public
     */
    public function buildInsertQuery($tableName, $resourceArray) {
        $sqlHead = "INSERT INTO " . $tableName . " (";
        $insertKey = "";
        $insertValue = "(";
        $arraySize = sizeof($resourceArray);
        $counter = 0;
        foreach ($resourceArray as $key => $value) {
            if ($counter != $arraySize) {
                $insertKey .= $key . ",";
                $insertValue .= "'" . $value . "',";
            } else {
                $insertKey .= $key . ") VALUES";
                $insertValue .= "'" . $value . "')";
            }
            $counter++;
        }
        $sql = $sqlHead . $insertKey . $insertValue;
        $this->dbQuery($sql);
    } // end of member function buildInsertQuery

    /**
     *
     * @param Model model
     * @return Resource resource
     * @access public
     */
    public function buildFilledInsertQuery(Model $model) {
        $sql = "INSERT INTO \"" . $model->getTableName() . "\" (";
        $mutators = $model->getMutators();
        unset($mutators[$model->getPrimaryKey()]);
        $sizeOfMutators = sizeof($mutators);
        $counter = 0;
        $insertKeys = "";
        $sqlValues = "";
        foreach ($mutators as $key => $value) {
            $methodName = "get" . $value;
            $insertKeys .= "," . $key;
            if ($counter != $sizeOfMutators - 1) {
                $sql .= $key . ",";
                $sqlValues .= "'" . $model->$methodName() . "',";
            } else {
                $sql .= $key . ") VALUES (";
                $sqlValues .= "'" . $model->$methodName() . "')";
            }
            $counter++;
        }
        $sql = $sql . $sqlValues . " returning " . $model->getPrimaryKey() . "" . (strlen($insertKeys) == 0 ? "" : $insertKeys);
        return $this->dbQuery($sql);
    } // end of member function buildFilledInsertQuery

    /**
     *
     * @param string $tableName
     * @param string $field
     * @param string $value
     * @return void
     * @access public
     */
    public function removeQuery($tableName, $field, $value) {
        $sql = "DELETE FROM \"" . $tableName . "\" WHERE " . $field . "='" . $value . "'";
        $this->dbQuery($sql);
    } // end of member function removeQuery

    /**
     *
     * @param string $tableName
     * @param string $field
     * @return int
     * @access public
     */
    public function maxColumnId($tableName, $field) {
        $sql = "SELECT COUNT(" . $field . ")+1 AS count FROM " . $tableName;
        $result = $this->dbQuery($sql);
        return $this->fetchResult($result, 0, 'count');
    }
    // end of member function maxColumnId

} // end of DbPgSql
