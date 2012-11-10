<?php

	class App {
		public $root = 'http://127.0.0.1/Projects/git/NoStone/src/';
		
		public function __construct(){
			$uname = 'alan';
			$upass = '';
		
			$this->connect();
			$this->user = new User($this->pdo,$this->root);
			
			if(isset($_POST['loginUser']) && isset($_POST['loginPass'])) {
				debug('Login POST data detected: ' . $_POST['loginUser']);
				
				if(false != $sessionKey = $this->user->auth($_POST['loginUser'],$_POST['loginPass'])){
					debug("Session initiated! key: ".$sessionKey);
					setcookie('username',$_POST['loginUser']);
					setcookie('key',$sessionKey);
					header("Location: ".$this->root);
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
							$this->authenticated();
						}
					}
					else
						debug('No cookies found.');
				}
			}
			
			if(isset($_GET['act'])){
				switch($_GET['act']){
					case 'logout':
						$this->logout();
						break;
					case 'register':
						$this->register();
						break;
				}
			}
			if(!$this->user->loggedIn())
				$this->loaded();
		
		} 
	
		public function authenticated() { 
		
			debug("Authenticated. Running.");
			$this->loaded();
		
		}
	
		public function loaded() { 
		
			debug("Loaded. Running.");
		//	if(isset($_GET['view'])){
				$viewDetails = $_GET;
				$this->view = new View($this,$viewDetails);
		//	}
		
		}
	
		public function logout() { 
		
			if($this->user->loggedIn()){
				$this->user->deleteSession();
				unset($_SESSION['username']);
				setcookie ('username', '', time() - 3600);
				setcookie ('key', '', time() - 3600);
				session_destroy();
				header("Location: ".$this->root);
			}
		} 
		public function register() { 
			$pwSalt = 'hogwaRts';
		
			if(
				isset($_POST['username']) &&
				isset($_POST['firstname']) &&
				isset($_POST['lastname']) &&
				isset($_POST['password']) &&
				isset($_POST['password2']) &&
				isset($_POST['email']) &&
				isset($_POST['dob'])
			){
				$this->regData['uname'] = $_POST['username'];
				$this->regData['firstname'] = $_POST['firstname'];
				$this->regData['lastname'] = $_POST['lastname'];
				$this->regData['pword'] = $_POST['password'];
				$this->regData['pword2'] = $_POST['password2'];
				$this->regData['email'] = $_POST['email'];
				$this->regData['dob'] = $_POST['dob'];
				
				if(strlen($_POST['username'])<4)
					echo "<p>Username too short.</p>";
				elseif(strlen($_POST['password'])<4)
					echo "<p>Password too short.</p>";
				elseif($_POST['password'] != $_POST['password2'])
					echo "<p>Passwords do not match.</p>";
				else {
					$st = $this->pdo->prepare('INSERT INTO login VALUES("", :uname, :password, :email, :first_name, :last_name, :dob)');
					$st->execute(array(
						':uname' => $this->regData['uname'],
						':password' => sha1($pwSalt.$this->regData['pword']),
						':email' => $this->regData['email'],
						':first_name' => $this->regData['firstname'],
						':last_name' => $this->regData['lastname'],
						':dob' => $this->regData['dob'],
					));
				}
			
			}
				
			//echo $_POST['username'];
			/*$st->execute(array(
				':uname' => $token,
				':password' => $token,
				':email' => $token,
				':first_name' => $token,
				':last_name' => $token,
				':dob' => $token,
			));
			debug('Initiating session: ' . $st->rowCount());
			
			if($st->rowCount()!=0)
				return $token;
			else
				return false;*/
		}
	
		public function connect() { 
			$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=nostone", 'nostone', 'nostone'); 
		} 
	
		public function loginForm() { 
			return '
			<form method="post" action="'.$this->root.'?act=login">
				<input name="loginUser" type="text" placeholder="Username" \>
				<input name="loginPass" type="password" placeholder="Password" \>
				<input type="submit" \>
			</form>
			';
		
		}
	
		public function registerForm() { 
			return '
			<form method="post" action="?act=register">
				<input name="username" type="text" placeholder="Username" 
						'.(isset($this->regData['uname'])?'value="'.$this->regData['uname'].'"':'').' \>
						
				<input name="firstname" type="text" placeholder="First Name" 
						'.(isset($this->regData['firstname'])?'value="'.$this->regData['firstname'].'"':'').' \>
				<input name="lastname" type="text" placeholder="Last Name" 
						'.(isset($this->regData['lastname'])?'value="'.$this->regData['lastname'].'"':'').' \>
						
				<input name="password" type="password" placeholder="Password" 
						'.(isset($this->regData['pword'])?'value="'.$this->regData['pword'].'"':'').' \>
				<input name="password2" type="password" placeholder="Re-type password" 
						'.(isset($this->regData['pword2'])?'value="'.$this->regData['pword2'].'"':'').' \>
						
				<input name="email" type="email" placeholder="email@example.com" 
						'.(isset($this->regData['email'])?'value="'.$this->regData['email'].'"':'').' required \>
  				<input name="dob" type="date" 
						'.(isset($this->regData['dob'])?'value="'.$this->regData['dob'].'"':'').' required>
				<input type="submit" \>
			</form>
			';
		
		} 
	
	} 
	
	
	
	
	class View { 
		private $viewroot='views';
		private $template;
		public function __construct($app,$viewDetails) {
			
			$this->template = $this->viewroot.'/home.php';
			
			if(isset($_GET['view']))
				$this->viewDetails = $viewDetails;
				
			$this->app = $app; 
			//$this->viewDetails = $viewDetails;
			
			debug("Loading View");
		
			if(isset($viewDetails['view'])) {
				switch($viewDetails['view']) {
					case 'post':
						break;
					case 'user':
						$this->user();
						break;
					default:
					$this->home();
						break;
				}
			}
			else
				$this->home();
			
		}  
		
		public function user() {
			$this->userExists=false;
			if(isset($this->viewDetails['uid']))
				$user = $this->viewDetails['uid'];
			else
				$user = $this->viewDetails['uid'];
			
			debug("Loading user profile.");
			
			$this->user = new UserHandler($this->app->pdo,$this->app->root);
			if($this->user->getDetails($user))
				$this->userExists=true;
				
			$this->template = $this->viewroot.'/profile.php';
		}
		
		public function home() { 
		
			debug("Loading home page.");
		
			$this->template = $this->viewroot.'/home.php';
		} 
		
		public function getTemplate() { 
		
			return $this->template;
		
		} 
		
	}
	
	
	
	
	
	class UserHandler { 
	
		public function __construct($pdo,$root) { 
			$this->pdo = $pdo;
			$this->root = $root;
		}  
		
		public function setDetails($user) { 
				$this->d = $user;
		} 


		public function getDetails($uname) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username');
			$st->execute(array(':username' => $uname));
			
			while ($user = $st->fetch()) {
				$this->d = $user;
				return true;
			}
			return false;
		} 
		
		public function getAvatar($class) { 
			$params = '';
			if($class!='')
				$params .= 'class="'.$class.'" ';
			
			
			return '<img '.$params.'src="'.$this->root.'avatar/'.$this->d['uid'].'.jpg" \>';
		
		} 
	
		public function getId() { 
			return '<span class="username">'.$this->d['uid'].'</span>';
		
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
	
	class User extends UserHandler{ 
		private static $instance; 
		private $authed = false;
		private $pwSalt = 'hogwaRts';
		
		/*public function __construct($pdo,$root) { 
			$this->pdo = $pdo;
			$this->root = $root;
		} */ 
		
		public function authed($is,$key) { 
			$this->authed = $is;
			$this->sessionKey = $key;
		}
		public function loggedIn() { 
			return $this->authed;
		} 
		
		public function auth($username,$password) { 
			$st = $this->pdo->prepare('SELECT * FROM login WHERE uname = :username AND password = :password');
			$st->execute(array(':username' => $username,':password' => sha1($this->pwSalt.$password)));
			
			debug('Searching for user: ' . $username);
			while ($user = $st->fetch()) {
				$this->setDetails($user);
				$key = $this->createSession();
				$this->authed(true,$key);
				return $this->sessionKey;
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
				$this->authed(true,$key);
				return true;
			}
			else
				return false;
		}
		
		public function deleteSession() { 
			$st = $this->pdo->prepare('DELETE FROM session WHERE uid = :uid AND `key` = :key');
			$st->execute(array(
				':uid' => $this->d['uid'],
				':key' => $this->sessionKey
			));
			debug('Removing session: ' . $this->d['uid'] . ': ' . $this->sessionKey );
			debug('Removed?: ' . $st->rowCount() );
			
			if($st->rowCount()!=0){
				$this->authed(false,'');
				return true;
			}
			else
				return false;
		}
		
	
	} 
	
	
	
	
	
	
	
	
	
$GLOBALS['de'] = '';
function debug($t){	
	$GLOBALS['de'] .= $t.'<br/>';
}

?>