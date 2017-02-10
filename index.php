<?php 

require 'vendor/autoload.php';



define('BASE_DIR', getcwd());
$bootstrap = new core\Bootstrap();
$bootstrap->render(array('apps' => array('Product')));

$data = array(
    array(
    	'item'=>array('id'=>'3','name'=>'third'),
    	 'children'=>array(array('item'=>array('name'=>'first', 'id'=>1), 'children'=>array(array('item'=>array('name'=>'test','id'=>7)))),
    	 array('item'=>array('name'=>'second', 'id'=>2)))),
   // array('item'=>array('id'=>'5','name'=>'fifth'),
     //'children'=>array(array('item'=>array('name'=>'fourth', 'id'=>4))))
);


$bootstrap->app_controller->parms('meqena', '500$', 'avtive', 'lav vichakuma bayc paytaca', $data, '');
$bootstrap->app_controller->getProduct();
// $bootstrap->app_controller->Tree($data);


