String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};
//-------------------------------------------------------------------------------------------------------------------------------------------------------
// ALL
//-------------------------------------------------------------------------------------------------------------------------------------------------------
var script = {
	formEdit : null,
	table : null,
	tableReorder : null,
	init : function(){
		$("[data-submenu]").submenupicker();
		this.datatTable();
		this.tinymce();

		this.formEdit = new form("form");
		this.formEdit.init();

		
		$(".sortable").sortable();
	},
	datatTable : function(){

		var t = $(".responsive-data-table");
		var reorder = t.attr("reorder") || false;
		var opt = {
		    PaginationType: "bootstrap",
		    responsive: true,
		    dom: '<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>Blrtip',
		    iDisplayLength: 10,
		    lengthMenu: [10, 25, 50]
		};
		opt.rowReorder = reorder;
		script.table = $(".responsive-data-table").DataTable(opt);
		script.table.on('row-reorder.dt', function(dragEvent, data, nodes) {
			var data = [];
			var i = 1;
		    script.table.$("tr").find("[name='order_by']").each(function(){
		    	var self = $(this);
		    	var tr = self.closest("tr");
	    		var p = {};
	    		p.id = parseInt(tr.attr("id"));
	    		p.order = i;
		    	data.push(p);
		    	i++;
		    })
		    
		    var href = $("[name='href_orderby']").val() || "";

		    if (href){
		    	var formData = new FormData();
				formData.append("data", JSON.stringify(data));
				ajaxForm.post(href, formData, function(data){
					
				});	
		    }
		    
		})    

		$( ".js-search-table" ).on( "keyup", function () {
		    if ( script.table.search() !== this.value ) {
		        script.table.search( this.value ).draw();
		    }
		    script.table.$("tr").find("[name='checked_tr']").each(function(){
				$(this).prop("checked", false);
				var tr = $(this).closest("tr");
				tr.removeClass("is-active");
			});
			script.labelChecked();
		});
	},
	tinymce : function(e){
		var textarea_tinymce = $("textarea.tinymce");
		var rows = parseInt(textarea_tinymce.attr("rows") || 0) * 20;
		
		tinymce.init({
			selector: "textarea.tinymce",
			theme: 'modern',
			plugins: "image,code,lists,table",
			menubar: "",
			toolbar1: 'insertfile undo redo | bold italic fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table code ',
  			fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
			height : rows,
			content_style: "p {margin: 0px;}",
			file_picker_callback: function(cb, value, meta) {
			    fileManager.showModal();
			    app.click(".js-select-file", function(){
					$(".js-click-file-folder").each(function(){
						var self = $(this);
						var wrap = self.closest(".wrap")
						if (wrap.hasClass("is-active")){
							var dir = $(".bdir").text() + "/" || "";
							var name = wrap.find(".box-copy .name").text();
							cb(mainFolder + "storage/" + dir + name);
							fileManager.el.find(fileManager.modalElement).modal("hide");
						}
					});
				});
		    }
	 	});
	},	
	labelChecked : function(){
		var count = 0;
		var countAll = script.table.page.info().recordsDisplay;
		script.table.$("tr").each(function(){
			var self = $(this);
			var checkedTr = self.find("[name='checked_tr']");
			( ! checkedTr.prop("checked") ) ? false : count++;
		});

		if (count == 0){
			$(".box-desc .desc-table .count").text(countAll);
			var s = (countAll <= 1) ? "" : "s";
			$(".box-desc .desc-table .s").text(s);
			$(".menu-checked").addClass("hidden");
		}else{
			$(".box-desc .desc-table .count").text(count);
			var s = (count <= 1) ? "" : "s";
			$(".box-desc .desc-table .s").text(s + " selected");
			$(".menu-checked").removeClass("hidden");
		}
		
	},
}
script.init();

app.click(".js-click-href", function(){
	var self = $(this);
	var href = self.attr("href");
	app.redirect(href);
});
app.click(".js-send", function(){
	script.formEdit.submit();
	return false;
})
app.change("[name='checked_tr']", function(){
	var self = $(this);
	var tr = self.closest("tr");
	(self.prop("checked")) ? tr.addClass("is-active") : tr.removeClass("is-active");	
})

