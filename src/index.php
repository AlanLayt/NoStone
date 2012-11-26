<?php
$root = 'http://uni.sapphion.com/nostone/';
$root = 'http://127.0.0.1/Projects/Nostone/';
//$root = 'http://interaction.dundee.ac.uk/~alayt/sns/';
include_once('inc/classes.php');
$app = new App();
//phpinfo(INFO_ENVIRONMENT|INFO_VARIABLES);
?>
<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>nostone | the most materialistic network on the internet</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCidhJakWqVYzhILIHg1ug18KPHXfjkkcE&sensor=true&libraries=geometry" type="text/javascript"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
		var markers = [<?php
		
		foreach($app->icons as $icon)
			//echo ;
			echo '{name: \''.$icon[0].'\',svg: \''.str_replace(array("\n\r","\r","\n"),'',str_replace('%%w%%','32px',str_replace('%%h%%','32px',$icon[1]))).'\'},';
		
		?>];
	</script>
	<script src="<?php echo $root; ?>js/richmarker-compiled.js"></script>
	<script src="<?php echo $root; ?>js/Stamen.js" type="text/javascript"></script>
    <script src="<?php echo $root; ?>js/main.js"></script>
    <script src="<?php echo $root; ?>js/addpost.js"></script>
    
    <link rel="stylesheet" href="<?php echo $root; ?>css/mobile.css" media="only screen and (max-width: 400px)" />
	<link rel="stylesheet" href="<?php echo $root; ?>css/main.css"><!---->
	<link rel="stylesheet" href="<?php echo $root; ?>css/grid.css">
    
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" href="app-icon-64.png">
    <link rel="icon" href="app-icon-64.png" sizes="64x64">

	<style type="text/css" media="screen">
		body { margin: 0 0 0 0; }
		p {
			margin-top:-10px;
			color: #7f7063;
		}
	</style>
    
    
    
	<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
    </script>
    
<script> 
	$(document).ready(function(){ 
	  $("#panel").hide();
	  $("#flip").click(function(){
		$("#panel").slideToggle("slow");
	  });
	});
</script>   
</head>
<body onLoad="MM_preloadImages('<?php echo $root; ?>img/register_hover.png','<?php echo $root; ?>img/login_hover.png','<?php echo $root; ?>img/mapReveal_hover.png','<?php echo $root; ?>img/likes1_hover.png','<?php echo $root; ?>img/uncoverings_hover.png')">


<ul class="topBar">
    <div class="row">
    
    
        <div class="column grid_9">
	<?php
	//echo var_dump($_GET);
    if(!$app->user->loggedIn()):
	?>
            <li class="active"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('signup','','img/register_hover.png',1)"><img src="img/register.png" alt="sign-up" width="21" height="16" id="signup" class="reg"/>sign-up</a></li>
            <li><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('login','','img/login_hover.png',1)"><img src="img/login.png" alt="log-in" width="14" height="16" id="login" class="reg"/>log-in</a></li>
      <?php
	  echo '<div class="register">'.$app->loginForm().'</div>';
	  else:
	  ?>
      <div style="float:left;"><?php echo $app->user->getAvatar(''); ?>
      <?php echo '<a class="logout" href="'.$root.'?act=logout">logout</a>'; ?></div>
      
      <?php endif; ?>
    <?php
     //   echo '<div style="float:left;">' , $app->user->getAvatar('') , '</div>';
     //   echo '
    //    <div style="float:left;">
     //       <div>' , $app->user->getFirstName() , ' ' , $app->user->getLastName() , '</div>
    //        (' , $app->user->getUsername() , ' <a class="logout" href="'.$root.'?act=logout">logout</a>)
    //    </div>';
    //    echo '';
    
   // }
    //else
    //    echo '<div class="login" style="float:right">' , $app->loginForm() , '</div>';
    ?>
    
    
    
      </div>
        <div class="column grid_2">
        	<div class="search">
              <form>
                <input type="text" name="field-name-here" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Search':this.value;" value="Search" />
              </form>
            </div>
        </div>
       
    </div>    
