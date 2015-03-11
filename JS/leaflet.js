// JavaScript Document
function init() {
               
	var map = L.map('map').setView([49.077689,-117.799186], 15);
	L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
	'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
	'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'examples.map-i875mjb7'
	}).addTo(map);
	var geojsonLayer = new L.GeoJSON.AJAX("Hello_GeoJSON2.php",{onEachFeature:popUp}).addTo(map);
	map.doubleClickZoom.disable(); 
	map.on('dblclick', onMapClick);


}

/* function popUp(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        //console.log(out.join()+ "<br /><img src='image/dog1.jpg' style='width:304px;height:228px'>");
        l.bindPopup(out.join()+ "<br /><img src='image/dog1.jpg' style='width:304px;height:228px'>");
        //l.bindPopup("dog1<br /><img src='image/dog1.jpg' style='width:304px;height:228px'>");
    }
} */
function popUp(f,l){
    var out = [];
	var URL;
	var popMsg;
    if (f.properties){
        for(key in f.properties){
			if(key=="URL")URL =f.properties[key];
			//else out.push(key+": "+f.properties[key]);
			else out.push(f.properties[key]);
        }
		popMsg="<img src='image/" + URL +"' style='width:304px;height:228px'>";
		popMsg += "<br><br>";
		popMsg += out;
		l.bindPopup(popMsg);
		
        //console.log(out.join()+ "<br /><img src='image/dog1.jpg' style='width:304px;height:228px'>");
        //l.bindPopup(out.join()+ "<br /><img src='image/" + URL +"' style='width:304px;height:228px'>");
        //l.bindPopup("dog1<br /><img src='image/dog1.jpg' style='width:304px;height:228px'>");
    }
}
function openForm(){
	window.open("Hello_Form.htm?name=john", "New Dog Incident", "width=300, height=500, location=no");  
}
function onMapClick(e) {
    //alert("You clicked the map at " + e.latlng);
	window.open("Hello_Form1.htm?loc=,"+e.latlng.lat+","+e.latlng.lng, "New Dog Incident", "width=300, height=500, location=no");
}
function showMsg(){
	document.getElementById("but1").innerHTML="Double Click Incident Location on Map"
}
function hideMsg(){
	document.getElementById("but1").innerHTML="Add Incident"
}