app.click(".js-click-checkbox a", function(e){
	e.stopPropagation(); 
})
app.click(".js-click-checkbox", function(){
	var self = $(this);
	
	var c = self.find("[name='checked_tr']");
	c.prop("checked", ! c.prop("checked"));
	c.change();
	$("[name='checked_all']").prop("checked", true);
	script.table.$("tr").find("[name='checked_tr']").each(function(){
		( ! $(this).prop("checked") ) ? $("[name='checked_all']").prop("checked", false) : false;
	});
	script.labelChecked();	
});
app.click("[name='checked_all']", function(){
	var self = $(this);
	script.table.$("tr").each(function(){
		var c = $(this).find("[name='checked_tr']");
		c.prop("checked", self.prop("checked"));
		c.change();
		script.labelChecked();
	})
})
app.click(".js-action-table", function(){
	var self = $(this);
	var find = self.attr("find");
	var url = self.attr("url");
	
	var id = [];
	$("." + find + " [name='checked_tr']").each(function(){
		if ($(this).prop("checked")){
			id.push(parseInt($(this).val() || 0));
		}
	})
	var formData = new FormData();
	formData.append("id", id);
	ajaxForm.post(url, formData, function(data){
		(data.success) ? app.redirect(data.redirect) : false;
	});
	return false;
})
//-------------------------------------------------------------------------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------------------------------------------------------------------------
// FILEMANAGER
//-------------------------------------------------------------------------------------------------------------------------------------------------------
var fileManager = {
	modalElement : ".js-modal-filemanager",
	el : $(".js-add-modal-filemanager"),
	elClick : null,
	init : function(){
	},
	inputEnter : function(){
		$("[name='folder_name']").on("keydown", function(e){
			var self = $(this)
			switch (e.keyCode){
				case 13:
					$(".js-add-folder").click();
					break;
			}
		})
	},
	showModal : function(dir){
		
		dir = dir || "";	
		
		var self = this;
		var formData = new FormData();

		formData.append("dir", dir);
		ajaxForm.post("file_manager/show",formData, function(data){
			if (self.el.find(".js-modal-filemanager .modal-content").text() != ""){
				self.el.find(".js-modal-filemanager .modal-content").html($(data.html).find(".modal-content").html());
			}else{
				self.el.html(data.html);	
			}
			self.el.find(self.modalElement).modal("show");
			self.inputEnter();
			
		});
	},
	addFolder : function(dir, name){
		var self = this;
		dir = dir || "";	
		var formData = new FormData();
		formData.append("dir", dir);
		formData.append("name", name);
		ajaxForm.post("file_manager/add_folder",formData, function(data){
			fileManager.showModal(dir);
			$("[name='folder_name']").val("");
			$(".js-modal-add-folder").modal("hide");
		});
	},
	deleteFolder : function(dir){
		dir = dir || "";	

		var self = this;
		var data = [];
		var formData = new FormData();
		formData.append("dir", dir);
		$(".js-click-file-folder").each(function(){
			var self = $(this);
			var wrap = self.closest(".wrap")
			var t = {};
			if (wrap.hasClass("is-active")){
				t.name = wrap.find(".name").text();
				data.push(t);
			}
		})
		formData.append("data", JSON.stringify(data));
		ajaxForm.post("file_manager/delete_folder",formData, function(data){
			fileManager.showModal(dir);
			$(".js-modal-delete-folder").modal("hide");
		});
	},
	addFile : function(dir, e){
		dir = dir || "";	

		$.each(e.files, function (k, v){
			if (e.files[k]) {
				var reader = new FileReader();
				var formData = new FormData();
		        reader.onload = function (i) {
		        	formData.append("image_data", i.target.result);	
		        	formData.append("name", e.files[k]["name"]);	
		        	formData.append("dir", dir);	
		        	ajaxForm.post("file_manager/add_file",formData, function(data){
		        		fileManager.showModal(dir);
		        	})
		        }


		        reader.readAsDataURL(e.files[k]);
	        }

			
		});
	},

}
fileManager.init();

