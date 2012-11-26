<?php
$root = 'http://127.0.0.1/Projects/git/NoStone/src/';
include_once('inc/classes.php');
$app = new App();

?><!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>NoStone</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCidhJakWqVYzhILIHg1ug18KPHXfjkkcE&sensor=true" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
	<script src="<?php echo $root; ?>js/Stamen.js" type="text/javascript"></script>
    <script src="<?php echo $root; ?>js/main.js"></script>
    
	<link rel="stylesheet" href="<?php echo $root; ?>css/main.css">
</head>

<body>


<div id="header">
	<?php
    if($app->user->loggedIn()){
    
        echo '<div style="float:left;">' , $app->user->getAvatar('') , '</div>';
        echo '
        <div style="float:left;">
            <div>' , $app->user->getFirstName() , ' ' , $app->user->getLastName() , '</div>
            (' , $app->user->getUsername() , ' <a class="logout" href="'.$root.'?act=logout">logout</a>)
        </div>';
        echo '';
    
    }
    else
        echo '<div style="float:right">' , $app->loginForm() , '</div>';
    ?>
</div>
<?php
    if(!$app->user->loggedIn())
		echo $app->registerForm();
		
		
		//if (isset($_SERVER['REQUEST_URI'])) echo $_SERVER['REQUEST_URI'];
		if (isset($_GET['id'])) echo $_GET['id'];
		

echo '
      	  <div id="map_canvas"></div>








<pre style="position:fixed;bottom:0;left:0;right:0;height: 150px; background:rgba(0,0,0,0.3); margin: 0px;">'.$GLOBALS['de'].'</pre>';


?>

</body>
</html>