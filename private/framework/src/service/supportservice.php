<?php

/**
 * class SupportService
 */
abstract class SupportService implements Service {

    /**
     * @var Container
     */
    private $container;

    /**
     * @var int limitStart
     */
    private $limitStart;

    /**
     * @var int limitOffset
     */
    private $limitOffset;

    /**
     * @var Model
     */
    private $model;

    /**
     * @var string
     */
    private $condition;

    /**
     * @var string
     */
    private $orderSelection;

    /**
     * @var string
     */
    private $orderType;

    /**
     * @var array
     */
    private $languageArray;

    /**
     * @var string
     */
    private $queryType = "R";

    /**
     * @var integer
     * */
    private $listExecuted;

    /**
     * @var array
     */
    private $queryTypes = array("S", "R");

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
     * @param int $limitStart
     * @return void
     */
    public function setLimitStart($limitStart) {
        $this->limitStart = $limitStart;
    }

//end of setLimitStart

    /**
     * @return int
     */
    public function getLimitStart() {
        return $this->limitStart;
    }

//end of getLimitStart

    /**
     * @param int $limitOffset
     * @return void
     */
    public function setLimitOffset($limitOffset) {
        $this->limitOffset = $limitOffset;
    }

//end of setLimitOffset

    /**
     * @return int
     */
    public function getLimitOffset() {
        return $this->limitOffset;
    }

//end of getLimitOffset

    /**
     * @param Model model
     * @return void
     */
    public function setModel(Model $model) {
        $this->model = $model;
    }

    /**
     * @param string $condition
     * @return void
     */
    public function setCondition($condition) {
        $this->condition = $condition;
    }

//end of setCondition

    /**
     * @return string
     */
    public function getCondition() {
        return $this->condition;
    }

//end of getCondition

    /**
     * @param string $orderSelection
     * @return void
     */
    public function setOrderSelection($orderSelection) {
        $this->orderSelection = $orderSelection;
    }

//end of setOrderSelection

    /**
     * @return string
     */
    public function getOrderSelection() {
        return $this->orderSelection;
    }

//end of getOrderSelection

    /**
     * @param string $orderType
     * @return void
     */
    public function setOrderType($orderType) {
        $this->orderType = $orderType;
    }

//end of setOrderType

    /**
     * @return string
     */
    public function getOrderType() {
        return $this->orderType;
    }

//end of getOrderType

    /**
     * @return int
     */
    public function getListExecuted() {
        return $this->listExecuted;
    }

    /**
     * @param $listExecuted
     */
    public function setListExecuted($listExecuted) {
        $this->listExecuted = $listExecuted;
    }

    /**
     * @param array $languageArray
     * @return void
     */
    public function setLanguageArray(array $languageArray) {
        $this->languageArray = $languageArray;
    }

//end of setLanguageArray

    /**
     * @return array
     */
    public function getLanguageArray() {
        return $this->languageArray;
    }

//end of getLanguageArray

    /**
     * @param string $key
     * @return string
     * @todo impl code
     */
    public function getLanguageValue($key) {
        return $this->getLanguageValue($key);
    }

    /**
     * @param string $value
     * @return string
     */
    public function getLanguageKey($value) {
        return $this->getLanguageKey($value);
    }

// end of member function getLanguageKey

    /**
     *
     * @param string $key
     * @return bool|void
     * @access public
     */
    public function languageArrayContainsKey($key) {
        
    }

// end of member function languageArrayContainsKey

    /**
     *
     * @param string $value
     * @return bool|void
     * @access public
     */
    public function languageArrayContainsValue($value) {
        
    }

// end of member function languageArrayContainsValue

    /**
     *
     * @param string $key
     * @param string $value
     * @access public
     */
    public function addToLanguageArray($key, $value) {
        
    }

// end of member function addToLanguageArray

    /**
     * @param string $queryType
     * @return void
     */
    public function setQueryType($queryType) {
        if (in_array($queryType, $this->getQueryTypes())) {
            $this->queryType = $queryType;
        }
    }

//end of setQueryType

    /**
     * @return string
     */
    public function getQueryType() {
        return $this->queryType;
    }

//end of getQueryType

