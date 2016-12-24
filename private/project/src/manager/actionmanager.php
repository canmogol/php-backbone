<?

class ActionManager extends BaseActionManager {


	/*
	Actions
	*/
	
	/**
	 * @var GroupActionMethodAction
	 */
	private $groupActionMethodAction;
	
	/**
	 * @var GroupStackAction
	 */
	private $groupStackAction;
	
	/**
	 * @var StackActionMethodAction
	 */
	private $stackActionMethodAction;
	
	/**
	 * @var UserGroupAction
	 */
	private $userGroupAction;
	
	/**
	 * @var NodePropertyAction
	 */
	private $nodePropertyAction;
	
	/**
	 * @var PropertyLangAction
	 */
	private $propertyLangAction;
	
	/**
	 * @var NodeAttributeLangAction
	 */
	private $nodeAttributeLangAction;
	
	/**
	 * @var NodeAttributeAction
	 */
	private $nodeAttributeAction;
	
	/**
	 * @var NodeLangAction
	 */
	private $nodeLangAction;
	
	/**
	 * @var AttributeLangAction
	 */
	private $attributeLangAction;
	
	/**
	 * @var StackAction
	 */
	private $stackAction;
	
	/**
	 * @var ActionMethodAction
	 */
	private $actionMethodAction;
	
	/**
	 * @var SpecialUrlRegexpKeyAction
	 */
	private $specialUrlRegexpKeyAction;
	
	/**
	 * @var SpecialUrlAction
	 */
	private $specialUrlAction;
	
	/**
	 * @var GroupAction
	 */
	private $groupAction;
	
	/**
	 * @var UserKeyValueAction
	 */
	private $userKeyValueAction;
	
	/**
	 * @var PropertyAction
	 */
	private $propertyAction;
	
	/**
	 * @var NodeAction
	 */
	private $nodeAction;
	
	/**
	 * @var LangAction
	 */
	private $langAction;
	
	/**
	 * @var UserAction
	 */
	private $userAction;
	
	/**
	 * @var PropertyTypeAction
	 */
	private $propertyTypeAction;
	
	/**
	 * @var AttributeAction
	 */
	private $attributeAction;
	
	/**
	 * @var NodeTypeAction
	 */
	private $nodeTypeAction;
	
	/**
	 * @var AttributeTypeAction
	 */
	private $attributeTypeAction;

	/**
	 * @var DevelAction
	 */
	private $develAction;


	/*
	setters getters
	*/

	/**
	* @param GroupActionMethodAction groupActionMethodAction
	* @return void
	*/
	public function setGroupActionMethodAction(GroupActionMethodAction $groupActionMethodAction){
		$this->groupActionMethodAction=$groupActionMethodAction;
	}//end of setGroupActionMethodAction

	/**
	* @return GroupActionMethodAction
	*/
	public function getGroupActionMethodAction(){
		return $this->groupActionMethodAction;
	}//end of getGroupActionMethodAction

	/**
	* @param GroupStackAction groupStackAction
	* @return void
	*/
	public function setGroupStackAction(GroupStackAction $groupStackAction){
		$this->groupStackAction=$groupStackAction;
	}//end of setGroupStackAction

	/**
	* @return GroupStackAction
	*/
	public function getGroupStackAction(){
		return $this->groupStackAction;
	}//end of getGroupStackAction

	/**
	* @param StackActionMethodAction stackActionMethodAction
	* @return void
	*/
	public function setStackActionMethodAction(StackActionMethodAction $stackActionMethodAction){
		$this->stackActionMethodAction=$stackActionMethodAction;
	}//end of setStackActionMethodAction

	/**
	* @return StackActionMethodAction
	*/
	public function getStackActionMethodAction(){
		return $this->stackActionMethodAction;
	}//end of getStackActionMethodAction

	/**
	* @param UserGroupAction userGroupAction
	* @return void
	*/
	public function setUserGroupAction(UserGroupAction $userGroupAction){
		$this->userGroupAction=$userGroupAction;
	}//end of setUserGroupAction

	/**
	* @return UserGroupAction
	*/
	public function getUserGroupAction(){
		return $this->userGroupAction;
	}//end of getUserGroupAction

