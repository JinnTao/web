//window.onload = function(){
//	signup = document.getElementById("signup");
//	signup.disabled = true;
//	document.getElementById("")	
//}
//
$('document').ready(function(){
	var state1 = false;
	var state2 = false;
	var state3 = false;

	$("#r-inputEmail").focus(function () {
		if (state1 == false) {
			$(this).val('');
		};
	})
	$("#r-inputEmail").blur(function () {
		if ($(this).val() == '') {
			$("span.r-emailtip").html("请输入您的邮箱");
			$(this).val('');
		}
		else {
			if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val()) == false) {
				$("span.r-emailtip").html("邮箱格式不正确，请重新输入");
				$(this).val('');
			}
			// else if () {   //调用数据库来查看数据库中是否已经存在该邮箱
			// 	$("span.emailtip").html("该邮箱已经注册，请重新输入");
			// 	$(this).focus();
			// }
			else {
				checkName();
				// $("span.emailtip").html("");
				// $("i.emailtip").show();
				// state1 = true;

			};
		};
	})
	$("#r-inputPassword").focus(function () {
		if (state2 == false) {
			$(this).val('');
		};
	})
    $("#r-Password2").focus(function () {
		if (state3 == false) {
			$(this).val('');
		};
	})

	$("#r-inputPassword").blur(function () {
		if ($(this).val() == '') {
			$("span.r-pwtip").html("请输入您的密码");
			$(this).val('');
		}
		else {
			if ($(this).val().length < 6) {
				$("span.r-pwtip").html("密码长度必须在6-20个字符之间");
				$(this).val('');
			}
			else{
				$("span.r-pwtip").html("");
				$("i.r-pwtip").show();
				state1 = true;
			};
		};
	})

	$("#r-Password2").blur(function () {
		if ($(this).val() == '') {
			$("span.r-pw2tip").html("请再次输入您的密码");
			$(this).val('');
		}
		else {
			if ($(this).val() != $("#r-inputPassword").val()) {
				$("span.r-pw2tip").html("两次密码不一致，请重新输入");
				$(this).focus();
			}
			else{
				$("span.r-pw2tip").html("");
				$("i.r-pw2tip").show();
				state1 = true;
			};
		};
	})

	// $("#signup").mousedown(function () {
	// 	register();
	// })

	function checkName () {
		var useremail = $("#r-inputEmail").val();
		var checkurl = "index.php?rt=index/registry_ajax&useremail="+useremail;
		$.get(checkurl,function(str) {
			if (str == '1') {
				$("span.r-emailtip").html("该邮箱已经注册，请重新输入");
				$("span.r-emailtip").css("color","red");			
				$("#r-inputEmail").val("");
			} else{
				$("span.r-emailtip").html("");
				$("i.r-emailtip").show();
				state1 = true;
			};
		})
		return false;
	}
})
