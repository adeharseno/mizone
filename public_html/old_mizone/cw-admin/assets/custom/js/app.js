var app = {
	
	init : function(){
		app.inputEnter();
	},
	click : function(e, f){
		(typeof e == "object") ? e.on("click", f) : $(document).on("click", e, f);
	},
	change : function(e, f){
		(typeof e == "object") ? e.on("change", f) : $(document).on("change", e, f);
	},
	inputEnter : function(){
		$("input").on("keydown", function(e){
			var self = $(this)
			switch (e.keyCode){
				case 13:
					self.closest("form").submit();
					break;
			}
		})
	},
	redirect : function(e){
		window.location = e;
	},
}
app.init();
var body = {
	scroll : function(e){
		$(window).scroll(e);
	},
	load : function(e){
		$(window).on("load",e);
	},
}
var validation = {
	isEmail : function(v){
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    	return pattern.test(v);
	},
	isNumeric : function(v){
		return !isNaN(parseFloat(v)) && isFinite(v);
	},
}
var select = {
	select2 : null,
	option : null,
	init : function(e, o){
		this.select2 = $(e);
		this.option = o || "";
		select.generate(".select2",{});
		this.value();
	},
	generate : function(e, o){
		this.select2 = $(e);
		this.option = o || {};
		this.option.width = "100%";
		this.select2.select2(this.option);
	},
	value : function(e){
		$("select[data-value]").each(function(){

            var self = $(this);
            switch( self.attr("multiple") ){
            	case "multiple":
            		
            		var value = self.data("value") + ",";
            		$.each(value.split(","), function(k, v){
            			if (v){
            				self.find("option[value='"+ v +"']").prop("selected", true);	
            			}
            			
            		});
            		break;
        		default:
        			self.find("option[value='"+ self.data("value") +"']").prop("selected", true);
        			
        			break;
            }
            
            self.trigger("change");
        })
	},
}
select.init(".select2");
function form(e){
	this.e = e;
	
	this.el = $(e);
	this.o = {
				ignore: "",
			    errorElement: "label",
				errorPlacement: function(error, element) {
				    element.parent().append(error);
				},
				highlight: function(element) {
				    $(element).parent().addClass("error");
				},
				unhighlight: function(element) {
				    $(element).parent().removeClass("error");
				},
			};
	this.init = function(o){
		(o == undefined) ? false : this.o.rules = o.rules ;
		(o == undefined) ? false : this.o.messages = o.messages ;
		
		this.validate();
		this.extend();
		
		return (this.el.length === 0) ? false : this;
	};
	this.extend = function(){
		
	}
	this.validate = function(){
		var self = this;
		this.el.validate(this.o);
	};
	this.submit = function(){
		if (this.valid()){
			this.el.submit();
		}
	};
	this.valid = function(){
		return this.el.valid();
	};
	
    
}

var ajaxForm = {
	init : function(){
		
	},
	post : function(url, formData, callbackSuccess, callbackError){
        formData = formData || "";
        url = url || "";
        callbackSuccess = callbackSuccess || "";
        callbackError = callbackError || "";
        if ( formData != "" && url != "" ){
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: callbackSuccess,
                error: callbackError
            });
        }
    },
}
ajaxForm.init();

