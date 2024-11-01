<?php

class Controller {
    function route() {}

    function render($controller, $view, $data = []): void {
        extract($data);
        include "Views/$controller/$view.php";
    }

    function verifyRights($id, $contoller ='user', $action='list'){
        $sql = "select COUNT(users.id) users
                inner join users_groups on users.id = users_groups.userID
                inner join groups_rights on users_groups.id = groups_rights.groupID
                inner join rights on groups_rights.rightsID = rights.rightsID

                where users.id = 1
                AND rights.action LIKE 'delete'
                AND rights.controller LIKE 'employee'";
    }
}