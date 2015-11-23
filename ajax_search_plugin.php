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


    if(isset($_POST["searchitem"]) && $_POST["searchitem"] != ""){

        $query = strtolower($_POST["searchitem"]);
        $query = str_replace("-", " ", $query);

        $j = file_get_contents('modules/cdnjs/cdnjs.json');
        $j = json_decode($j);
        
        $found = false;
        
        for($i=0; $i<count($j->results); $i++){
            
            $name = strtolower($j->results[$i]->name);
            $name = str_replace("-", " ", $name);
            
            if (strpos($name, $query) !== false) {
                $result[$i]["name"] = $j->results[$i]->name;
                $result[$i]["link"] = $j->results[$i]->latest;
                $result[$i]["description"] = $j->results[$i]->description;
                $result[$i]["homepage"] = $j->results[$i]->homepage;
                $found = true;
            }
        }
        
        // print search result.

        if($found){

            foreach ($result as $item) {
                $n = $item['name'];
                $l = $item['link'];
                $d = $item['description'];
                $h = $item['homepage'];

                echo "<div class='pack_block'>";
                echo "<div class='pack_name'><a href='" . $h . "' target='_blank' title='Homepage of " . $n . "'>" . $n . "</a></div>";
                echo "<div class='pack_input_link'><input onClick='this.select()' class='reset-this' type='text' value='" . $l . "'></div>";
                echo "<div class='pack_description'>" . $d . "</div>";
                echo "</div>";
            }

        } else {
            echo "No library/package/plugins was found!";
        }
    } else {
        echo "Please type a valid library/package/plugin name";
    }
?>