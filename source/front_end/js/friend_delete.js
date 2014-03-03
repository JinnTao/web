var deletefriends ;
var i;


window.onload = function(){
	get_i();
}

function get_i(){

	var deletefriends = document.getElementsByName("deletefriend");
	for(i = 0; i < deletefriends.length; i++)
	{
		deletefriends[i].onclick = to_delete_friends;
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

function to_delete_friends(event){
	var o = createXMLHttpRequest();//new an ajax object
	var parent = event.target.parentNode;
	var name = parent.childNodes[1].childNodes[0].childNodes[0].wholeText;
	event.target.disabled = true;
	var url	= "index.php?rt=friend/delete_friends&friendname=" + name;
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