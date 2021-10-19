<?php

class Gifs{

	public $name;
	public $key;
	public $rating;
	public $limit;
	public $offset;

	public function __construct($name,$key,$rating,$limit,$offset){
		$this->name = $name;
		$this->key = $key;
		$this->rating = $rating;
		$this->limit = $limit;
		$this->offset = $offset;	
	}

	public function searchgif(){
	   
	  	try{

	    	$urll = 'http://api.giphy.com/v1/gifs/search?q='.str_replace(" ","+",$this->name).'&api_key='.$this->key.'&rating='.$this->rating.'&limit='.$this->limit.'&offset='.$this->offset.'';

	    	$gif = json_decode(file_get_contents($urll));

	    	if($gif->data[0]->images->fixed_height->url){
	      		for($i=0;$i<intval($this->limit);$i++){
	        		if(trim($gif->data[$i]->title) !== ''){
	          			$title = $gif->data[$i]->title;
	        		}else{
	          			$title = strtoupper($name).' GIF';
	        		}
	        		$resp .= '<div class="item"><h3>'.intval($i+1).') '.$title.'</h3><img class="img" src="'.$gif->data[$i]->images->fixed_height->url.'" alt="'.strtolower($title).'"></div>';
	      		}
	      		echo $resp;
	    	}else{
	       		echo '<h4>Nothing found for your request!</h4>';
	    	}

	  	}catch(Exception $e){

	    	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
	  	}
	  	
	}
}


if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    if (isset($_POST['name']) && $_POST['name'] !== ''){
    	$offset = $_POST['offset'];
    	$rating = $_POST['rating'];
	    $limit = $_POST['limit'];
	    $name = trim($_POST['name']);
	    $key = $_POST['key'];
	    
        $ech = new Gifs($name,$key,$rating,$limit,$offset);
        $ech->searchgif();
    }else{
        echo '<h4>Enter image name!</h4>';
    }
}

?>
