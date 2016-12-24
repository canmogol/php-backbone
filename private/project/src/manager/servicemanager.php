<?

class ServiceManager extends BaseServiceManager {


	/*
	Services
	*/
	
	/**
	 * @var GroupActionMethodService
	 */
	private $groupActionMethodService;
	
	/**
	 * @var GroupStackService
	 */
	private $groupStackService;
	
	/**
	 * @var StackActionMethodService
	 */
	private $stackActionMethodService;
	
	/**
	 * @var UserGroupService
	 */
	private $userGroupService;
	
	/**
	 * @var NodePropertyService
	 */
	private $nodePropertyService;
	
	/**
	 * @var PropertyLangService
	 */
	private $propertyLangService;
	
	/**
	 * @var NodeAttributeLangService
	 */
	private $nodeAttributeLangService;
	
	/**
	 * @var NodeAttributeService
	 */
	private $nodeAttributeService;
	
	/**
	 * @var NodeLangService
	 */
	private $nodeLangService;
	
	/**
	 * @var AttributeLangService
	 */
	private $attributeLangService;
	
	/**
	 * @var StackService
	 */
	private $stackService;
	
	/**
	 * @var ActionMethodService
	 */
	private $actionMethodService;
	
	/**
	 * @var SpecialUrlRegexpKeyService
	 */
	private $specialUrlRegexpKeyService;
	
	/**
	 * @var SpecialUrlService
	 */
	private $specialUrlService;
	
	/**
	 * @var GroupService
	 */
	private $groupService;
	
	/**
	 * @var UserKeyValueService
	 */
	private $userKeyValueService;
	
	/**
	 * @var PropertyService
	 */
	private $propertyService;
	
	/**
	 * @var NodeService
	 */
	private $nodeService;
	
	/**
	 * @var LangService
	 */
	private $langService;
	
	/**
	 * @var UserService
	 */
	private $userService;
	
	/**
	 * @var PropertyTypeService
	 */
	private $propertyTypeService;
	
	/**
	 * @var AttributeService
	 */
	private $attributeService;
	
	/**
	 * @var NodeTypeService
	 */
	private $nodeTypeService;
	
	/**
	 * @var AttributeTypeService
	 */
	private $attributeTypeService;

	/**
	 * @var DevelService
	 */
	private $develService;

    /**
     * @param \ActionMethodService $actionMethodService
     */
    public function setActionMethodService($actionMethodService) {
        $this->actionMethodService = $actionMethodService;
    }

    /**
     * @return \ActionMethodService
     */
    public function getActionMethodService() {
        return $this->actionMethodService;
    }

    /**
     * @param \AttributeService $attributeService
     */
    public function setAttributeService($attributeService) {
        $this->attributeService = $attributeService;
    }

    /**
     * @return \AttributeService
     */
    public function getAttributeService() {
        return $this->attributeService;
    }

    /**
     * @param \AttributeTypeService $attributeTypeService
     */
    public function setAttributeTypeService($attributeTypeService) {
        $this->attributeTypeService = $attributeTypeService;
    }

    /**
     * @return \AttributeTypeService
     */
    public function getAttributeTypeService() {
        return $this->attributeTypeService;
    }

    /**
     * @param \DevelService $develService
     */
    public function setDevelService($develService) {
        $this->develService = $develService;
    }

    /**
     * @return \DevelService
     */
    public function getDevelService() {
        return $this->develService;
    }

    /**
     * @param \GroupService $groupService
     */
    public function setGroupService($groupService) {
        $this->groupService = $groupService;
    }

    /**
     * @return \GroupService
     */
    public function getGroupService() {
        return $this->groupService;
    }

    /**
     * @param \LangService $langService
     */
    public function setLangService($langService) {
        $this->langService = $langService;
    }

    /**
     * @return \LangService
     */
    public function getLangService() {
        return $this->langService;
    }

    /**
     * @param \NodeService $nodeService
     */
    public function setNodeService($nodeService) {
        $this->nodeService = $nodeService;
    }

    /**
     * @return \NodeService
     */
    public function getNodeService() {
        return $this->nodeService;
    }

    /**
     * @param \NodeTypeService $nodeTypeService
     */
    public function setNodeTypeService($nodeTypeService) {
        $this->nodeTypeService = $nodeTypeService;
    }

    /**
     * @return \NodeTypeService
     */
    public function getNodeTypeService() {
        return $this->nodeTypeService;
    }

    /**
     * @param \PropertyService $propertyService
     */
    public function setPropertyService($propertyService) {
        $this->propertyService = $propertyService;
    }

    /**
     * @return \PropertyService
     */
    public function getPropertyService() {
        return $this->propertyService;
    }

    /**
     * @param \PropertyTypeService $propertyTypeService
     */
    public function setPropertyTypeService($propertyTypeService) {
        $this->propertyTypeService = $propertyTypeService;
    }

