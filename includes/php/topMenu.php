<?php 

    /**
     * 
     * THANKYOU FOR USING <PlayScript/>
     * ALSO SPECIAL THANKS FOR SEEING THE SOURCE CODE
     * I AM SORRY FOR MY BAD CODING STYLE :(
     * YOUR CONTRIBUTION WILL BE A GREAT GIFT FOR PLAYSCRIPT
     * LICENSE: OPEN-SOURCE
     * PROJECT HOMEPAGE: http://playscript.prijm.com
     * YOU CAN RICH ME(INITIAL DEVELOPER) AT http://twitter.com/rakibtg FEEL FREE TO TWEET OR MESSAGE YOUR QUERY
     * PLEASE SHARE <PlayScript/> IN YOUR SOCIAL MEDIA
     * <PlayScript/> IS AN OPEN-SOURCE BROWSER BASED APP
     * THANKYOU, HAVE A NICE DAY
     * © 2015 prijm.com
     *
     */

?>

<div class="topMenuOptions">
	<div class="menus">
		<b><?php print $logo; ?></b>
		<a href="<?php echo GenerateHomeLink(); ?>">New Project</a>

<!-- 		<span class="dropdown">
			<span class="main">Test</span>
			<span class="del">
				element<br>elemnt 1<br>some more<br>again
			</span>
		</span>  -->
		<a class="cp" data-toggle="modal" data-target="#newplugins"><i class="fa fa-plus"></i> Search Library/Plugins</a>
		<!-- <a href="#"><i class="fa fa-cube"></i> Quick Hint</a> -->
		<a href="https://github.com/rakibtg/playscript/issues" target="_blank"><i class="fa fa-bug"></i> Report Bug</a> 
		<a class="cp" data-toggle="modal" data-target="#sharemodel"><i class="fa fa-thumbs-o-up"></i> Share / About</a>
	</div>
</div>


<!-- Modal Starts -->
<!-- Modal -->
<div class="modal fade" id="newplugins" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<b class="modal-title" id="myModalLabel">Search CSS/JS Libraries</b> <span class="updatecdn">Update Library</span> <span class="luo">last updated on <?php echo TimeAgo(file_get_contents(GenerateHomeLink()."modules/cdnjs/cheked_at.time")); ?></span>
			</div>
			<div class="modal-body">
				<input type="text" class="pluginFinder" name="pluginName" style="width:70%;" placeholder="CSS or JS library name ex: jquery"> <span class="searchLibs">Search</span>
				<br><small>Type the name for your plugin's, e.g: cookie</small>
				<div class="plug_resutls"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Ends -->


<div class="modal fade" id="sharemodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content sharebody">
    	<div class="t"> <a href="http://playscript.prijm.com/" target="_blank"><?php print $logo ?></a></div>
    	<div class="d">
    		Project Homepage: <a href="http://playscript.prijm.com/" target="_blank">http://playscript.prijm.com</a><br />
    		GitHub: <a href="https://github.com/rakibtg/playscript" target="_blank">https://github.com/rakibtg/playscript</a>
    	</div>

		<div class="t"><?php print $logo ?> on Social Media</div>
		<div class="d soc">
			<a href="https://twitter.com/prijmplayscript" target="_blank">Twitter</a>
            <a href="https://www.facebook.com/PrijmPlayScript" target="_blank">Facebook</a>
			<a href="https://www.facebook.com/prijm.official" target="_blank">prijm @ Facebook</a>
		</div>

		<div class="t">Development</div>
		<div class="d">
			<?php print $logo ?> developed by <a href="https://twitter.com/rakibtg" target="_blank">Hasan</a>, if you like this application then please join at GitHub and contribute your beautiful code!
		</div>
		
		<div class="t">Version / Update</div>
		<div class="d">
			<b>Current Version:</b> v5.0.5 <br>
            Released at 22-Nov-2015 <i>9:59PM</i>
			<div>Please check for new version <a href="https://github.com/rakibtg/playscript" target="_blank">here</a>.</div>
		</div>
		<div class="xx">
			<b>Thanks!</b>
			<button type="button" class="xbtn" data-dismiss="modal">Close</button>
		</div>
    </div>
  </div>
</div>
