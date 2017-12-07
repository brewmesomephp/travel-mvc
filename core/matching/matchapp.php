<?php
namespace MatchingCore;
/**
 * Class MatchingCore
 * @package MatchingCore
 * @author Joseph Alai <joseph@josephalai.com>
 * Date: 12/4/2017
 * Time: 8:15 PM
 * Entry Point of the application.
 * Holds a map of all publicly accessible controllers and actions ($routes)
 * On each request it:
 * a) opens database connection
 * dispatches the request to the responsible controller (with fallback to default or error pages)
 */

class MatchingCoreWizard{

    /**
     * @var array map of all publicly accessible controller actions,
     *            in the form ['controllername' => ['availableaction1' => ['REQUEST_METHOD1, 'POST'], 'availableaction2' => ['GET', 'POST']], 'controller2' => [], ...].
     *            is used to lookup the responsible controller via controller = $_GET['c'], action = $_GET['a']
     */
    private $routes = [
        'wizard' => ['title' => 'GET', 'setTitle' => 'POST', 'tables' => 'GET', 'setTables' => 'POST', 'criteria' => 'GET',
            'setCriteria' => 'POST', 'weight' => 'GET', 'setWeight' => 'POST', 'location' => 'GET', 'setLocation' => 'POST',
            'travelDistance' => 'GET', 'setTravelDistance' => 'POST', 'edit' => 'GET', 'update' => 'POST'],
        'modify' => ['edit' => 'GET', 'update' => 'POST', 'delete' => 'POST'],
    ];

    public function openDatabaseConnection(){
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+00:00'"
        ];

        /* Setting the correct charset for db connection as mentioned here: http://www.phptherightway.com/#php_and_utf8 */
        return new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS, $options);
    }

    private function dispatchToController($db){
        //there is no default controller
        $controllerName = isset($_GET['c']) ? $_GET['c'] : '';

        //default of action is index
        $actionName = isset($_GET['a']) ? $_GET['a]'] : 'index';

        if ($this->isValidControllerAndAction($controllerName, $actionName)) {
            //convert controller from parameter (c=bla) to CamelCase (MatchingCore\BlaController)

            $controllerClassName = "MatchingCore\\" . mb_convert_case($controllerName, MB_CASE_TITLE, "UTF-8") . "Controller";

            //now require the controller to rock and roll
            require_once 'controller/$controllerName.php';
            $controller = new $controllerClassName($db);
            //call the action function
            $controller->{$actionName}();
        }
        elseif(!isset($_GET['c']) && !isset($_GET['a'])) {
            require_once "controller/WizardController.php";
            $controller = new WizardController($db);
            $controller->index();
        }
        else {
            require_once "exceptions/not_found.php";
            throw new NotFoundException();
        }


    }

    private function isValidControllerAndAction($controllerName, $actionName){
        return isset($this->routes[$controllerName]) && isset($this->routes[$controllerName][$actionName])
        && $_SERVER['REQUEST_METHOD'] == $this->routes[$controllerName][$actionName];

        }

    public function run(){

    }
}
}