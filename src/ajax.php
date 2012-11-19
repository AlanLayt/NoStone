<?php
$root = 'http://interaction.dundee.ac.uk/~alayt/sns/';
include_once('inc/classes.php');
$app = new App();

//echo "Running";
	$st = $app->pdo->prepare('INSERT INTO posts VALUES("",:url,:uid,:date,:title,:body,:lat,:lon)');
	$st->execute(array(
		':url' => $_POST['url'],
		':uid' => 3,
		':date' => time(),
		':title' => $_POST['title'],
		':body' => $_POST['body'],
		':lat' => $_POST['lat'],
		':lon' => $_POST['lon'],
	));

	$st = $app->pdo->prepare('SELECT * FROM posts WHERE uid=:uid ORDER BY date DESC LIMIT 1');
	$st->execute(array(':uid' => $app->user->d['uid']));
	
	//while ($post = $st->fetch()) {
		$post = $st->fetch();
		echo "Post: ";
		echo var_dump($post['pid']);
		$postID = $post['pid'];
		//return true;
	//}
	
if(sizeof($_FILES) > 0) {
	

	
	$fileUploader = new FileUploader($_FILES,$postID);
	
}

echo "POST DATA:" . var_dump($_POST);

class FileUploader{
	public function __construct($uploads,$pid,$uploadDir='uploads/'){
		$this->app = new App();
		$this->pid = $pid;
		
		// Split the string containing the list of file paths into an array 
		$paths = explode("###",rtrim($_POST['paths'],"###"));
		
		// Loop through files sent
		foreach($uploads as $key => $current)
		{
			// Stores full destination path of file on server
			$this->uploadFile=$uploadDir.sha1(uniqid(mt_rand(), true)).rtrim($paths[$key],"/.");
			// Stores containing folder path to check if dir later
			$this->folder = substr($this->uploadFile,0,strrpos($this->uploadFile,"/"));
			
			// Check whether the current entity is an actual file or a folder (With a . for a name)
			if(strlen($current['name'])!=1)
				// Upload current file
				if($this->upload($current,$this->uploadFile))
					echo "The file ".$paths[$key]." has been uploaded\n";
				else 
					echo "Error";
		}
	}

	private function upload($current,$uploadFile){
		// Checks whether the current file's containing folder exists, if not, it will create it.
		if(!is_dir($this->folder)){
			mkdir($this->folder,0700,true);
		}
		// Moves current file to upload destination
		echo $uploadFile;
		if(move_uploaded_file($current['tmp_name'],$uploadFile)){
		
					$st = $this->app->pdo->prepare('INSERT INTO images VALUES("",:pid,:file)');
					if($st->execute(array(
						':pid' => $this->pid,
						':file' => $uploadFile
					))){
						echo "Success!";
					}
					else {
						echo "Something went wrong";
					}
					
					return true;
		}
					
					
	/*		return true;
		else 
			return false;*/
	}
}
?>
