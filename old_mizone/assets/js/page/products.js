var url = {
	category: ":nth-child(2)",
	subCategory: ":nth-child(1)",
	listProduct: ":nth-child(1)",
	init : function(){
		var id = window.location.hash;
		var ids = id.split("/");
		
		url.category = (ids[1] || "" != "") ? "." + ids[1] : ":nth-child(1)";
		url.subCategory = (ids[2] || "" != "") ? "." + ids[2] : ":nth-child(1)";
		url.listProduct = (ids[3] || "" != "") ? "." + ids[3] : ":nth-child(1)";


		url.category = decodeURIComponent(url.category);
		url.subCategory = decodeURIComponent(url.subCategory);
		url.listProduct = decodeURIComponent(url.listProduct);

		
		


	},
	clear : function(e){
		window.history.pushState("", "", window.location.href.replace(window.location.hash, ""));
		url.init();
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
			
			
			
			
			url.clear();
			
			
			
		})
	}
}
category.init();

var subCategory = {
	elAdd : $(".js-add-sub-category"),
	color : "#bdbdbd",
	init : function(){
		category.setItemActiveDefault();
		subCategory.getSubCategory();
		
		
	},
	setColor : function(){
		subCategory.elAdd.find(".item-inner").each(function(){
			var itemInner = $(this);
			var color = itemInner.attr("color");

			itemInner.find(".box-category-item").css("border-color", color);
			itemInner.find(".box-category-item-inner").css("background-color", color);
		})
	},
	setItemActiveDefault : function(){

		subCategory.elAdd.find(".item" + url.subCategory +" .box-category-item").addClass("is-active");


	},
	getSubCategory : function(e){
		var li = category.el.find("li.is-active");
		var categoryId = li.attr("id");
		
		var formData = new FormData();
		formData.append("product_category_id", categoryId);

		ajaxForm.post("products/get_sub_category", formData, function(data){
			subCategory.elAdd.html(data.html);
			
			if (subCategory.elAdd.find(".item ").length == 1) {
				subCategory.elAdd.addClass("hidden");
			}else{
				subCategory.elAdd.removeClass("hidden");
			}
			subCategory.setItemActiveDefault();
			

			subCategory.setColor();
			subCategory.onClick();

			listProduct.getListProduct();
			

		})
		
	},
	
	onClick : function(e){
		app.click(subCategory.elAdd.find(".item-inner"), function(){
			var itemInner = $(this);
			subCategory.elAdd.find(".item-inner").find(".box-category-item").each(function(){
				var boxCategoryItem = $(this);

				boxCategoryItem.removeClass("is-active");
			})
			itemInner.find(".box-category-item").addClass("is-active");
			listProduct.getListProduct();
			url.clear();
		})
		
	},
}
subCategory.init();


var listProduct = {
	elAdd : $(".js-add-box-list-product"),
	el : $(".box-list-product"),
	elListProduct : $(".box-list-product .list-product"),
	triangle : $(".box-triangle"),
	color : "#bdbdbd",
	init : function(){
		
		
		
	},
	getListProduct : function(e){
		var itemInner = subCategory.elAdd.find(".box-category-item.is-active").closest(".item-inner");
		var subCategoryId = itemInner.attr("id");
		listProduct.color = itemInner.attr("color");

		var formData = new FormData();
		formData.append("products_sub_category_id", subCategoryId);
		ajaxForm.post("products/get", formData, function(data){
			listProduct.elAdd.html(data.html);

			listProduct.el = $(".box-list-product");
			listProduct.elListProduct = $(".box-list-product .list-product");

			listProduct.el.css("background-color", listProduct.color);
			listProduct.triangle.css("background-color", listProduct.color);
			listProduct.el.find(".list-product .box-product .box-copy .title").css("color", listProduct.color);	
			


			listProduct.setItemActiveDefault();
			productDetail.getListProduct();
			
			slick.option({
				slidesToShow: 1,
				infinite: true,
				responsive: [
			    {
			      	breakpoint: 767,
			      	settings: {
			        	slidesToShow: 1,
			        	infinite: true,

			      }
			    }]
			})
			slick.init(".product-list-slick",4);

			$(".product-list-slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
				
				listProduct.elListProduct.find(".js-item-list-product").find(".js-item-inner-list-product").each(function(){
					var itemInner = $(this);
					itemInner.removeClass("is-active");
				})
				$(".product-list-slick .item[data-slick-index='"+nextSlide+"'] .item-inner").addClass("is-active");
				productDetail.getListProduct();
			});


			listProduct.onClick();
		})
		
	},
	setItemActiveDefault : function(){
		listProduct.elListProduct.find(".js-item-list-product"+ url.listProduct +" .item-inner").addClass("is-active");


	},
	onClick : function(e){
		
		app.click(listProduct.elListProduct.find(".js-item-list-product"), function(){
			var item = $(this);
			listProduct.elListProduct.find(".js-item-list-product").find(".js-item-inner-list-product").each(function(){
				var itemInner = $(this);
				itemInner.removeClass("is-active");
			})
			item.find(".js-item-inner-list-product").addClass("is-active");
			productDetail.getListProduct();
			scroll.to(productDetail.elAdd, -20);
			url.clear();
		})
	},
}
listProduct.init();

