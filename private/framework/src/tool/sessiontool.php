<?
class SessionTool {

    /**
     * @var string $COOKIE_KEY
     */
    private static $COOKIE_KEY = "_MG_SES_ID_";

    /**
     * @var User $user
     */
    private $user = null;

    /**
     * @container
     * */
    private $container;

    /**
     * @var string $sessionId
     */
    private $sessionId = null;

    function SessionTool() {
        session_start();
        if (!array_key_exists(SessionTool::$COOKIE_KEY, $_SESSION) ||
            is_null($_SESSION[SessionTool::$COOKIE_KEY]) ||
            strlen(trim($_SESSION[SessionTool::$COOKIE_KEY])) === 0
        ) {
            $random = rand(0, getrandmax());
            $_SESSION[SessionTool::$COOKIE_KEY] = substr(md5($random), 0, 20) . $random;
        }
        $this->sessionId = $_SESSION[SessionTool::$COOKIE_KEY];
    }

    /**
     * @param Container $container
     */
    public function setContainer($container) {
        $this->container = $container;
    }

    /**
     * @return Container
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * @return bool
     */
    public function isUserAuthenticated() {
        return true;
    }

    /**
     * @return User
     */
    public function getUser() {
        // if user is null, do this once
        if (is_null($this->user)) {
            // find the user from DB
            /**
             * @var ModelArray $modelArray
             */
            $modelArray = $this->getContainer()->getServiceManager()->getUserService()->findByKeyValue(
                "session_id",
                $this->sessionId
            );
            if ($modelArray->size() > 0) {
                // this is our user, it was stored in DB
                $this->user = clone $modelArray->get(0);

                // update the session's last update date
                $this->user->setSessionLastUpdate(@date("Y-m-d G:i:s"));
                $this->getContainer()->getServiceManager()->getUserService()->update($this->user);

                // find the groups of this user
                /**
                 * @var ModelArray $userGroupModelArray
                 */
                $userGroupModelArray = $this->getContainer()->getServiceManager()->getUserGroupService()->findByKeyValue("user_id", $this->user->getId());
                if ($userGroupModelArray->size() > 0) {
                    /**
                     * @var UserGroup $userGroup
                     */
                    foreach ($userGroupModelArray->getModelArray() as $userGroup) {
                        /**
                         * @var Group $groupModel
                         */
                        $groupModel = $this->getContainer()->getServiceManager()->getGroupService()->findById($userGroup->getGroupId());
                        // add each group to
                        $this->user->addGroup(clone $groupModel);
                    }
                }
            } else {
                // this user is not known, create an empty user
                $this->user = new User();
                $this->user->setSessionId($this->sessionId);
                $this->user->setRemoteAddress($this->getContainer()->getWebAppTool()->getRemoteAddress());
                $this->user->setSessionLastUpdate(@date("Y-m-d G:i:s"));
                $this->user = $this->getContainer()->getServiceManager()->getUserService()->insert($this->user);

                // set this user's group as "guest"
                /**
                 * @var ModelArray $groupModelArray
                 */
                $groupModelArray = $this->getContainer()->getServiceManager()->getGroupService()->findByKeyValue("name", "guest");
                /**
                 * @var Group $guestGroupModel
                 */
                $guestGroupModel = $groupModelArray->get(0);
                $this->user->addGroup($guestGroupModel);

                // add user to this group
                $userGroupModel = new UserGroup();
                $userGroupModel->setGroupId($guestGroupModel->getId());
                $userGroupModel->setUserId($this->user->getId());
                $this->getContainer()->getServiceManager()->getUserGroupService()->insert($userGroupModel);

            }
        }
        return $this->user;
    }

    /**
     *
     */
    public function resetSession() {
        $_SESSION[SessionTool::$COOKIE_KEY] = "";
        $this->sessionId = "";
        $this->user = null;
    }

}

