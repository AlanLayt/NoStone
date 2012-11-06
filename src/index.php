<?php
include_once('classes.php');
$app = new App();

?><!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>NoStone</title>
    <script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>
    <script src="js/main.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php


echo '<div style="float:left;">' , $app->user->getAvatar('') , '</div>';
echo '
<div style="float:left;">
	<div>' , $app->user->getFirstName() , ' ' , $app->user->getLastName() , '</div>
	' , $app->user->getUsername() , '
</div>';


echo '<div style="float:right">' , $app->user->loginForm() , '</div>';



echo '<pre style="position:fixed;bottom:0;left:0;right:0;height: 150px; background:rgba(0,0,0,0.3); margin: 0px;">'.$GLOBALS['de'].'</pre>';


?>

</body>
</html>