    /**
     * @param array $queryTypes
     * @return void
     */
    public function setQueryTypes($queryTypes) {
        $this->queryTypes = $queryTypes;
    }

//end of setQueryTypes

    /**
     * @return array
     */
    public function getQueryTypes() {
        return $this->queryTypes;
    }

//end of getQueryTypes

    /**
     *
     * @access public
     */
    public function setQueryTypeSimple() {
        $this->setQueryType("S");
    }

// end of member function setQueryTypeSimple

    /**
     *
     * @access public
     */
    public function setQueryTypeRelational() {
        $this->setQueryType("R");
    }

// end of member function setQueryTypeRelational

    /**
     *
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findAll($queryType = null ) {
        if (!in_array($queryType, $this->getQueryTypes())) {
            $queryType = $this->getQueryType();
        }
        $mArray = array();
        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();

        $sql = "SELECT ";
        foreach ($this->getModel()->getDbProperties() as $fieldName) {
            $sql .= " " . $fieldName . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql.= " FROM \"" . $tableName."\"";
        //SIMPLESEARCH conditions
        $webArray = $this->getContainer()->getWebAppTool()->getGetPostArray();
        $designArray = array();
        foreach ($webArray as $key => $value) {
            if (in_array($key, $this->getModel()->getDbProperties()) && is_array($value)) {
                if (!is_null($value["value"]) && $value["value"] != "") {
                    $designArray[$key] = array($value["type"], $value["value"]);
                }
            }
        }
        if (count($designArray) > 0) {
            $designedModels = $this->designSearchQuery($designArray);
            return $designedModels;
        }
        //conditions End

        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }
        if (!is_null($this->getOrderSelection()) && $this->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getOrderSelection() . " " . $this->getOrderType();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }
        if (is_numeric($this->getLimitStart())) {
            $sql .= " LIMIT " . $this->getLimitStart();
        }
        if (is_numeric(($this->getLimitOffset())) && is_numeric($this->getLimitStart())) {
            $sql .= " OFFSET " . $this->getLimitOffset();
        }
        //echo "<br />";
        //echo "-***-",$sql;

        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);

        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName(stripslashes($mdlArray[$key]));
                }
                if ($queryType == "R") {
                    foreach ($this->getModel()->getRelationsArray() as $keyRelation => $valueArray) {
                        $relationClass = $valueArray["relationClass"];
                        $relationMethodName = "set" . $valueArray["relationClass"];
                        $relationModel = new $relationClass();
                        $this->getModel()->$relationMethodName($relationModel);
                    }
                }
                $mArray[] = clone $this->getModel();
            }
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);
        /*
          $this->getContainer()->getCacheManager()->addToCache($sql,$tableName,$modelArray);
         */

        return $modelArray;
    }

// end of member function findAll

    /**
     *
     * @param null $selectCondition
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findAllBySelectCondition($selectCondition = null, $queryType = null) {
        if (!in_array($queryType, $this->getQueryTypes())) {
            $queryType = $this->getQueryType();
        }
        $mArray = array();
        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();

        $sql = "SELECT " . $selectCondition;
        /* foreach ($this->getModel()->getDbProperties() as $fieldName) {
          $sql .= " ".$fieldName.",";
          }
          $sql = substr($sql,0,-1); */
        $sql.= " FROM \"" . $tableName."\"";
        //SIMPLESEARCH conditions
        $webArray = $this->getContainer()->getWebAppTool()->getGetPostArray();
        $designArray = array();
        foreach ($webArray as $key => $value) {
            if (in_array($key, $this->getModel()->getDbProperties()) && is_array($value)) {
                if (!is_null($value["value"]) && $value["value"] != "") {
                    $designArray[$key] = array($value["type"], $value["value"]);
                }
            }
        }
        if (count($designArray) > 0) {
            $designedModels = $this->designSearchQuery($designArray);
            return $designedModels;
        }
        //conditions End

        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }
        if (!is_null($this->getOrderSelection()) && $this->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getOrderSelection() . " " . $this->getOrderType();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }
        if (is_numeric($this->getLimitStart())) {
            $sql .= " LIMIT " . $this->getLimitStart();
        }
        if (is_numeric(($this->getLimitOffset())) && is_numeric($this->getLimitStart())) {
            $sql .= " OFFSET " . $this->getLimitOffset();
        }
        //echo $sql;
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);

        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName(stripslashes($mdlArray[$key]));
                }
                if ($queryType == "R") {
                    foreach ($this->getModel()->getRelationsArray() as $key => $valueArray) {
                        $relationClass = $valueArray["relationClass"];
                        $relationMethodName = "set" . $valueArray["relationClass"];
                        $relationFieldMethodName = "get" . $mutators[$key];
                        $relationSQL = "select * from " . $valueArray["relationTable"] . " where " . $valueArray["relationField"] . " = '" . $this->getModel()->$relationFieldMethodName() . "'";
                        $relationResultResource = $this->getContainer()->getDb()->dbQuery($relationSQL);
                        $relationModelArray = $this->getContainer()->getDB()->fetchAll($relationResultResource);
                        $relationModel = new $relationClass();
                        foreach ($relationModel->getMutators() as $keyMutators => $value) {
                            $methodName = "set" . $value;
                            $relationModel->$methodName(stripslashes($relationModelArray[0][$keyMutators]));
                        }

                        $this->getModel()->$relationMethodName($relationModel);
                    }
                }
                $mArray[] = clone $this->getModel();
            }
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);
        /*
          $this->getContainer()->getCacheManager()->addToCache($sql,$tableName,$modelArray);
         */

        return $modelArray;
    }

