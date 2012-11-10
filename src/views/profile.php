
<?php
if($app->view->userExists):
?>

	<?php echo $app->view->user->getAvatar(''); ?>
    
    User <?php echo $app->view->user->getUsername(); ?>'s profile.

<?php
else:
?>

	Sorry, we could not find that user.

<?php
endif;
?>