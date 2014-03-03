
window.onload = function(){
	addNewFriends();
	joinGroups();
	acceptGroupMember();
	rejectFriend();
	rejectMember();
	ignoreMsgs();
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

function send(url){
	var o = createXMLHttpRequest();//new an ajax object
	o.open("post",url,true);
	o.onreadystatechange = function(){
		if (o.readyState == 4){ //only the readystate is 4 can we get the value of xmlHttp.status
			if (o.status == 200){
				//o.responseText;
				alert("Done!");
			}
			else alert("error!\n\n"+o.responseText);
		}
	}
	o.send(null);//send requirement;
}

function addNewFriends(){
	var add = document.getElementsByClassName("new_friends");
	for(var i = 0; i < add.length; i ++)
		add[i].onclick = _add;
}

function joinGroups(){
	var join =  document.getElementsByClassName("join_group");
	for(var i = 0; i < join.length; i ++)
		join[i].onclick = _join;
}

function acceptGroupMember(){
	var add_member = document.getElementsByClassName("add_group_member");
	for(var i = 0; i < add_member.length; i ++)
		add_member[i].onclick = _accept;
}

function rejectFriend(){
	var rej_friend = document.getElementsByClassName("reject_friend");
	for(var i = 0; i < rej_friend.length; i ++)
		rej_friend[i].onclick = _rej_f;
}

function rejectMember(){
	var rej_member = document.getElementsByClassName("reject_member");
	for(var i = 0; i < rej_member.length; i ++)
		rej_member[i].onclick = _rej_m;
}

function ignoreMsgs(){
	var ig = document.getElementsByClassName("ignore");
	for(var i = 0; i < ig.length; i ++)
		ig[i].onclick = _ig;
}

function _add(event){
	var para = event.target.value;
	var paras = para.split("/");
	var stranger = paras[0];
	var mid = paras[1];
	var url	= "index.php?rt=user/news_manager&action=1&stranger=" + stranger + "&mid=" + mid;
	send(url);
	event.target.parentNode.style.color = "#666666";
	event.target.disabled = true;
	event.target.nextSibling.nextSibling.disabled = true;
}

function _join(event){
	var para = event.target.value;
	var paras = para.split("/");
	var group = paras[0];
	var mid = paras[1];
	var url = "index.php?rt=user/news_manager&action=2&group=" + group + "&mid=" + mid;
	send(url);
	event.target.parentNode.style.color = "#666666";
	event.target.disabled = true;
	event.target.nextSibling.nextSibling.disabled = true;
}

function _accept(event){
	var para = event.target.value;
	var paras = para.split("/");
	var user = paras[0];
	var group = paras[1];
	var mid = paras[2];
	var url	= "index.php?rt=user/news_manager&action=3&group=" 
						+ group + "&user=" + user + "&mid=" + mid;
	send(url);
	event.target.parentNode.style.color = "#666666";
	event.target.disabled = true;
	event.target.nextSibling.nextSibling.disabled = true;
}

function _rej_f(event){
	var para = event.target.value;
	var paras = para.split("/");
	var stranger = paras[0];
	var mid = paras[1];
	var url	= "index.php?rt=user/news_manager&action=4&stranger=" + stranger + "&mid=" + mid;
	send(url);
	event.target.parentNode.style.color = "#666666";
	event.target.disabled = true;
	event.target.previousSibling.previousSibling.disabled = true;
}

function _rej_m(event){
	var para = event.target.value;
	var paras = para.split("/");
	var user = paras[0];
	var group = paras[1];
	var mid = paras[2];
	var url	= "index.php?rt=user/news_manager&action=5&group=" 
						+ group + "&user=" + user + "&mid=" + mid;
	send(url);
	event.target.parentNode.style.color = "#666666";
	event.target.disabled = true;
	event.target.previousSibling.previousSibling.disabled = true;
}

function _ig(event){
	var mid = event.target.value;
	var url	= "index.php?rt=user/news_manager&action=0&mid=" + mid;
	send(url);
	event.target.parentNode.parentNode.removeChild(event.target.parentNode);
}