<?php

    /**
     * 
     * THANKYOU FOR USING <PlayScript/>
     * ALSO SPECIAL THANKS FOR SEEING THE SOURCE CODE
     * HAVE SOME FUN WITH MY BAD CODING STYLE ;)
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

    // Detecting the project name.
    if(isset($_POST['code'])){
        $filename = "TempFiles/" . $_POST['SetFileName'] . ".php";
        $theFile = str_replace("TempFiles/", "", $filename);
        $create = 1;
    }
    if(isset($_GET['file'])) {
        $filename = "TempFiles/" . $_GET['file'];
        $filename = trim($filename);
        $theFile = str_replace("TempFiles/", "", $filename);
        $FileArchived = "YES";
    }
    if(isset($FileArchived)){
        $ExecFile =  str_replace(".php", "", $theFile);
        $DynamicName = $ExecFile . "-" . time();
    } else {
        $DynamicName = time();
        if (isset($_POST['SetFileName'])) {
            $ExecFile = $_POST['SetFileName'];
        }
    }
    
    // Fetch general editor settings.
    $settings = GetGeneralSettings();

?>

<div class="maincontainer">
<?php if(SecretKey() === "NONE"): ?>

<?php
    /**
     * check for secret key if there is no secret key then promt the set a secret key window and hide all other infos.
     **/
    require_once("includes/php/setKey.php");
?>

<?php else: ?>

<table width="100%" border="0">
    <tr>
        <td>

<div class="mainConsole outputx">
    <div class="header">Ouput Panel <?php if(isset($filename)) print "<span style='color:#666;'> (" . $theFile . ")</span>"; ?>
            <div class="icons">
                <span class="exitfullscreenx" style="display:none;"><i class="fa fa-compress tpp" title="Small Screen"></i></span>
                <span class="fullscreenx"><i class="fa fa-expand tpp" title="Full Screen"></i></span>
            </div>
    </div>
    <div class="output codeot">
        <?php 
            if (isset($filename)) {
                if(isset($create)) {
                    file_put_contents($filename, $_POST['code']);
                    // StoreData($theFile, "php", time());
                }
                print "<iframe class='playscript_monitor' src=\"$filename\" frameborder=\"0\" width=\"100%\" height=\"100%\"></iframe>";
                ?>
                    <script>
                        $(document).ready(function(){
                            // Create new post in Ajax
                            $('button.playsub').on('click', function(e){
                                //e.preventDefault();
                                console.log($("input.SetFileName").val());
                                $(this).blur();
                                // post all the data
                                $.post(
                                    'index.php',
                                    $(this).closest('form.playscript_editor').serialize()
                                );
                                // refresh the iframe
                                setTimeout(function(){
                                    $( '.playscript_monitor' ).attr( 'src', function ( i, val ) { return val; });
                                }, 1000);

                                var old_fileName = '<?php echo $ExecFile; ?>';
                                if(old_fileName != $("input.SetFileName").val()){
                                    window.location.href = window.location.origin+window.location.pathname+"?file="+$("input.SetFileName").val()+".php";
                                }

                                // display success message
                                alertify.set({ delay: 4000 });
                                alertify.success("Project file has updated");

                                return false;
                            });
                        });
                    </script>
                <?php
            } else {
                print "<span class='def'>No Project To Show</span>";
            }
        ?>
    </div>
</div>


<div class="mainConsole editorX">
    <div class="header">
        <div class="headerElements">
            Editor Panel <?php if(isset($filename)) print "<span style='color:#666;'>(" . $theFile . ")</span>"; ?>
            <div class="icons">
                <span class="exitfullscreen" style="display:none;"><i class="fa fa-compress tpp" title="Small Screen"></i></span>
                <span class="fullscreen"><i class="fa fa-expand tpp" title="Full Screen"></i></span>
            </div>
        </div>
        </div>
    <div class="output">
        <div class="editorwrapper">
            <form action="index.php" method="POST" class="playscript_editor">

                <div class="editorWrapper">
                    <div id="editor"></div>
                </div>
                    <textarea name="code" id="code"><?php 
                    if (isset($filename)) {
                        print htmlentities(file_get_contents($filename));
                    }
                    ?></textarea>
                <?php 
                    if(!isset($theFile)) $theFile = time();
                    else $theFile = $ExecFile;
                ?>
                <button class="playsub"><i class="fa fa-flash"></i> Execute</button> <span class="exitfullscreen playsub" style="display:none;"><i class="fa fa-compress tpp" title="Small Screen"></i> Small Screen</span>
                <span class="ProjectRenameBeforeExecute"> Project Name: <input class="SetFileName" title="Click to rename" type="text" name="SetFileName" value="<?php print $theFile; ?>"></span>
                <!-- <span class="overwriteProject" data-rewrite="no"><i class="fa fa-retweet"></i> Overwrite</span> -->
            </form>
        </div>
    </div>
