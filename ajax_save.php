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

    // update settings
    if(isset($_POST['functionName'])) {
        if($_POST['functionName'] === "SaveSettings"){

            $saved = GetGeneralSettings();

            if(!isset($_POST['theme'])){
                $theme = $saved->theme;
            } else {
                $theme = $_POST['theme'];
            }

            if(!isset($_POST['fontsize'])){
                $fontsize = $saved->fontsize;
            } else {
                $fontsize = $_POST['fontsize'];
            }

            if(!isset($_POST['language'])){
                $language = $saved->language;
            } else {
                $language = $_POST['language'];
            }

            SaveSettings($theme, $fontsize, $language);
        }        
    }

?>