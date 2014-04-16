$(document).ready(function () {
	var state1 = false;
	var state2 = false;
	var state3 = false;
	//点击提交按钮后，判断表单内所有内容都有效才提交表单
	$("#signup").click(function () {
		if (ValidForm()) {
			$("form").submit();		
		};
	})
	//回车作用等同于按钮
	// $(document).keydown(function (event) {
	// 	var e = e || event;
	// 	var keycode = e.which || e.keyCode;
	// 	if (keycode == 13) {
	// 		if ($("#r-inputEmail").val() != '' && $("#r-inputPassword").val() != '' && $("#r-Password2").val() != '') {
	// 			$("#signup").click();
	// 		};
	// 	};
	// })

	function ValidForm(){
		//判断邮箱的输入是否正确
		if ($("#r-inputEmail").val() == '') {
			$("i.r-emailtip").css({"display":"none"});
			$("span.r-emailtip").html("请输入您的邮箱");
			$("#r-inputEmail").val('');
		}else {
			if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($("#r-inputEmail").val()) == false) {
				$("i.r-emailtip").css({"display":"none"});
				$("span.r-emailtip").html("邮箱格式不正确，请重新输入");
				$("#r-inputEmail").val('');
			}
			else {
				checkName();
			};
		};
		//判断密码的输入是否正确
		if ($("#r-inputPassword").val() == '') {
			$("i.r-pwtip").css({"display":"none"});
			$("span.r-pwtip").html("请输入您的密码");
			$("#r-inputPassword").val('');
		}else {
			if ($("#r-inputPassword").val().length < 6 || $("#r-inputPassword").val().length > 20) {
				$("i.r-pwtip").css({"display":"none"});
				$("span.r-pwtip").html("密码长度必须在6-20个字符之间");
				$("#r-inputPassword").val('');
			}else{
				var empty = false;
				for (var i = $("#r-inputPassword").val().length - 1; i >= 0; i--) {
					if ($("#r-inputPassword").val().substr(i,1)==" ") {
						$("i.r-pwtip").css({"display":"none"});
						$("span.r-pwtip").html("密码不能含有空格");
						$("#r-inputPassword").val('');
						empty = true;
					};
				};
				if (!empty) {
					$("span.r-pwtip").html("");
					$("i.r-pwtip").show();
					state2 = true;
				};
			};
		};
		//判断密码是否再次确认
		if ($("#r-Password2").val() == '') {
			$("i.r-pw2tip").css({"display":"none"});
			$("span.r-pw2tip").html("请再次输入您的密码");
			$("#r-Password2").val('');
		}else {
			if ($("#r-Password2").val() != $("#r-inputPassword").val()) {
				$("i.r-pw2tip").css({"display":"none"});
				$("span.r-pw2tip").html("两次密码不一致，请重新输入");
				$("#r-Password2").val('');
			}else{
				$("span.r-pw2tip").html("");
				$("i.r-pw2tip").show();
				state3 = true;
			};
		};
		//若三种情况都已确认，表单有效
		if (state1 && state2 && state3) {
			return true;
		} else{
			return false;
		};
	}
	//异步判断用户是否存在
	function checkName () {
		var useremail = $("#r-inputEmail").val();
		var checkurl = "index.php?rt=index/registry_ajax&useremail="+useremail;
		$.get(checkurl,function(str) {
			if (str == '1') {
				$("i.r-emailtip").css({"display":"none"});
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

