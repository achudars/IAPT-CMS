<?php

/*class View
{
    private $model;

    public function __construct($model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
        $data = "<p>" . $this->model->tstring ."</p>";
        require_once($this->model->template);
    }
}*/

class View
{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        return '<p><a href="mvc.php?action=clicked">' . $this->model->string . "</a></p>";
    }
}

?>