	/**
	* @param NodePropertyAction nodePropertyAction
	* @return void
	*/
	public function setNodePropertyAction(NodePropertyAction $nodePropertyAction){
		$this->nodePropertyAction=$nodePropertyAction;
	}//end of setNodePropertyAction

	/**
	* @return NodePropertyAction
	*/
	public function getNodePropertyAction(){
		return $this->nodePropertyAction;
	}//end of getNodePropertyAction

	/**
	* @param PropertyLangAction propertyLangAction
	* @return void
	*/
	public function setPropertyLangAction(PropertyLangAction $propertyLangAction){
		$this->propertyLangAction=$propertyLangAction;
	}//end of setPropertyLangAction

	/**
	* @return PropertyLangAction
	*/
	public function getPropertyLangAction(){
		return $this->propertyLangAction;
	}//end of getPropertyLangAction

	/**
	* @param NodeAttributeLangAction nodeAttributeLangAction
	* @return void
	*/
	public function setNodeAttributeLangAction(NodeAttributeLangAction $nodeAttributeLangAction){
		$this->nodeAttributeLangAction=$nodeAttributeLangAction;
	}//end of setNodeAttributeLangAction

	/**
	* @return NodeAttributeLangAction
	*/
	public function getNodeAttributeLangAction(){
		return $this->nodeAttributeLangAction;
	}//end of getNodeAttributeLangAction

	/**
	* @param NodeAttributeAction nodeAttributeAction
	* @return void
	*/
	public function setNodeAttributeAction(NodeAttributeAction $nodeAttributeAction){
		$this->nodeAttributeAction=$nodeAttributeAction;
	}//end of setNodeAttributeAction

	/**
	* @return NodeAttributeAction
	*/
	public function getNodeAttributeAction(){
		return $this->nodeAttributeAction;
	}//end of getNodeAttributeAction

	/**
	* @param NodeLangAction nodeLangAction
	* @return void
	*/
	public function setNodeLangAction(NodeLangAction $nodeLangAction){
		$this->nodeLangAction=$nodeLangAction;
	}//end of setNodeLangAction

	/**
	* @return NodeLangAction
	*/
	public function getNodeLangAction(){
		return $this->nodeLangAction;
	}//end of getNodeLangAction

	/**
	* @param AttributeLangAction attributeLangAction
	* @return void
	*/
	public function setAttributeLangAction(AttributeLangAction $attributeLangAction){
		$this->attributeLangAction=$attributeLangAction;
	}//end of setAttributeLangAction

	/**
	* @return AttributeLangAction
	*/
	public function getAttributeLangAction(){
		return $this->attributeLangAction;
	}//end of getAttributeLangAction

	/**
	* @param StackAction stackAction
	* @return void
	*/
	public function setStackAction(StackAction $stackAction){
		$this->stackAction=$stackAction;
	}//end of setStackAction

	/**
	* @return StackAction
	*/
	public function getStackAction(){
		return $this->stackAction;
	}//end of getStackAction

	/**
	* @param ActionMethodAction actionMethodAction
	* @return void
	*/
	public function setActionMethodAction(ActionMethodAction $actionMethodAction){
		$this->actionMethodAction=$actionMethodAction;
	}//end of setActionMethodAction

	/**
	* @return ActionMethodAction
	*/
	public function getActionMethodAction(){
		return $this->actionMethodAction;
	}//end of getActionMethodAction

	/**
	* @param SpecialUrlRegexpKeyAction specialUrlRegexpKeyAction
	* @return void
	*/
	public function setSpecialUrlRegexpKeyAction(SpecialUrlRegexpKeyAction $specialUrlRegexpKeyAction){
		$this->specialUrlRegexpKeyAction=$specialUrlRegexpKeyAction;
	}//end of setSpecialUrlRegexpKeyAction

	/**
	* @return SpecialUrlRegexpKeyAction
	*/
	public function getSpecialUrlRegexpKeyAction(){
		return $this->specialUrlRegexpKeyAction;
	}//end of getSpecialUrlRegexpKeyAction

	/**
	* @param SpecialUrlAction specialUrlAction
	* @return void
	*/
	public function setSpecialUrlAction(SpecialUrlAction $specialUrlAction){
		$this->specialUrlAction=$specialUrlAction;
	}//end of setSpecialUrlAction

