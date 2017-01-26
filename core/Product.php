<?php 
namespace core;
class Product{
	public $title;
	public $price;
	public $status;
	public $description;
	public $categories;
	public $custom_parms;

	function __construct($title, $price, $status, $description, $categories, $custom_parms){
		$this->title = $title;
		$this->price = $price;
		$this->status = $status;
		$this->description = $description;
		$this->categories = $categories;
		$this->custom_parms = $custom_parms;
	}

	public function get(){
		echo 'nice';
	}

	public function getProduct(){
		echo 'Title: '.$this->title;
		echo '<br>Status: '.$this->status;
		echo '<br>Price: '.$this->price;
		echo '<br>Information: '.$this->description;
		echo '<br>Tags: '.$this->categories;
	}

	function printTree($tree) {
	    if(!is_null($tree) && count($tree) > 0) {
	        echo '<ul>';
	        foreach($tree as $kn=>$node) {
	            echo '<li>'.$node['item']['name'];
	            echo '<pre>';
	            // var_dump($node['children']);echo count($node['children']);
	            var_dump($node['children'][''.count($node['children']).'']);
	            echo '<ul><li>'.$node['children'][count($node['children'])]['item']['name'].'</li></ul>';
	            echo '</li>';
	        }
	        echo '</ul>';
	    }
	}
}

 ?>