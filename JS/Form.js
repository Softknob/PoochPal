function init() {
	console.log("key: "+self.location.search);
	
	var param=self.location.search;
	console.log(param);
	
	//set time stamp
	var now=new Date();
	var dateNow= now.getYear();
	dateNow+=1900;
	dateNow+="-"+(now.getMonth()+1);
	dateNow+="-"+now.getDate();
	dateNow+=" "+now.getHours();
	dateNow+=":"+now.getMinutes();
	dateNow+=":"+now.getSeconds();
	//set coordinates
	var paramSplit = param.split(",");
	console.log("latitude: "+paramSplit[1]);
	console.log("longitude: "+paramSplit[2]);
	console.log("Date/time: "+dateNow);
	
	//set Hidden values on form
	document.getElementById("lat").value=paramSplit[1];
	document.getElementById("lon").value=paramSplit[2];
	document.getElementById("time").value=dateNow;

	
}


function closeWin(){
	self.close(); 
}