// end of member function findAll

    /**
     * @example
     * /**
     *   columnProps=>
     *   [type] => int
     *   [default_value] => nextval('admin_id_seq'::regclass)
     *   [max] =>
     *   [validator] => isInteger
     *   [notnull] => 1
     *   [queryView] => admin_id)
     *
     * adminid=>
     * [relationTable] => admin
      [relationField] => id
      [relationClass] => Admin
      [viewField] => name
     *

     */
    public function findAllSingleQuery() {
        $model = $this->getModel();
        $sqlSelectPart = "Select ";
        $sqlFromPart = " FROM \"" . $model->getTableName() . "\",";
        $sqlConditionPart = " WHERE ";
        foreach ($model->getColumnProperties() as $k => $v) {
            $sqlSelectPart.=" \"" . $model->getTableName() . "\"." . $k . " as " . $v["queryView"] . ",";
        }

        $subModelArray = array();
        $conditionCounter = 0;
        foreach ($this->getModel()->getRelationsArray() as $key => $value) {
            $sqlFromPart.=$value["relationTable"];

            /**
             * step1
             * get models of each relationArray element
             */
            //echo "<pre>";print_r($value);echo "</pre>";
            $modelGetMethodName = "get" . $value["relationClass"];
            $subModel = $this->getContainer()->getModelManager()->$modelGetMethodName();
            $subModelArray[] = $this->getContainer()->getModelManager()->$modelGetMethodName();
            /**
             * for now ignoring subModels relations
             */
            foreach ($subModel->getColumnProperties() as $subKey => $subValue) {
                $sqlSelectPart.=" " . $value["relationTable"] . "." . $subKey . " as " . $subValue["queryView"] . ",";
            }
            $sqlConditionPart.="\"".$model->getTableName() . "\"." . $key . "=" . $value["relationTable"] . "." . $value["relationField"] . " ";
            $conditionCounter++;
            if ($conditionCounter < count($model->getRelationsArray())) {
                $sqlConditionPart.=" AND ";
                $sqlFromPart.=",";
            }
        }
        //for last comma in selectPart
        $sqlSelectPart = substr($sqlSelectPart, 0, -1);
        $sql = $sqlSelectPart . $sqlFromPart . $sqlConditionPart;
        $rawModels = $this->getContainer()->getDb()->fetchAll($this->getContainer()->getDb()->dbQuery($sql));
        $rawModels = $rawModels[0];
        //echo "<pre>";print_r($rawModels);echo "</pre>";
        foreach ($rawModels as $key => $value) {
            //echo "<pre>";print_r($key);echo "</pre>";
            foreach ($subModelArray as $mod => $models) {
                $columnProperties = $models->getColumnProperties();
                foreach ($columnProperties as $k => $v) {
                    if ($v["queryView"] == $key) {
                        //            echo $v[queryView]."===>>".$key."----".$k."<br/>";
                        $mutators = $models->getMutators();
                        $mutMethodName = "set" . $mutators[$k];
                        $models->$mutMethodName($value);
                        $subModelGetter = "set" . get_class($models);
                        $this->getModel()->$subModelGetter($models);
                    } else {
                        $mainModelMutators = $this->getModel()->getMutators();
                        $mainModelColProps = $this->getModel()->getColumnProperties();
                        foreach ($mainModelColProps as $ke => $va) {
                            if ($key == $va["queryView"]) {
                                $modelSetter = "set" . $mainModelMutators[$ke];
                                //echo "<pre>";print_r($value);echo "</pre>";
                                $this->getModel()->$modelSetter($value);
                            }
                        }
                    }
                }
            }

        }
        return $this->getModel();
    }

    /**
     * @return int
     * @access public
     */
    public function findCountAll() {
        $tableName = $this->getModel()->getTableName();
        $sql = "SELECT count(*) as count from \"" . $tableName."\"";
        $res = $this->getContainer()->getDB()->dbQuery($sql);
        return $this->getContainer()->getDB()->fetchResult($res, 0, "count");
    }

