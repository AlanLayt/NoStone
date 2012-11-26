var Post = function(){}
Post.prototype = {
	init : function(map){
		console.debug("Creating post");
		this.fileDropZone = $('#galleryHolder').get(0);
		this.uploadFiles = [];
		this.marker = {};
		this.mapWrap = map;
		this.map = map.map;
		this.featured = '';
		
		this.buildEvents();
	},
	
	updateMarker : function(){
		if(this.marker.obj)
		this.marker.obj.setContent(markers[$('#material').val()].svg);
	},
	
	buildEvents : function(){
		var self = this;
		
		
		$('#fileup').change(function(e){
			self.addFiles(this.files);
		});
		$('#postTitle').keyup(function(e){
			$('#postURL').val($('#postTitle').val().replace(/\s/g, "-").toLowerCase());
		});
	
		google.maps.event.addListener(self.map, 'click', function(e) {
			console.debug("Setting postition");
			self.setPosition(e);
		});
		$('#createPost').submit(function(e){
			e.stopPropagation();
			e.preventDefault();
			self.publishPost();
		});
		
		$('#postURLHold').click(function(){
			$('#postURL').focus();
		});
		
		$('#postURL').focus(function(){
			$('#postURLHold').css('outline','1px solid #666');
		}).blur(function(){
			$('#postURLHold').css('outline','none');
		});
		
		
		self.fileDropZone.addEventListener('dragover', self.handleDragOver, false);
		//self.fileDropZone.addEventListener('drop', self.handleFileSelect, false);
		$(self.fileDropZone).bind('drop', {self:self}, self.handleFileSelect);
	},
	
	publishPost : function(){
		var self = this,
		xhr = new XMLHttpRequest(),
		data = new FormData(),
		files = self.uploadFiles,
		position;
		
		xhr.onreadystatechange = function(ev){
			console.debug(xhr.responseText);
			if (xhr.readyState==4 && xhr.status==200){
				var result = JSON.parse(xhr.responseText);
				if(result.post.state==1){
					alert('Post Complete!');
				}
			}
		};
		
		if(self.marker.obj==null || self.marker.obj==undefined){
			console.debug("Location not set");
			return false;
		}
		else
			position = self.marker.obj.position;
			
			
		
		for (var i in files){
			data.append(i, files[i]);
			console.debug(files[i]);
		};
		
		console.debug(position.Ya);
		
		if(position.Ya != undefined){
			data.append('lat', position.Ya);
			data.append('lon', position.Za);
		}
		else{
			data.append('lat', position.$a);
			data.append('lon', position.ab);
		}
		
		
		data.append('url', $('#postURL').val());
		data.append('mat', $('#material').val());
		data.append('title', $('#postTitle').val());
		data.append('body', $('#postBody').val());
		data.append('featured', this.featured);
		
		console.debug(data);		
			
		xhr.open('POST', "../ajax.php", true);
		xhr.send(data);
	},
	
	setPosition : function(e){
		var self = this;
		if($('#material').val()>=0&&$('#material').val()<=markers.length){
			console.debug(""+e.latLng.Ya+","+e.latLng.Za);
			console.debug(""+e.latLng.$a+","+e.latLng.ab);
			
			if(self.marker.obj) {
				self.marker.obj.setMap(null);
			}
			console.debug("location:");
			console.debug(self.mapWrap);
			var dist = 
				google.maps.geometry.spherical.computeDistanceBetween (
					self.mapWrap.loc, 
					e.latLng
				);
				console.debug(dist);
			$("#distance").text((dist/1000).toFixed(2) + "km");
			
			self.marker.obj = new RichMarker({
			  position: e.latLng,
			  map: self.map,
			  draggable: true,
			  flat:true,
			  content: markers[$('#material').val()].svg
			});
		}
		else
			console.debug("Please select a material!");
	},
	
	handleDragOver : function(evt) {
		evt.stopPropagation();
		evt.preventDefault();
		evt.dataTransfer.dropEffect = 'copy';
	},
	
	handleFileSelect : function(evt) {
		console.debug(evt);
		evt.stopPropagation();
		evt.preventDefault();
		evt.data.self.addFiles(evt.originalEvent.dataTransfer.files);
	},
	
	addFiles : function(files){
		for(var i=0,f;f=files[i];i++) {
			if(f.type.indexOf("image") !== -1){
				this.addFile(f);
			}
		}
	},
	
	setFeatured : function(fileName,source) {
		this.featured = fileName;
		console.debug($('#coverHolder'));
		$('#coverHolder').css('background-image',source);
		$('#coverHolder').css({
			'background' : 'url('+source+')',
			'background-size' : 'cover',
			'background-position' : 'center center'
		});
	},
	
	addFile : function(f) {
		var self = this;
		console.debug(f);
		var URL = window.URL || window.webkitURL;  
		var source = URL.createObjectURL(f); 
		self.uploadFiles.push(f); 
		
		//console.debug(f);
		
		jQuery('<div/>', {
			class: 'column grid_2',
			title: 'Image',
			style: 'background-image: url('+source+'); background-position:center center; background-size: cover; width: 130px; height: 130px;'
		}).appendTo('#galleryHolderImgs').click(function(){ $(this).css('box-shadow','inset 1px 1px 1px #000'); self.setFeatured(f.name,source); });
		
		console.debug( source );
	}
}

 $(document).ready(function() {
	 
	//initialize();
	if($('#createPost').get(0)){
		var post = new Post();
		post.init(map);
	}
	
	
	var select = $('select.makeMeFancy');

	var selectBoxContainer = $('<div>',{
		width		: select.outerWidth(),
		class	: 'tzSelect',
		html		: '<div class="selectBox"><img src="http://uni.sapphion.com/nostone/img/PostDetails/meterial.png"> Select Material</div>'
	});

	var dropDown = $('<ul>',{class:'dropDown'});
	var selectBox = selectBoxContainer.find('.selectBox');
	
	select.find('option').each(function(i){
		var option = $(this);

		if(i==select.attr('selectedIndex')){
			selectBox.html(option.text());
		}
		if(option.data('skip')){
			return true;
		}
		var li = $('<li>',{
			html:	option.data('icon') + ' &nbsp;'+
					option.data('html-text')+''
		});

		li.click(function(){

			selectBox.html(option.data('icon')+' material <h5>'+option.text()+'</h5>');
			dropDown.trigger('hide');

			// When a click occurs, we are also reflecting
			// the change on the original select element:
			select.val(option.val());
			post.updateMarker();

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