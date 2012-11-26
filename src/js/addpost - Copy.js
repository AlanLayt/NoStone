var Post = function(){}
Post.prototype = {
	init : function(){
		console.debug("Creating post");
	}
}


var uploadFiles = [];
marker = {};

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
			   
       // var el = '<div class="column grid_2" style=""> </div>';
		//el.appendTo('#galleryHolderImgs');
				jQuery('<div/>', {
					class: 'column grid_2',
					//src: source,
					title: 'Image',
					style: 'background-image: url('+source+'); background-position:center center; background-size: cover; width: 130px; height: 130px;'
				}).appendTo('#galleryHolderImgs');
				console.debug( source );
	  }
	
	$('#fileup').change(function(e){
	console.debug(this.files);
		for(var i=0,f;f=this.files[i];i++) {
			if(f.type.indexOf("image") !== -1){
				uploadFiles.push(f);
				addFile(f);
			}
			else
				console.debug("This is not an image! :(");
		}
	});
	
//$(window).bind('paste',function(e)
	  // Setup the dnd listeners.
	  var dropZone = document.getElementById('galleryHolder');
	  dropZone.addEventListener('dragover', handleDragOver, false);
	  dropZone.addEventListener('drop', handleFileSelect, false);
	  
	  
	  
	$('#postTitle').keyup(function(e){
		console.debug(e);
		var preFix = 'http://something.com/Username/post/'
		$('#postURL').val($('#postTitle').val().replace(/\s/g, "-").toLowerCase());
	});
	
	
		google.maps.event.addListener(map, 'click', function(e) {
			if($('#material').val()>=0&&$('#material').val()<=markers.length){
				//console.debug($('#material').val()>=0&&$('#material').val()<=markers.length);
				//console.debug("Test");
				//console.debug(e);
				console.debug(""+e.latLng.Ya+","+e.latLng.Za);
				console.debug(""+e.latLng.$a+","+e.latLng.ab);
				
				if(marker.obj) {
					marker.obj.setMap(null);
				}
				
				marker.obj = new RichMarker({
				  position: e.latLng,
				  map: map,
				  draggable: true,
				  flat:true,
				  content: markers[$('#material').val()].svg
				});
			}
			else
				console.debug("Please select a location!");
		});
	

});



	

/*


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
			console.debug(""+e.latLng.$a+","+e.latLng.ab);
			
			if(marker.obj) {
				marker.obj.setMap(null);
			}
			
			marker.obj = new RichMarker({
			  position: e.latLng,
			  map: map,
			  draggable: true,
			  flat:true,
			  content: markers[$('#material').val()].svg
			  });
			
				//marker.setIcon(new google.maps.MarkerImage(c.img,new google.maps.Size(50,50)));
				google.maps.event.addListener(marker.obj, 'click', function(e) {
				//	$('content').set('html','<img src="'+marker.imagesrc+'">');
					marker.obj.setMap(null);
					marker.obj = null;
				});
			//}
			
		});
	
	});
}*/



function uploadImages(files){

	// Create a new HTTP requests, Form data item (data we will send to the server) and an empty string for the file paths.
	xhr = new XMLHttpRequest();
	data = new FormData();
	paths = "";
	
	// Set how to handle the response text from the server
	xhr.onreadystatechange = function(ev){
		console.debug(xhr.responseText);
  		if (xhr.readyState==4 && xhr.status==200){
			var result = eval(xhr.responseText);
			if(result[0].success){
				
				alert('Post Complete!');
				
			}
		}
	};
	
	
	for (var i in files){
		paths += files[i].name+"###";
		data.append(i, files[i]);
		console.debug(files[i]);
	};
	
	console.debug(marker.obj.position.Ya);
	
	if(marker.obj.position.Ya != undefined){
		data.append('lat', marker.obj.position.Ya);
		data.append('lon', marker.obj.position.Za);
	}
	else{
		data.append('lat', marker.obj.position.$a);
		data.append('lon', marker.obj.position.ab);
	}
	
	
	data.append('url', $('#postURL').val());
	data.append('mat', $('#material').val());
	data.append('title', $('#postTitle').val());
	data.append('body', $('#postBody').val());
	data.append('paths', paths);
	console.debug(data);		
		
	xhr.open('POST', "../ajax.php", true);
	xhr.send(data);
}


 $(document).ready(function() {
	 
	//initialize();
	var post = new Post();
	post.init();
	
		//console.debug("Publish");
	$('#publish').click(function(){
	
		console.debug("Publish");
		console.debug(uploadFiles);
		
		
		console.debug($('#postTitle').text());
		console.debug($('#postBody').text());
		
		
		
		uploadImages(uploadFiles);
	
	});
	
	$('#postURLHold').click(function(){
		$('#postURL').focus();
	});
	$('#postURL').focus(function(){
		$('#postURLHold').css('outline','1px solid #666');
	}).blur(function(){
		$('#postURLHold').css('outline','none');
	});

	
 });
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 $(document).ready(function(){

	// The select element to be replaced:
	var select = $('select.makeMeFancy');

	var selectBoxContainer = $('<div>',{
		width		: select.outerWidth(),
		class	: 'tzSelect',
		html		: '<div class="selectBox"><img src="http://127.0.0.1/Projects/Nostone/img/PostDetails/meterial.png"> Select Material</div>'
	});

	var dropDown = $('<ul>',{class:'dropDown'});
	var selectBox = selectBoxContainer.find('.selectBox');

	// Looping though the options of the original select element

	select.find('option').each(function(i){
		var option = $(this);

		if(i==select.attr('selectedIndex')){
			selectBox.html(option.text());
		}

		// As of jQuery 1.4.3 we can access HTML5
		// data attributes with the data() method.

		if(option.data('skip')){
			return true;
		}

		// Creating a dropdown item according to the
		// data-icon and data-html-text HTML5 attributes:

		var li = $('<li>',{
			html:	option.data('icon') + ' &nbsp;'+
					option.data('html-text')+''
		});

		li.click(function(){

			selectBox.html(option.data('icon')+' '+option.text());
			dropDown.trigger('hide');

			// When a click occurs, we are also reflecting
			// the change on the original select element:
			select.val(option.val());

			return false;
		});

		dropDown.append(li);
	});

	selectBoxContainer.append(dropDown.hide());
	select.hide().after(selectBoxContainer);

	// Binding custom show and hide events on the dropDown:

	dropDown.bind('show',function(){

		if(dropDown.is(':animated')){
			return false;
		}

		selectBox.addClass('expanded');
		dropDown.slideDown();

	}).bind('hide',function(){

		if(dropDown.is(':animated')){
			return false;
		}

		selectBox.removeClass('expanded');
		dropDown.slideUp();

	}).bind('toggle',function(){
		if(selectBox.hasClass('expanded')){
			dropDown.trigger('hide');
		}
		else dropDown.trigger('show');
	});

	selectBox.click(function(){
		dropDown.trigger('toggle');
		return false;
	});

	// If we click anywhere on the page, while the
	// dropdown is shown, it is going to be hidden:

	$(document).click(function(){
		dropDown.trigger('hide');
	});
});