	/**
	* @return SpecialUrlAction
	*/
	public function getSpecialUrlAction(){
		return $this->specialUrlAction;
	}//end of getSpecialUrlAction

	/**
	* @param GroupAction groupAction
	* @return void
	*/
	public function setGroupAction(GroupAction $groupAction){
		$this->groupAction=$groupAction;
	}//end of setGroupAction

	/**
	* @return GroupAction
	*/
	public function getGroupAction(){
		return $this->groupAction;
	}//end of getGroupAction

	/**
	* @param UserKeyValueAction userKeyValueAction
	* @return void
	*/
	public function setUserKeyValueAction(UserKeyValueAction $userKeyValueAction){
		$this->userKeyValueAction=$userKeyValueAction;
	}//end of setUserKeyValueAction

	/**
	* @return UserKeyValueAction
	*/
	public function getUserKeyValueAction(){
		return $this->userKeyValueAction;
	}//end of getUserKeyValueAction

	/**
	* @param PropertyAction propertyAction
	* @return void
	*/
	public function setPropertyAction(PropertyAction $propertyAction){
		$this->propertyAction=$propertyAction;
	}//end of setPropertyAction

	/**
	* @return PropertyAction
	*/
	public function getPropertyAction(){
		return $this->propertyAction;
	}//end of getPropertyAction

	/**
	* @param NodeAction nodeAction
	* @return void
	*/
	public function setNodeAction(NodeAction $nodeAction){
		$this->nodeAction=$nodeAction;
	}//end of setNodeAction

	/**
	* @return NodeAction
	*/
	public function getNodeAction(){
		return $this->nodeAction;
	}//end of getNodeAction

	/**
	* @param LangAction langAction
	* @return void
	*/
	public function setLangAction(LangAction $langAction){
		$this->langAction=$langAction;
	}//end of setLangAction

	/**
	* @return LangAction
	*/
	public function getLangAction(){
		return $this->langAction;
	}//end of getLangAction

	/**
	* @param UserAction userAction
	* @return void
	*/
	public function setUserAction(UserAction $userAction){
		$this->userAction=$userAction;
	}//end of setUserAction

	/**
	* @return UserAction
	*/
	public function getUserAction(){
		return $this->userAction;
	}//end of getUserAction

	/**
	* @param PropertyTypeAction propertyTypeAction
	* @return void
	*/
	public function setPropertyTypeAction(PropertyTypeAction $propertyTypeAction){
		$this->propertyTypeAction=$propertyTypeAction;
	}//end of setPropertyTypeAction

	/**
	* @return PropertyTypeAction
	*/
	public function getPropertyTypeAction(){
		return $this->propertyTypeAction;
	}//end of getPropertyTypeAction

	/**
	* @param AttributeAction attributeAction
	* @return void
	*/
	public function setAttributeAction(AttributeAction $attributeAction){
		$this->attributeAction=$attributeAction;
	}//end of setAttributeAction

	/**
	* @return AttributeAction
	*/
	public function getAttributeAction(){
		return $this->attributeAction;
	}//end of getAttributeAction

	/**
	* @param NodeTypeAction nodeTypeAction
	* @return void
	*/
	public function setNodeTypeAction(NodeTypeAction $nodeTypeAction){
		$this->nodeTypeAction=$nodeTypeAction;
	}//end of setNodeTypeAction

	/**
	* @return NodeTypeAction
	*/
	public function getNodeTypeAction(){
		return $this->nodeTypeAction;
	}//end of getNodeTypeAction

	/**
	* @param AttributeTypeAction attributeTypeAction
	* @return void
	*/
	public function setAttributeTypeAction(AttributeTypeAction $attributeTypeAction){
		$this->attributeTypeAction=$attributeTypeAction;
	}//end of setAttributeTypeAction

	/**
	* @return AttributeTypeAction
	*/
	public function getAttributeTypeAction(){
		return $this->attributeTypeAction;
	}//end of getAttributeTypeAction

    /**
     * @param \DevelAction $develAction
     */
    public function setDevelAction($develAction) {
        $this->develAction = $develAction;
    }

    /**
     * @return \DevelAction
     */
    public function getDevelAction() {
        return $this->develAction;
    }//end of getNodeTypeAction


}

