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

	$("inputEmail").focus(function () {
		if (state1 == false) {
			$(this).val('');
		};
	})
	$("#inputEmail").blur(function () {
		if ($(this).val() == '') {
			$("span.emailtip").html("请输入您的邮箱");
			$(this).val('');
		}
		else {
			if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val()) == false) {
				$("span.emailtip").html("邮箱格式不正确，请重新输入");
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
	$("#inputPassword").focus(function () {
		if (state2 == false) {
			$(this).val('');
		};
	})
    $("#Password2").focus(function () {
		if (state3 == false) {
			$(this).val('');
		};
	})

	$("#inputPassword").blur(function () {
		if ($(this).val() == '') {
			$("span.pwtip").html("请输入您的密码");
			$(this).val('');
		}
		else {
			if ($(this).val().length < 6) {
				$("span.pwtip").html("密码长度必须在6-20个字符之间");
				$(this).val('');
			}
			else{
				$("span.pwtip").html("");
				$("i.pwtip").show();
				state1 = true;
			};
		};
	})

	$("#Password2").blur(function () {
		if ($(this).val() == '') {
			$("span.pw2tip").html("请再次输入您的密码");
			$(this).val('');
		}
		else {
			if ($(this).val() != $("#inputPassword").val()) {
				$("span.pw2tip").html("两次密码不一致，请重新输入");
				$(this).focus();
			}
			else{
				$("span.pw2tip").html("");
				$("i.pw2tip").show();
				state1 = true;
			};
		};
	})

	// $("#signup").mousedown(function () {
	// 	register();
	// })

	function checkName () {
		var useremail = $("#inputEmail").val();
		var checkurl = "index.php?rt=index/registry_ajax&useremail="+useremail;
		$.get(checkurl,function(str) {
			if (str == '1') {
				$("span.emailtip").html("该邮箱已经注册，请重新输入");
<<<<<<< HEAD
=======
				$("span.emailtip").css("color","red");			
				$("#inputEmail").val("");
>>>>>>> aaa/master
			} else{
				$("span.emailtip").html("");
				$("i.emailtip").show();
				state1 = true;
			};
		})
		return false;
	}
})
