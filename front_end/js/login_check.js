$(document).ready(function () {
	var state = false;
	$("#l-login").mousedown(function () {
			if ($("#l-inputEmail").val() == "") {
				$(".l-emailtip").html("邮箱不能为空，请输入");
				$(".l-emailtip").css("color","red");			

			};
			if ($("#l-inputPassword").val() == "") {
				$(".l-pwtip").html("密码不能为空，请输入");
				$(".l-pwtip").css("color","red");			

			};
			if (($("#l-inputPassword").val() != "")&& ($("#l-inputEmail").val() != '')) {
				checklogin();
			};
	})
	
	$("#l-inputEmail").focus(function () {
		if (!state) {
			$(".l-emailtip").html("");
			$(this).val('');
		};
	})

	$("#l-inputPassword").focus(function () {
		if (!state) {
			$(".l-pwtip").html("");
			$(this).val('');
		};
	})

	function checklogin () {
		$(".l-emailtip").html("");
		var useremail = $("#l-inputEmail").val();
		var userpw = $("#l-inputPassword").val();
		
		var checkurl = "index.php?rt=index/login_ajax&useremail="+ useremail+ "&userpw=" + userpw;
		$.get(checkurl,function(str) {
			if (str == '0') {
				$(".l-emailtip").html("该邮箱不存在，请重新输入");
				$(".l-emailtip").css("color","red");			
				// $("#inputEmail").focus();
				$("#l-inputEmail").val("");
				$("#l-inputPassword").val("");
				state = false;
			} else if (str == '1') {
				$(".l-pwtip").html("密码错误，请重新输入");
				$(".l-pwtip").css("color","red");							
				$("#l-inputPassword").val("");
				state = false;
			}else{
				state = true;
				location.href = "index.php?rt=index/login_manager&email="+ useremail;
			};
		})
		return false;
	}
})