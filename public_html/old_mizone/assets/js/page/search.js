var search = {
	init : function(){
		
	},
}
search.init();


app.click(".js-for-type .item", function(){
	$(".js-for-type .item").each(function(){
		$(this).removeClass("is-active");
	})
	$(this).addClass("is-active");

	$(".form-search input[name='type']").val($(this).attr("for"));
	

	$(".form-search").submit();
})