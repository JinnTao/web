$(document).ready(function () {
	var agestate = true;
	var namestate = true;
	//判断并显示性别
	if ($("#sexchoice").html() == "f") {
		$("input:radio:last").attr("checked","checked");
	};
	//密码修改认证
	$("#passwordsignup").click(function () {
		if (ValidForm()) {
			$("PwForm").submit();		
		};
	})
	//年龄修改限制
	$("#inputage").blur(function () {
		if ($("#inputage").val() != "") {
			if (/^[1-9][0-9]{0,4}$/.test($("#inputage").val()) == false) {
				$("span.agetip").html("格式不正确，只能输入1-99999之间的数字");
				$("#inputage").focus();
				$("#inputage").val("");
				agestate = false;
			}else{
				agestate = true;
				$("span.agetip").html("");
			};
		} else{
			agestate = true;
			$("span.agetip").html("");
		};
	})
	//昵称修改限制
	$("#inputname").blur(function () {
		if ($("#inputname").val() != "") {
			if (/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/.test($("#inputname").val()) == false) {
				$("span.nametip").html("格式不正确，只能输入中文、英文、数字和下划线");
				$("#inputname").focus();
				namestate = false;
			}else{
				namestate = true;
				$("span.nametip").html("");
			};
		} else{
			namestate = true;
			$("span.nametip").html("");
		};
	})


})

function ValidForm(){
	var state1 = false;
	var state2 = false;
		//判断密码的输入是否正确
		if ($("#newPassword").val() == '') {
			$("i.pwtip").css({"display":"none"});
			$("span.pwtip").html("请输入您的密码");
			// $("#r-inputPassword").val('');
		}else {
			if ($("#newPassword").val().length < 6 || $("#newPassword").val().length > 20) {
				$("i.pwtip").css({"display":"none"});
				$("span.pwtip").html("密码长度必须在6-20个字符之间");
				// $("#newPassword").val('');
			}else{
				$("span.pwtip").html("");
				$("i.pwtip").show();
				state1 = true;
			};
		};
		//判断密码是否再次确认
		if ($("#Password2").val() == '') {
			$("i.pw2tip").css({"display":"none"});
			$("span.pw2tip").html("请再次输入您的密码");
			// $("#Password2").val('');
		}else {
			if ($("#Password2").val() != $("#newPassword").val()) {
				$("i.pw2tip").css({"display":"none"});
				$("span.pw2tip").html("两次密码不一致，请重新输入");
				$("#Password2").val('');
			}else{
				$("span.pw2tip").html("");
				$("i.pw2tip").show();
				state2 = true;
			};
		};
		//若两种情况都已确认，表单有效
		if (state1 && state2) {
			return true;
		} else{
			return false;
		};
	}

