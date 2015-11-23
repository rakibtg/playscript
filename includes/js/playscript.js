$(document).ready(function(){

	var updateButton = $("span.updatecdn");
	updateButton.on("click", function(){
		updateButton.addClass('sds');
		updateButton.html("<img src='includes/image/loader.gif' alt=''>");
		
		// Send a post request to the php file,
		// in order to start the update process.
		$.post('modules/cdnjs/library_updater.php', {doUpdate: "update"}, function(data){
			if(data == "updated"){
				updateButton.html("Updated Successfully");
				$("span.luo").text('updated just now');
			} else {
				updateButton.html("Error occured while updating!");
			}
			updateButton.removeClass('sds');
		});
	});

	/*
	 * search the cdnjs api for librarys [js part], core part is [php]
	**/
	var searchPlugin = $("span.searchLibs");
	searchPlugin.on("click", function(){
		var keyword = $("input.pluginFinder").val();
		$.post('ajax_search_plugin.php', {'searchitem': keyword}, function(data){
			$("div.plug_resutls").html(data);
		});
		// alert(keyword);
	});

	
});