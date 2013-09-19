<?php
$ctatextval = get_post_meta($id, 'ctatitletext_meta_key', true);
$indfeatnameval = get_post_meta($id, 'ind_featurename_meta_key', true);
$inct = get_post_meta($id, 'indtable_counter_key', true);
($inct != '') ?  $incent = $inct : $incent = 1 ;
for ($j=1; $j<=$incent; $j++) {
$ccdt = 'colcolm_diff_top_key'.$j;
$ccdb = 'colcolm_diff_bottom_key'.$j;
$ccdtop = get_post_meta($id, $ccdt, true);
$ccdbottom = get_post_meta($id, $ccdb, true);
if ($ctatextval || $indfeatnameval) :
$jz = $j + 1;
?>
<style type='text/css'>
div.innertablecolumns:nth-child(<?php echo $jz; ?>)>div.truecolind>div#indwrapequally2>div.indplan,
div.innertablecolumns:nth-child(<?php echo $jz; ?>)>div.truecolind>div.indbutton,
div.innertablecolumns:nth-child(<?php echo $jz; ?>)>div.truecolind>div#indwrapequally2 {

background:<?php echo $ccdtop; ?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: -moz-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php echo $ccdtop; ?> ), color-stop(76%,<?php echo $ccdbottom; ?> )); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* IE10+ */
background: linear-gradient(to bottom, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $ccdtop; ?>', endColorstr='<?php echo $ccdbottom; ?>',GradientType=0 ); /* IE6-8 */
background: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $ccdtop; ?>), to(<?php echo $ccdbottom; ?>));
background: -moz-linear-gradient(top,<?php echo $ccdtop; ?> , <?php echo $ccdbottom; ?> );
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php echo $ccdtop; ?>, endColorStr=<?php echo $ccdbottom; ?> );
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php echo $ccdtop; ?> , endColorStr=<?php echo $ccdbottom; ?>);

}
</style>
<?php
else :
?>
<style type='text/css'>
div.innertablecolumns:nth-child(<?php echo $j; ?>)>div.truecolind>div#indwrapequally2 {
background:<?php echo $ccdtop; ?>; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: -moz-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, <?php echo $ccdtop; ?> ), color-stop(76%,<?php echo $ccdbottom; ?> )); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* IE10+ */
background: linear-gradient(to bottom, <?php echo $ccdtop; ?> 0%, <?php echo $ccdbottom; ?> 76%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $ccdtop; ?>', endColorstr='<?php echo $ccdbottom; ?>',GradientType=0 ); /* IE6-8 */
background: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $ccdtop; ?>), to(<?php echo $ccdbottom; ?>));
background: -moz-linear-gradient(top,<?php echo $ccdtop; ?> , <?php echo $ccdbottom; ?> );
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php echo $ccdtop; ?>, endColorStr=<?php echo $ccdbottom; ?> );
filter: progid:DXImageTransform.Microsoft.gradient(startColorStr=<?php echo $ccdtop; ?> , endColorStr=<?php echo $ccdbottom; ?>);
}
</style>
<?php
endif;
}
?>