// end of member function findAll

    /**
     * @return int
     * @access public
     */
    public function findCountByCondition() {
        $tableName = $this->getModel()->getTableName();
        $sql = "";
        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }
        $sql = "SELECT count(*) as count from \"" . $tableName."\"" . $sql;
        //echo $sql;
        $res = $this->getContainer()->getDB()->dbQuery($sql);
        return $this->getContainer()->getDB()->fetchResult($res, 0, "count");
    }

    /**
     * @param $avgColumn
     * @return int
     * @access public
     */
    public function findAverageByCondition($avgColumn) {
        $tableName = $this->getModel()->getTableName();
        $sql = "";
        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }
        $sql = "SELECT AVG(" . $avgColumn . ") as average FROM \"" . $tableName ."\"". $sql;
        //echo $sql;
        $res = $this->getContainer()->getDB()->dbQuery($sql);
        return $this->getContainer()->getDB()->fetchResult($res, 0, "average");
    }

    /**
     * @param $sumColumn
     * @return int
     * @access public
     */
    public function findSumByCondition($sumColumn) {
        $tableName = $this->getModel()->getTableName();
        $sql = "";
        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }
        $sql = "SELECT SUM(" . $sumColumn . ") as total FROM \"" . $tableName ."\"". $sql;
        //echo $sql;
        $res = $this->getContainer()->getDB()->dbQuery($sql);
        return $this->getContainer()->getDB()->fetchResult($res, 0, "total");
    }

// end of member function findAll

    /**
     *
     * @param int $id
     * @param string $queryType
     * @return Model
     * @access public
     */
    public function findByIdSql($id, $queryType = null) {

        if (!in_array($queryType, $this->getQueryTypes())) {
            $queryType = $this->getQueryType();
        }

        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();



        $findIdSql = "SELECT * FROM \"" . $tableName . "\" WHERE id='" . $id . "'";
        //echo $findIdSql;
        $res = $this->getContainer()->getDB()->dbQuery($findIdSql);
        $arr = $this->getContainer()->getDB()->fetchAll($res);
        foreach ($mutators as $key => $value) {
            $methodName = "set" . $value;
            $this->getModel()->$methodName($arr[0][$key]);
        }

        if ($queryType == "R") {
            foreach ($this->getModel()->getRelationsArray() as $valueArray) {
                $relationClass = $valueArray["relationClass"];
                $relationMethodName = "set" . $valueArray["relationClass"];
                $relationModel = new $relationClass();
                $this->getModel()->$relationMethodName($relationModel);
            }
        }
        return $this->getModel();
    }

// end of member function findById
    /**
     *
     * @param int $id
     * @param string $queryType
     * @return Model
     * @access public
     */
    public function findById($id, $queryType = null) {
        $modelObject = $this->findByIdSql($id, $queryType);
        return $modelObject;
    }

