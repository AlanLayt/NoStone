<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!--
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCidhJakWqVYzhILIHg1ug18KPHXfjkkcE&sensor=true" type="text/javascript"></script>
<script src="https://raw.github.com/AlanLayt/NoStone/JSlogin/src/js/Stamen.js" type="text/javascript"></script>
-->
<script type="text/javascript">
var uploadFiles = [];
$(document).ready(function() {
	firstImage = true;
	function handleFileSelect(evt) {
		evt.stopPropagation();
		evt.preventDefault();
	
		var files = evt.dataTransfer.files;
		
		
		for (var i = 0, f; f = files[i]; i++) {
			if(f.type.indexOf("image") !== -1)
			{
				uploadFiles.push(f);
				addFile(f);
			}
			else
				console.debug("This is not an image! :(");
		}
	  }
	
	  function handleDragOver(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
	  }
	  function addFile(f) {
			console.debug(f);
			   var URL = window.URL || window.webkitURL;  
			   var source = URL.createObjectURL(f);  
			   
				jQuery('<img/>', {
					class: 'galleryImg',
					src: source,
					title: 'Image',
				}).appendTo('#galleryHolderImgs');
				console.debug( source );
	  }
	
	$('#fileup').change(function(e){
	console.debug(this.files);
		for(var i=0,f;f=this.files[i];i++) {
			addFile(f);
		}
	});
	
	  // Setup the dnd listeners.
	  var dropZone = document.getElementById('galleryHolder');
	  dropZone.addEventListener('dragover', handleDragOver, false);
	  dropZone.addEventListener('drop', handleFileSelect, false);
	  
	  
	  
	$('#postTitle').keyup(function(e){
		console.debug(e);
		var preFix = 'http://something.com/Username/post/'
		$('#postURL').val($('#postTitle').val().replace(/\s/g, "-").toLowerCase());
	});
});








function makeMap(lat,long){
	var layer = "watercolor";
	window.map = new google.maps.Map(document.getElementById("mapHolder"), {
		center: new google.maps.LatLng(lat,long),
		zoom: 12,
		mapTypeId: layer,
		mapTypeControlOptions: {
			mapTypeIds: [layer]
		}
	});
	map.mapTypes.set(layer, new google.maps.StamenMapType(layer));
	
}
function initGeomap(init){
  
	navigator.geolocation.getCurrentPosition(foundLocation, noLocation);

	function foundLocation(position)
	{
		var lat = position.coords.latitude;
		var long = position.coords.longitude;
		makeMap(lat,long);
		init(map);
		console.debug("RUN");
	}
	function noLocation(position)
	{
		console.debug("Geolocation Failed");
		makeMap(56.46023203069261,-2.965253463818385);
		init(map);
		
	}

}

/*
var markers = [
	{
		name: paper,
		svg:
	},
	{
		name: books,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	},
	{
		name: paper,
		svg:
	}];
*/

var marker = {};
function initialize(){
	initGeomap(function(){
		images = new Array(
			{	
				img:"1.jpg",
				thumb:"1.jpg",
				pos: new google.maps.LatLng(56.46023203069261,-2.965253463818385)
			}
		);
		
		console.debug("Init");
		
		google.maps.event.addListener(map, 'click', function(e) {
			console.debug(e);
			console.debug(""+e.latLng.Ya+","+e.latLng.Za);
			
			if(marker.obj) {
				marker.obj.setMap(null);
			}
			
			marker.obj = new RichMarker({
			  position: e.latLng,
			  map: map,
			  draggable: false,
			  flat:true,
			  content: marker.icon
			  });
			
			/*
				marker.obj = new google.maps.Marker({
					position: e.latLng,
					map: map,
					title: 'Click to zoom',
					//imagesrc: c.img
				});*/
				//marker.setIcon(new google.maps.MarkerImage(c.img,new google.maps.Size(50,50)));
				google.maps.event.addListener(marker.obj, 'click', function(e) {
				//	$('content').set('html','<img src="'+marker.imagesrc+'">');
					marker.obj.setMap(null);
					marker.obj = null;
				});
			//}
			
		});
	
	});
}



