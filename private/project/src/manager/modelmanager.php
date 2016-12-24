<?

class ModelManager extends BaseModelManager {


	/*
	Models
	*/
	
	/**
	 * @var GroupActionMethod
	 */
	private $groupActionMethod;
	
	/**
	 * @var GroupStack
	 */
	private $groupStack;
	
	/**
	 * @var StackActionMethod
	 */
	private $stackActionMethod;
	
	/**
	 * @var UserGroup
	 */
	private $userGroup;
	
	/**
	 * @var NodeProperty
	 */
	private $nodeProperty;
	
	/**
	 * @var PropertyLang
	 */
	private $propertyLang;
	
	/**
	 * @var NodeAttributeLang
	 */
	private $nodeAttributeLang;
	
	/**
	 * @var NodeAttribute
	 */
	private $nodeAttribute;
	
	/**
	 * @var NodeLang
	 */
	private $nodeLang;
	
	/**
	 * @var AttributeLang
	 */
	private $attributeLang;
	
	/**
	 * @var Stack
	 */
	private $stack;
	
	/**
	 * @var ActionMethod
	 */
	private $actionMethod;
	
	/**
	 * @var SpecialUrlRegexpKey
	 */
	private $specialUrlRegexpKey;
	
	/**
	 * @var SpecialUrl
	 */
	private $specialUrl;
	
	/**
	 * @var Group
	 */
	private $group;
	
	/**
	 * @var UserKeyValue
	 */
	private $userKeyValue;
	
	/**
	 * @var Property
	 */
	private $property;
	
	/**
	 * @var Node
	 */
	private $node;
	
	/**
	 * @var Lang
	 */
	private $lang;
	
	/**
	 * @var User
	 */
	private $user;
	
	/**
	 * @var PropertyType
	 */
	private $propertyType;
	
	/**
	 * @var Attribute
	 */
	private $attribute;
	
	/**
	 * @var NodeType
	 */
	private $nodeType;
	
	/**
	 * @var AttributeType
	 */
	private $attributeType;


	/*
	setters getters
	*/
	
	/**
	* @param GroupActionMethod groupActionMethod
	* @return void
	*/
	public function setGroupActionMethod(GroupActionMethod $groupActionMethod){
		$this->groupActionMethod=$groupActionMethod;
	}//end of setGroupActionMethod
	
	/**
	* @return GroupActionMethod
	*/
	public function getGroupActionMethod(){
		return $this->groupActionMethod;
	}//end of getGroupActionMethod
	
	/**
	* @param GroupStack groupStack
	* @return void
	*/
	public function setGroupStack(GroupStack $groupStack){
		$this->groupStack=$groupStack;
	}//end of setGroupStack
	
	/**
	* @return GroupStack
	*/
	public function getGroupStack(){
		return $this->groupStack;
	}//end of getGroupStack
	
	/**
	* @param StackActionMethod stackActionMethod
	* @return void
	*/
	public function setStackActionMethod(StackActionMethod $stackActionMethod){
		$this->stackActionMethod=$stackActionMethod;
	}//end of setStackActionMethod
	
	/**
	* @return StackActionMethod
	*/
	public function getStackActionMethod(){
		return $this->stackActionMethod;
	}//end of getStackActionMethod
	
	/**
	* @param UserGroup userGroup
	* @return void
	*/
	public function setUserGroup(UserGroup $userGroup){
		$this->userGroup=$userGroup;
	}//end of setUserGroup
	
	/**
	* @return UserGroup
	*/
	public function getUserGroup(){
		return $this->userGroup;
	}//end of getUserGroup
	
	/**
	* @param NodeProperty nodeProperty
	* @return void
	*/
	public function setNodeProperty(NodeProperty $nodeProperty){
		$this->nodeProperty=$nodeProperty;
	}//end of setNodeProperty
	
	/**
	* @return NodeProperty
	*/
	public function getNodeProperty(){
		return $this->nodeProperty;
	}//end of getNodeProperty
	
	/**
	* @param PropertyLang propertyLang
	* @return void
	*/
	public function setPropertyLang(PropertyLang $propertyLang){
		$this->propertyLang=$propertyLang;
	}//end of setPropertyLang
	
	/**
	* @return PropertyLang
	*/
	public function getPropertyLang(){
		return $this->propertyLang;
	}//end of getPropertyLang
	
	/**
	* @param NodeAttributeLang nodeAttributeLang
	* @return void
	*/
	public function setNodeAttributeLang(NodeAttributeLang $nodeAttributeLang){
		$this->nodeAttributeLang=$nodeAttributeLang;
	}//end of setNodeAttributeLang
	
	/**
	* @return NodeAttributeLang
	*/
	public function getNodeAttributeLang(){
		return $this->nodeAttributeLang;
	}//end of getNodeAttributeLang
	
	/**
	* @param NodeAttribute nodeAttribute
	* @return void
	*/
	public function setNodeAttribute(NodeAttribute $nodeAttribute){
		$this->nodeAttribute=$nodeAttribute;
	}//end of setNodeAttribute
	
	/**
	* @return NodeAttribute
	*/
	public function getNodeAttribute(){
		return $this->nodeAttribute;
	}//end of getNodeAttribute
	
