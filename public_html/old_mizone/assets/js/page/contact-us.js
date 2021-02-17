var register = {
	formContactUs : null,
	init : function(){
		var option = {
					  	rules: {
					  		name: {
					      		lettersonly : true,
					      		maxlength: 30,
					    	},
					    	phone_number: {
					      		required: true,
					      		minlength: 6,
					      		maxlength: 25,
					    	},
					    	
					  	}
					}
		this.formContactUs = new form(".js-form-contact-us");
		this.formContactUs.init(option);
	},
	
}
register.init();

app.click(register.formContactUs.button, function(){
	register.formContactUs.submit();
	return false;
})
