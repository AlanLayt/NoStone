
<div class="holder">
	<?php foreach($app->icons as $icon):?>
    
        <div class="tile">
            <?php 
                echo str_replace(array("\n\r","\r","\n"),'',str_replace('%%w%%','65px',str_replace('%%h%%','65px',$icon[1]))); 
            ?>
        <br/> 
            <?php echo $icon[0]; ?>
        </div>
        
     <?php endforeach; ?>
</div>