	/**
	* @param NodeLang nodeLang
	* @return void
	*/
	public function setNodeLang(NodeLang $nodeLang){
		$this->nodeLang=$nodeLang;
	}//end of setNodeLang
	
	/**
	* @return NodeLang
	*/
	public function getNodeLang(){
		return $this->nodeLang;
	}//end of getNodeLang
	
	/**
	* @param AttributeLang attributeLang
	* @return void
	*/
	public function setAttributeLang(AttributeLang $attributeLang){
		$this->attributeLang=$attributeLang;
	}//end of setAttributeLang
	
	/**
	* @return AttributeLang
	*/
	public function getAttributeLang(){
		return $this->attributeLang;
	}//end of getAttributeLang
	
	/**
	* @param Stack stack
	* @return void
	*/
	public function setStack(Stack $stack){
		$this->stack=$stack;
	}//end of setStack
	
	/**
	* @return Stack
	*/
	public function getStack(){
		return $this->stack;
	}//end of getStack
	
	/**
	* @param ActionMethod actionMethod
	* @return void
	*/
	public function setActionMethod(ActionMethod $actionMethod){
		$this->actionMethod=$actionMethod;
	}//end of setActionMethod
	
	/**
	* @return ActionMethod
	*/
	public function getActionMethod(){
		return $this->actionMethod;
	}//end of getActionMethod
	
	/**
	* @param SpecialUrlRegexpKey specialUrlRegexpKey
	* @return void
	*/
	public function setSpecialUrlRegexpKey(SpecialUrlRegexpKey $specialUrlRegexpKey){
		$this->specialUrlRegexpKey=$specialUrlRegexpKey;
	}//end of setSpecialUrlRegexpKey
	
	/**
	* @return SpecialUrlRegexpKey
	*/
	public function getSpecialUrlRegexpKey(){
		return $this->specialUrlRegexpKey;
	}//end of getSpecialUrlRegexpKey
	
	/**
	* @param SpecialUrl specialUrl
	* @return void
	*/
	public function setSpecialUrl(SpecialUrl $specialUrl){
		$this->specialUrl=$specialUrl;
	}//end of setSpecialUrl
	
	/**
	* @return SpecialUrl
	*/
	public function getSpecialUrl(){
		return $this->specialUrl;
	}//end of getSpecialUrl
	
	/**
	* @param Group group
	* @return void
	*/
	public function setGroup(Group $group){
		$this->group=$group;
	}//end of setGroup
	
	/**
	* @return Group
	*/
	public function getGroup(){
		return $this->group;
	}//end of getGroup
	
	/**
	* @param UserKeyValue userKeyValue
	* @return void
	*/
	public function setUserKeyValue(UserKeyValue $userKeyValue){
		$this->userKeyValue=$userKeyValue;
	}//end of setUserKeyValue
	
	/**
	* @return UserKeyValue
	*/
	public function getUserKeyValue(){
		return $this->userKeyValue;
	}//end of getUserKeyValue
	
	/**
	* @param Property property
	* @return void
	*/
	public function setProperty(Property $property){
		$this->property=$property;
	}//end of setProperty
	
	/**
	* @return Property
	*/
	public function getProperty(){
		return $this->property;
	}//end of getProperty
	
	/**
	* @param Node node
	* @return void
	*/
	public function setNode(Node $node){
		$this->node=$node;
	}//end of setNode
	
	/**
	* @return Node
	*/
	public function getNode(){
		return $this->node;
	}//end of getNode
	
	/**
	* @param Lang lang
	* @return void
	*/
	public function setLang(Lang $lang){
		$this->lang=$lang;
	}//end of setLang
	
	/**
	* @return Lang
	*/
	public function getLang(){
		return $this->lang;
	}//end of getLang
	
	/**
	* @param User user
	* @return void
	*/
	public function setUser(User $user){
		$this->user=$user;
	}//end of setUser
	
	/**
	* @return User
	*/
	public function getUser(){
		return $this->user;
	}//end of getUser
	
	/**
	* @param PropertyType propertyType
	* @return void
	*/
	public function setPropertyType(PropertyType $propertyType){
		$this->propertyType=$propertyType;
	}//end of setPropertyType
	
	/**
	* @return PropertyType
	*/
	public function getPropertyType(){
		return $this->propertyType;
	}//end of getPropertyType
	
	/**
	* @param Attribute attribute
	* @return void
	*/
	public function setAttribute(Attribute $attribute){
		$this->attribute=$attribute;
	}//end of setAttribute
	
	/**
	* @return Attribute
	*/
	public function getAttribute(){
		return $this->attribute;
	}//end of getAttribute
	
	/**
	* @param NodeType nodeType
	* @return void
	*/
	public function setNodeType(NodeType $nodeType){
		$this->nodeType=$nodeType;
	}//end of setNodeType
	
	/**
	* @return NodeType
	*/
	public function getNodeType(){
		return $this->nodeType;
	}//end of getNodeType
	
	/**
	* @param AttributeType attributeType
	* @return void
	*/
	public function setAttributeType(AttributeType $attributeType){
		$this->attributeType=$attributeType;
	}//end of setAttributeType
	
	/**
	* @return AttributeType
	*/
	public function getAttributeType(){
		return $this->attributeType;
	}//end of getAttributeType


}

