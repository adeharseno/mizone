var script = {

	init : function(){
		this.activeScrolltoTop();
		this.activeMenu();
		this.tabActive();
		this.langActive();


		slick.option({
			focusOnSelect: true,
			responsive: [
		    {
		      	breakpoint: 767,
		      	settings: {
		        	slidesToShow: 2,
		        	slidesToScroll: 1,
		        	infinite: true,

		      }
		    }]
		})
		slick.init(".list-menu", 2, false);
	},
	activeMenu : function(e){
		var getUrl = window.location;
        var className = getUrl.pathname.split('/')[1] || "home";
        $("[href='"+ className +"']").closest(".nav-item").addClass("is-active");

        script.addBreadcrumbs();
	},
	addBreadcrumbs : function(e){
		var getUrl = window.location;
		var className = getUrl.pathname.split('/')[1] || "home";

		$(".list-breadcrumbs").html("<li><a href='home'>Home</a></li>")
		$(".list-breadcrumbs").append("<li><a href='"+ className +"'>"+ textTransform.ucwords(className.replace(/-/g, " "))+"</a></li>")

        switch (className){
        	case "products":
        		var category = ($(".box-products .tabs li.is-active a").html() || "").toLowerCase(); 
        		var subCategory = ($(".js-add-sub-category .item .box-category-item.is-active .box-copy .title").html() || "").toLowerCase(); 
        		var product = ($(".js-add-box-list-product .list-product .item  .is-active .box-product .box-copy .title").html() || "").toLowerCase(); 

        		


        		$(".list-breadcrumbs").append("<li><a href='"+ className + "/#!/" + category.replace(/<br>/g, "-").replace(/ /g, "-")  +"'>"+  textTransform.ucwords(category.replace(/<br>/g, " ")) +"</a></li>")
        		$(".list-breadcrumbs").append("<li><a href='"+ className + "/#!/" + category.replace(/<br>/g, "-").replace(/ /g, "-")  +"/" + subCategory.replace(/<br>/g, "-").replace(/ /g, "-")  +"'>"+  textTransform.ucwords(subCategory.replace(/<br>/g, " ")) +"</a></li>")
        		$(".list-breadcrumbs").append("<li>"+  textTransform.ucwords(product.replace(/<br>/g, " ")) +"</li>")
        		
        		break;
    		case "machines":
    			var category = ($(".box-category .item .box-category-item.is-active .box-copy .title").html() || "").toLowerCase(); 
    			var product = ($(".js-add-box-list-product .list-product .item  .is-active .box-product .box-copy .title").html() || "").toLowerCase(); 
    			$(".list-breadcrumbs").append("<li><a href='"+ className + "/#!/" + category.replace(/<br>/g, "-").replace(/ /g, "-")  +"'>"+  textTransform.ucwords(category.replace(/<br>/g, " ")) +"</a></li>")
    			$(".list-breadcrumbs").append("<li>"+  textTransform.ucwords(product.replace(/<br>/g, " ")) +"</li>")
    			break;
			case "brand":
				var brandName = ($(".brand-detail").attr("name") || "").toLowerCase(); 
				$(".list-breadcrumbs").append("<li>"+  textTransform.ucwords(brandName.replace(/<br>/g, " ")) +"</li>")
				break;
        }
	},
	activeScrolltoTop : function(e){
		body.scroll(function(){
			if (scroll.value() >= 400){
				$(".scroll-to-top").addClass("is-active");
			}else{
				$(".scroll-to-top").removeClass("is-active");
			}
		})
	},
	tabActive : function(e){
		var $li = $(".tabs.with-show-tabs li.is-active");
		var id = $li.attr("id");

		$(".show-tabs > .container > .item").each(function(){
			$(this).removeClass("is-active");
		})
		$("." + id).addClass("is-active");
	},
	langActive : function(e){
		$boxLanguage = $(".js-box-language");
		app.click($boxLanguage, function(){
			$(this).find(".box-dropdown").toggleClass("is-active");
			if ($(this).find(".box-dropdown").hasClass("is-active")){
				$boxLanguage.find(".box-active .arrow i").addClass("fa-angle-up");
				$boxLanguage.find(".box-active .arrow i").removeClass("fa-angle-down");	
			}else{
				$boxLanguage.find(".box-active .arrow i").addClass("fa-angle-down");
				$boxLanguage.find(".box-active .arrow i").removeClass("fa-angle-up");	
			}
			
		})
	},
}
script.init();
app.click(".scroll-to-top", function(){
	scroll.to(".content");
	return false;
})


