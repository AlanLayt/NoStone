

<?php

if($app->user->loggedIn()):
?>



<div class="profContent">
	<div class="column grid_profile">
    	<div class="column grid_12">
        <div id="coverHolder" style="background-position:center center; background-size: cover; width: 780px; height: 180px;" > </div>
        </div>
    </div>
</div>


<form method="post" id="createPost">
<div class="pDetails">
	<div class="column">
		<ul id="pDetails">
          <li class="postDet"><!--<img src="<?php $app->root(); ?>img/PostDetails/meterial.png" width="21" height="21" alt="material" /><p class="miau">material</p><h5></h5>-->
          
            <select id="material" name="fancySelect" class="makeMeFancy">
                <option selected="selected" data-skip="1">Choose Your Product</option>
                <?php
                
                foreach($app->icons as $key => $icon)
                    echo '<option data-icon=\'' . str_replace(array("\n\r","\r","\n"),'',str_replace('%%w%%','21px',str_replace('%%h%%','21px',$icon[1]))) . '\' data-html-text="' . $icon[0] . '" value="'.$key.'">' . $icon[0] . '</option>';
                    
                ?>
            </select>
        </li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/distance.png" width="21" height="21" alt="distance" /><p class="miau">distance</p><h5 id="distance">unknown</h5></li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/likes.png" width="21" height="19" alt="likes" /><p class="miau">likes</p><h5>0</h5></li>
          <li class="postDet"><img src="<?php $app->root(); ?>img/PostDetails/comments.png" width="21" height="18" alt="comments" /><p class="miau">comments</p><h5>0</h5></li>
		</ul>
    </div>
</div>



<div class="mainContent">
    <div id="holder">   
        <div id="postContent">
            <input type="text" id="postTitle" placeholder="Post title" tabindex=1/>
            <div id="postURLHold"><?php echo $app->root.''.$app->user->d['uname'].'/post/'; ?><input type="text" id="postURL" placeholder="Post-url" /></div>
            <!--<p>
                <select name="material" id="msaterial">
                    <option>Please Select Material</option>
                    <?php
                    
                    foreach($app->icons as $key => $icon)
                        echo '<option value="'.$key.'">' . $icon[0] . '</option>';
                        
                    ?>
                 </select>
            </p>-->
            <textarea id="postBody" placeholder="Post Body" tabindex=2></textarea>
        </div>
        <div id="rightHolder">
            <div id="" class="mapHolder">
                <div id="map_canvas" class="mapHolder"></div>
            </div>
            <div id="galleryHolder">
                Click here/drag images to upload
                <input type="file" id="fileup" multiple />
            </div>
            <div id="galleryHolderImgs"></div>
        </div>
        
    
        <div id="editBarHold">
            <div id="editBar">
                <input type="submit" value="Publish!" class="publish" id="publish" />
                <!--<div id="publish" class="button">Publish!</div>-->
            </div>
        </div>
    </div>
</div>
</form>
<?php 
	else:
?>
Please log in to make a post
<?php 
	endif;
?>