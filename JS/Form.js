function init() {
	console.log("key: "+self.location.search);
	
	var param=self.location.search;
	console.log(param);
/* 	var latStart =param.indexOf("=")+1;
	console.log(latStart);
	var lonStart =param.indexOf(",")+1;
	console.log(lonStart);
	var lat =param.substring(latStart,lonStart-2); */
	var paramSplit = param.split(",");
	console.log("latitude: "+paramSplit[1]);
	console.log("longitude: "+paramSplit[2]);
	document.getElementById("lat").innerHTML=paramSplit[1];
	document.getElementById("lon").innerHTML=paramSplit[2];
	
}
function upload(){
	alert("still working on this");
}
function closeWin(){
	self.close(); 
}