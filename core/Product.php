<?php 
namespace core;

class Product{
	public $title = '';
	public $price = '';
	public $status = '';
	public $description = '';
	public $categories = array();
	public $custom_parms = '';
	public $error = '';
	private $width = '100px';
	private $height = '100px';

	function __construct($title, $price, $status, $description, $categories = array(), $custom_parms = '', $width = '', $height = ''){
		if(!empty($title) && is_string($title) && !empty($price) && !empty($status) && is_string($status) && !empty($description) && is_string($description) && !empty($categories) && is_array($categories)){
			$this->title = $title;
			$this->price = $price;
			$this->status = $status;
			$this->description = $description;
			$this->categories = $this->printTree($categories);
			$this->custom_parms = $custom_parms;

			$this->width = $width;
			$this->height = $height;
		}else{
			$this->error = 'Product parms error';  
		}
	}

	public function getProduct(){
		if(empty($this->error)){
			echo '<div style="display: inline-block;width='.$this->width.';height='.$this->height.'">';
			echo 'Title: '.$this->title;
			echo '<br>Status: '.$this->status;
			echo '<br>Price: '.$this->price;
			echo '<br>Information: '.$this->description;
			echo '<br>Tags: '.$this->categories;
			if(!empty($this->custom_parms))
			echo '<br>Custom Parms: '.$this->custom_parms;
			echo '</div>';
		}
		else{
			echo $this->error;
		}
	}

	function printTree($tree) {
	    if(!is_null($tree) && count($tree) > 0) {
	    	$a = 0;
	        // echo '<ul>';
	        foreach($tree as $kn=>$node) {
	        	$data .= $node['item']['name'].', ';
	            // echo '<li>'.$node['item']['name'];
	            if(is_array($node['children']))
	          		for($a = 0; $a <= count($node['children']); $a++){
	          			$data .= $node['children'][$a]['item']['name'].', ';
	          		 // echo '<ul><li>'.$node['children'][$a]['item']['name'].'</li></ul>';
	          		  }
	          	/*if(!empty($node['children'][0]['children']))
	          		for($a = 0; $a <= count($node['children'][$a]['children']); $a++){ echo '<ul><li>'.$node['children'][$a]['children'][$a]['item']['name'].'</li></ul>'; } */ 
	            // echo '</li>';
	            $a++;
	       		$data = trim($data,', , ');
	            return $data;
	        }
	        // echo '</ul>';
	    }
	}
}

 ?>