</div>

<?php if( isset($_POST['code']) || isset($_GET['file']) ){ ?>
    <script>
    $( document ).ready(function() {

        // var DynamicNameBackup   = "<?php print $DynamicName; ?>",
        //     OverWriteName   = "<?php print $ExecFile; ?>",
        //     MadManDid       = 1;

        // $(".overwriteProject").show().on("click", function(){
        //     $(this).data('rewrite', 'yes');
        //     if(MadManDid == 1){
        //         $("input.SetFileName").val(OverWriteName);
        //         $(this).css({color: "#329e64",  background:"#dddabe"});
        //         MadManDid = MadManDid + 1;
        //     } else {
        //         $("input.SetFileName").val(DynamicNameBackup);
        //         $(this).css({color: "#555",  background:"#fff"});
        //         MadManDid = MadManDid - 1;
        //     }
        // });     
    });
    </script>
<?php } ?>
            
        </td>
        <td class="rightbarwrapper" width="300px" height="100%">
            <div class="mainConsole rightbar">
                <div class="header">Menu / Settings</div>
                <div class="menu_items">
                    <div class="menu_header"><span class="fa fa-chevron-circle-right"></span> Recent Files</div>
                    <div class="recentFiles">
                        <div class="loaded">
                            <?php
                                if (isset($_SESSION['recentLoads'])) {
                                    $loadF = $_SESSION['recentLoads'];
                                } else {
                                    $loadF = 11;
                                }
                                foreach (RecentFiles(0, $loadF) as $key => $item){
                                    print "<a style='text-decoration:none;' href='?file=" . $key . "'><div class='fileitems'><span class='fa fa-file-code-o'></span> " . $key . "</div></a>";
                                }
                            ?>  
                        </div>
                    <div class="more">More Recent Files</div>
                    </div>
                    <div class="menu_header"><span class="fa fa-chevron-circle-right"></span> Themes</div>
                        <?php
                            $themes = array("playscript", "monokai", "cobalt", "clouds", "ambiance", "chaos", "chrome", "clouds_midnight", "crimson_editor", "dawn", "dreamweaver", "eclipse", "github", "idle_fingers", "katzenmilch", "kr_theme", "kuroir", "merbivore", "merbivore_soft", "mono_industrial", "pastel_on_dark", "solarized_dark", "solarized_light", "terminal", "textmate", "tomorrow", "tomorrow_night", "tomorrow_night_blue", "tomorrow_night_bright", "tomorrow_night_eighties", "twilight", "vibrant_ink", "xcode");
                            $attr = array('class'=>'select uc', 'id'=>'theme');
                            print MenuMaker($themes, $selected = $settings->theme, $attr);
                        ?>

                    <div class="menu_header">
                        <div class="inline">
                            <span class="fa fa-chevron-circle-right"></span> Font Size: 
                        </div>
                            <?php
                                $fontSizes = array("8px", "10px", "11px", "12px", "13px", "14px", "15px", "16px", "17px", "18px", "19px", "20px", "22px", "24px", "26px", "28px", "30px", "35px", "40px", "50px", "60px");
                                $attr = array('class'=>'', 'id'=>'fontsize');
                                print MenuMaker($fontSizes, $selected = $settings->fontsize, $attr);
                            ?>
                    </div>

                    <div class="menu_header">
                        <div class="inline">
                            <span class="fa fa-chevron-circle-right"></span> Language 
                        </div>
                            <?php
                                $languages = array("html", "css", "javascript", "php", "plain_text");
                                $attr = array('class'=>'uc', 'id'=>'language');
                                print MenuMaker($languages, $selected = $settings->language, $attr);
                            ?>
                        </div>

                    <div class="menu_header"><span class="fa fa-chevron-circle-right"></span> Current Project</div>
                    <div class="CurrentProject">
                    <?php
                        if (isset($filename)) {
                    ?>
                        <div class="downloadFileButton">
                            <form action="includes/php/save.php" method="post">
                                <input type="hidden" name="file" value="<?php print $filename; ?>">
                                <button class="DownloadSingleFile" type="submit"><i class="fa fa-download"></i> Download</button>
                            </form>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="file" value="<?php print $filename; ?>">
                                <button class="DeleteSingleFile" type="submit"><i class="fa fa-minus-circle"></i> Delete</button>
                            </form>
                        </div>
                    <?php
                        } else {
                            print "No Project Found";
                        }
                    ?>
                    </div>

                </div>
            </div>
        </td>
    </tr>