function uploadImages(files){

	// Create a new HTTP requests, Form data item (data we will send to the server) and an empty string for the file paths.
	xhr = new XMLHttpRequest();
	data = new FormData();
	paths = "";
	
	// Set how to handle the response text from the server
	xhr.onreadystatechange = function(ev){
		console.debug(xhr.responseText);
	};
	
	// Loop through the file list
	for (var i in files){
		// Append the current file path to the paths variable (delimited by tripple hash signs - ###)
		paths += files[i].name+"###";
		// Append current file to our FormData with the index of i
		data.append(i, files[i]);
		console.debug(files[i]);
	};
	
	console.debug(marker.obj.position.Ya);
	
	data.append('lat', marker.obj.position.Ya);
	data.append('lon', marker.obj.position.Za);
	data.append('url', $('#postURL').val());
	data.append('mat', $('#material').val());
	data.append('title', $('#postTitle').val());
	data.append('body', $('#postBody').val());
	// Append the paths variable to our FormData to be sent to the server
	// Currently, As far as I know, HTTP requests do not natively carry the path data
	// So we must add it to the request manually.
	data.append('paths', paths);
	console.debug(data);		
		
	// Open and send HHTP requests to upload.php
	xhr.open('POST', "../ajax.php", true);
	xhr.send(this.data);
}


 $(document).ready(function() {
	 
	initialize();
	
		//console.debug("Publish");
	$('#publish').click(function(){
	
		console.debug("Publish");
		console.debug(uploadFiles);
		
		
		console.debug($('#postTitle').text());
		console.debug($('#postBody').text());
		
		
		
		uploadImages(uploadFiles);
	
	});
	
 });
</script>





<style>

#postTitle {
    font-size:30px;
	margin: 0 20px 0px 0;
	padding: 0 0 0 20px;
	font-weight:100;
	width: 460px;
}

#holder {
	padding:0;
	//background:#fff;
	text-align:left;
}

#postContent {
    float:left;
    width: 500px;
}

#postBody {
	width: 460px;
	height: 400px;
	max-width: 460px;
	min-height:100px;
	margin-right: 20px;
	padding: 10px;
	font-size:11px;
}

#postURL{
	width: 460px;
    font-size:12px;
	margin: 0 20px 20px 0;
	padding: 0 0 0 20px;
	font-weight:100;
	color:#999;
}

#postURL, #postTitle, #postBody {
	border:none;
	border-left: 10px solid rgba(0,0,0,0.1);
	background:none;
	font-family:Arial, Helvetica, sans-serif;
}
#postBody:Focus, #postTitle:Focus {
	outline: 1px solid #666;
}

#rightHolder {
	width: 250px;
    float:left;
}

#mapHolder {
    width:280px;
    height:260px;
    background:#333;
}

.iconMarker {
	padding: 3px;
}

#galleryHolder {
    width:250px;
    padding: 30px 10px 30px 10px;
    text-align:center;
    color:#999;
    margin: 10px 0 10px 0;
    border:5px dashed rgba(0,0,0,0.1);
    cursor: pointer;
    position:relative;
}
#galleryHolder:Hover {
    color:#666;
    border:5px dashed rgba(0,0,0,0.2);
}
#galleryHolderImgs{
    margin-top:20px;
}

.galleryImg {
    max-width: 100px;
}

#fileup {
    width:230px;
    text-align:center;
    color:#999;
    border:5px dashed rgba(0,0,0,0.1);
    cursor: pointer;
    background: #333;
    opacity:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    right:0;
}
#editBarHold {
	clear:both;
	padding-top:20px;
}
#editBar {
	border-top: 2px solid #ccc;
	padding: 20px 50px 10px 50px;
	//background: #333;
}

.button {
	padding: 5px 20px 5px 20px;
	background: #E5E5E5;
	border: 1px solid #858585;
	float:left;
	cursor:pointer;
}
.button:Hover {
	background:#CACACA;
}


</style>



<div id="holder">   
<?php
if($app->user->loggedIn()):
?>
    <form>
        <div id="postContent">
            <input type="text" id="postTitle" placeholder="Post title" />
            <input type="text" id="postURL" placeholder="Post-url" />
            <p>
                <select name="material" id="material">
                    <option>Please Select Material</option>
                    <option value="0">paper</option>
                    <option value="1">books </option>
                    <option value="2">metal</option>
                    <option value="3">seeds and nuts</option>
                    <option value="4">recycled fabric</option>
                    <option value="5">seaside</option>
                    <option value="6">glass</option>
                    <option value="7">wood</option>
                    <option value="8">natural</option>
                    <option value="9">stone</option>
                    <option value="10">plastic</option>
                 </select>
         	</p>
            <textarea id="postBody" placeholder="Post Body"></textarea>
        </div>
        <div id="rightHolder">
            <div id="mapHolder">
            </div>
            <div id="galleryHolder">
                Click here/drag images to upload
                <div id="galleryHolderImgs"></div>
                        <input type="file" id="fileup">
            </div>
        </div>
        
    
        <div id="editBarHold">
            <div id="editBar">
                <div id="publish" class="button">Publish!</div>
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
</div>



