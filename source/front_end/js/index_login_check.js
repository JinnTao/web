

window.onload = function(){
	document.getElementById("check").onclick = to_check_uname_and_pwd;
	document.getElementById("name").onfocus = wanring1Prohibited;
	document.getElementById("pwd").onfocus = wanring1Prohibited;
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

function to_check_uname_and_pwd(){
	var o = createXMLHttpRequest();//new an ajax object
	var name = document.getElementById("name").value;
	var pwd = document.getElementById("pwd").value;
	var url	= "index.php?rt=index/login_logout_manager&logusername=" + name + "&logpwd=" + pwd;
	o.open("post",url,true);
	o.onreadystatechange = function(){
		if (o.readyState == 4){ //only the readystate is 4 can we get the value of xmlHttp.status
			if (o.status == 200){
				var check = o.responseText;
				if (check == true){
					window.location.href = "index.php?rt=user";
				}
				else{
					document.getElementById("warn").style.visibility = "visible";
				}
			}
			else alert("error!\n\n"+o.responseText);
		}
	}
	o.send(null);//send requirement;
}

function wanring1Prohibited(){
	document.getElementById("warn").style.visibility = "hidden";
}
