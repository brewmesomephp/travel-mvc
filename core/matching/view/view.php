<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 11/25/2017
 * Time: 4:55 PM
 */

class WizardView
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
        return "<p>" . $this->model->string . "</p>";
    }
}
?>