

var tabMachine = {
	init : function(){
		tabMachine.isActive();
		tabMachine.onClick();
	},
	isActive : function(e){
		var $elActive = $(".list-area .item.is-active");
		var telp = $elActive.attr("telp") || "";
		var phone = $elActive.attr("phone") || "";
		var email = $elActive.attr("email") || "";		
		$(".list-area-detail .telp").text(telp);
		$(".list-area-detail .phone").text(phone);
		$(".list-area-detail .email").text(email);
	},
	onClick : function(e){
		app.click(".list-area .item", function(){
			$(".list-area .item").each(function(){
				$(this).removeClass("is-active");
			})
			$(this).addClass("is-active");
			tabMachine.isActive();
		})
	},
}
tabMachine.init();


var services = {
	init : function(){
		tab.init();
		tabMachine.init();
	},
	
}
services.init();



