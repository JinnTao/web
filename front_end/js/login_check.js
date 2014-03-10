//window.onload = function(){
//	signup = document.getElementById("signup");
//	signup.disabled = true;
//	document.getElementById("")	
//}
//
$('document').ready(function(){
	$("button").mousedown(function () {
		checklogin();
	})
	$("inputEmail").focus(function () {
		// if (state1 == false) {
		// 	$(this).val('');
		// };
		$("#inputEmail").val('');
		$("#inputPassword").val('');
	})
	$("#inputPassword").focus(function () {
		// if (state2 == false) {
		// 	$(this).val('');
		// };
		$("#inputPassword").val('');
	})
	function checklogin () {
		$("span.emailtip").html("");
		var useremail = $("#inputEmail").val();
		var userpw = $("#inputPassword").val();
		
		var checkurl = "index.php?rt=index/login_manager&useremail="+ useremail+ "&userpw=" + userpw;
		$.get(checkurl,function(str) {
			if (str == '0') {
				$("span.emailtip").html("该邮箱不存在，请重新输入");
				// $("#inputEmail").focus();
				$("#inputEmail").val("");
				$("#inputPassword").val("");
			} else if (str == '1') {
				$("span.pwtip").html("密码错误，请重新输入");
				$("#inputPassword").val("");
			}else{
				location.href = "index.php"
			};
		})
		return false;
	}
})
