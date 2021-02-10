var login = {
	formLogin : null,
	init : function(){
		
		this.formLogin = new form(".js-form-login");
		this.formLogin.init();
		
	},
}
login.init();


app.click(".js-send", function(){	
	login.formLogin.submit();
	return false;
})