app.click(".js-menu", function(){
	var self = $(this);
	self.find(".hamburger").toggleClass("is-active");
	$(".show-menu-hamburger").toggleClass("is-active");

	var b = $("body");
	if (self.find(".hamburger").hasClass("is-active")){
		b.css("overflow","hidden");
		b.css("height","100vh");	
	}else{
		b.css("overflow","initial");
		b.css("height","initial");	
	}
	return false;
})



var tab = {
	el : $(".tabs"),
	elShow : $(".show-tabs"),
	init : function(){
		tab.el = $(".tabs");
		tab.elShow = $(".show-tabs");
		tab.showTab();
		tab.onClick();
	},
	
	showTab : function(e){
		
		var tabActive = tab.el.find("ul li.is-active a");
		tabActive.each(function(){
			var show = $(this).closest(".tabs").attr("show");
			var elShow = $("." + show);
			var forTab = $(this).attr("for");

			

			elShow.find(".tab-item").each(function(){
				$(this).removeClass("is-active");
			})
			elShow.find("." + forTab).addClass("is-active");	

			switch (forTab) {
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
					        	slidesToShow: 1,
								centerMode: true,
								// variableWidth: true

					      }
					    }]
					});
					
					if (!$(".recipe-slick").hasClass("slick-initialized")) {
						console.log("asdasd");
						slick.init(".recipe-slick", 3);		
					}
					break;
			}
		})
		
	},
	onClick : function(e) {
		app.click(tab.el.find("ul li"), function(){
			var li = $(this);
			
			li.closest("ul").find("li").each(function(){
				$(this).removeClass("is-active");
			})
			li.addClass("is-active");
			tab.showTab(li);
		})
	},
}

app.click(".tabs.with-show-tabs li a", function(){
	var $me = $(this)
	var $tabs = $me.closest(".tabs");
	var $li = $me.closest("li");
	
	
	$(".tabs.with-show-tabs li").each(function(){
		$(this).removeClass("is-active");
	})
	
	$li.addClass("is-active");
	script.tabActive();
})
app.click(".nav-mobile .hamburger", function(){
	$("body").addClass("menu-active");
	
})
app.click(".content", function(e){
	var self = $(this);
	
	if (! $(e.target).hasClass("hamburger") && $(e.target).closest(".hamburger").length != 1){
		$("body").removeClass("menu-active");		
	}
	
	
})

$('.backToTop').click(function(){ 
    $("html, body").animate({ scrollTop: 0 }, 600); 
    return false; 
});


$( ".swap-nestle" ).mouseover(function() {
	$(".swap-nestle").attr("src","storage/brands/nestle-abu.png");
});

$( ".swap-nestle" ).mouseout(function() {
  $(".swap-nestle").attr("src","storage/brands/nestle.png");
});

$(".recipe-link").hover(
	function(){
		var contentid = $(this).data("name");

		$("#"+contentid).css("display", "block");
	},
	function(){
		var contentid = $(this).data("name");

		$("#"+contentid).css("display", "none");
	}
);

$("#Cul").css("max-width", "35vw");

$(".hover-content").hover(
	function(){
		$(this).css("display","block");
	},
	function(){
		$(this).css("display","none");
	}
);

// $(".recipes-related-slider").slick({
// 	infinite: true,
// 	slidesToShow: 5,
// 	slidesToScroll: 1
// });