    /**
     * @return \PropertyTypeService
     */
    public function getPropertyTypeService() {
        return $this->propertyTypeService;
    }

    /**
     * @param \SpecialUrlRegexpKeyService $specialUrlRegexpKeyService
     */
    public function setSpecialUrlRegexpKeyService($specialUrlRegexpKeyService) {
        $this->specialUrlRegexpKeyService = $specialUrlRegexpKeyService;
    }

    /**
     * @return \SpecialUrlRegexpKeyService
     */
    public function getSpecialUrlRegexpKeyService() {
        return $this->specialUrlRegexpKeyService;
    }

    /**
     * @param \SpecialUrlService $specialUrlService
     */
    public function setSpecialUrlService($specialUrlService) {
        $this->specialUrlService = $specialUrlService;
    }

    /**
     * @return \SpecialUrlService
     */
    public function getSpecialUrlService() {
        return $this->specialUrlService;
    }

    /**
     * @param \StackService $stackService
     */
    public function setStackService($stackService) {
        $this->stackService = $stackService;
    }

    /**
     * @return \StackService
     */
    public function getStackService() {
        return $this->stackService;
    }

    /**
     * @param \UserKeyValueService $userKeyValueService
     */
    public function setUserKeyValueService($userKeyValueService) {
        $this->userKeyValueService = $userKeyValueService;
    }

    /**
     * @return \UserKeyValueService
     */
    public function getUserKeyValueService() {
        return $this->userKeyValueService;
    }

    /**
     * @param \UserService $userService
     */
    public function setUserService($userService) {
        $this->userService = $userService;
    }

    /**
     * @return \UserService
     */
    public function getUserService() {
        return $this->userService;
    }

    /**
     * @param \AttributeLangService $attributeLangService
     */
    public function setAttributeLangService($attributeLangService) {
        $this->attributeLangService = $attributeLangService;
    }

    /**
     * @return \AttributeLangService
     */
    public function getAttributeLangService() {
        return $this->attributeLangService;
    }

    /**
     * @param \GroupActionMethodService $groupActionMethodService
     */
    public function setGroupActionMethodService($groupActionMethodService) {
        $this->groupActionMethodService = $groupActionMethodService;
    }

    /**
     * @return \GroupActionMethodService
     */
    public function getGroupActionMethodService() {
        return $this->groupActionMethodService;
    }

    /**
     * @param \GroupStackService $groupStackService
     */
    public function setGroupStackService($groupStackService) {
        $this->groupStackService = $groupStackService;
    }

    /**
     * @return \GroupStackService
     */
    public function getGroupStackService() {
        return $this->groupStackService;
    }

    /**
     * @param \NodeAttributeLangService $nodeAttributeLangService
     */
    public function setNodeAttributeLangService($nodeAttributeLangService) {
        $this->nodeAttributeLangService = $nodeAttributeLangService;
    }

    /**
     * @return \NodeAttributeLangService
     */
    public function getNodeAttributeLangService() {
        return $this->nodeAttributeLangService;
    }

    /**
     * @param \NodeAttributeService $nodeAttributeService
     */
    public function setNodeAttributeService($nodeAttributeService) {
        $this->nodeAttributeService = $nodeAttributeService;
    }

    /**
     * @return \NodeAttributeService
     */
    public function getNodeAttributeService() {
        return $this->nodeAttributeService;
    }

    /**
     * @param \NodeLangService $nodeLangService
     */
    public function setNodeLangService($nodeLangService) {
        $this->nodeLangService = $nodeLangService;
    }

    /**
     * @return \NodeLangService
     */
    public function getNodeLangService() {
        return $this->nodeLangService;
    }

    /**
     * @param \NodePropertyService $nodePropertyService
     */
    public function setNodePropertyService($nodePropertyService) {
        $this->nodePropertyService = $nodePropertyService;
    }

    /**
     * @return \NodePropertyService
     */
    public function getNodePropertyService() {
        return $this->nodePropertyService;
    }

    /**
     * @param \PropertyLangService $propertyLangService
     */
    public function setPropertyLangService($propertyLangService) {
        $this->propertyLangService = $propertyLangService;
    }

    /**
     * @return \PropertyLangService
     */
    public function getPropertyLangService() {
        return $this->propertyLangService;
    }

    /**
     * @param \StackActionMethodService $stackActionMethodService
     */
    public function setStackActionMethodService($stackActionMethodService) {
        $this->stackActionMethodService = $stackActionMethodService;
    }

    /**
     * @return \StackActionMethodService
     */
    public function getStackActionMethodService() {
        return $this->stackActionMethodService;
    }

    /**
     * @param \UserGroupService $userGroupService
     */
    public function setUserGroupService($userGroupService) {
        $this->userGroupService = $userGroupService;
    }

    /**
     * @return \UserGroupService
     */
    public function getUserGroupService() {
        return $this->userGroupService;
    }



    /*
    setters getters
    */




}