// end of member function findById

    /**
     *
     * @param string $distinct
     * @return ModelArray
     * @access public
     */
    public function findDistinctByCondition($distinct) {

        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();


        $sql = "SELECT DISTINCT ON (" . $distinct . ") * FROM \"" . $tableName . "\" ";
        //echo $sql;
        if ($this->getCondition() != "") {
            $sql .= " WHERE " . $this->getCondition();
        }

        if (!is_null($this->getOrderSelection()) && $this->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getOrderSelection() . " " . $this->getOrderType();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }

        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);

        $mArray = array();
        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName($mdlArray[$key]);
                }
                $mArray[] = clone $this->getModel();
            }
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);
        return $modelArray;
    }

// end of member function findDistinctByCondition

    /**
     *
     * @param string $sql
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findByCustomSql($sql, $queryType = null) {
        $mutators = $this->getModel()->getMutators();
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);
        $mArray = array();
        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName($mdlArray[$key]);
                }
                if ($queryType == "R") {
                    foreach ($this->getModel()->getRelationsArray() as $key => $valueArray) {
                        $relationClass = $valueArray["relationClass"];
                        $relationMethodName = "set" . $valueArray["relationClass"];
                        $relationModel = new $relationClass();
                        $this->getModel()->$relationMethodName($relationModel);
                    }
                }
                $mArray[] = clone $this->getModel();
            }
        }
        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);

        return $modelArray;
    }

    /**
     *
     * @param string $key
     * @param string $value
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findByKeyValue($key, $value, $queryType = null) {
        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();
        $sql = "SELECT * FROM \"" . $tableName . "\" WHERE " . $key . "='" . $value . "' ";

        if (!is_null($this->getModel()->getOrderSelection()) && $this->getModel()->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getOrderSelection();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }
        //echo $sql;
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);
        $mArray = array();
        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName($mdlArray[$key]);
                }
                if ($queryType == "R") {
                    foreach ($this->getModel()->getRelationsArray() as $key => $valueArray) {
                        $relationClass = $valueArray["relationClass"];
                        $relationMethodName = "set" . $valueArray["relationClass"];
                        $relationModel = new $relationClass();
                        $this->getModel()->$relationMethodName($relationModel);
                    }
                }
                $mArray[] = clone $this->getModel();
            }
        }
        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);
        /*
          $this->getContainer()->getCacheManager()->addToCache($sql,$tableName,$modelArray);
         */
        return $modelArray;
    }

// end of member function findByKeyValue

    /**
     *
     * @param array $keyValueArray
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findByKeyValueArray(array $keyValueArray, $queryType = null) {

        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();
        $sql = "SELECT * FROM \"" . $tableName."\"";
        $countKVArray = count($keyValueArray);
        if ($countKVArray > 0) {
            $sql .= " WHERE ";
        }
        $i = 0;
        foreach ($keyValueArray as $key => $value) {
            if ($i == $countKVArray - 1) {
                $sql .= $key . "='" . $value . "'";
            } else {
                $sql .= $key . "='" . $value . "' and ";
            }
            $i++;
        }

        if (!is_null($this->getModel()->getOrderSelection()) && $this->getModel()->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getOrderSelection();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }

        //echo $sql;
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDb()->fetchAll($result);
        $mArray = array();
        if ($dbModelArray) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;
                    $this->getModel()->$methodName($mdlArray[$key]);
                }
                if ($queryType == "R") {
                    foreach ($this->getModel()->getRelationsArray() as $valueArray) {
                        $relationClass = $valueArray["relationClass"];
                        $relationMethodName = "set" . $valueArray["relationClass"];
                        $relationFieldMethodName = "get" . $mutators["id"];
                        $relationSQL = "select * from " . $valueArray["relationTable"] . " where " . $valueArray["relationField"] . " = '" . $this->getModel()->$relationFieldMethodName() . "'";
                        $relationResultResource = $this->getContainer()->getDb()->dbQuery($relationSQL);
                        $relationModelArray = $this->getContainer()->getDB()->fetchAll($relationResultResource);
                        $relationModel = new $relationClass();
                        foreach ($relationModel->getMutators() as $key => $value) {
                            $methodName = "set" . $value;
                            $relationModel->$methodName($relationModelArray[0][$key]);
                        }
                        $this->getModel()->$relationMethodName($relationModel);
                    }
                }
                $mArray[] = clone $this->getModel();
            }
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);

        return $modelArray;
    }

// end of member function findByKeyValueArray

    /**
     *
     * @param Model $model
     * @return Model
     * @access public
     */
    public function insert(Model $model = null) {
        if (!is_null($model) && is_object($model) && ($model instanceof Model)) {
            $returningArray = $this->getContainer()->getDb()->fetchAll($this->getContainer()->getDB()->buildFilledInsertQuery($model));
            if (is_array($returningArray[0])) {
                $mutators = $model->getMutators();
                foreach ($returningArray[0] as $dbField => $value) {
                    $methodName = "set" . $mutators[$dbField];
                    $model->$methodName($value);
                }
                return $model;
            } else {
                return false;
            }
        } else {
            $returningSql = $this->getContainer()->getDB()->buildFilledInsertQuery($this->getModel());
            if ($returningSql == "wrongparameter") {
                return false;
            } else {
                $returningArray = $this->getContainer()->getDb()->fetchAll($returningSql);
                if (is_array($returningArray[0])) {
                    $mutators = $this->getModel()->getMutators();
                    foreach ($returningArray[0] as $dbField => $value) {
                        $methodName = "set" . $mutators[$dbField];
                        if ($methodName != "set") {
                            $this->getModel()->$methodName($value);
                        }
                    }
                    return $this->getModel();
                } else {
                    return false;
                }
            }
        }
    }