$("#ingredients-toggle").click(function(){

	var screenwidth = $(window).width(); 

	if($(this).data('state') == 'plus'){
		if(screenwidth > 1023)
			$("#ingredients-table").css("padding", "1vw");

		else
			$("#ingredients-table").css("padding", "4vw");

		$("#ingredients-table").css("max-height", "500vh");	
		$(this).find("img").attr("src", "assets/images/recipes/btn-minus.png");	
		$(this).data('state', 'minus');
	}

	else{
		$("#ingredients-table").css("padding", "0vw");
		$("#ingredients-table").css("max-height", "0vh");
		$(this).find("img").attr("src", "assets/images/recipes/btn-plus.png");		
		$(this).data('state', 'plus');
	}
	
});

$("#howto-toggle").click(function(){

	var screenwidth = $(window).width(); 
	var prodtitlet = $("#producttitlethere").html();
	var prodtitle = $("#producttitlehere").html();
	var cattitle = $("#categorytitlehere").html();
	var subcattitle = $("#subcategorytitlehere").html();
	var link = "products/#!/"+cattitle+"/"+subcattitle+"/"+prodtitle;

	if($(this).data('state') == 'plus'){
		if(screenwidth > 1023)
			$("#howto-table").css("padding", "1vw");

		else
			$("#howto-table").css("padding", "0vw");

		$("#howto-table").css("max-height", "500vh");	
		$(this).find("img").attr("src", "assets/images/recipes/btn-minus.png");	
		$(this).data('state', 'minus');
	}

	else{
		$("#howto-table").css("padding", "0vw");
		$("#howto-table").css("max-height", "0vh");
		$(this).find("img").attr("src", "assets/images/recipes/btn-plus.png");		
		$(this).data('state', 'plus');
	}
	
});

$( document ).ready(function(){
	var ctr = 4; //base number of results shown
	var count = $(".search-results .recipes-result").length;
	var prodtitlet = $("#producttitlethere").html();
	var prodtitle = $("#producttitlehere").html();
	var cattitle = $("#categorytitlehere").html();
	var subcattitle = $("#subcategorytitlehere").html();
	var link = "products/#!/"+cattitle+"/"+subcattitle+"/"+prodtitle;
	// alert(prodtitle);
	// alert(ctr + "/" + count);

	$(".search-results .recipes-result:gt("+(ctr-1)+")").css("display", "none");

	$("#btn-showmore").click(function(){
		// alert(ctr + "/" + count);
		if(count <= (ctr+4)){ //the increment is 4
			$(this).hide();
		}

		ctr += 4; //the increment is 4

		$(".search-results .recipes-result").css("display", "inline-block");
		$(".search-results .recipes-result:gt("+(ctr-1)+")").css("display", "none");
		
	});

	$(".ingredienttitle").each(function(){
		var found = $(this).html().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
		var n = found.indexOf(prodtitlet.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, ""));
		

		// if(n >= 0){
		// 	$(this).html("<a href='"+link+"'>"+prodtitlet+"</a>");
		// }

		if(n >= 0){
			var noaccent = $(this).html().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
			var prodtitletna = prodtitlet.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
			var newstr = noaccent.replace(new RegExp(prodtitletna, "ig"), "<a href='"+link+"'>"+prodtitlet+"</a>");
			// alert(newstr);
			$(this).html(newstr);
		}
	});

	$(".steptitle").each(function(){
		var found = $(this).html().toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
		var n = found.indexOf(prodtitlet.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, ""));
		

		if(n >= 0){
			var noaccent = $(this).html().normalize('NFD').replace(/[\u0300-\u036f]/g, "");
			var prodtitletna = prodtitlet.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
			var newstr = noaccent.replace(new RegExp(prodtitletna, "ig"), "<a href='"+link+"'>"+prodtitlet+"</a>");
			// alert(newstr);
			$(this).html(newstr);
		}
	});

	var pathname = window.location.pathname;

	pathname = pathname.split('/');

	if(jQuery.inArray("recipes", pathname)>=0 || jQuery.inArray("recipe-detail", pathname)>=0 ){
		$(".added").css("display", "flex");
	}

	else{
		$(".added").css("display", "none");
	}
});