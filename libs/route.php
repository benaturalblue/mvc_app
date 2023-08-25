<?php
function route($path, $httpMethod)
{
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
        $controllerName = '';

        switch ($controller) {
            case 'home':
                $controllerName = 'HomeController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;
            case 'user':
                $controllerName = 'UserController';
                switch ($case) {
                    case ['log-in', 'get']:
                        $methodName = 'logIn';
                        break;
                    case ['sign-up', 'get']:
                        $methodName = 'signUp';
                        break;
                    case ['certification', 'post']:
                        $methodName = 'certification';
                        break;
                    case ['create', 'post']:
                        $methodName = 'create';
                        break;
                    case ['log-out', 'get']:
                        $methodName = 'logOut';
                        break;
                    case ['myPage', 'post']:
                        $methodName = 'myPage';
                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;
                    case ['update', 'post']:
                        $methodName = 'update';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;
            case 'contact':
                $controllerName = 'ContactController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    case ['confirmation', 'post']:
                        $methodName = 'confirmation';
                        break;
                    case ['create', 'post']:
                        $methodName = 'create';
                        break;
                    case ['edit', 'get']:
                        $methodName = 'edit';
                        break;
                    case ['update', 'post']:
                        $methodName = 'update';
                        break;
                    case ['delete', 'get']:
                        $methodName = 'delete';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;
        }

        if (!empty($controllerName)) {
            require_once(ROOT_PATH . "Controllers/{$controllerName}.php");
            $obj = new $controllerName();
            $obj->$methodName();
        } else {
            header("HTTP/1.0 404 Not Found");
        }
    } catch (Throwable $e) {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
    }
}
