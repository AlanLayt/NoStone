<?php

$root = 'http://127.0.0.1/Projects/git/NoStone/src/';
include_once('inc/classes.php');
$app = new App();

?><!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=320">
    
    <title>NoStone</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCidhJakWqVYzhILIHg1ug18KPHXfjkkcE&sensor=true" type="text/javascript"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="<?php echo $root; ?>js/richmarker-compiled.js"></script>
	<script src="<?php echo $root; ?>js/Stamen.js" type="text/javascript"></script>
    <script src="<?php echo $root; ?>js/main.js"></script>
    
    <link rel="stylesheet" media="only screen and (max-width: 400px)" href="css/mobile.css" />
	<link rel="stylesheet" href="<?php echo $root; ?>css/main.css">
    
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="app-icon-64.png">
    <link rel="icon" href="app-icon-64.png" sizes="64x64">
</head>

<body>


<div id="header">
	<?php
	//echo var_dump($_GET);
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
        echo '<div class="login" style="float:right">' , $app->loginForm() , '</div>';
    ?>
</div>

<?php

	include_once $app->view->getTemplate();
	//echo $app->registerForm();
?>


<?php
echo '


<pre style="position:fixed;bottom:0;left:0;right:0;height: 150px; overflow-y:scroll; background:rgba(0,0,0,0.3); margin: 0px;">'.$GLOBALS['de'].'</pre>';
?>

</body>
</html>