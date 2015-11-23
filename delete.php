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


	require_once("includes/php/header_files.php");
	if (isset($_POST['file'])) {
		$file= $_POST['file'];
		$sfile = str_replace("TempFiles/", "", $file);
	}

	$rootlink = str_replace("delete.php", "", GenerateHomeLink());

	if(isset($_POST['file']) && !isset($_POST['confirm'])) {
?>
	<div class="mainConsole" style="width:70%; margin:auto auto; margin-top:50px;">
	<div class="header">Delete <?php print $sfile; ?></div>
	<div class="sin">
		<i class="fa fa-info-circle"></i> Are you sure that you want to delete <a href="<?php print $rootlink ?>?file=<?php print $sfile; ?>" title="Click to re-open the file"><b><?php print $sfile; ?></b></a>? <br />
		Once you delete a file it can not be undo!
		<form action="delete.php" method="post">
			<input type="hidden" name="file" value="<?php print $file; ?>">
			<input type="hidden" name="confirm" value="YAP">
			<button type="submit"><i class="fa fa-minus-circle"></i> Delete</button>
		</form>
	</div>
	</div>
<?php
	} elseif (isset($_POST['file']) && isset($_POST['confirm'])){
		unlink($file);
		// unlink("includes/database/$file.psdb");
?>
	<div class="mainConsole" style="width:70%; margin:auto auto; margin-top:50px;">
	<div class="header"><?php print $sfile; ?> Deleted</div>
	<div class="sin">
		<i class="fa fa-check"></i> <b><?php print $sfile; ?></b> was deleted successfully!<br />
		<a class="btn" href="<?php print $rootlink ?>"><i class="fa fa-arrow-circle-o-left"></i> Go Back</a>
	</div>
	</div>
<?php
	}
?>