</table>


<?php endif; ?>


</div> <!-- maincontainer ends -->

<!-- Notification Alert -->
<span class="notify-success">Settings Saved</span>

<script>

/* Editor Settings */

    // Adding Emmet
    ace.require("ace/ext/emmet");

    var editor = ace.edit("editor"),
        tab = 4;

    // Default Theme
    editor.setTheme("ace/theme/<?php print $settings->theme; ?>");
    // Default mode
    editor.getSession().setMode("ace/mode/<?php print $settings->language; ?>");
    
    // Disable print margin visibility
    editor.setShowPrintMargin(false);

    // Show Save Settings Notification
    function notify(){
        $("span.notify-success").show().delay(2000).fadeOut(300);
    }

    // Default editor font size
    $("div#editor").css("font-size", "<?php print $settings->fontsize; ?>");

    $("select#theme").on('change', function(){
        var themeName = $("select#theme option:selected").val();
        editor.setTheme("ace/theme/" + themeName);
        notify();
        $.post("ajax_save.php", {functionName: "SaveSettings", theme: themeName}, function(){});

    });

    $("select#language").on('change', function(){
        var lang = $("select#language option:selected").val();
        editor.getSession().setMode("ace/mode/" + lang);
        notify();
        $.post("ajax_save.php", {functionName: "SaveSettings", language: lang}, function(){});
    });

    $("select#fontsize").on('change', function(){
        var fs = $("select#fontsize option:selected").val();
        $("div#editor").css("font-size", fs);
        notify();
        $.post("ajax_save.php", {functionName: "SaveSettings", fontsize: fs}, function(){});
    });



    editor.setOptions({
        enableEmmet: true
        // enableSnippets: true,
        // enableLiveAutocompletion: false
    });



    textarea = $('textarea[name="code"]').hide();
    editor.getSession().setValue(textarea.val());

    editor.getSession().setTabSize(tab);

    editor.getSession().on('change', function(){
        textarea.val(editor.getSession().getValue());
    });

/* End of Editor Settings */

/* max-min ouput panel */
$('span.fullscreenx').click(function() {
    $("div.outputx").css({
        position:'fixed', 
        top: $(window).scrollTop(),
        left: 0,
        height: '100%',
        width: '100%'
    }).addClass("outputxxx");
    $(this).hide();
    $("span.exitfullscreenx").show();
    $("div.codeot").css({
        width: '100%',
        height: '95%'
    });
});
$("span.exitfullscreenx").click(function(){
    $("div.outputx").removeAttr("style").removeClass("outputxxx");
    $("div.codeot").removeAttr("style");
    $("span.exitfullscreenx").hide();
    $("span.fullscreenx").show();
});

/* max-min editor */
$('span.fullscreen').click(function() {
    $("div.editorX").css({
        position:'fixed',
        top: $(window).scrollTop(),
        left: 0,
        height: '100%',
        width: '100%'
    });
    $(this).hide();
    $("span.exitfullscreen").show();
    var $vh = $( window ).height();
    $(".CodeMirror").css({
        height: $vh - 80,
        width: '100%'
    });
});
$("span.exitfullscreen").click(function(){
    $("div.editorX").removeAttr("style");
    $(".CodeMirror").removeAttr("style");
    $("span.exitfullscreen").hide();
    $("span.fullscreen").show();
});

$(document).ready(function(){
    var count   = <?php print $loadF; ?>,
        done    = 0,
        more    = $('div.recentFiles div.more'),
        loaded  = $('div.recentFiles div.loaded');
    $(more).on('click', function(){
            $(this).text("Fetching...");
            count = count + 11;
            $.post('loadRecentFiles.php', { start: 0, end : count}, function(returnedData){
                if(returnedData == "completed"){
                    $(loaded).append("<div class='noFiles'>All Files Are Loaded</div>");
                    $(more).hide();
                } else {                    
                    $(loaded).empty().append(returnedData);
                    $(more).text("More Recent Files");
                    $.post('sessions.php', {recentLoads: count}, function(){});
                }
            });
    });
    $(".fileitems").on('click', function(){
        console.log($(this).data('fname'));
    });
});
</script>
<?php require_once("includes/php/footer.php"); ?>
</body>
</html>