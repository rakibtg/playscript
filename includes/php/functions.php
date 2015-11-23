<?php
    function CountTempFiles(){
        return count(scandir("TempFiles"))-1;
    }

    /**
     * Store data about each file, like which language, which extension etc.
     **/
    // function StoreData($filename, $language, $timeCreated){
    //     $data['language'] = $language;
    //     $data['time'] = $timeCreated;
    //     file_put_contents("includes/database/TempFiles/$filename.psdb", json_encode($data));
    // }
    // function GetFileInfo($filename){
    //     return json_decode(file_get_contents("includes/database/TempFiles/$filename.psdb"));
    // }
    // not sure why i wrote this two function 

    function SaveSettings($theme, $fontsize, $lang){
        $data['theme'] = $theme;
        $data['fontsize'] = $fontsize;
        $data['language'] = $lang;
        file_put_contents("includes/database/internal/general.psdb", json_encode($data));
    }


    function GetGeneralSettings(){
        return json_decode(file_get_contents("includes/database/internal/general.psdb"));
    }

    function CountLibraries(){
        return count(scandir("js_library"))-1;
    } 

    function NewFileName(){
        return time() . ".php";
    }

    function RecentFiles($start = 0, $end = 6){
        $items = array();
        foreach (scandir("TempFiles") as $node) {
            $nodePath = "TempFiles" . DIRECTORY_SEPARATOR . $node;
            if (is_dir($nodePath)) continue;
            $items[$node] = filemtime($nodePath);
        }
        arsort($items);
        return array_slice($items, $start, $end);
    }

    function RecentLibs(){
        $items = array();
        foreach (scandir("js_library") as $node) {
            $nodePath = "js_library" . DIRECTORY_SEPARATOR . $node;
            if (is_dir($nodePath)) continue;
            $items[$node] = filemtime($nodePath);
        }
        arsort($items);
        return array_slice($items, 0, CountLibraries());
    }

    function CleanTempFiles(){
        $files = glob("TempFiles/*");
        foreach($files as $file){
        if(is_file($file))
            unlink($file);
        }
        return true;
    }

    function SetSecretKey($name, $key){
        $data = $name . "\t" . md5($key);
        file_put_contents("includes/db/key.playphp", $data);
        return true;
    }

    function SecretKey(){
        $dir = "includes/db/key.playphp";
        if(is_file($dir)){
            $key = file_get_contents($dir);
            return $key;
        } else {
            return "NONE";
        }
    }

    function CurrentUrl() {
        $pageURL = 'http';
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }

    function GenerateHomeLink(){
        $homeLink = parse_url(CurrentUrl());
        $url = "http://" . $homeLink['host'].$homeLink['path'];
        if (strpos($url, 'index.php') !== false) {
            $url = str_replace("index.php", "", $url);
        }
        return $url;
    }

    function TimeAgo($ptime){
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array( 365 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60  =>  'month',
            24 * 60 * 60  =>  'day',
            60 * 60  =>  'hour',
            60  =>  'minute',
            1  =>  'second'
        );
        $a_plural = array( 'year'   => 'years',
            'month'  => 'months',
            'day'    => 'days',
            'hour'   => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str){
            $d = $etime / $secs;
            if ($d >= 1){
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

    function MenuMaker($arrayLists, $selected = "", $attr){

        if(!isset($arrayLists)) return false;

        $elementClass = "";
        $elementID = "";

        if(isset($attr["class"])){
            $elementClass = $attr["class"];
        }

        if(isset($attr["id"])){
            $elementID = $attr["id"];
        }

        $list = "<select class='" . $elementClass . "' id='" . $elementID . "'>";

        foreach ($arrayLists as $item) {

            if(trim($selected) == trim($item)){
                $isSelected = "selected";
            } else {
                $isSelected = "";
            }

            $list .= "<option value='" . $item . "' " . $isSelected . ">" . str_replace("_", " ", $item) . "</option>";
        }

        $list .= "</select>";
        return $list;
    }

?>