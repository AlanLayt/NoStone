<?php

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

	if(isset($_GET['pass'])){
		$pwSalt = 'hogwaRts';
		echo sha1($pwSalt.$_GET['pass']);
	}

?>

<form>
	<input name="pass" type="password" \>
</form>

</body>
</html>