<?php

/**
 * class Service
 */
interface Service {

    /**
     *
     * @param Container container
     * @return
     * @access public
     */
    public function setContainer(Container $container);

    /**
     *
     * @return Container
     * @access public
     */
    public function getContainer();

    /**
     *
     * @param int $start
     * @return
     * @access public
     */
    public function setLimitStart($start);

    /**
     *
     * @return int
     * @access public
     */
    public function getLimitStart();

    /**
     *
     * @param int $offset
     * @return
     * @access public
     */
    public function setLimitOffset($offset);

    /**
     *
     * @return int
     * @access public
     */
    public function getLimitOffset();

    /**
     *
     * @param Model model
     * @return
     * @access public
     */
    public function setModel(Model $model);

    /**
     *
     * @return Model
     * @access public
     */
    public function getModel();

    /**
     *
     * @param string $condition
     * @return
     * @access public
     */
    public function setCondition($condition);

    /**
     *
     * @return string
     * @access public
     */
    public function getCondition();

    /**
     *
     * @param string $orderSelection
     * @return
     * @access public
     */
    public function setOrderSelection($orderSelection);

    /**
     *
     * @return string
     * @access public
     */
    public function getOrderSelection();

    /**
     *
     * @param array $languageArray
     * @return
     * @access public
     */
    public function setLanguageArray(array $languageArray);

    /**
     *
     * @return array
     * @access public
     */
    public function getLanguageArray();

    /**
     *
     * @param string $key
     * @return string
     * @access public
     */
    public function getLanguageValue($key);

    /**
     *
     * @param string $value
     * @return string
     * @access public
     */
    public function getLanguageKey($value);

    /**
     *
     * @param string $key
     * @return bool
     * @access public
     */
    public function languageArrayContainsKey($key);

    /**
     *
     * @param string $value
     * @return bool
     * @access public
     */
    public function languageArrayContainsValue($value);

    /**
     *
     * @param string $key
     * @param string $value
     * @return
     * @access public
     */
    public function addToLanguageArray($key, $value);

    /**
     *
     * @return string
     * @access public
     */
    public function getQueryType();

    /**
     *
     * @param string $queryType
     * @return
     * @access public
     */
    public function setQueryType($queryType);

    /**
     *
     * @return
     * @access public
     */
    public function setQueryTypeSimple();

    /**
     *
     * @return
     * @access public
     */
    public function setQueryTypeRelational();

    /**
     *
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findAll($queryType = null);

    /**
     *
     * @param int $id
     * @param string $queryType
     * @return Model
     * @access public
     */
    public function findById($id, $queryType = null);

    /**
     *
     * @param string $key
     * @param string $value
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findByKeyValue($key, $value, $queryType = null);

    /**
     *
     * @param array $keyValueArray
     * @param string $queryType
     * @return ModelArray
     * @access public
     */
    public function findByKeyValueArray(array $keyValueArray, $queryType = null);

    /**
     *
     * @param Model model
     * @return Model
     * @access public
     */
    public function insert(Model $model = null);

    /**
     *
     * @param Model model
     * @return Model
     * @access public
     */
    public function update(Model $model = null);

    /**
     *
     * @param Model model
     * @return Model
     * @access public
     */
    public function delete(Model $model = null);

    /**
     *
     * @return int
     * @access public
     */
    public function findCountAll();

    /**
     *
     * @param string $key
     * @param string $value
     * @return int
     * @access public
     */
    public function findCountByKeyValue($key, $value);

    /**
     *
     * @param array $keyValueArray
     * @return int
     * @access public
     */
    public function findCountByKeyValueArray(array $keyValueArray);

    public function findLikeKeyValue($key, $value);

    public function findLikeKeyValueArray($keyValueArray);

    public function findCountLikeKeyValue($key, $value);

    public function findCountLikeKeyValueArray($keyValueArray);


} // end of Service

