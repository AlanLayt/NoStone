var Map = function(){}
Map.prototype = {
	init : function(){
		var self = this;
		var holder = $('#map_canvas').get(0);
		if($('#map_canvas').get(0)){
			var map = this.makeMap(holder,0,0);
			
			this.getUserLocation(self.loc);
			
			document.addEventListener("locationRetrieved", function(e){
				e.detail.self.loc = e.detail.loc;
			},false);
			
			if(!$('#postMarker').get(0))
				document.addEventListener("locationRetrieved", function(e){
					map.setCenter(e.detail.loc);
				}, false);
			this.createMarkers();
			
			console.debug("Map Initialized");
		}
	},
	getUserLocation : function(loc){
		var event = new CustomEvent(
			"locationRetrieved",
			{
				detail: {
					loc: loc,
					self: this,
				},
				bubbles: true,
				cancelable: true
			}
		);
		
		navigator.geolocation.getCurrentPosition(
			function foundLocation(position)
			{
				var lat = position.coords.latitude;
				var lon = position.coords.longitude;
				loc = new google.maps.LatLng(lat, lon);
				event.detail.loc = loc;
				document.dispatchEvent(event);  
			},
			function noLocation(position)
			{
			}
		);
	},
	makeMap : function(holder,lat,long){
		var self = this;
		var layer = "watercolor";
		
		this.map = new google.maps.Map(holder, {
			center: new google.maps.LatLng(lat,long),
			zoom: 14,//14
			mapTypeId: layer,
			mapTypeControlOptions: {
				mapTypeIds: [layer]
			}
		});
		this.map.mapTypes.set(layer, new google.maps.StamenMapType(layer));
		return this.map;
	},
	createMarkers : function(map){
		var self = this;
		
		if($('#postMarker').get(0))
				self.markerFromEl($('#postMarker'));
		else 
			$('.iconMarker').each(function(index, element) {
				self.markerFromEl($(element));
			});
			
	},
	markerFromEl : function(el){
		var self = this;
		
		coords = el.attr('rel').split(',');
		markerEl = el.clone().removeClass('markerholdhidden').get(0);
		self.addMarker(coords[0],coords[1],markerEl);
		self.map.setCenter(new google.maps.LatLng(coords[0],coords[1]));
		
		
		document.addEventListener("locationRetrieved", function(e){
		//	console.debug(e.detail.loc);
		//	console.debug(self);
			
			console.debug(
			);
			var dist = 
				google.maps.geometry.spherical.computeDistanceBetween (
					e.detail.loc, 
					new google.maps.LatLng(coords[0],coords[1])
				);
			$("#distance").text((dist/1000).toFixed(2) + "km");
		}, false);
		
	},
	addMarker : function(lat,lon,content){
		this.marker = {};
		this.marker.obj = new RichMarker({
		  position: new google.maps.LatLng(lat,lon),
		  map: this.map,
		  draggable: false,
		  flat:true,
		  content: content
		});
	}
};
			





var map = new Map();

$(document).ready(function() {
	map.init();
	
	console.debug("Initialized");
});