</ul>


<div class="row">
	<div class="column grid_12">
    	<div class="logo">
          <a href="index.html">
             <img src="<?php echo $root; ?>img/logo.png" alt="nostone">
          </a> 	
        </div>    
  </div>
</div>

<div class="row">
	<div class="column grid_12">
        <ul id="nav">
          <li><a href="<?php echo $app->root; ?>">explore</a></li>
          <li><a href="<?php echo $app->root; ?>uncover/">uncover</a></li>
          <li><a href="<?php echo $app->root; ?>materials/">materials</a></li>
          <li><a href="<?php echo $app->root; ?>random/">random post</a></li>
		</ul>
    </div>
</div>

<!--<div class="mainContent">-->
<?php

	include_once $app->view->getTemplate();
	//echo $app->registerForm();
?>
<!--</div>-->




<div class="footer">
    <div class="column grid_12 imghold"><img src="<?php echo $app->root; ?>/img/footer.png" width="800" height="127" alt="footer" /></div>
</div>
<div class="cake">   
	<div class="footer">
        <div class="column grid_12">
            <div class="column grid_4">
           	  <h4>recent uncoverings</h4>
	<?php foreach(getRandomThumbs(8) as $key => $post): ?>
		<div class="column grid65px">
        	<a href="<?php echo $app->root.''.$post['uname'].'/post/'.$post['url']; ?>">
            	<img src="<?php echo $app->root . $post['file']; ?>" width="65" height="65" />
            </a>
       	</div>
	<?php endforeach; ?>
            </div>
            <div class="column grid_4Cus">
            	<h4>popular materials</h4>
            	<ul>
                	<li><a href="#">sea glass</a></li>
                    <li><a href="#">fish</a></li>
                    <li><a href="#">cake</a></li>
                	<li><a href="#">glass</a></li>
                    <li><a href="#">concrete</a></li>
                    <li><a href="#">lasagna</a></li>
                    <li><a href="#">wool</a></li>  
                	<li><a href="#">sea glass</a></li>
                    <li><a href="#">fish</a></li>
                    <li><a href="#">cake</a></li>
                	<li><a href="#">glass</a></li>
                    <li><a href="#">concrete</a></li>
                    <li><a href="#">lasagna</a></li>
                    <li><a href="#">wool</a></li>  
                	<li><a href="#">sea glass</a></li>
                    <li><a href="#">fish</a></li>
                    <li><a href="#">cake</a></li>
                	<li><a href="#">glass</a></li>
                    <li><a href="#">concrete</a></li>
                    <li><a href="#">lasagna</a></li>
                    <li><a href="#">wool</a></li>  
                	<li><a href="#">sea glass</a></li>
                    <li><a href="#">fish</a></li>
                    <li><a href="#">cake</a></li>
                	<li><a href="#">glass</a></li>
                    <li><a href="#">concrete</a></li>
                    <li><a href="#">lasagna</a></li>
                    <li><a href="#">wool</a></li>                                                             
                </ul>
            </div>
            <div class="column grid_4"><h4>about nostone</h4>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi ante enim, aliquam elementum cursus tincidunt, commodo id lectus. Donec ullamcorper mattis leo eu consequat. Praesent lacinia tincidunt laoreet. Donec vestibulum semper libero id posuere. Ut fermentum, ante sit amet lacinia adipiscing, nibh nisi suscipit nulla, non pretium massa metus feugiat sem.</div>
        </div>      
    </div>
</div>


<?php

echo '

<pre style="position:fixed;bottom:0;left:0;right:0;height: 150px; overflow-y:scroll; background:rgba(0,0,0,0.3); margin: 0px;">'.$GLOBALS['de'].'</pre>';
?>

</body>
</html>