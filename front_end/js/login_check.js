//window.onload = function(){
//	signup = document.getElementById("signup");
//	signup.disabled = true;
//	document.getElementById("")	
//}
//
$('document').ready(function(){
	$("#l-login").mousedown(function () {
		var state = false;
		if(!state){
			checklogin();
		}
	})
	$("#l-inputEmail").focus(function () {
		$("#l-inputEmail").val('');
		$("#l-inputPassword").val('');
	})
	$("#l-inputPassword").focus(function () {

		$("#l-inputPassword").val('');
	})
	function checklogin () {
		$("span.l-emailtip").html("");
		var useremail = $("#l-inputEmail").val();
		var userpw = $("#l-inputPassword").val();
		
		var checkurl = "index.php?rt=index/login_ajax&useremail="+ useremail+ "&userpw=" + userpw;
		$.get(checkurl,function(str) {
			if (str == '0') {
				$("span.l-emailtip").html("该邮箱不存在，请重新输入");
				// $("#inputEmail").focus();
				$("#l-inputEmail").val("");
				$("#l-inputPassword").val("");
				state = false;
			} else if (str == '1') {
				$("span.l-pwtip").html("密码错误，请重新输入");
				$("#l-inputPassword").val("");
				state = false;
			}else{
				state = true;
			};
		})
		return false;
	}
})
