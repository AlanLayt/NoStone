<?php

	
	class App {
		
		
		
		
		public function __construct(){
			$uname = 'alan';
			$upass = 'test';
		
			$this->connect();
			$this->user = new User($this->pdo,$uname,$upass);
		
		} 
	
		public function connect() { 
		
			$this->pdo = new PDO("mysql:host=134.36.216.17;dbname=dixd2alayt", 'dixd2alayt', 'iota82'); 
			echo 'running';
		
		} 
		
		public function getDetails() { 
		
		
		
		} 
	
	} 
	
	class User { 
	
	  private static $instance; 
	
	  public function __construct($pdo,$uname,$pword) { 
	  
		$this->pdo = $pdo;
		$this->uname = $uname;
		$this->pword = $pword;
		
		echo $this->getDetails();
		if($this->getDetails()){
			debug('details loaded');
			//debug(var_dump($this->d));
		}
	  
	  
	  } 
	
	  public function getInstance() { 
	
	
	
	  } 
	
	  public function getDetails() { 
		$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username');
		$st->execute(array(':username' => $this->uname));
		
		while ($user = $st->fetch()) {
			$this->d = $user;
			return true;
		}
	
	  } 
	
		public function displayAvatar($class) { 
			$params = '';
			if($class!='')
				$params .= 'class="'.$class.'" ';
			
			
			echo '<img '.$params.'src="avatar/'.$this->d['uid'].'.jpg">';
		
		}  
	
	} 
	
	$GLOBALS['de'] = '';
	function debug($t){	
	
		$GLOBALS['de'] .= $t;
		
	}

?>