


var url = {
	category: ":nth-child(1)",
	subCategory: ":nth-child(1)",
	listProduct: ":nth-child(1)",
	init : function(){
		var id = window.location.hash;
		var ids = id.split("/");
		
		url.category = (ids[1] || "" != "") ? "." + ids[1] : url.category;
		url.subCategory = (ids[2] || "" != "") ? "." + ids[2] : url.subCategory;
		url.listProduct = (ids[3] || "" != "") ? "." + ids[3] : url.listProduct;
		
	},
}
url.init();









var category = {
	el : $(".box-category .tabs"),
	
	init : function(){
		category.onClick();
		
	},
	setItemActiveDefault : function(){
		category.el.find("li" + url.category).addClass("is-active");
	},
	
	onClick : function(){
		app.click(category.el.find("li"), function(){
			var li = $(this);
			category.el.find("li").each(function(){
				var liRemove = $(this);
				liRemove.removeClass("is-active");
			})
			li.addClass("is-active");
			
			subCategory.getSubCategory();
		})
	}
}
category.init();

var subCategory = {
	elAdd : $(".js-add-sub-category"),
	
	init : function(){
		category.setItemActiveDefault();
		subCategory.getSubCategory();
		
		
	},
	
	setItemActiveDefault : function(){
		subCategory.elAdd.find(".item" + url.subCategory +" .item-inner").addClass("is-active");


	},
	getSubCategory : function(e){
		var li = category.el.find("li.is-active");
		var categoryId = li.attr("id");
		
		var formData = new FormData();
		formData.append("distributor_category_id", categoryId);

		ajaxForm.post("distributors/get_sub_category", formData, function(data){
			subCategory.elAdd.html(data.html);
			
			if (subCategory.elAdd.find(".item ").length == 1) {
				subCategory.elAdd.addClass("hidden");
			}else{
				subCategory.elAdd.removeClass("hidden");
			}
			subCategory.setItemActiveDefault();
			subCategory.onClick();
			// listProduct.getListProduct();
			detailDistributors.getDetail();

		})
		
	},
	
	onClick : function(e){
		app.click(subCategory.elAdd.find(".item-inner"), function(){
			var itemInner = $(this);
			subCategory.elAdd.find(".item-inner").each(function(){
				var boxCategoryItem = $(this);

				boxCategoryItem.removeClass("is-active");
			})
			itemInner.addClass("is-active");
			detailDistributors.getDetail();
		})
		
	},
}
subCategory.init();



var detailDistributors = {
	elAdd : $(".js-add-detail-distributor"),
	
	init : function(){
	},
	getDetail : function(e){
		var itemInner = subCategory.elAdd.find(".item-inner.is-active");
		var subCategoryId = itemInner.attr("id");
		console.log(subCategoryId);

		var formData = new FormData();
		formData.append("distributors_sub_category_id", subCategoryId);

		ajaxForm.post("distributors/get_detail", formData, function(data){
			detailDistributors.elAdd.html(data.html);
			
			if (detailDistributors.elAdd.find(".item ").length == 1) {
				detailDistributors.elAdd.addClass("hidden");
			}else{
				detailDistributors.elAdd.removeClass("hidden");
			}
			
			
			
			

		})
		
	},
	
}
subCategory.init();



var distributors = {
	init : function(){
		if (app.widthMobile > $(window).width()){
			slick.option({
				responsive: [
			    {
			      	breakpoint: 767,
			      	settings: {
			        	slidesToShow: 1,
			        	slidesToShow: 1,
						centerMode: true,
						variableWidth: true

			      }
			    }]
			})
			slick.init(".list-slick-category", 1);
			$(".list-slick-category").on('beforeChange', function(event, aslick, currentSlide, nextSlide){
				
				$(".box-category .list-slick-category li").each(function(){
					var li = $(this);
					li.removeClass("is-active");
				})
				var li_update = $(".box-category .list-slick-category li[data-slick-index='"+nextSlide+"']");
				

				li_update.addClass("is-active");
				
				subCategory.getSubCategory();

				
				
			});


		}
	},
	
}
distributors.init();
