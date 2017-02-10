<?php 

namespace core;

class Bootstrap extends System{

	public $settings;
	public $url;
	public $app;
	public $app_controller;

	public function __construct(){
		
	}

	public function render($settings){
		$this->settings = $settings;
		$this->url = urldecode(preg_replace('/\?.*/iu', '', $_SERVER['REQUEST_URI']));
		$this->app = false;
		$this->find_path();
		$this->find_controllers();
	}

	public function find_path(){
		foreach ( $this->settings['apps'] as $app){
			$app = require(BASE_DIR . '\apps\\' . $app . '\urls.php');
			foreach ($app as $pattern => $method) {
				$args = array();
				if(preg_match($pattern, $this->url)){
					$this->app = array($app, array('pattern' => $pattern, 'method' => $method, 'args' => $args));
					break(2);
				}
			}
		}
		if($this->app === 'false'){
			exit('App not found');
		}
	}

	public function find_controllers(){
		if ( $this->app  && is_array($this->app)){
			if($this->app['0']['#^/*$#i']){
				require(BASE_DIR . '\apps\\' . $this->app['0']['#^/*$#i'] . '\controller.php');
				$controller_name = $this->app['0']['#^/*$#i'] . '_Controller';
			}
			else if($this->app['0']['#^/Page/([A-z0-9_-])/*#i']){
				require(BASE_DIR . '\apps\\' . $this->app['0']['#^/Page/([A-z0-9_-])/*#i'] . '\controller.php');
				$controller_name = $this->app['0']['#^/Page/([A-z0-9_-])/*#i'] . '_Controller';
			}
			$this->app_controller = new $controller_name;
			$this->app_controller->{$this->app['1']['method']}($this->app['1']['args']);
		}
	}

}


 ?>