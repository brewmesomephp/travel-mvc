<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/25/2017
 * Time: 4:59 PM
 */

$require_list = array("WizardController.php", "view.php", "model.php");
foreach($require_list as $file) {
    require_once($file);
}

$page = $_GET['page'];

if (!empty($page)){
    $data = array(
        'wizard' => array('model' => 'WizardModel', 'view' => 'ViewModel', 'controller' => 'WizardController'),
        'results' => array('model' => 'ResultsModel', 'view' => 'ResultsModel', 'controller' => 'ResultsController')
    );
}
foreach($data as $key=>$components){
    if ($page == $key){
        $model = $components['model'];
        $view = $components['view'];
        $controller = $components['controller'];
        break;
    }
}

if (isset($model)){
    $m = new $model();
    $c = new $controller($model);
    $v = new $view($model);
    echo $v->output();
}


$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();

?>