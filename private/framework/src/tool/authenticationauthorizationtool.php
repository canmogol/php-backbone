<?
class AuthenticationAuthorizationTool {

    /**
     * @var array
     */
    private $autorizedUserNameStackIdArray = array();

    /**
     * @container
     * */
    private $container;

    /**
     * @param Container container
     * @return void
     */
    public function setContainer(Container $container) {
        $this->container = $container;
    }

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * @param Stack $stack
     * @param User $user
     * @return bool
     */
    public function isAuthorizedStack($stack, $user) {

        // if the username is not in the authorized array, add this username
        if (!array_key_exists($user->getId(), $this->autorizedUserNameStackIdArray)) {
            $this->autorizedUserNameStackIdArray[$user->getId()] = array();

        } // if the stack is in the authorized array of this user, return true
        else if (in_array($stack->getId(), $this->autorizedUserNameStackIdArray[$user->getId()])) {
            return true;
        }


        /**
         * @var Group $group
         */
        foreach ($user->getGroups() as $group) {
            // if the user is developer, can execute anything
            if ($group->getId() == Group::DEVELOPER) {
                array_push($this->autorizedUserNameStackIdArray[$user->getId()], $stack->getId());
                break;
            } // if user's group is not developer, than check for permission
            else {
                // find all stacks of this group
                $groupStackModelArray = $this->getContainer()->getServiceManager()->getGroupStackService()->findByKeyValue("group_id", $group->getId());
                /**
                 * @var GroupStack $groupStackModel
                 */
                foreach ($groupStackModelArray->getModelArray() as $groupStackModel) {
                    if ($stack->getId() == $groupStackModel->getStackId()) {
                        array_push($this->autorizedUserNameStackIdArray[$user->getId()], $stack->getId());
                        break;
                    }
                }
            }
        }

        // return true or false if the stack id is in the authorized array
        if (in_array($stack->getId(), $this->autorizedUserNameStackIdArray[$user->getId()])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $actionName
     * @param string $methodName
     * @param User $user
     * @return bool
     */
    public function isAuthorizedActionMethod($actionName, $methodName, $user) {
        $actionMethodModelArray = $this->getContainer()->getServiceManager()->getActionMethodService()->findByKeyValueArray(
            array("action" => $actionName, "method" => $methodName)
        );
        if ($actionMethodModelArray->size() == 1) {
            /** @var $actionMethodModel ActionMethod */
            $actionMethodModel = $actionMethodModelArray->get(0);
            //if the user is developer, no need to check permissions
            if($user->hasGroupId(Group::DEVELOPER)){
                return true;
            }
            // check if this user has the permission to execute this action/method
            else{
                $groupActionMethodModelArray = $this->getContainer()->getServiceManager()->getGroupActionMethodService()->findByKeyValue("action_method_id", $actionMethodModel->getId());
                /** @var $groupActionMethodModel GroupActionMethod */
                foreach ($groupActionMethodModelArray->getModelArray() as $groupActionMethodModel) {
                    /** @var $group Group */
                    foreach ($user->getGroups() as $group) {
                        if ($groupActionMethodModel->getGroupId() == $group->getId()) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}

