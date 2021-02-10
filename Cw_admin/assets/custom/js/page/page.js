var page = {
	el : $(".js-add-modal-page"),
	modalElement : ".js-modal-page",
	init : function(){
		// this.showModal();
		page.generateName();
	},
	showModal : function(){
		var self = this;
		var formData = new FormData();
		ajaxForm.post("page/show_modal_page",formData, function(data){
			if (self.el.find(self.modalElement + " .modal-content").text() != ""){
				self.el.find(self.modalElement + " .modal-content").html($(data.html).find(".modal-content").html());
			}else{
				self.el.html(data.html);	
			}
			self.el.find(self.modalElement).modal("show");
		});
	},
	hideModal : function(){
		var self = this;
		self.el.find(self.modalElement).modal("hide");
	},
	generateName : function(e){
		var i = 0;
		$(".js-generate-name").each(function(){
			var jsGenerateName = $(this);
			jsGenerateName.find("input").each(function(){
				var input = $(this);
				var name = input.data("name");
				var names = name.split(".");

				var names_first = names[0] || "name";
				var names_last = names[1] || "";

				var string_name = names_first + "["+ i +"]" + ( (names_last) ? "["+ names_last +"]" : "" );
				input.attr("name", string_name);
					
			})
			i++;
			
		})
	},
}
page.init();
app.click(page.modalElement + " .js-click-section", function(){
	var self = $(this);
	var wrap = self.closest(".wrap");
	$(page.modalElement + " .wrap").each(function(){
		$(this).removeClass("is-active");
	})
	wrap.addClass("is-active");
	$(page.modalElement + " .js-select-file").removeAttr("disabled");
})
app.click(page.modalElement + " .js-select-file", function(){
	var self = $(this);
	$(page.modalElement + " .wrap").each(function(){
		var wrap = $(this);
		if ( wrap.hasClass("is-active") ){
			$.getJSON("page/view_page_item/" + wrap.attr("id"), function(data){
				$(".box-page .view-page").append(data.html);
				page.hideModal();
				page.generateName();
				$("form").submit();
				// ( ($("[name='id']").val() || "") == "") ? $("form").submit() : false;
			})
			
			
		}
		
	})
})
app.click(".js-add-page", function(){
	page.showModal();
});