app.click(".js-select-file", function(){
	$(".js-click-file-folder").each(function(){
		var self = $(this);
		var wrap = self.closest(".wrap")
		if (wrap.hasClass("is-active")){
			var dir = $(".bdir").text() + "/" || "";
			var name = wrap.find(".box-copy .name").text();

			c = fileManager.elClick;
			if (c){
				var imgSelect = c.find(".src-image-select")
				imgSelect.attr("src",imgSelect.attr("mainfolder") +  dir + name);
				c.find(".input-path").val(dir);
				c.find(".input-name").val(name);

				fileManager.el.find(fileManager.modalElement).modal("hide");
				imageSelect.checkActive();	
			}
			
		}
	});
});


app.click(".js-click-filemanager", function(){
	fileManager.showModal();
	return false;
});

app.click(".js-click-breadcrumbs", function(){
	var self = $(this);
	var dir = self.attr("dir") || "";
	fileManager.showModal(dir);
	return false;
});
app.click(".js-add-folder", function(){
	var self = $(this);
	var dir = $(".bdir").text() || "";
	var folder_name = $(".js-modal-add-folder [name='folder_name']").val() || "";
	fileManager.addFolder(dir, folder_name);
	return false;
});
app.click(".js-delete-folder", function(){
	var self = $(this);
	var dir = $(".bdir").text() || "";
	fileManager.deleteFolder(dir);
})


var c = 0, t = null;
app.click(".js-click-file-folder", function(){
	c++;
	var self = $(this);
    if(c === 1) {
        t = setTimeout(function() {
			self.closest(".wrap").toggleClass("is-active");

			
			var count = 0;
			var disabled = false;
			$(".js-click-file-folder").each(function(){
				var self = $(this);
				var wrap = self.closest(".wrap")
				if (wrap.hasClass("is-active")){
					count ++;	
					if ($(this).hasClass("js-click-folder")){
						disabled = true;
					}
				}
			});

			(count == 1 && !disabled) ? $(".js-select-file").removeAttr("disabled") : $(".js-select-file").attr("disabled", "disabled");
			(count == 0) ? $(".menu-checked").addClass("hidden") : $(".menu-checked").removeClass("hidden");

            c = 0;             
        }, 300);
    } else {

        clearTimeout(t);    
        c = 0;             
        if (self.hasClass("js-click-file")) {
        	$(".js-select-file").click();
        }else{
        	var bdir = $(".bdir").text() || "";
			var adir = self.find(".box-copy .name").text()  || "";
			var dir = ( (bdir) ? bdir + "/" : "" ) + adir;
			fileManager.showModal(dir);	
        }
        
    }
	return false;
})
app.click(".js-click-upload", function(){
	var self = $(this);
	$("[for='js-click-upload']").click();
	return false;
})
app.change("[for='js-click-upload']", function(){
	var self = this;
	var bdir = $(".bdir").text() || "";
	fileManager.addFile(bdir, self);
})
//-------------------------------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------------------------------
// IMAGE SELECT
//-------------------------------------------------------------------------------------------------------------------------------------------------------

var imageSelect = {
	el : $(".box-image-select"),
	init : function(){
		this.checkActive();	
	},
	checkActive : function(e){
		this.el.each(function(){
			if ($(this).find(".src-image-select").attr("src") == ""){
				$(this).addClass("is-empty");
			}else{
				$(this).removeClass("is-empty");
			}	
		})
		
	},
}
imageSelect.init();

app.click(imageSelect.el, function(){
	fileManager.elClick = $(this);
	fileManager.showModal();
})
app.click(imageSelect.el.find(".js-trash"), function(){
	var self = $(this);
	var b = self.closest(".box-image-select");
	b.find(".src-image-select").attr("src", "");
	b.find("input").each(function(){
		$(this).val("");
	});
	if (b.find(".src-image-select").attr("src") == ""){
		b.addClass("is-empty");
	}else{
		b.removeClass("is-empty");
	}
	return false;

})

//-------------------------------------------------------------------------------------------------------------------------------------------------------


app.click(".js-click-modal-delete", function(){
	var self = $(this);
	var url = self.attr("url");
	var modalDelete = $(".js-modal-delete");
	modalDelete.find(".js-action-table").attr("url",url);
	modalDelete.modal("show");
})

app.click(".js-console", function(){
	console.log("asdasdasd");
	return false;
})