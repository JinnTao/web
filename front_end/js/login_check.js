//window.onload = function(){
//	signup = document.getElementById("signup");
//	signup.disabled = true;
//	document.getElementById("")	
//}
//
$('document').ready(function(){
<<<<<<< HEAD

	$("button").mousedown(function () {
		checklogin();
	})
	
	function checklogin () {
		var useremail = $("#inputEmail").val();
		var userpw = $("inputPassword").val();
=======
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
>>>>>>> aaa/master
		
		var checkurl = "index.php?rt=index/login_manager&useremail="+ useremail+ "&userpw=" + userpw;
		$.get(checkurl,function(str) {
			if (str == '0') {
				$("span.emailtip").html("该邮箱不存在，请重新输入");
<<<<<<< HEAD
				$("#inputEmail").val('');
				$("#inputPassword").val('');
			} else if (str == '1') {
				$("span.pwtip").html("密码错误，请重新输入");
				$("#inputPassword").val('');
=======
				// $("#inputEmail").focus();
				$("#inputEmail").val("");
				$("#inputPassword").val("");
			} else if (str == '1') {
				$("span.pwtip").html("密码错误，请重新输入");
				$("#inputPassword").val("");
			}else{
				location.href = "index.php"
>>>>>>> aaa/master
			};
		})
		return false;
	}
})
