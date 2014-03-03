window.onload = function(){
	document.getElementById("delete").onclick = to_delete;
}

function createXMLHttpRequest(){
	var xmlHttp;
	if(window.ActiveXObject){ //to dicide whether it is browsers of IE series
		xmlHttp = ActiveXObject("Microsoft.XMLHTTP");
	}
	else if (window.XMLHttpRequest){ // firefox or safari 
		xmlHttp = new XMLHttpRequest();
	}       
	return xmlHttp;
}

function to_delete(){
	var o = createXMLHttpRequest();//new an ajax object
	var name = document.getElementById("name");
	var url	= "index.php?rt=admin/manager&username=" + name.value;//url for require page register-manager.php
	o.open("post",url,true);
	o.onreadystatechange = function(){
		if (o.readyState == 4){ //only the readystate is 4 can we get the value of xmlHttp.status
			if (o.status == 200){
				alert("Done!");
				name.value = "";
			}
			else alert("error!\n\n"+o.responseText);
		}
	}
	o.send(null);//send requirement;
}