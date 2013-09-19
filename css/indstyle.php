<?php
$bggradtop = get_post_meta($id, 'indtable_layout_colwidthkey1', true);
$bggradbottom = get_post_meta($id, 'indtable_layout_colwidthkey2', true);
$indfont = get_post_meta($id, 'indfontfamily_meta_key', true);
$plantextcolor = get_post_meta($id, 'indtable_layout_colwidthkey3', true);
$indplantext_shadowhor = get_post_meta($id, 'indtable_layout_colwidthkey4', true);
$indplantext_shadowver = get_post_meta($id, 'indtable_layout_colwidthkey5', true);
$indplantext_shadowblur = get_post_meta($id, 'indtable_layout_colwidthkey6', true);
$indplandef_width = get_post_meta($id, 'indtable_layout_colwidthkey7', true);
$indplanhover_width = get_post_meta($id, 'indtable_layout_colwidthkey8', true);
$indplancoldef_shadowhor = get_post_meta($id, 'indtable_layout_colwidthkey9', true);
$indplancoldef_shadowver = get_post_meta($id, 'indtable_layout_colwidthkey10', true);
$indplancoldef_shadowblur = get_post_meta($id, 'indtable_layout_colwidthkey11', true);
$indplancolhov_shadowhor = get_post_meta($id, 'indtable_layout_colwidthkey12', true);
$indplancolhov_shadowver = get_post_meta($id, 'indtable_layout_colwidthkey13', true);
$indplancolhov_shadowblur = get_post_meta($id, 'indtable_layout_colwidthkey14', true);
$indfeaturow_1n = get_post_meta($id, 'indtable_layout_colwidthkey15', true);
$indfeaturow_2n = get_post_meta($id, 'indtable_layout_colwidthkey16', true);
$indfeatucol_1n = get_post_meta($id, 'indtable_layout_colwidthkey17', true);
$indfeatucol_2n = get_post_meta($id, 'indtable_layout_colwidthkey18', true);
$indbuttonbg_topdef_color = get_post_meta($id, 'indtable_layout_colwidthkey19', true);
$indbuttonbgdefbottom_color =get_post_meta($id, 'indtable_layout_colwidthkey20', true);
$indbuttonbgtophover_color = get_post_meta($id, 'indtable_layout_colwidthkey21', true);
$indbuttonbgbottomhover_color = get_post_meta($id, 'indtable_layout_colwidthkey22', true);
$indbuttontext_color = get_post_meta($id, 'indbuttontext_color_meta_key', true);

if($ctatextval) :
?>
<style type="text/css">
div#indwrapequally1 {
color: <?php if ($plantextcolor != '') echo $plantextcolor; else echo '#ffffff';?>;
background: <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FhMjI0NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmOTg2ODYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%, <?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>), color-stop(100%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* IE10+ */
background: linear-gradient(to bottom, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>', endColorstr='<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>',GradientType=0 ); /* IE6-8 */
}

div#wrapfeatureequally1{
width: 100%;
border-left: 0px solid #000;
border-bottom: 0px solid #000;
box-shadow: 0 0 #000;
border-top: 0px solid #000;
}

div.indctastyler {
display: none;
height: 30%;
margin-bottom: 10px;
background: <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FhMjI0NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmOTg2ODYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%, <?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>), color-stop(100%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* IE10+ */
background: linear-gradient(to bottom, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>', endColorstr='<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>',GradientType=0 ); /* IE6-8 */
}

div#indwrapequally1 p {
margin: 0 20px 0 20px;
padding-top: 35px;
}

div.truecolind {
float: left;
padding: 0;
}
</style>
<?php
elseif ($ctatextval == '' && $indfeatnameval == '') :
?>
<style type="text/css">

</style>
<?php
endif;
// end css
?>
<style type="text/css">
div#parenttable {
font-family: <?php if ($indfont != '') echo $indfont; else echo 'Arial'; ?>;
text-shadow: <?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowver != '') echo $indplantext_shadowver.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur.'px'; else echo '2px'; ?> #808080;
-moz-text-shadow: <?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowver != '') echo $indplantext_shadowver.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur.'px'; else echo '2px'; ?> #808080;
-ms-text-shadow: <?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowver != '') echo $indplantext_shadowver.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur.'px'; else echo '2px'; ?> #808080;
-o-text-shadow: <?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowver != '') echo $indplantext_shadowver.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur.'px'; else echo '2px'; ?> #808080;
-webkit-text-shadow: <?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowver != '') echo $indplantext_shadowver.'px'; else  echo '1px'; ?> <?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur.'px'; else echo '2px'; ?> #808080;
}

