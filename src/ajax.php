<?php
$root = 'http://interaction.dundee.ac.uk/~alayt/sns/';
include_once('inc/classes.php');
$app = new App();
$output;
//echo '';
	   $output='{';
//echo "Running";
	$st = $app->pdo->prepare('INSERT INTO posts VALUES("",:url,:uid,:date,:title,:body,:lat,:lon,:mat)');
	$st->execute(array(
		':url' => $_POST['url'],
		':uid' => $app->user->d['uid'],
		':date' => time(),
		':title' => $_POST['title'],
		':body' => $_POST['body'],
		':lat' => $_POST['lat'],
		':lon' => $_POST['lon'],
		':mat' => $_POST['mat'],
	));
	
	//echo $app->user->d['uid'];
	//echo 'SELECT * FROM posts WHERE uid=:uid ORDER BY date DESC LIMIT 1';

	$st = $app->pdo->prepare('SELECT * FROM posts WHERE uid=:uid ORDER BY date DESC LIMIT 1');
	if($st->execute(array(':uid' => $app->user->d['uid'])))
		$output .= '"post":{"state":"1"}';
		
	
	//while ($post = $st->fetch()) {
		$post = $st->fetch();
		//echo "Post: ";
		//echo var_dump($post['pid']);
		//echo "POST DATA";
		//echo var_dump($_FILES);
		$postID = $post['pid'];
		//return true;
	//}
	
if(sizeof($_FILES) > 0) {
	
	$fileUploader = new FileUploader($app,$_FILES,$postID);
	
}
$output .= '}';

echo $output;

//echo "POST DATA:" . var_dump($_POST);

class FileUploader{
	public function __construct($app,$uploads,$pid,$uploadDir='uploads/'){
		$this->app = $app;
		$this->pid = $pid;
		global $output;
		
		// Split the string containing the list of file paths into an array 
	//	$paths = explode("###",rtrim($_POST['paths'],"###"));
		
		// Loop through files sent
		//	   echo var_dump($uploads);
		//	   echo "\n=======================================";
		$output .= ',"images":[';
		foreach($uploads as $key => $current)
		{
		//	echo var_dump($current);
			// Stores full destination path of file on server
			//$this->uploadFile=$uploadDir.sha1(uniqid(mt_rand(), true)).rtrim($paths[$key],"/.");
			$this->uploadFile=$uploadDir.sha1(uniqid(mt_rand(), true).$key).'.'.substr(strrchr($current['name'],'.'),1);//rtrim($paths[$key],"/.");
			// Stores containing folder path to check if dir later
			$this->folder = substr($this->uploadFile,0,strrpos($this->uploadFile,"/"));
			
		//	echo 'CURRENT TMP NAME?!!?!      '.$current['tmp_name'] ."\n\n\n\n";
			// Check whether the current entity is an actual file or a folder (With a . for a name)
			if(strlen($current['name'])!=1)
				// Upload current file
				if($this->upload($current,$this->uploadFile,($_POST['featured']==$current['name'])?1:0))
					$output.="{\"image\":\"".$current['name']."\",\"success\":\"true\"},";
				else
					$output.="{\"image\":\"".$current['name']."\",\"success\":false,'error':'".$current['error']."'},";
	//			else 
	//				echo "Error";
		}
		$output = rtrim($output,',').']';
	}

	private function upload($current,$uploadFile,$cover){
		// Checks whether the current file's containing folder exists, if not, it will create it.
		if(!is_dir($this->folder)){
			mkdir($this->folder,0700,true);
		}
		// Moves current file to upload destination
	//	echo $uploadFile."\n";
	//	echo 'KEY VALUE IS: '.$cover."\n";	
	//		echo 'FILE NAME: '.var_dump($current);//['tmp_name'];
		if(move_uploaded_file($current['tmp_name'],$uploadFile)){
		
					$st = $this->app->pdo->prepare('INSERT INTO images VALUES("",:pid,:file,:cover)');
					if($st->execute(array(
						':pid' => $this->pid,
						':file' => $uploadFile,
						':cover' => $cover
					))){
					//	echo "{'success':true}";
					//	echo 'IMAGE ADDED TO DB';
						return true;
					}
					else {
						return false;
					//	echo "Something went wrong";
					}
					
		}
		else
		return false;
		//	echo 'FAILED TO UPLOAD '.PHP_EOL;
//	
					
	/*		return true;
		else 
			return false;*/
	}
}
?>
