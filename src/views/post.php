

<style>

.iconMarker {
	padding: 3px;
}
.markerholdhidden{
	visibility:hidden;
}


.profContent {
	width: 800px;
	margin: 0 auto;
	overflow: hidden;
}
.profContent .profContent {
	margin: 0 -5px;
	width: auto;
	display: inline-block;
}
.mainContent {
	background-color: #d6d6d6;
	width: 780px;
	margin: 0 auto;
	overflow: hidden;
	margin-top: 10px;
	border: 10px solid #d6d6d6;
	margin-top: 20px;
	margin-bottom: 50px;
}
.mainContent .mainContent {
	margin: 0 -5px;
	width: auto;
	display: inline-block;
}
</style>

    
<?php
if($app->view->postExists):
?>


<div id="postMarker" class="iconMarker markerholdhidden" rel="<?php echo $app->view->post->getLat(); ?>,<?php echo $app->view->post->getLon(); ?>">
<?php echo $app->view->post->getMatSVG(50); ?>
</div>
<!--
<div id="map_canvas" class="largeMap"></div>


<h2><?php echo $app->view->post->getTitle(); ?></h2>
<?php echo $app->view->post->getBody(); ?>
-->

<div class="profContent">
	<div class="column grid_profile">
    	<div class="column grid_12">
        <?php foreach($app->view->post->getImages() as $image){
			if($image['cover']==1)
				echo '<div style="background-image: url(' . $app->root . $image['file'] . '); background-position:center center; background-size: cover; width: 780px; height: 180px;" > </div>';
				//echo '<img src="' . $app->root . $image['file'] . '" width="780" height="180" />';
		}
		?>
        </div>
    </div>
</div>

<div class="pDetails">
	<div class="column grid_12">
		<ul id="pDetails">
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/meterial.png" width="21" height="21" alt="material" /><p class="miau">material</p><h5><?php echo $app->view->post->getMatName(); ?></h5></li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/distance.png" width="21" height="21" alt="distance" /><p class="miau">distance</p><h5 id="distance">???</h5></li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/likes.png" width="21" height="19" alt="likes" /><p class="miau">likes</p><h5>???</h5></li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/comments.png" width="21" height="18" alt="comments" /><p class="miau">comments</p><h5>???</h5></li>
		</ul>
    </div>
</div>






<div class="mainContent">
	<div class="column grid_390px">
    <div class="column grid65px"><img src="<?php $app->root(); ?>img/profile_pic.png" width="45" height="45" /></div>
    <h7><?php echo $app->view->post->getTitle(); ?></h7><br />
    <h8>posted by <b><?php echo $app->view->post->getUserName(); ?></b> on <b><?php echo $app->view->post->getDate(); ?></b></h8>
    <p class="post"><?php echo $app->view->post->getBody(); ?></p>
    
    </div>
    <div class="column grid_390px">
    	<div class="smallMap" id="map_canvas"></div>
        
        <?php foreach($app->view->post->getImages() as $image): ?>
        <!--<div class="column grid_2"><img src="<?php $app->root(); echo $image['file']; ?>" width="130" height="130" class="gallery"/></div>-->
        <div class="column grid_2" style="background-image: url(<?php $app->root(); echo $image['file']; ?>); background-position:center center; background-size: cover; width: 130px; height: 130px;"> </div>
        <?php endforeach; ?>
   </div>
</div> 



<?php
else:
?>

	Sorry, we could not find that post.

<?php
endif;
?>