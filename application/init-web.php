<?php
require_once(__DIR__ . '/init.php');
$front = new Zf2\Mvc\FrontController($bootstrap->getContainer());
$front->dispatch(new Zf2\Http\Request())->send();
