<?php

require_once('model/localconf.php');
include 'controller/controller.php';
include 'views/view.php';
include 'model/model.php';

$controller = new Controller(new View(), new Model());
echo $controller->display();

?>