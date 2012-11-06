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
		images = new Array(
			{	
				img:"1.jpg",
				thumb:"1.jpg",
				pos: new google.maps.LatLng(56.46023203069261,-2.965253463818385)
			}
			);
			
		images.each(function(c){
			console.debug(c.pos);
			var marker = new google.maps.Marker({
				position: c.pos,
				map: map,
				title: 'Click to zoom',
				imagesrc: c.img
			});
			//marker.setIcon(new google.maps.MarkerImage(c.img,new google.maps.Size(50,50)));
			google.maps.event.addListener(marker, 'click', function(e) {
				$('content').set('html','<img src="'+marker.imagesrc+'">');
			});
		});
		
		console.debug("Init");
		
		google.maps.event.addListener(map, 'click', function(e) {
			console.debug(e);
			console.debug(""+e.latLng.Ya+","+e.latLng.Za);
			
		});
	
	});
}


window.addEvent('domready',function(){
	
	//initialize();
	console.debug("Initialized");
	
});