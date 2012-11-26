window.map;
function makeMap(lat,long){
	var layer = "watercolor";
	window.map = new google.maps.Map(document.getElementById("map_canvas"), {
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
	}
	function noLocation(position)
	{
		
	}

}



function initialize(){
	initGeomap(function(){
		marker = {};
		
		console.debug(window.map);
		coords = $('#postMarker').attr('rel').split(',');
		
		if($('#postMarker')){
			markerEl = $('#postMarker').clone();
		console.debug(markerEl);
			markerEl = markerEl.removeClass('markerholdhidden').get(0);
			
			marker.obj = new RichMarker({
			  position: new google.maps.LatLng(coords[0],coords[1]),//e.latLng,
			  map: window.map,
			  draggable: false,
			  flat:true,
			  content: markerEl
			  });
		}
		
		
		console.debug("Init");
		
		/*google.maps.event.addListener(map, 'click', function(e) {
			console.debug(e);
			console.debug(""+e.latLng.Ya+","+e.latLng.Za);
			
		});*/
	
	});
}






 $(document).ready(function() {
	 
	initialize();
	console.debug("Initialized");
	
	/*$('map_canvas').addEvent('click',function(c){
		
		this.toggleClass('largeMap');
		this.toggleClass('smallMap');
		
	});*/
});