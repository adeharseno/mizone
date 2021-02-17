var account = {
	init : function(){
		this.showAvatar();
	},
	showAvatar : function(){
		var full_name = $("[name='full_name']").val() || "";
		var email = $("[name='email']").val() || "";
		$(".box-avatar .full-name").text(full_name);
		$(".box-avatar .email").text(email);
		$(".box-avatar .avatar b").text(full_name.substr(0,1).toUpperCase());
	},
}
account.init();

$("[name='full_name'], [name='email']").on("keyup", function(){
	account.showAvatar();
});


