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


	session_start();
	require_once("includes/php/functions.php");
	require_once("includes/php/global_vars.php");
	if(isset($_POST['recentLoads'])){
		$_SESSION['recentLoads'] = $_POST['recentLoads'];
	}
?>