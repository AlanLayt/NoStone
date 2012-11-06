<?php

	
	class App {
		
		public function __construct(){
			$uname = 'alan';
			$upass = '';
		
			$this->connect();
			$this->user = new User($this->pdo);
			
			//setcookie('username','alan');
			
			if(isset($_GET['act'])){
				switch($_GET['act']){
					case 'logout':
						$this->logout();
						break;
				}
			}
			
			if(isset($_POST['username']) && isset($_POST['password'])) {
				debug('Login POST data detected: ' . $_POST['username']);
				
				if(false != $sessionKey = $this->user->auth($_POST['username'],$_POST['password'])){
					debug("Session initiated! key: ".$sessionKey);
					setcookie('username',$_POST['username']);
					setcookie('key',$sessionKey);
					header("Location: index.php");
				}
				else {
					debug('Invalid username or password.');
				}
				
			}
			else {
				if(isset($_SESSION['username'])) {
					debug('Login session detected: ' . $_SESSION['username']);
				}
				else {
					debug('Checking for cookies');
					if(isset($_COOKIE['username']) && isset($_COOKIE['key'])) {
						
						debug('Login cookie detected: ' . $_COOKIE['username']);
						if($this->user->authSession($_COOKIE['username'],$_COOKIE['key'])){
							session_start();
							$this->user->getDetails($_COOKIE['username']);
							debug('User authenticated: ' . $this->user->d['uname']);
						}
							
					}
				}
			}
		
		} 
	
		public function logout() { 
		
			unset($_SESSION['username']);
			setcookie ('username', '', time() - 3600);
			setcookie ('key', '', time() - 3600);
			session_destroy();
			
			//$host  = $_SERVER['HTTP_HOST'];
			//$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			//$extra = 'mypage.php';
			header("Location: index.php");
		
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
		private $pwSalt = 'hogwaRts';
		
		public function __construct($pdo) { 
		
			$this->pdo = $pdo;
			
		} 
		
		public function getInstance() { 
		
		
		
		} 
		
		public function authed($is) { 
			$this->authed = $is;
		}
		
		public function auth($username,$password) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username AND password = :password');
			$st->execute(array(':username' => $username,':password' => sha1($this->pwSalt.$password)));
			
			debug('Searching for user: ' . $username);
			//debug(sha1($this->pwSalt.$password));
			while ($user = $st->fetch()) {
				$this->setDetails($user);
				$sessionKey = $this->createSession();
				$this->authed(true);
				return $sessionKey;
			}
			return false;
		}
		
		
		// ==== SESSION HANDLERS ==== \\
		public function createSession() { 
			$token = sha1(uniqid(mt_rand(), true));
			$st = $this->pdo->prepare('INSERT INTO session VALUES("", :key, :uid, :ip, 1, :time)');
			$st->execute(array(
				':key' => $token,
				':uid' => $this->d['uid'],
				':ip' => $_SERVER['REMOTE_ADDR'],
				':time' => time()
			));
			debug('Initiating session: ' . $st->rowCount());
			
			if($st->rowCount()!=0)
				return $token;
			else
				return false;
		}
		public function authSession($uname,$key) { 
			$st = $this->pdo->prepare('SELECT * FROM session, login WHERE login.uname = :uname AND session.key = :key AND session.uid = login.uid');
			$st->execute(array(
				':uname' => $uname,
				':key' => $key
			));
			debug('Authenticating session: ' . $uname . ': ' . $key );
			debug('Auth result: ' . $st->rowCount() );
			
			if($st->rowCount()!=0){
				$this->authed(true);
				return true;
			}
			else
				return false;
		}
		
		
		
		
		
		public function setDetails($user) { 
				$this->d = $user;
		} 
		
		public function loggedIn() { 
			return $this->authed;
		} 
		
		
		public function getDetails($uname) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username');
			$st->execute(array(':username' => $uname));
			
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