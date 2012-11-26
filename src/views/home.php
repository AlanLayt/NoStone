<?php
    if(!$app->user->loggedIn())
		echo $app->registerForm();
		
?>

<div class="welcomeMessage">
  <div class="column grid_welcome">
    <h6>
    Quisque sed aliquam nulla. Aliquam scelerisque pharetra augue, quis feugiat mi posuere eget. Sed dictum elit eu nunc blandit pretium. Duis dignissim purus id turpis tempus elementum.
    </h2>
  </div>
</div>
<div class="mainContent">

  <div class="column grid_profileMenu">
    <div class="profileMenu">
      <ul class="profileMenu">
        <li class="active"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('uncoverings','','img/uncoverings_hover.png',1)"><img src="img/uncoverings.png" alt="uncoverings" width="10" height="25" id="uncoverings" /> most recent</a></li>
        <li class="active"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('likes','','img/likes1_hover.png',1)"><img src="img/likes1.png" width="14" height="25" id="likes" /> popular</a></li>
      </ul>
    </div>
  </div>
  <div class="column grid_2">
    <div id="flip"> <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('mapReveal','','img/mapReveal_hover.png',1)"><img src="img/mapReveal.png" alt="Reveal Map" width="28" height="25" id="mapReveal" /></a> </div>
  </div>
  <div class="wrapper">
  

<?php foreach(getRandomThumbs(20) as $key => $post): ?>
    <div class="iconMarker markerholdhidden" rel="<?php echo $post['lat']; ?>,<?php echo $post['lon']; ?>">
    <a href="<?php echo $app->root.''.$post['uname'].'/post/'.$post['url']; ?>">
   		<?php echo str_replace(array("\n\r","\r","\n"),'',str_replace('%%w%%','32px',str_replace('%%h%%','32px',$app->icons[$post['material']][1]))); ?>
        </a>
    </div>
<?php endforeach; ?>
<div id="map_canvas" class="largeMap"></div>


    
	<?php $numofLarge = 0; foreach(getRandomThumbs(20) as $key => $post): ?>
		<?php if((($key-$numofLarge) %4 == 0) && $key!=0):?>
        </div>
        <?php endif; ?>
        <?php if((($key-$numofLarge) %4 == 0) || $key==0):?>
        <div class="square">
        <?php endif; ?>
		<?php if(($key %4 == 0) && (rand(0,3)==1)): //(($key==4)):$numofLarge++;//if(($key-1 %4 == 0) && (rand(0,1)==1)): ?>
                <div class="tile double" style="background-image: url(<?php echo $post['file']; ?>); background-position:center center; background-size: cover;">
                    <div style="opacity: 0; float:left; z-index:1000;" class="fdw-background">
                        <p> Quisque in porttitor metus. Nullam sed nulla quis neque accumsan tempus non quis ipsum. Aliquam arcu ipsum, congue et tincidunt maecenas eu enim risus. Mauris vitae massa... </p>
                        <a href="<?php echo $app->root.''.$post['uname'].'/post/'.urlencode($post['url']); ?>">view</a>
                    </div>
                </div>
        <?php else: ?>
            <div class="tile single" style="background-image: url(<?php echo $post['file']; ?>); background-position:center center; background-size: cover;">
                <div style="opacity: 0; float:left; z-index:1000; " class="fdw-background">
                    <p> <span><?php echo $post['body']; ?></span></p>
                    <a href="<?php echo $app->root.''.$post['uname'].'/post/'.urlencode($post['url']); ?>">view</a> 
                </div>
           	</div>
        <?php endif; ?><?php //echo $key . " - " . ($key+$numofLarge) %4; ?>
	<?php endforeach; ?>
  
  	</div>
  </div>
</div>
