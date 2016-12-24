<?php
/**
 * @package service
 */
class DevelActionImpl extends SupportAction implements DevelAction {

    /**
     * @return array
     */
    public function devel() {
        if (!$this->getContainer()->getSessionTool()->getUser()->hasGroupId(Group::DEVELOPER)) {
            $this->log("client is not developer, will redirect to login");
            $this->getContainer()->redirect("devel-login");
        }
        return array("devel-devel", new ModelArrayImpl());
    }


    /**
     * @return array
     */
    public function login() {
        // first check the db for this session_id, if this user is already defined
        $userSessionModelArray = $this->getContainer()->getServiceManager()->getUserService()->findByKeyValue("session_id", $this->getContainer()->getSessionTool()->getUser()->getSessionId());
        if ($userSessionModelArray->size() == 1) {
            /**
             * @var User $user
             */
            $user = $userSessionModelArray->get(0);

            // if this user is not defined yet, it is ok to try to log in
            if ($user->getUserName() == null) {

                // check if the username and password exists
                if ($this->getContainer()->getWebAppTool()->isKeyInGetPostArray("username") &&
                    $this->getContainer()->getWebAppTool()->isKeyInGetPostArray("password")
                ) {
                    $username = $this->getContainer()->getWebAppTool()->getValueFromGetPostArray("username");
                    $password = $this->getContainer()->getWebAppTool()->getValueFromGetPostArray("password");
                    // check if the user exists and it is developer
                    $userModelArray = $this->getContainer()->getServiceManager()->getUserService()->findByKeyValueArray(
                        array("user_name" => $username, "password" => $password)
                    );
                    // if developer, update user; move session info to that user's row at the db table user
                    if ($userModelArray->size() == 1) {
                        // overwrite the $user
                        /**
                         * @var User $user
                         */
                        $user = $userModelArray->get(0);
                    }
                }
            }

            // check if this user is developer
            $userGroupModelArray = $this->getContainer()->getServiceManager()->getUserGroupService()->findByKeyValue("user_id", $user->getId());
            /**
             * @var UserGroup $userGroupModel
             */
            foreach ($userGroupModelArray->getModelArray() as $userGroupModel) {
                if ($userGroupModel->getGroupId() == Group::DEVELOPER) {
                    // delete the old/empty entry
                    if ($this->getContainer()->getSessionTool()->getUser()->getUserName() == null) {
                        $this->getContainer()->getServiceManager()->getUserService()->delete(
                            $this->getContainer()->getSessionTool()->getUser()
                        );
                    }
                    // update the current user
                    $user->setSessionId($this->getContainer()->getSessionTool()->getUser()->getSessionId());
                    $user->setRemoteAddress($this->getContainer()->getSessionTool()->getUser()->getRemoteAddress());
                    $this->getContainer()->getServiceManager()->getUserService()->update($user);
                    // redirect user to devel stack
                    $this->getContainer()->redirect("devel");
                    // redirect will write redirect headers and exit() this process, so execution will not reach this line
                }
            }
            // if the user is not redirected, it means user is not developer
            // put some info to result xml (somehow) and return empty model array
            $this->getContainer()->getXmlXslTool()->add(XmlXslTool::ERROR_MESSAGE, array("wrongCredentials" => "wrong username/password"));
        }

        return array("devel-login", new ModelArrayImpl());
    }

    /**
     * redirects to devel-login
     */
    public function logout() {
        if (!is_null($this->getContainer()->getSessionTool()->getUser()->getSessionId()) &&
            strlen(trim($this->getContainer()->getSessionTool()->getUser()->getSessionId())) > 0
        ) {
            $userSessionModelArray = $this->getContainer()->getServiceManager()->getUserService()->findByKeyValue("session_id", $this->getContainer()->getSessionTool()->getUser()->getSessionId());
            if ($userSessionModelArray->size() == 1) {
                /**
                 * @var User $user
                 */
                $user = $userSessionModelArray->get(0);

                // if this user is already logged, remove the user's session
                if ($user->getUserName() != null) {
                    $user->setSessionId("");
                    $user->setRemoteAddress("");
                    $this->getContainer()->getServiceManager()->getUserService()->update($user);

                    // reset the session
                    $this->getContainer()->getSessionTool()->resetSession();
                }
            }
        }
        // redirect user to devel stack
        $this->getContainer()->redirect("devel-login");
    }

    /**
     * @return array
     */
    public function item() {
        if ($this->getContainer()->getWebAppTool()->isKeyInGetPostArray("type")) {
            $type = $this->getContainer()->getWebAppTool()->getValueFromGetPostArray("type");
            $methodName = "get" . ucfirst($type) . "Service";
            if (method_exists($this->getContainer()->getServiceManager(), $methodName)) {
                /**
                 * @var Model $model
                 */
                $model = $this->getContainer()->getServiceManager()->$methodName()->getModel();
                $columnProperties = $model->getColumnProperties();
                $dbProperties = array();
                foreach ($model->getDbProperties() as $field) {
                    $dbProperties[$field] = array(
                        "name" => $field,
                        "type" => $columnProperties[$field]["type"],
                        "validator" => $columnProperties[$field]["validator"],
                        "notnull" => $columnProperties[$field]["notnull"],
                    );
                }
                $modelData = "";
                foreach ($this->getContainer()->getServiceManager()->$methodName()->findAll()->getArray() as $modelArray) {
                    unset($modelArray["orderSelection"]);
                    unset($modelArray["tableName"]);
                    $modelData .= "<model>" . array_to_xml($modelArray) . "</model>";
                }
                $this->getContainer()->getXmlXslTool()->add(
                    XmlXslTool::DEVEL_KEY,
                    array(
                        XmlXslTool::CURRENT_NODE => array(
                            "model_definitions" => $dbProperties,
                            "primary_key" => $model->getPrimaryKey(),
                            "relations" => $model->getRelationsArray(),
                            "model_data" => $modelData,
                        )
                    )
                );
            }
        }
        return array("devel-devel", new ModelArrayImpl());
    }


}
