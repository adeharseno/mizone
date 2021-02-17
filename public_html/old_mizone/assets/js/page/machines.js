var url = {
	category: ":first-child",
	listProduct: ":nth-child(1)",
	init : function(){
		var id = window.location.hash;
		var ids = id.split("/");
		url.category = (ids[1] || "" != "") ? "." + ids[1] : ":first-child";
		url.listProduct = (ids[2] || "" != "") ? "." + ids[2] : ":nth-child(1)";


		url.category = decodeURIComponent(url.category);
		url.listProduct = decodeURIComponent(url.listProduct);
		
	},
	clear : function(e){
		window.history.pushState("", "", window.location.href.replace(window.location.hash, ""));
		url.init();
	},
}
url.init();




var category = {
	el : $(".box-category"),
	
	init : function(){
		category.onClick();
		category.setColor();
	},
	setItemActiveDefault : function(){
		category.el.find(".item"+ url.category +" .box-category-item").addClass("is-active");
	},
	setColor : function(){
		category.el.find(".item-inner").each(function(){
			var itemInner = $(this);
			var color = itemInner.attr("color");
			itemInner.find(".box-category-item").css("border-color", color);
			itemInner.find(".box-category-item-inner").css("background-color", color);
		})
	},
	onClick : function(){
		app.click(category.el.find(".item-inner"), function(){
			var itemInner = $(this);
			category.el.find(".item-inner").find(".box-category-item").each(function(){
				var boxCategoryItem = $(this);

				boxCategoryItem.removeClass("is-active");
			})
			itemInner.find(".box-category-item").addClass("is-active");
			scroll.to(category.el);
			listProduct.getListProduct();
			url.clear();

		})
	}
}
category.init();



var listProduct = {
	elAdd : $(".js-add-box-list-product"),
	el : $(".box-list-product"),
	elListProduct : $(".box-list-product .list-product"),
	triangle : $(".box-triangle"),
	color : "#bdbdbd",
	init : function(){
		category.setItemActiveDefault();
		listProduct.getListProduct();
		
	},
	getListProduct : function(e){
		var categoryItemInner = category.el.find(".box-category-item.is-active").closest(".item-inner");
		var machinesCategoryId = categoryItemInner.attr("id");
		listProduct.color = categoryItemInner.attr("color");
		var formData = new FormData();
		formData.append("machines_category_id", machinesCategoryId);
		ajaxForm.post("machines/get", formData, function(data){
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
		listProduct.elListProduct.find(".js-item-list-product"+ url.listProduct +" .item-inner").addClass("is-active")
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
		var machinesId = listProductItem.attr("id") || "";
		
		var formData = new FormData();
		formData.append("machines_id", machinesId);
		ajaxForm.post("machines/get_detail", formData, function(data){
			productDetail.elAdd.html(data.html_detail);
			productDetail.elAddText.html(data.html_detail_text);
			productDetail.threesixty();
			productDetail.onClick();
			
			productDetail.elAdd.find(".box-product .box-copy .title.with-image .title").css("color", listProduct.color);	
			productDetail.elAdd.find(".title-information").css("color", listProduct.color);	

			if (url.listProduct != ":nth-child(1)"){
				scroll.to(".product-detail");
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
					
					
				});


			}

			tab.init();
		})
	},
	threesixty : function(){
		var $ts = $(".ts");
		var dir = $ts.attr("dir");
		
	    var ts = $ts.ThreeSixty({
	        totalFrames: 18,
	        endFrame: 18,
	        currentFrame: 1, 
	        framerate: 60, 
	        imgList: ".threesixty_images", 
	        progress: ".spinner", 
	        imagePath: "storage/" + dir + "/", 
	        filePrefix: '', 
	        ext: '.png', 
	        navigation: false
	    });

	},
	machinesZoom : function($e, $t){
		var $image = $e;
		var zoomConfig = {
			zoomType : "lens",
			lensShape : "round",
			lensSize : 200,
			scrollZoom : true,
			zoomLevel: 1,
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
    			$(".copy-threesixty .title").text("drag to see 360°");
			}
			
		})
		
	},
	onClick : function(e){
		app.click(".js-zoom-machine", function(){
			$(".copy-threesixty .title").text("scroll to zoom in & out");
			productDetail.machinesZoom($(".threesixty_images img.current-image") , $(this));
		})
	},
}
productDetail.init();


var machines = {
	init : function(){
		
	},
	
}
machines.init();