// end of member function insert

    /**
     *
     * @param Model model
     * @return Model
     * @access public
     */
    public function update(Model $model = null) {
        // TODO add returning to the update if possible, return the updated model
        if (!is_null($model) && is_object($model)) {
            $returningArray = $this->getContainer()->getDb()->fetchAll($this->getContainer()->getDB()->buildFilledUpdateQuery($model));
            if (is_array($returningArray[0])) {
                $mutators = $model->getMutators();

                foreach ($returningArray[0] as $dbField => $value) {
                    if ($mutators[$dbField] != '') {
                        $methodName = "set" . $mutators[$dbField];
                        $model->$methodName($value);
                    }
                }
                return $model;
            } else {
                return false;
            }
        } else {
            $returningSql = $this->getContainer()->getDB()->buildFilledUpdateQuery($this->getModel());
            if ($returningSql == "wrongparameter") {
                return false;
            } else {
                $returningArray = $this->getContainer()->getDb()->fetchAll($returningSql);
                if (is_array($returningArray[0])) {
                    $mutators = $this->getModel()->getMutators();
                    foreach ($returningArray[0] as $dbField => $value) {
                        if ($mutators[$dbField] != '') {
                            $methodName = "set" . $mutators[$dbField];
                            $this->getModel()->$methodName($value);
                        }
                    }
                    return $this->getModel();
                } else {
                    return false;
                }
            }
        }
    }

