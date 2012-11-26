

<div id="map_canvas" class="largeMap"></div>
<style>

.iconMarker {
	padding: 3px;
}
.markerholdhidden{
	visibility:hidden;
}
</style>

<script type="text/javascript">
var uploadFiles = [];
$(document).ready(function() {
	marker = {};
	console.debug(window.map);
			  console.debug("TEST");
});
	</script>
    
<?php
if($app->view->postExists):
?>


<div id="postMarker" class="iconMarker markerholdhidden" rel="<?php echo $app->view->post->getLat(); ?>,<?php echo $app->view->post->getLon(); ?>">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><path fill="#000000" d="M46.619,8.526c-0.9-0.129-1.594-0.862-1.594-1.75c0-0.643,0.385-1.209,0.951-1.53  c-0.566-0.297-0.951-0.875-0.951-1.53c0-0.979,0.822-1.751,1.851-1.751h9.264c1.028,0,1.853,0.772,1.853,1.751  c0,0.682-0.387,1.248-0.979,1.53c0.566,0.31,0.979,0.861,0.979,1.53c0,0.888-0.669,1.621-1.57,1.737L67.64,37.372  c0.696,1.878,1.056,3.964,1.056,6.035v51.128c0,1.93-1.646,3.5-3.68,3.5H38.024c-2.06,0-3.679-1.57-3.679-3.5v-51.13  c0-2.071,0.334-4.155,1.028-6.033L46.619,8.526z"/></svg>
</div>



<h2><?php echo $app->view->post->getTitle(); ?></h2>
<?php echo $app->view->post->getBody(); ?>

<?php
else:
?>

	Sorry, we could not find that post.

<?php
endif;
?>