var productDetail = {
	elAdd : $(".js-add-product-detail"),
	elAddText : $(".js-add-product-detail-text"),
	
	init : function(){
		
	},
	getListProduct : function(e){
		var listProductItem = listProduct.elListProduct.find(".js-item-list-product .js-item-inner-list-product.is-active").closest(".item");
		var productsId = listProductItem.attr("id") || "";
		
		var formData = new FormData();
		formData.append("products_id", productsId);
		ajaxForm.post("products/get_detail", formData, function(data){
			productDetail.elAdd.html(data.html_detail);
			productDetail.elAddText.html(data.html_detail_text);
			productDetail.onClick();

			productDetail.elAdd.find(".box-product .box-copy .title.with-image .title").css("color", listProduct.color);	
			productDetail.elAdd.find(".title-information").css("color", listProduct.color);	
			
			if (url.listProduct != ":nth-child(1)"){
				scroll.to(".js-add-product-detail");
			}
			
			script.addBreadcrumbs();
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
				slick.init(".product-detail-text .tabs .list-slick", 3);
				$(".product-detail-text .tabs .list-slick").on('beforeChange', function(event, aslick, currentSlide, nextSlide){
					console.log(nextSlide);
					$(".product-detail-text .tabs .list-slick li").each(function(){
						var li = $(this);
						li.removeClass("is-active");
					})
					var li_update = $(".product-detail-text .tabs .list-slick li[data-slick-index='"+nextSlide+"']");
					var liClass = li_update.find("a").attr("for");



					li_update.addClass("is-active");
					


					$(".product-detail-text .show-tabs .tab-item").each(function(){
						$(this).removeClass("is-active");
					})
					$(".product-detail-text .show-tabs .tab-item." + liClass).addClass("is-active");
					switch (liClass) {
						case "recipe":
							slick.option({
								infinite: true,
								slidesToShow: 3,
								slidesToScroll: 1,
								draggable: false,
								responsive: [
							    {
							      	breakpoint: 767,
							      	settings: {
							        	slidesToShow: 1,
							        	slidesToScroll: 1,
										
										

							      }
							    }]
							});
							
							if (!$(".recipe-slick").hasClass("slick-initialized")) {
								slick.init(".recipe-slick");		
							}
							break;
					}
					
				});


			}
			tab.init();
		})
	},
	productsZoom : function($e, $t){
		var $image = $e;
		var zoomConfig = {
			zoomType : "lens",
			lensShape : "round",
			lensSize : 200,
			scrollZoom : true
		};
		var zoomActive;
		zoomActive = !zoomActive;
		$image.elevateZoom(zoomConfig);	

		$t.addClass("hidden");
		
		app.click($image, function(){
			if (zoomActive){
				$t.removeClass("hidden");
				$.removeData($image, 'elevateZoom');
    			$('.zoomContainer').remove();		
			}
		})
		
	},
	slickProductImage : function(e){
		slick.option({
			focusOnSelect: true,
			variableWidth: true,
			centerMode: true,
			responsive: [
		    {
		      	breakpoint: 767,
		      	settings: {
		        	slidesToShow: 1,
		        	slidesToScroll: 1,
		        	infinite: true,

		      }
		    }]
		})
		slick.init(".box-product .list-product-images",2);
	},
	onClick : function(e){
		app.click(".js-zoom-products", function(){
			productDetail.productsZoom($(".box-product .thumbnail img") , $(this));
		})
		var $listProductImagesItem = $(".list-product-images .item");
		app.click($listProductImagesItem, function(){
			var item = $(this);
			$listProductImagesItem.each(function(){
				$(this).removeClass("is-active");
			})
			item.addClass("is-active");
			$(".js-replace-image img").attr("src", item.find("img").attr("src"));
		});


		app.click(".js-recipe-item", function(){
			var recipeId = $(this).attr("id") || "";
			var formData = new FormData();
			formData.append("recipe_id", recipeId);
			ajaxForm.post("products/get_modal_recipe", formData, function(data){
				
				$(".js-add-modal-recipe").html('');
				$(".js-add-modal-recipe").html(data.html);
				tab.init();
			})
		})


	},
	
}
productDetail.init();


var machines = {
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
			
			$(".list-slick-category").slick('slickGoTo', $(".list-slick-category .is-active").attr("index") );


		}
	},
	
}
machines.init();
