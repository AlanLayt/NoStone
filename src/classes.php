<?php

	
	class App {
		
		public function __construct(){
			$uname = 'alan';
			$upass = '';
		
			$this->connect();
			$this->user = new User($this->pdo);
			
			setcookie('username','alan');
			
			if(isset($_POST['username']) && isset($_POST['password'])) {
				debug('Login POST data detected: ' . $_POST['username']);
				
				$this->user->auth($_POST['username'],$_POST['password']);
			}
			else {
				if(isset($_SESSION['username'])) {
					debug('Login session detected: ' . $_SESSION['username']);
				}
				else {
					debug('Checking for cookies');
					if(isset($_COOKIE['username'])) {
						session_start();
						debug('Login cookie detected: ' . $_COOKIE['username']);
					}
				}
			}
		
		} 
	
		public function logout() { 
		
			unset($_SESSION['username']);
			setcookie ('username', '', time() - 3600);
			session_destroy();
		
		} 
	
		public function connect() { 
		
			$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=nostone", 'nostone', 'nostone'); 
			//echo 'running';
		
		} 
	
		public function loginForm() { 
			return '
			<form method="post">
				<input name="username" type="text" placeholder="Username" \>
				<input name="password" type="password" placeholder="Password" \>
				<input type="submit" \>
			</form>
			';
		
		} 
	
	} 
	
	class User { 
	
		private static $instance; 
		private $authed = false;
		
		public function __construct($pdo) { 
		
			$this->pdo = $pdo;
			
		} 
		
		public function getInstance() { 
		
		
		
		} 
		
		public function auth($username,$password) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username AND password = :password');
			$st->execute(array(':username' => $username,':password' => $password));
			
			debug('Searching for user: ' . $username);
			while ($user = $st->fetch()) {
				$this->setDetails($user);
				$this->authed = true;
				return true;
			}
		}
		
		public function setDetails($user) { 
				$this->d = $user;
		} 
		
		public function loggedIn() { 
			return $this->authed;
		} 
		
		
		// ======== Not currently used
		public function getDetails() { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username');
			$st->execute(array(':username' => $this->uname));
			
			while ($user = $st->fetch()) {
				$this->d = $user;
				return true;
			}
		} 
		
		
		
		
		
	
		public function getAvatar($class) { 
			$params = '';
			if($class!='')
				$params .= 'class="'.$class.'" ';
			
			
			return '<img '.$params.'src="avatar/'.$this->d['uid'].'.jpg" \>';
		
		} 
	
		public function getUsername() { 
			return '<span class="username">'.$this->d['uname'].'</span>';
		
		} 
	
		public function getFirstName() { 
			return '<span class="firstname">'.$this->d['first_name'].'</span>';
		
		}
	
		public function getLastName() { 
			return '<span class="lastname">'.$this->d['last_name'].'</span>';
		
		}  
	
	} 
	
	$GLOBALS['de'] = '';
	function debug($t){	
	
		$GLOBALS['de'] .= $t.'<br/>';
		
	}

?>