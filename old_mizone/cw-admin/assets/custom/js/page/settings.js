var settings = {
	init : function(){
		this.generateName();
	},
	elementli : function(e){
		e = e || "no-sub";
		var el;
		switch (e){
			case "no-sub":
				el = "<li>"+
		                    "<div class='box-input'>"+
		                        "<input type='text'  class='input-menu'>"+
		                    "</div>"+
		                    "<ul>"+
		                        "<div class='btn  btn-add-menu js-add-sub-menu'>ADD MENU</div>"+
		                    "</ul>"+
		                "</li>";
				break;
			case "sub":
				el = "<li>"+
                        "<div class='box-input'>"+
                            "<input type='text' class='input-sub-menu'>"+
                        "</div>"+
                    "</li>";
				break;
		}
		
        return el;
	},
	generateName : function(){
		var i = 0;
		$(".input-menu").each(function(){
			var inputMenu = $(this);
			inputMenu.attr("name", "menu[" + i + "][name]");
			var j = 0;
			inputMenu.closest("li").find(".input-sub-menu").each(function(){
				var inputSubMenu = $(this);
				inputSubMenu.attr("name", "menu[" + i + "][sub-menu][" + j + "][name]");
				j++;
			})
			i++;
		})
	},
}
settings.init();


app.click(".js-add-sub-menu", function(){
	var self = $(this);
	var li = $(settings.elementli("sub"));
	li.insertBefore(self);
	settings.generateName();
	return false;
})

app.click(".js-add-menu", function(){
	var self = $(this);
	var li = $(settings.elementli());
	li.insertBefore(self);
	settings.generateName();
	return false;
})

