ace.define("ace/theme/playscript",["require","exports","module","ace/lib/dom"], function(require, exports, module) {

exports.isDark = true;
exports.cssClass = "ace-playscript";
exports.cssText = ".ace-playscript .ace_gutter {\
background: #3b3b3b;\
color: #66a58d\
}\
.ace-playscript .ace_print-margin {\
width: 1px;\
background: #3b3b3b\
}\
.ace-playscript {\
background: url('includes/image/playscript-theme-bg1.jpg') no-repeat center center fixed;\
background-size: cover;\
color: #D7C8F7;\
font-weight: 300;\
}\
.ace-playscript .ace_cursor {\
color: #ccc\
}\
.ace-playscript .ace_marker-layer .ace_selection {\
background: rgba(90, 100, 126, 0.88)\
}\
.ace-playscript.ace_multiselect .ace_selection.ace_start {\
box-shadow: 0 0 3px 0px #323232;\
border-radius: 2px\
}\
.ace-playscript .ace_marker-layer .ace_step {\
background: rgb(102, 82, 0)\
}\
.ace-playscript .ace_marker-layer .ace_bracket {\
margin: -1px 0 0 -1px;\
color:#fff;\
font-weight: bold\
}\
.ace-playscript .ace_marker-layer .ace_active-line {\
background: rgba(12, 12, 12, 0.1)\
}\
.ace-playscript .ace_gutter-active-line {\
background-color: #353637\
}\
.ace-playscript .ace_marker-layer .ace_selected-word {\
border: 1px solid rgba(90, 100, 126, 0.88)\
}\
.ace-playscript .ace_invisible {\
color: #404040\
}\
.ace-playscript .ace_keyword,\
.ace-playscript .ace_meta {\
color: #CC7833\
}\
.ace-playscript .ace_constant,\
.ace-playscript .ace_constant.ace_character,\
.ace-playscript .ace_constant.ace_character.ace_escape,\
.ace-playscript .ace_constant.ace_other,\
.ace-playscript .ace_support.ace_constant {\
color: #6C99BB\
}\
.ace-playscript .ace_invalid {\
color: #FFFFFF;\
background-color: #FF0000\
}\
.ace-playscript .ace_fold {\
background-color: #CC7833;\
border-color: #FFFFFF\
}\
.ace-playscript .ace_support.ace_function {\
color: #45a5a2\
}\
.ace-playscript .ace_variable.ace_parameter {\
font-style: italic\
}\
.ace-playscript .ace_string {\
color: #A5C261\
}\
.ace-playscript .ace_string.ace_regexp {\
color: #CCCC33\
}\
.ace-playscript .ace_comment {\
font-style: italic;\
color: #BC9458\
}\
.ace-playscript .ace_meta.ace_tag {\
color: #FFE5BB\
}\
.ace-playscript .ace_entity.ace_name {\
color: #FFC66D\
}\
.ace-playscript .ace_collab.ace_user1 {\
color: #323232;\
background-color: #FFF980\
}\
.ace-playscript .ace_indent-guide {\
background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEklEQVQImWMwMjLyZYiPj/8PAAreAwAI1+g0AAAAAElFTkSuQmCC) right repeat-y\
}";

var dom = require("../lib/dom");
dom.importCssString(exports.cssText, exports.cssClass);
});
