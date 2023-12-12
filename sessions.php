<?php
require_once "bootstrap.php";

$result = null;
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET': { // check if user is logged
        $result = (new SessionRequestHandler())->checkLoginStatus();
        break;
    }

    case 'POST': { // login
        $result = (new SessionRequestHandler())->login($_POST['email'], $_POST['password']);
        break;
    }

    case 'DELETE': { // logout
        (new SessionRequestHandler())->logout();
        $result = true;
        break;
    }

    default: {
        // todo
    }
}

echo json_encode(['result' => $result], JSON_UNESCAPED_UNICODE);
