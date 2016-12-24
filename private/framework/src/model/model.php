<?

/**
 *
 * Interface Model
 *
 * */
Interface Model {

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param array $formVariables
     * @return void
     */
    public function setFormVariables(array $formVariables);

    /**
     * @return array
     */
    public function getFormVariables();

    /**
     * @param array $dbProperties
     * @return void
     */
    public function setDbProperties(array $dbProperties);

    /**
     * @return array
     */
    public function getDbProperties();

    /**
     * @return array
     */
    public function getMutators();

    /**
     * @param string $tableName
     * @return void
     */
    public function setTableName($tableName);

    /**
     * @return string
     */
    public function getTableName();

    /**
     * @param array $dbProperties
     * @return void
     */
    public function setDbPropertiesUpdate(array $dbProperties);

    /**
     * @return array
     */
    public function getDbPropertiesUpdate();

    /**
     * @return array
     */
    public function getColumnProperties();

    /**
     * @return string
     */
    public function getPrimaryKey();

    /**
     * @return array
     */
    public function getRelationsArray();

    /**
     * @return string
     */
    public function getOrderSelection();

    /**
     * @param bool $force
     * @return array
     */
    public function getArray($force = false);

    /**
     * @param null $nodeName
     * @param bool $force
     * @return string
     */
    public function getXml($nodeName = null, $force = false);

}