div#indwrapequally2, div.indplan, div.indbutton {
color: <?php if ($plantextcolor != '') echo $plantextcolor; else echo '#ffffff';?>;
background: <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2FhMjI0NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmOTg2ODYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%, <?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>), color-stop(100%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* IE10+ */
background: linear-gradient(to bottom, <?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?> 0%,<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?> 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if ($bggradtop != '') echo $bggradtop; else echo '#a10730';?>', endColorstr='<?php if ($bggradbottom != '') echo $bggradbottom; else echo '#f98686';?>',GradientType=0 ); /* IE6-8 */
}

div.indperiod {
color: <?php if ($plantextcolor != '') echo $plantextcolor; else echo '#ffffff';?>;
}

div.indbutton a {
text-decoration: none;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: 0px 2px 4px #999999;
-moz-box-shadow: 0px 2px 4px #999999;
box-shadow: 0px 2px 4px #999999;
text-shadow: 1px 1px 1px #666666;
border: solid #000000 0px;
color:  <?php if ($indbuttontext_color != '') echo $indbuttontext_color; else echo '#ffffff';?>;
background: <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZjZWY3ZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijc2JSIgc3RvcC1jb2xvcj0iI2U4YmUwNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
background: -moz-linear-gradient(top,  <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?> 0%, <?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?> 76%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>), color-stop(76%,<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?> 0%,<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?> 76%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?> 0%,<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?> 76%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?> 0%,<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?> 76%); /* IE10+ */
background: linear-gradient(to bottom, <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?> 0%,<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?> 76%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>', endColorstr='<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>',GradientType=0 ); /* IE6-8 */
background: -webkit-gradient(linear, 0 0, 0 100%, from(<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>), to(<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>));
background: -moz-linear-gradient(top, <?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>, <?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>);
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>, endColorStr=<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>);
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; else echo '#fcef7e';?>, endColorStr=<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; else echo '#e8be04';?>);
display:inline-block; /* IE friendly */
}

div.indbutton a:hover {
background: <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZjZWY3ZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijc2JSIgc3RvcC1jb2xvcj0iI2U4YmUwNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
background: -moz-linear-gradient(top,  <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?> 0%, <?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?> 76%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>), color-stop(76%,<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?> 0%,<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?> 76%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?> 0%,<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?> 76%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?> 0%,<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?> 76%); /* IE10+ */
background: linear-gradient(to bottom, <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?> 0%,<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?> 76%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>', endColorstr='<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>',GradientType=0 ); /* IE6-8 */
background: -webkit-gradient(linear, 0 0, 0 100%, from(<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>), to(<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>));
background: -moz-linear-gradient(top, <?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>, <?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>);
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>, endColorStr=<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>);
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; else echo '#e8be04';?>, endColorStr=<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; else echo '#fcef7e';?>);
}

div.indbutton a:visited, div.indbutton a:active, a:hover {
color:  <?php if ($indbuttontext_color != '') echo $indbuttontext_color; else echo '#ffffff';?>;
}

div.truecolind {
width: <?php if ($indplandef_width != '') echo $indplandef_width.'px'; else echo '160px'; ?>;
text-align: center;
}

div.indbutton {
box-shadow: <?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor.'px'; else echo'0'; ?> <?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver.'px'; else echo '5px'; ?> <?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur.'px'; else echo '5px'; ?> #808080;
-moz-box-shadow: <?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor.'px'; else echo'0'; ?> <?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver.'px'; else echo '5px'; ?> <?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur.'px'; else echo '5px'; ?> #808080;
-ms-box-shadow: <?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor.'px'; else echo'0'; ?> <?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver.'px'; else echo '5px'; ?> <?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur.'px'; else echo '5px'; ?> #808080;
-o-box-shadow: <?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor.'px'; else echo'0'; ?> <?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver.'px'; else echo '5px'; ?> <?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur.'px'; else echo '5px'; ?> #808080;
-webkit-box-shadow: <?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor.'px'; else echo'0'; ?> <?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver.'px'; else echo '5px'; ?> <?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur.'px'; else echo '5px'; ?> #808080;
}

div.truecolind:hover {
margin-top: -35px;
text-align: center;
border-radius: 5px;
width: <?php if ($indplanhover_width != '') echo $indplanhover_width.'px'; else echo '200px';?>;
padding: 0;
}

div.indplan {/*
box-shadow: <?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor.'px'; else echo '0'; ?> <?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver.'px'; else echo '5px';?> <?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur.'px'; else echo '25px'; ?> #000;
-moz-box-shadow: <?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor.'px'; else echo '0'; ?> <?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver.'px'; else echo '5px';?> <?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur.'px'; else echo '25px'; ?> #000;
-ms-box-shadow: <?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor.'px'; else echo '0'; ?> <?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver.'px'; else echo '5px';?> <?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur.'px'; else echo '25px'; ?> #000;
-o-box-shadow: <?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor.'px'; else echo '0'; ?> <?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver.'px'; else echo '5px';?> <?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur.'px'; else echo '25px'; ?> #000;
-webkit-box-shadow: <?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor.'px'; else echo '0'; ?> <?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver.'px'; else echo '5px';?> <?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur.'px'; else echo '25px'; ?> #000;*/
}
</style>
<?php
if ($ctatextval == '' && $indfeatnameval != '') :
?>
<style type="text/css">
div#indwrapequally1 {
/*display: none;*/
height: 138px;
}
</style>
<?php
endif;
?>