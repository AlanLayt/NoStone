<?php
include_once('classes.php');
$app = new App();

?><!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>NoStone</title>
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php


$app->user->getAvatar('');
$app->user->getUsername();





echo '<pre style="position:fixed;bottom:0;left:0;right:0;height: 150px; background:rgba(0,0,0,0.3); margin: 0px;">'.$GLOBALS['de'].'</pre>';


?>

</body>
</html>