// end of member function update

    /**
     *
     * @param Model model
     * @throws Exception
     * @return Model
     * @access public
     */
    public function delete(Model $model = null) {
        // TODO add returning to the query and return the deleted model if possible
        if (is_null($model) || !is_object($model)) {
            $model = $this->getModel();
            $this->getContainer()->getDb()->removeQuery($model->getTableName(), "id", $model->getId());
        } else if ($model->getId() != null) {
            $this->getContainer()->getDb()->removeQuery($model->getTableName(), "id", $model->getId());
        }else{
            throw new Exception("model does not have id, could not delete");
        }
        return $model;
    }

    /**
     *
     * @param Array $conditionArray
     * @return bool
     * @access public
     */
    public function deleteByConditionArray($conditionArray) {
        $count = count($conditionArray);
        if ($count > 0) {
            $sql = "DELETE FROM \"" . $this->getModel()->getTableName() . "\" WHERE ";
            $i = 0;
            foreach ($conditionArray as $key => $value) {
                $sql.=$key . "= '" . $value . "'";
                if ($i < $count - 1) {
                    $sql.=" AND ";
                }
                $i++;
            }
            if ($this->getContainer()->getDb()->dbQuery($sql)) {
                return true;
            }
        }
    }

    /**
     *
     * @return bool
     * @access public
     */
    public function deleteByCondition() {
        if ($this->getCondition() != "") {
            $tableName = $this->getModel()->getTableName();
            $sql = " WHERE " . $this->getCondition();
            $sql = "DELETE FROM \"" . $tableName ."\"". $sql;
            $this->getContainer()->getDB()->dbQuery($sql);
            return true;
        }
    }

    /**
     * @param array $idArray
     * @return Model
     * @access public
     * @author erdinc
     * @since 17-02-09
     */
    public function massRemove(array $idArray) {
        foreach ($idArray as $id) {
            $this->getContainer()->getDb()->removeQuery($this->getModel()->getTableName(), "id", $id);
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return int|object
     */
    public function findCountByKeyValue($key, $value) {

        $tableName = $this->getModel()->getTableName();
        $sql = "SELECT count(*) FROM \"" . $tableName . "\" WHERE " . $key . "='" . $value . "'";
        /*
          if($this->getContainer()->getCacheManager()->checkQuery($sql)){
          return $this->getContainer()->getCacheManager()->getModelArray($sql);
          }
         */
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $count = $this->getContainer()->getDB()->fetchResult($result, 0, "count");
        if (is_null($count) || $count == "")
            $count = 0;
        /*
          $this->getContainer()->getCacheManager()->addToCache($sql,$tableName,$modelArray);
         */
        return $count;
    }

    /**
     * @example array must be same as designSearchQuery's array
     * @param array $keyValueArray
     * @return int
     * @access public
     */
    public function findCountByKeyValueArray(array $keyValueArray) {
        $tableName = $this->getModel()->getTableName();
        $check = false;
        $sql = "SELECT count(id) FROM \"" . $tableName."\"";
        if (count($keyValueArray) > 0) {
            foreach ($keyValueArray as $key => $value) {
                if ($value["value"] != "") {
                    $check = true;
                }
            }
            if ($check) {
                $sql.=" WHERE ";
            }
            $sqlBody = "";
            foreach ($keyValueArray as $key => $value) {

                if (is_array($value) && $value["value"] != "") {
                    if ($value["type"] == "between") {
                        $sqlBody.=$key . " BETWEEN " . $value[1] . " AND " . $value[2] . " AND ";
                    }
                    if ($value["type"] == "like") {
                        $sqlBody.="lower(" . $key . ") LIKE '%" . mb_strtolower($value["value"], "UTF-8") . "%'" . " AND ";
                    }
                    if ($value["type"] == "equal") {
                        $sqlBody.=$key . "='" . $value["value"] . "'" . " AND ";
                    }
                } elseif (!is_array($value)) {
                    $sqlBody.=" " . $key . "='" . $value . "' AND";
                }
            }
            if ($this->getCondition() != "") {

                if (!$check)
                    $sqlBody.= " WHERE ";

                $sqlBody.= $this->getCondition();
            }

            $sql.=$sqlBody;
        }
        /**
         * remove last AND
         */
        $pos = strrpos($sql, "AND");
        if (is_numeric($pos) && $pos > 0) {
            $sql = substr($sql, 0, $pos);
        }

        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $count = $this->getContainer()->getDb()->fetchResult($result, 0, "count");
        return $count;
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function findLikeKeyValue($key, $value) {

        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();

        $sql = "SELECT * FROM \"" . $tableName . "\" WHERE " . $key . " LIKE '%" . $value . "%'";

        $mArray = array();
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDB()->fetchAll($result);
        foreach ($dbModelArray as $mdlArray) {
            foreach ($mutators as $key => $value) {
                $methodName = "set" . $value;
                $this->getModel()->$methodName($mdlArray[$key]);
            }
            $mArray[] = clone $this->getModel();
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);

        return $modelArray;
    }

    /**
     * @param $keyValueArray
     * @return mixed
     */
    public function findLikeKeyValueArray($keyValueArray) {

        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();

        $sql = "SELECT * FROM \"" . $tableName."\"";
        $countKVArray = count($keyValueArray);
        if ($countKVArray > 0) {
            $sql .= " WHERE ";
        }
        $i = 0;
        foreach ($keyValueArray as $key => $value) {
            if ($i == $countKVArray - 1) {
                $sql .= $key . " LIKE '%" . $value . "%'";
            } else {
                $sql .= $key . " LIKE '%" . $value . "%' and ";
            }
            $i++;
        }

        $mArray = array();
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDb()->fetchAll($result);
        foreach ($dbModelArray as $mdlArray) {
            foreach ($mutators as $key => $value) {
                $methodName = "set" . $value;
                $this->getModel()->$methodName($mdlArray[$key]);
            }
            $mArray[] = clone $this->getModel();
        }

        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        $modelArray->setModelArray($mArray);
        /*
          $this->getContainer()->getCacheManager()->addToCache($sql,$tableName,$modelArray);
         */
        return $modelArray;
    }

    /**
     * @param $key
     * @param $value
     * @return object
     */
    public function findCountLikeKeyValue($key, $value) {
        $tableName = $this->getModel()->getTableName();
        $sql = "SELECT count(*) FROM \"" . $tableName . "\" WHERE " . $key . " LIKE '%" . $value . "%'";
        /*
          if($this->getContainer()->getCacheManager()->checkQuery($sql)){
          return $this->getContainer()->getCacheManager()->getModelArray($sql);
          }
         */
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $count = $this->getContainer()->getDB()->fetchResult($result, 0, "count");
        return $count;
    }

    /**
     * @param $keyValueArray
     * @return object
     */
    public function findCountLikeKeyValueArray($keyValueArray) {

        $tableName = $this->getModel()->getTableName();
        $sql = "SELECT count(*) FROM \"" . $tableName."\"";
        $countKVArray = count($keyValueArray);
        if ($countKVArray > 0) {
            $sql .= " WHERE ";
        }
        $i = 0;
        foreach ($keyValueArray as $key => $value) {
            if ($i == $countKVArray - 1) {
                $sql .= $key . "LIKE '%" . $value . "%'";
            } else {
                $sql .= $key . "LIKE '%" . $value . "%' and ";
            }
            $i++;
        }

        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $count = $this->getContainer()->getDb()->fetchResult($result, 0, "count");
        return $count;
    }

    /**
     * @param $keyValueArray
     * @return mixed
     */
    public function designSearchQuery($keyValueArray) {
        $tableName = $this->getModel()->getTableName();
        $mutators = $this->getModel()->getMutators();
        $sql = "SELECT * FROM \"" . $tableName . "\" WHERE  ";
        $check = true;
        foreach ($keyValueArray as $key => $value) {
            if (!is_null($value[1]) && $value[1] != "") {
                if ($value[0] == "between") {
                    $sql.=$key . " BETWEEN " . $value[1] . " AND " . $value[2] . " AND ";
                }
                if ($value[0] == "like") {
                    $sql.="lower(" . $key . ") LIKE '%" . mb_strtolower($value[1], "UTF-8") . "%'" . " AND ";
                }
                if ($value[0] == "datelike") {
                    $sql.="";
                }
                if ($value[0] == "equal") {
                    $sql.=$key . "='" . $value[1] . "'" . " AND ";
                }
            }
        }
        if ($this->getCondition() != "") {
            $sql.= $this->getCondition();
        }

        /**
         * remove last AND
         */
        if ($check) {
            $pos = strrpos($sql, "AND ");
            $sql = substr($sql, 0, $pos);
        }

        if (!is_null($this->getOrderSelection()) && $this->getOrderSelection() != "") {
            $sql .= " ORDER BY " . $this->getOrderSelection() . " " . $this->getOrderType();
        } else if (!is_null($this->getModel()->getPrimaryKey()) && $this->getModel()->getPrimaryKey() != "") {
            $sql .= " ORDER BY " . $this->getModel()->getPrimaryKey();
        }
        if (is_numeric($this->getLimitStart())) {
            $sql .= " LIMIT " . $this->getLimitStart();
        }
        if (is_numeric(($this->getLimitOffset())) && is_numeric($this->getLimitStart())) {
            $sql .= " OFFSET " . $this->getLimitOffset();
        }

        $mArray = array();
        $result = $this->getContainer()->getDB()->dbQuery($sql);
        $dbModelArray = $this->getContainer()->getDb()->fetchAll($result);
        $modelArray = $this->getContainer()->getModelManager()->getNewModelArray();
        if (is_array($dbModelArray)) {
            foreach ($dbModelArray as $mdlArray) {
                foreach ($mutators as $key => $value) {
                    $methodName = "set" . $value;

                    $this->getModel()->$methodName($mdlArray[$key]);
                }
                $mArray[] = clone $this->getModel();
            }

            $modelArray->setModelArray($mArray);
        }

        return $modelArray;
    }

}

?>
