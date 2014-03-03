var addfriends ;
//var h3s;
var i;


window.onload = function(){
	get_i();
}

function get_i(){

	var addfriends = document.getElementsByName("addfriend");
	//var h3s = document.getElementsByTagName("h3");
	for(i = 0; i < addfriends.length; i++)
	{
		
		//document.getElementsByName("addfriend")[i].onclick = to_add_friends;
	    addfriends[i].onclick = to_add_friends;
    }

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

function to_add_friends(event){
//	document.getElementsByName("addfriend")[i].disabled = true;//enabled = false;
	var parent = event.target.parentNode;
	var name = parent.childNodes[1].childNodes[0].childNodes[0].wholeText;
	event.target.disabled = true;
    var o = createXMLHttpRequest();//new an ajax object
	//alert(name);
	var url	= "index.php?rt=friend/add_friends&friendname=" + name;
	o.open("post",url,true);
	o.onreadystatechange = function(){
		if (o.readyState == 4){ //only the readystate is 4 can we get the value of xmlHttp.status
			if (o.status == 200){
				//alert(o.responseText);
			}
			else alert("error!\n\n"+o.responseText);
		}
	}
	o.send(null);//send requirement;
}
