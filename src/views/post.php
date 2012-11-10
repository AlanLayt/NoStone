

<div id="map_canvas" class="largeMap"></div>

<?php
if($app->view->postExists):
?>

<h2><?php echo $app->view->post->getTitle(); ?></h2>
<?php echo $app->view->post->getBody(); ?>

<?php
else:
?>

	Sorry, we could not find that post.

<?php
endif;
?>