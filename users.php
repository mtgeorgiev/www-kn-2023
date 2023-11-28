<?php
require_once "bootstrap.php";

$result = null;
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        $result = (new UserRequestHandler())->getUsers();
    }

    case 'POST': {

    }
    default: {
        // todo
    }
}

echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
