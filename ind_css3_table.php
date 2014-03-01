<?php
/*
Plugin Name: IND Pricing Table
Plugin URI: http://www.ctuts.com/
Description: CSS3 Pricing Table Generator For Wordpress
Author: Ari Susanto
Version: 2.2
Author URI: http://ctuts.com
Copyright 2013  ARI SUSANTO  (email : admin@ctuts.com)
*/

register_activation_hook(__FILE__, 'indtable_activation_function');
add_action('admin_init', 'indtable_info_docpage');

function indtable_activation_function() {
	ind_pricing_table_table();
    flush_rewrite_rules();
    add_option('indtable_redirection_page', true);
}

function indtable_info_docpage() {
    $inddocurl = admin_url( '/edit.php?post_type=indtable&page=documentation', 'http' );
    if (get_option('indtable_redirection_page', false)) {
        delete_option('indtable_redirection_page');
        wp_redirect($inddocurl);
    }
}
register_deactivation_hook('_FILE_', 'ind_table_deactivation_function'); 
function ind_table_deactivation_function() {
 delete_option('indtable_redirection_page');
 	flush_rewrite_rules();
}
add_action( 'init', 'ind_pricing_table_table' );
function ind_pricing_table_table() {

	$labels = array(
		'name'                => _x( 'Tables', 'Post Type General Name', 'table_part' ),
		'singular_name'       => _x( 'Table', 'Post Type Singular Name', 'table_part' ),
		'menu_name'           => __( 'IND Pricing Table', 'table_part' ),
		'parent_item_colon'   => __( 'Parent Table', 'table_part' ),
		'all_items'           => __( 'All Tables', 'table_part' ),
		'view_item'           => __( 'View Table', 'table_part' ),
		'add_new_item'        => __( 'Add New Table', 'table_part' ),
		'add_new'             => __( 'Create New Table', 'table_part' ),
		'edit_item'           => __( 'Edit Table', 'table_part' ),
		'update_item'         => __( 'Update Table', 'table_part' ),
		'search_items'        => __( 'Search Tables', 'table_part' ),
		'not_found'           => __( 'No Tables found', 'table_part' ),
		'not_found_in_trash'  => __( 'No Tables found in Trash', 'table_part' ),
	);
	$args = array(
		'label'               => __( 'indtable', 'table_part' ),
		'description'         => __( 'Table Info', 'table_part' ),
		'labels'              => $labels,
		'supports'            => array( 'title'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 40,
		'menu_icon'           => plugins_url('img/table.png',  __FILE__),
		'can_export'          => true,
		'rewrite' 			  => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'indtable',
		'capability_type'     => 'post',
		'with_front'		  => true
	);
	register_post_type( 'indtable', $args );

}

/*
function ind_load_wpjquery() {
    wp_enqueue_script("jquery");
    $jquery_ui = array(
        "jquery-ui-core",            //UI Core - do not remove this one
        "jquery-ui-mouse",
        "jquery-ui-accordion",
        "jquery-ui-autocomplete",
        "jquery-ui-slider",
        "jquery-ui-tabs",
        "jquery-ui-sortable",    
        "jquery-ui-draggable",
        "jquery-ui-droppable",
        "jquery-ui-selectable",
        "jquery-ui-position",
        "jquery-ui-datepicker",
        "jquery-ui-resizable",
        "jquery-ui-dialog",
        "jquery-ui-button"
    );
    foreach($jquery_ui as $script){
        wp_enqueue_script($script);
    }
}
*/

function enqueue_indtable_ajax($hook) {
  global $pagenow, $typenow;

  if (empty($typenow) && !empty($_GET['post'])) {
    $post = get_post($_GET['post']);
    $typenow = $post->post_type;
  }
  if (is_admin() && $typenow=='indtable') {
    if ($pagenow=='post-new.php' || $pagenow=='post.php') { 

    wp_enqueue_script( 'indtable_ajax_script', plugins_url('/ind-css3-pricing-table/js/indajax.js'),
		array('jquery'));
	wp_localize_script('indtable_ajax_script', 'indtable_ajax_script_vars', array (
	'ind_ajax_nonce' => 'wp_create_nonce("ind-nonce-string")'
	));
	}
	}
//	wp_enqueue_script('indtable_ajax_script');
}


add_filter( 'enter_title_here', 'ind_table_custom_post_title' );

function ind_table_custom_post_title( $input ) {
    global $post_type;

    if ( is_admin() && 'indtable' == $post_type )
        return __( 'Name for This Table ?', 'table_part' );

    return $input;
}

// ADD COLUMN TO CPT TABLE LIST
function wp_edit_indtable_columns( $ind_columns ) {
    $ind_columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Pricing Table Name' ),
		'ID' => __( 'Shortcode' ),
        'date' => __( 'Date' )
    );
 
    return $ind_columns;
}

function wp_manage_indtable_columns( $column, $post_id ) {
    global $post;
 
    switch ( $column ) {
 
        case 'ID' :
 
            $table_id = $post_id;
 
            if ( empty( $table_id ) )
                echo __( 'Unknown' );
 
            else
			echo "<b><input onfocus='this.select()' type='text'"; 
			echo "value='[ind_pricingtable";
			echo ' id="';
			echo $table_id;
			echo '"';
			echo "]' /></b>";
            break;
 
        default :
            break;
    }
}

// Make shortcode list sortable
 
function wp_edit_indtable_sortable_columns( $columns ) {
 
    $columns['ID'] = 'ID';
 
    return $columns;
}

// Adding Submenu Under Pricing Table CPT
add_action('admin_menu', 'register_indpricingtable_submenu_page');
function register_indpricingtable_submenu_page() {
add_submenu_page( 'edit.php?post_type=indtable', 'Documentation', 'Documentation', 'manage_options', 'documentation', 'ind_pricingtable_doc_info' );
}

function ind_pricingtable_doc_info() {
	echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
		echo '<h2>Documentation and Info</h2>';
		echo '<center><a href="'.admin_url('/post-new.php?post_type=indtable').'"><b>Click here to start create pricing table!</b></a></center>';
	echo '</div>';
}


function enqueue_indtable_style( $hook ) {
  global $pagenow, $typenow;

  if (empty($typenow) && !empty($_GET['post'])) {
    $post = get_post($_GET['post']);
    $typenow = $post->post_type;
  }
  if (is_admin() && $typenow=='indtable') {
    if ($pagenow=='post-new.php' || $pagenow=='post.php') {
    wp_register_style( 'indtable_ajax_style', plugins_url('/ind-css3-pricing-table/css/admin.css') );
	wp_enqueue_style('indtable_ajax_style');
	}
  }
}

function front_end_table_style() {
   wp_register_style( 'indtable_css_style', plugins_url('/ind-css3-pricing-table/css/indshow.css') );
	wp_enqueue_style('indtable_css_style');
}

add_action('wp_enqueue_scripts','front_end_table_style');

add_action('add_meta_boxes', 'cheap_domain_gd');
function cheap_domain_gd() {
        add_meta_box('cheap_domain_id', '$2.95 .com Domain', 'cheap_domain', 'indtable', 'side', 'low');
}

function cheap_domain() {
?>
<div style="text-align:center;">
<a target="_blank" rel="nofollow" href="http://affiliate.godaddy.com/redirect/5F32D796F9C1C466894900A90CFE414D519C0720095A6640533B73A806A12B17E00E194D24F108E4286847090203A72011C6D6F6B0570844030A383F7B806FD8"><img src="http://affiliate.godaddy.com/ads/5F32D796F9C1C466894900A90CFE414D519C0720095A6640533B73A806A12B17E00E194D24F108E4286847090203A72011C6D6F6B0570844030A383F7B806FD8" border="0" width="234"  height="60" alt="$2.95 .Com at GoDaddy.com!"/></a>
</div>
<?php
}

add_action('add_meta_boxes', 'subscribe_to_news');
function subscribe_to_news() {

        add_meta_box('subscribe_to_imsoft_id', 'Get IM & SEO Discounts News', 'subscribe_to_imsoft', 'indtable', 'side', 'core');

}

function subscribe_to_imsoft() {
?>
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="http://facebook.us3.list-manage1.com/subscribe/post?u=037f3ef9349c9ed79459a3670&amp;id=1b0407544e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<span style="font-size:11px; text-align: justify;">Get the latest news around IM and SEO discounts, special offers and software that will help you grow up your business faster!</span>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">First Name  <span class="asterisk">*</span>
</label>
	<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_037f3ef9349c9ed79459a3670_1b0407544e" value=""></div>
	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>
<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[3]='MMERGE3';ftypes[3]='text';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = '//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}

var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = '#mc_embed_signup input.mce_inline_error{border-color:#6B0505;} #mc_embed_signup div.mce_inline_error{margin: 0 0 1em 0; padding: 5px 10px; background-color:#6B0505; font-weight: bold; z-index: 1; color:#fff;}';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = err_style;
} else {
  style.appendChild(document.createTextNode(err_style));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
    head.appendChild(script);
    try {
        var validatorLoaded=jQuery("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    jQuery(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      $("#mc-embedded-subscribe-form").unbind('submit');//remove the validator so we can get into beforeSubmit on the ajaxform, which then calls the validator
      options = { url: 'http://facebook.us3.list-manage.com/subscribe/post-json?u=037f3ef9349c9ed79459a3670&id=1b0407544e&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        var bday = false;
                                        if (fields.length == 2){
                                            bday = true;
                                            fields[2] = {'value':1970};//trick birthdays into having years
                                        }
                                    	if ( fields[0].value=='MM' && fields[1].value=='DD' && (fields[2].value=='YYYY' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else if ( fields[0].value=='' && fields[1].value=='' && (fields[2].value=='' || (bday && fields[2].value==1970) ) ){
                                    		this.value = '';
									    } else {
									        if (/\[day\]/.test(fields[0].name)){
    	                                        this.value = fields[1].value+'/'+fields[0].value+'/'+fields[2].value;									        
									        } else {
    	                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
	                                        }
	                                    }
                                    });
                            });
                        $('.phonefield-us','#mc_embed_signup').each(
                            function(){
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                        if ( fields[0].value.length != 3 || fields[1].value.length!=3 || fields[2].value.length!=4 ){
                                    		this.value = '';
									    } else {
									        this.value = 'filled';
	                                    }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);
      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}

</script>
<!--End mc_embed_signup-->
<?php
}

// META BOX
function indtable_meta_hook() {
add_meta_box('indtable_meta_id', 'Configure Table', 'ind_table_metabox_form', 'indtable', 'normal', 'high');
}

// FORM
function ind_table_metabox_form($post) {
global $post;
wp_nonce_field( 'ind_table_metabox_form', 'ind_table_metabox_nonce' );
$counter = get_post_meta($post->ID, 'indtable_counter_key', true);
						
			echo "<span style='margin:0 0 0 auto'><b>Shortcode:</b> </span>";
			echo "<input style='float:right;' onfocus='this.select()' type='text'";
			echo "style='width: 170px;'";
			echo "value='[ind_pricingtable";
			echo ' id="';
			echo $post->ID;
			echo '"';
			echo "]'/>";
			echo "<hr>";
			
$ctatextval = get_post_meta($post->ID, 'ctatitletext_meta_key', true);
$indfeatnameval = get_post_meta($post->ID, 'ind_featurename_meta_key', true);
?>

<h3><b>Parent Column</b></h3>
<table id="ctafeaturename">

<tbody>
<?php
if ($ctatextval) :
?>
<tr><td><b>Text :</b></td><td><input type="text" rows='1' name="ctatitletext" value="<?php echo $ctatextval; ?>" placeholder="Text" /></td></tr>
<?php
else :
?>
<tr><td><b>Text :</b></td><td><input type="text" name="ctatitletext" value="" placeholder="Text"/></td></tr>
<?php
endif;
if ($indfeatnameval) :
foreach ($indfeatnameval as $indfeaturename) {
?>
<tr class="feturerow">
<td><b>Feature's Name:</b></td><td><input type="text" name="featurename[]" value="<?php if ($indfeaturename['featurename'] != '') echo $indfeaturename['featurename']; ?>" placeholder="feature name" /></td>
<td><a class="button remove-feature" href="#">x</a> <a class="button addfeature" href="#">+</a></td>
</tr>
<?php
}

else :
?>
<tr class="feturerow">
<td><b>Feature's Name:</b></td><td><input type="text" name="featurename[]" value="" placeholder="feature name" /></td>
<td><a class="button remove-feature" href="#">x</a> <a class="button addfeature" href="#">+</a></td>
</tr>
<?php
endif;
?>
</tbody>
</table>
<br/>
<h3><b>Core Columns</b></h3>
<br/>
<button class="addpricingcolumn">Add Column</button>
<input type="hidden" name="countnumbtbody" class="counter" value="<?php if ($counter != '') : echo $counter; else : echo 1; endif; ?>" />
<input type="hidden" name="postid" class="postidclass" value="<?php echo $post->ID; ?>" />
<button class="removelastcolumn">Remove Column</button>
<br/><br/>
<div style="display: none; class="loading" id ="ind_loading"> <b>Processing...</b> <br/> <img src="<?php echo plugins_url('/ind-css3-pricing-table/img/ajax-loader.gif');?>" margin: 10px 0 0 0;"/></div>
<table id="parenttable">

<?php
$incrent = get_post_meta($post->ID, 'indtable_counter_key', true);

if ($incrent !='') {
$inc = $incrent;
} else {
$inc = 1;
}
if($inc) {
for($cr=1; $cr<=$inc; $cr++){
$indplankey = 'indplan_meta_key'.$cr;
$indribbonkey = 'indribbon_meta_key'.$cr;
$indpricekey = 'indprice_meta_key'.$cr;
$indpricelabelkey = 'indpricelabel_meta_key'.$cr;
$indfeaturekey = 'indfeature_meta_key'.$cr;
$indbuttonkey = 'indbutton_meta_key'.$cr;
$indplanval = get_post_meta($post->ID, $indplankey, true);
$indribbonval = get_post_meta($post->ID, $indribbonkey, true); 
$indpriceval = get_post_meta($post->ID, $indpricekey, true);
$indpricelabelval = get_post_meta($post->ID, $indpricelabelkey, true);
$indfeatureval = get_post_meta($post->ID, $indfeaturekey, true);
$indbuttonval = get_post_meta($post->ID, $indbuttonkey, true);
?>
<tbody class="columnstobecloned">
<?php
//if ($indplanval || $indfeatureval || $indpriceval) {
?>
<?php
//Plan
if ($indplanval){
?>
<tr class='indcolmnamer'><td><?php if($cr>1): ?><br/><?php endif; ?><b><u>Column <?php echo $cr; ?></u></b></td></tr>
<tr><td><b>Plan :</b></td><td><input type="text" name="plan<?php echo $cr; ?>" value="<?php if ($indplanval != '') echo $indplanval; ?>"/></td><td><i>ribbon :</i> <select name="indribbon<?php echo $cr; ?>">
  <option <?php if ($indribbonval) echo "selected = 'selected'"; ?> style='display:none;'><?php  if ($indribbonval) : echo $indribbonval; else : echo 'None'; endif; ?></option>
<option >None</option>
<option>FivetyPercent</option>
<option>SeventyFivePercent</option>
<option>Promo</option>
<option>New</option>
<option>TwentyFivePercent</option>
<option>Trial</option>
<option>Save</option>
<option>Guarantee</option>
<option>NowFree</option>
</select></td>
</tr>
<?php
} else {
?>
<tr class='indcolmnamer'><td><?php if($cr>1): ?><br/><?php endif; ?><b><u>Column <?php echo $cr; ?></u></b></td></tr>
<tr>
<td><b>Plan :</b></td><td><input type="text" name="plan<?php echo $cr; ?>" value="" placeholder="Plan's name"/></td><td><i>ribbon :</i> <select name="indribbon<?php echo $cr; ?>" value="">
<option <?php if ($indribbonval) echo "selected = 'selected'"; ?> style='display:none;'><?php if ($indribbonval) :echo $indribbonval; else : echo 'None'; endif; ?></option>
<option>None</option>
<option>FivetyPercent</option>
<option>SeventyFivePercent</option>
<option>Promo</option>
<option>New</option>
<option>TwentyFivePercent</option>
<option>Trial</option>
<option>Save</option>
<option>Guarantee</option>
<option>NowFree</option>
</select>
</td>
</tr>
<?php
}
// Price
if ($indpriceval){
?>
<tr>
<td><b>Price :</b></td><td><input type="text" name="price<?php echo $cr; ?>" value="<?php if ($indpriceval != '') echo $indpriceval; ?>"/></td><td><i> - </i><input style="" type="text" name="subslabel<?php echo $cr; ?>" <?php if ($indpricelabelval) : echo "value ='" . $indpricelabelval . "'";  else : ?> value="" placeholder="subscription period" <?php endif; ?> /></td>
</tr>
<?php
} else {
?>
<tr>
<td><b>Price :</b></td><td><input type="text" name="price<?php echo $cr; ?>" value="" placeholder="Package's price"/></td><td><i> - </i><input style="" type="text" name="subslabel<?php echo $cr; ?>" value="<?php ?>" placeholder="subscription period" /></td>
</tr>
<?php
}

// Feature
if ($indfeatureval){
foreach ($indfeatureval as $indfeature) {
?>
<tr class="feturerow">
<td><b>Feature :</b></td><td><input type="text" name="feature<?php echo $cr; ?>[]" value="<?php if ($indfeature['feature'.$cr] != '') echo htmlspecialchars($indfeature['feature'.$cr]); ?>" placeholder="type a feature" /></td>
<td><a class="button remove-feature" href="#">x</a> <a class="button addfeature" href="#">+</a> <a class="sortfeature"><^></a></td>
</tr>

<?php
//print_r($indfeature);
}} else {
?>
<tr class="feturerow">
<td><b>Feature :</b></td><td><input type="text" name="feature<?php echo $cr; ?>[]" value="" placeholder="type a feature" /></td>
<td><a class="button remove-feature" href="#">x</a> <a class="button addfeature" href="#">+</a> <a class="sortfeature"><^></a></td>
</tr>
<?php
}

// Button
if ($indbuttonval) {
foreach ($indbuttonval as $indbutton) {
?>
<tr>
<td><b>Button :</b></td><td><input type="text" name="buttontext<?php echo $cr; ?>[]" value="<?php if($indbutton['buttontext'.$cr] != '') echo $indbutton['buttontext'.$cr]; ?>" placeholder="Button text" /></td>
<td><input type="text" name="buttonurls<?php echo $cr; ?>[]" value="<?php if($indbutton['buttonurls'.$cr] != '')  echo $indbutton['buttonurls'.$cr]; ?>" placeholder="http://example.com/" /></td>
</tr>
<?php
}
} else {
?>
<tr>
<td><b>Button :</b></td><td><input type="text" name="buttontext<?php echo $cr;?>[]" value="" placeholder="Button text" /></td>
<td><input type="text" name="buttonurls<?php echo $cr;?>[]" value="" placeholder="http://example.com/" /></td>
</tr>
<?php
} // End IF
?>
</tbody>
<?php
} //End FOR LOOP ($inc)
} else {
$ic = 1;
?>
<tbody class="openingcolumn" >
<tr class='indcolmnamer'><td><b><u>Column <?php echo $ic;?></u></b></td></tr>
<tr>
<td><b>Plan :</b></td><td><input type="text" name="plan<?php echo $ic;?>" value=""/></td><td><i>ribbon :</i> <select name="indribbon<?php echo $ic; ?>">
<option selected>None</option>
<option>FivetyPercent</option>
<option>SeventyFivePercent</option>
<option>Promo</option>
<option>New</option>
<option>TwentyFivePercent</option>
<option>Trial</option>
<option>Save</option>
<option>Guarantee</option>
<option>NowFree</option>
</select></td>
</tr>
<tr>
<td><b>Price :</b></td><td><input type="text" name="price<?php echo $ic;?>" value=""/></td><td><i> - </i><input style="" type="text" name="subslabel<?php echo $ic; ?>" value="<?php ?>" placeholder="subscription period" /></td>
</tr>
<?php
?>
<tr class="feturerow">
<td><b>Feature :</b></td><td><input type="text" name="feature<?php echo $ic;?>[]" value="" placeholder="type a feature" /></td>
<td><a class="button remove-feature" href="#">x</a> <a class="button addfeature" href="#">+</a> <a class="sortfeature"><^></a></td>
</tr>
<tr>
<td><b>Button :</b></td><td><input type="text" name="buttontext<?php echo $ic;?>[]" value="" placeholder="Button text" /></td>
<td><input type="text" name="buttonurls<?php echo $ic;?>[]" value="" placeholder="http://example.com/" /></td>
</tr>
<?php
?>
</tbody>

<?php
}
wp_enqueue_script('wp-color-picker');
wp_enqueue_style( 'wp-color-picker' );
?>
<?php
$bggradtop = get_post_meta($post->ID, 'indtable_layout_colwidthkey1', true);
$bggradbottom = get_post_meta($post->ID, 'indtable_layout_colwidthkey2', true);
$indfont = get_post_meta($post->ID, 'indfontfamily_meta_key', true);
$plantextcolor = get_post_meta($post->ID, 'indtable_layout_colwidthkey3', true);
$indplantext_shadowhor = get_post_meta($post->ID, 'indtable_layout_colwidthkey4', true);
$indplantext_shadowver = get_post_meta($post->ID, 'indtable_layout_colwidthkey5', true);
$indplantext_shadowblur = get_post_meta($post->ID, 'indtable_layout_colwidthkey6', true);
$indplandef_width = get_post_meta($post->ID, 'indtable_layout_colwidthkey7', true);
$indplanhover_width = get_post_meta($post->ID, 'indtable_layout_colwidthkey8', true);
$indplancoldef_shadowhor = get_post_meta($post->ID, 'indtable_layout_colwidthkey9', true);
$indplancoldef_shadowver = get_post_meta($post->ID, 'indtable_layout_colwidthkey10', true);
$indplancoldef_shadowblur = get_post_meta($post->ID, 'indtable_layout_colwidthkey11', true);
$indplancolhov_shadowhor = get_post_meta($post->ID, 'indtable_layout_colwidthkey12', true);
$indplancolhov_shadowver = get_post_meta($post->ID, 'indtable_layout_colwidthkey13', true);
$indplancolhov_shadowblur = get_post_meta($post->ID, 'indtable_layout_colwidthkey14', true);
$indfeaturow_1n = get_post_meta($post->ID, 'indtable_layout_colwidthkey15', true);
$indfeaturow_2n = get_post_meta($post->ID, 'indtable_layout_colwidthkey16', true);
$indfeatucol_1n = get_post_meta($post->ID, 'indtable_layout_colwidthkey17', true);
$indfeatucol_2n = get_post_meta($post->ID, 'indtable_layout_colwidthkey18', true);
$indbuttonbg_topdef_color = get_post_meta($post->ID, 'indtable_layout_colwidthkey19', true);
$indbuttonbgdefbottom_color =get_post_meta($post->ID, 'indtable_layout_colwidthkey20', true);
$indbuttonbgtophover_color = get_post_meta($post->ID, 'indtable_layout_colwidthkey21', true);
$indbuttonbgbottomhover_color = get_post_meta($post->ID, 'indtable_layout_colwidthkey22', true);
$indbuttontext_color = get_post_meta($post->ID, 'indbuttontext_color_meta_key', true);
?>
</table>
<br/>
<h3 id='colmcolrfieldname'><b>Table Color and Layout</b></h3>
<?php // Color Picker
if ($inc>=1) :
?>
<br/>
<table>
<tr><td><b><u>COLUMNs COLOR</u></b></td></tr>
<?php
for ($i=1;$i<=$inc;$i++) {
$ccdt = 'colcolm_diff_top_key'.$i;
$ccdb = 'colcolm_diff_bottom_key'.$i;
$ccdtop = get_post_meta($post->ID, $ccdt, true);
$ccdbottom = get_post_meta($post->ID, $ccdb, true);
?>
<tbody class="colmnname"><tr><td><br/><b>Column <?php echo $i; ?> color</b></td></tr></tbody>
<tbody class="colmnecolor">
<td>top gradient: <br/> <input type="text" name="colmcolordiftop<?php echo $i; ?>" class="colmcolordiftop" value="<?php if ($ccdtop) : echo $ccdtop; endif; ?>" /></td><td> bottom gradient<br/> <input type="text" name="colmcolordifbottom<?php echo $i; ?>" class="colmcolordifbottom" value="<?php if ($ccdbottom) : echo $ccdbottom; endif; ?>" /></td></tr>
</tbody>
<?php
}
?>
</table>
<?php
endif;
?>
<table>
<tr><td><hr></td></tr>
<tr><td><b>BACKGROUND GRADIENT</b></td></tr>
<tr>
<td><label>top:</label></td><td><input name="indplanbgtop_color" type="text" id="indplanbgtop_color" value="<?php if ($bggradtop != '') echo $bggradtop; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>bottom:</label></td> <td><input name="indplanbgbottom_color" type="text" id="indplanbgbottom_color" value="<?php if ($bggradbottom != '') echo $bggradbottom; ?>" data-default-color=""/></td></tr>
<tr><td><hr></td></tr>
<tr><td><b>FONT / TEXT</b></td></tr>
<tr><td>Font Family</td><td><input type="text" name="indfontfamily" value="<?php if ($indfont != '') echo $indfont; ?>"/></td></tr>
<tr><td><label>text color:</label></td> <td><input name="indplantext_color" type="text" id="indplantext_color" value="<?php if ($plantextcolor != '') echo $plantextcolor; ?>" data-default-color=""/></td></tr>
<tr><td><label>text shadow:</label></td><td>h:<input name="indplantext_shadowhor" style="width:30px;" type="text" id="indplantext_shadowhor" value="<?php if ($indplantext_shadowhor != '') echo $indplantext_shadowhor; ?>"/>
 v:<input name="indplantext_shadowver" style="width:30px;" type="text" id="indplantext_shadowver" value="<?php if ($indplantext_shadowver != '') echo $indplantext_shadowver; ?>"/>
 blur:<input name="indplantext_shadowblur" style="width:30px;" type="text" id="indplantext_shadowblur" value="<?php if ($indplantext_shadowblur != '') echo $indplantext_shadowblur; ?>"/></td></tr>
<tr><td><hr></td></tr>
<tr><td><b>Plan width</b></td></tr>
<tr><td><label>default width:</label></td> <td><input name="indplandef_width" type="text" id="indplandef_width" value="<?php if ($indplandef_width != '') echo $indplandef_width; ?>"/></td></tr>
<tr><td><label>hover width:</label></td> <td><input name="indplanhover_width" type="text" id="indplanhover_width" value="<?php if ($indplanhover_width != '') echo $indplanhover_width; ?>"/></td></tr>
<!--
<tr><td><label>default shadow:</label></td><td>h:<input name="indplancoldef_shadowhor" style="width:30px;" type="text" id="indplancoldef_shadowhor" value="<?php if ($indplancoldef_shadowhor != '') echo $indplancoldef_shadowhor; ?>"/> v:<input name="indplancoldef_shadowver" style="width:30px;" type="text" id="indplancoldef_shadowver" value="<?php if ($indplancoldef_shadowver != '') echo $indplancoldef_shadowver; ?>"/> blur:<input name="indplancoldef_shadowblur" style="width:30px;" type="text" id="indplancoldef_shadowblur" value="<?php if ($indplancoldef_shadowblur != '') echo $indplancoldef_shadowblur; ?>"/></td></tr>
<tr><td><label>hover shadow:</label></td><td>h:<input name="indplancolhov_shadowhor" style="width:30px;" type="text" id="indplancolhov_shadowhor" value="<?php if ($indplancolhov_shadowhor != '') echo $indplancolhov_shadowhor; ?>"/> v:<input name="indplancolhov_shadowver" style="width:30px;" type="text" id="indplancolhov_shadowver" value="<?php if ($indplancolhov_shadowver != '') echo $indplancolhov_shadowver; ?>"/> blur:<input name="indplancolhov_shadowblur" style="width:30px;" type="text" id="indplancolhov_shadowblur" value="<?php if ($indplancolhov_shadowblur != '') echo $indplancolhov_shadowblur; ?>"/></td></tr>
-->
<!--
<tr><td><hr></td></tr>
<tr><td><b>Feature Zebra Color</b></td></tr>
<tr>
<td><label>row 1n:</label></td><td><input name="indfeaturow_1n" type="text" id="indfeaturow_1n" value="<?php if ($indfeaturow_1n != '') echo $indfeaturow_1n; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>row 2n:</label></td> <td><input name="indfeaturow_2n" type="text" id="indfeaturow_2n" value="<?php if ($indfeaturow_2n != '') echo $indfeaturow_2n; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>column 1n:</label></td><td><input name="indfeatucol_1n" type="text" id="indfeatucol_1n" value="<?php if ($indfeatucol_1n != '') echo $indfeatucol_1n; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>column 2n:</label></td> <td><input name="indfeatucol_2n" type="text" id="indfeatucol_2n" value="<?php if ($indfeatucol_2n != '') echo $indfeatucol_2n; ?>" data-default-color=""/></td></tr>
-->
<tr><td><hr></td></tr>
<tr><td><b>Button Style</b></td></tr>
<tr><td>button text color: </td><td><input name="indbuttontext_color" type="text" id="indbuttontext_color" value="<?php if ($indbuttontext_color != '') echo $indbuttontext_color; ?>" data-default-color=""/></td>
</tr>
<tr><td><u>Gradient Default</u></td></tr>
<tr>
<td><label>top:</label></td><td><input name="indbuttonbg_topdef_color" type="text" id="indbuttonbg_topdef_color" value="<?php if ($indbuttonbg_topdef_color != '') echo $indbuttonbg_topdef_color; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>bottom:</label></td> <td><input name="indbuttonbgdefbottom_color" type="text" id="indbuttonbgdefbottom_color" value="<?php if ($indbuttonbgdefbottom_color != '') echo $indbuttonbgdefbottom_color; ?>" data-default-color=""/></td></tr>
<tr><td><u>Gradient Hover</u></td></tr>
<tr>
<td><label>top:</label></td><td><input name="indbuttonbgtophover_color" type="text" id="indbuttonbgtophover_color" value="<?php if ($indbuttonbgtophover_color != '') echo $indbuttonbgtophover_color; ?>" data-default-color=""/></td></tr>
<tr>
<td><label>bottom:</label></td> <td><input name="indbuttonbgbottomhover_color" type="text" id="indbuttonbgbottomhover_color" value="<?php if ($indbuttonbgbottomhover_color != '') echo $indbuttonbgbottomhover_color; ?>" data-default-color=""/></td></tr>
</table>

<?php
}

function indtable_form_save($post_id) {
global $post;
if(isset($post->ID)) {
$post_id = $post->ID;
}
	if ( ! isset( $_POST['ind_table_metabox_nonce'] ) )
    return $post_id;
	$nonce = $_POST['ind_table_metabox_nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ind_table_metabox_form' ) )
      return $post_id;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;
	if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
	} else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
	}

	// CTA TEXT
$ctatext = $_POST['ctatitletext'];
$ctatextold = get_post_meta($post_id, 'ctatitletext_meta_key', true);
if($ctatext != '' || $ctatext == $ctatextold) :
update_post_meta($post_id, 'ctatitletext_meta_key', $ctatext);
else :
delete_post_meta($post_id, 'ctatitletext_meta_key', $ctatextold);
endif;

	$oldfeatname = get_post_meta($post->ID, 'ind_featurename_meta_key', true);
	$newfeatname = array();
	$featnames = $_POST['featurename'];
	$countfeatname = count( $featnames );

	for ( $i = 0; $i < $countfeatname; $i++ ) {
		if ( $featnames[$i] == '' ) {
			$newfeatname[$i]['featurename'] = '';
		} else {
			$newfeatname[$i]['featurename'] = stripslashes($featnames[$i]); 
		}
	
	if ( !empty($featnames[$i]))
		update_post_meta( $post_id, 'ind_featurename_meta_key', $newfeatname );
	elseif ( empty($featnames[$i]) )
		delete_post_meta( $post_id, 'ind_featurename_meta_key', $oldfeatname );
}
$incnumb =  get_post_meta($post_id, 'indtable_counter_key', true);
($incnumb != '') ? $counter = $incnumb : $counter = 1;
for ($c=1; $c<=$counter; $c++) {
$plankey = 'indplan_meta_key'.$c;
$planribbon = 'indribbon_meta_key'.$c;
$indplan = sanitize_text_field($_POST['plan'.$c]);
$pricekey = 'indprice_meta_key'.$c;
$pricelabelkey = 'indpricelabel_meta_key'.$c;
$ribbonlogo = sanitize_text_field($_POST['indribbon'.$c]);
$indpricelabel = $_POST['subslabel'.$c];
$indprice = sanitize_text_field($_POST['price'.$c]);
$ccdt = 'colcolm_diff_top_key'.$c;
$ccdb = 'colcolm_diff_bottom_key'.$c;
$colmcolordiftop = $_POST['colmcolordiftop'.$c];
$colmcolordifbottom = $_POST['colmcolordifbottom'.$c];
$indbuttonkey = 'indbutton_meta_key'.$c;
$oldbutton = get_post_meta($post_id, $indbuttonkey, true);
$newbutton = array();
$buttontext = $_POST['buttontext'.$c];
$buttonurls = $_POST['buttonurls'.$c];
$countbutton = count( $buttontext );
$featurekey = 'indfeature_meta_key'.$c;
$old = get_post_meta($post_id, $featurekey, true);
$new = array();
$feature = $_POST['feature'.$c];
$count = count( $feature );

if ($indplan != '') :
update_post_meta($post_id, $plankey, $indplan);
else :
delete_post_meta($post_id, $plankey, $indplan);
endif;

if ($indprice != '') :
update_post_meta($post_id, $pricekey, $indprice);
else :
delete_post_meta($post_id, $pricekey, $indprice);
endif;

if($colmcolordiftop != '') :
update_post_meta($post_id, $ccdt, $colmcolordiftop);
else :
delete_post_meta($post_id, $ccdt, $colmcolordiftop);
endif;

if($colmcolordifbottom != '') :
update_post_meta($post_id, $ccdb, $colmcolordifbottom);
else :
delete_post_meta($post_id, $ccdb, $colmcolordifbottom);
endif;

if($ribbonlogo != '') :
update_post_meta($post_id, $planribbon, $ribbonlogo);
else :
delete_post_meta($post_id, $planribbon, $ribbonlogo);
endif;

if($indpricelabel != '') :
update_post_meta($post_id, $pricelabelkey, $indpricelabel);
else :
delete_post_meta($post_id, $pricelabelkey, $indpricelabel);
endif;

	for ( $y = 0; $y < $countbutton; $y++ ) {
		if ( $buttontext[$y] != '' ) :
			$newbutton[$y]['buttontext'.$c] = stripslashes( strip_tags( $buttontext[$y] ) );


		if ( $buttonurls[$y] == '' )
			$newbutton[$y]['buttonurls'.$c] = '';
		else
			$newbutton[$y]['buttonurls'.$c] = stripslashes( $buttonurls[$y] ); // and however you want to sanitize
		endif;
	}

	if ( !empty( $newbutton ) && $newbutton != $oldbutton )
		update_post_meta( $post_id, $indbuttonkey, $newbutton );
	elseif ( empty($newbutton) && $oldbutton )
		delete_post_meta( $post_id, $indbuttonkey, $oldbutton );
		

// Save FEATURE

	for ( $i = 0; $i < $count; $i++ ) {
		if ( $feature[$i] != '' ) :
			$new[$i]['feature'.$c] = $feature[$i];
		endif;
	}

	if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, $featurekey, $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, $featurekey, $old );
	}
	
$bggradtop = $_POST['indplanbgtop_color'];
$bggradbottom = $_POST['indplanbgbottom_color'];
$plantextcolor = $_POST['indplantext_color'];
$indplantext_shadowhor = $_POST['indplantext_shadowhor'];
$indplantext_shadowver = $_POST['indplantext_shadowver'];
$indplantext_shadowblur = $_POST['indplantext_shadowblur'];
$indplandef_width = $_POST['indplandef_width'];
$indplanhover_width = $_POST['indplanhover_width'];
$indplancoldef_shadowhor = $_POST['indplancoldef_shadowhor'];
$indplancoldef_shadowver = $_POST['indplancoldef_shadowver'];
$indplancoldef_shadowblur = $_POST['indplancoldef_shadowblur'];
$indplancolhov_shadowhor = $_POST['indplancolhov_shadowhor'];
$indplancolhov_shadowver = $_POST['indplancolhov_shadowver'];
$indplancolhov_shadowblur = $_POST['indplancolhov_shadowblur'];
$indfeaturow_1n = $_POST['indfeaturow_1n'];
$indfeaturow_2n = $_POST['indfeaturow_2n'];
$indfeatucol_1n = $_POST['indfeatucol_1n'];
$indfeatucol_2n = $_POST['indfeatucol_2n'];
$indbuttonbg_topdef_color = $_POST['indbuttonbg_topdef_color'];
$indbuttonbgdefbottom_color = $_POST['indbuttonbgdefbottom_color'];
$indbuttonbgtophover_color = $_POST['indbuttonbgtophover_color'];
$indbuttonbgbottomhover_color = $_POST['indbuttonbgbottomhover_color'];
$indbuttontext_color = $_POST['indbuttontext_color'];
$indfontfamily = $_POST['indfontfamily'];


if ($indfontfamily != '') :
update_post_meta($post_id, 'indfontfamily_meta_key', $indfontfamily);
else :
delete_post_meta($post_id, 'indfontfamily_meta_key', $indfontfamily);
endif;
if ($bggradtop !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey1', $bggradtop);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey1', $bggradtop);
endif;
if ($bggradbottom !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey2', $bggradbottom);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey2', $bggradbottom);
endif;

if ($plantextcolor !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey3', $plantextcolor);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey3', $plantextcolor);
endif;

if ($indplantext_shadowhor !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey4', $indplantext_shadowhor);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey4', $indplantext_shadowhor);
endif;

if ($plantextcolor !='') :
update_post_meta($post_id, 'indtable_plantextcolor', $plantextcolor);
else :
delete_post_meta($post_id, 'indtable_plantextcolor', $plantextcolor);
endif;

if ($indplantext_shadowver !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey5', $indplantext_shadowver);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey5', $indplantext_shadowver);
endif;

if ($indplantext_shadowblur !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey6', $indplantext_shadowblur);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey6', $indplantext_shadowblur);
endif;

if ($indplandef_width !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey7', $indplandef_width);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey7', $indplandef_width);
endif;

if ($indplanhover_width !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey8', $indplanhover_width);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey8', $indplanhover_width);
endif;

if ($indplancoldef_shadowhor !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey9', $indplancoldef_shadowhor);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey9', $indplancoldef_shadowhor);
endif;

if ($indplancoldef_shadowver !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey10', $indplancoldef_shadowver);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey10', $indplancoldef_shadowver);
endif;

if ($indplancoldef_shadowblur !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey11', $indplancoldef_shadowblur);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey11', $indplancoldef_shadowblur);
endif;

if ($indplancolhov_shadowhor !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey12', $indplancolhov_shadowhor);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey12', $indplancolhov_shadowhor);
endif;

if ($indplancolhov_shadowver !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey13', $indplancolhov_shadowver);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey13', $indplancolhov_shadowver);
endif;

if ($indplancolhov_shadowblur !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey14', $indplancolhov_shadowblur);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey14', $indplancolhov_shadowblur);
endif;

if ($indfeaturow_1n !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey15', $indfeaturow_1n);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey15', $indfeaturow_1n);
endif;

if ($indfeaturow_2n !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey16', $indfeaturow_2n);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey16', $indfeaturow_2n);
endif;

if ($indfeatucol_1n !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey17', $indfeatucol_1n);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey17', $indfeatucol_1n);
endif;

if ($indfeatucol_2n !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey18', $indfeatucol_2n);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey18', $indfeatucol_2n);
endif;

if ($indbuttonbg_topdef_color !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey19', $indbuttonbg_topdef_color);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey19', $indbuttonbg_topdef_color);
endif;

if ($indbuttonbgdefbottom_color !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey20', $indbuttonbgdefbottom_color);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey20', $indbuttonbgdefbottom_color);
endif;

if ($indbuttonbgtophover_color !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey21', $indbuttonbgtophover_color);
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey21', $indbuttonbgtophover_color);
endif;

if ($indbuttonbgbottomhover_color !='') :
update_post_meta($post_id, 'indtable_layout_colwidthkey22', $indbuttonbgbottomhover_color);	
else :
delete_post_meta($post_id, 'indtable_layout_colwidthkey22', $indbuttonbgbottomhover_color);
endif;

if ($indbuttontext_color !='') :
update_post_meta($post_id, 'indbuttontext_color_meta_key', $indbuttontext_color);	
else :
delete_post_meta($post_id, 'indbuttontext_color_meta_key', $indbuttontext_color);
endif;
}
// Ajax Response
function indtable_ajax_process($post_id) {
	global $wpdb; // this is how you get access to the database
	global $post;
//	$ajaxnonce = $_POST['ind_ajax_nonce'];
	if (!isset($_POST['ind_ajax_nonce'])/* || ! wp_verify_nonce($nonce, 'ind-nonce-string')*/)
	die();
	$post_id = $post['ID'];
	$potid = $_POST['postid'];
	$subamit = $_POST['countrow'];
	$subamit += 1;
	$update = update_post_meta($potid, 'indtable_counter_key', $subamit);
		die(); // this is required to return a proper result

}

function indcol_decrement($post_id) {
global $wpdb;
global $post;
	$ajaxnonce = $_POST['ind_ajax_nonce'];
if (!isset($_POST['ind_ajax_nonce'])/* || ! wp_verify_nonce($nonce, 'ind-nonce-string')*/)
die();
$post_id = $_POST['ID'];
$decpid = $_POST['postdec'];
$deccol = $_POST['decrease'];
$deccol -= 1;
$decrement = update_post_meta($decpid, 'indtable_counter_key', $deccol);
}
/*
function indtableplugin_style_css_sheet() {
}
add_action( 'wp_enqueue_scripts', 'indtableplugin_style_css_sheet' );*/
// ADD SHORTCODE																					
add_shortcode('ind_pricingtable', 'indtable_display_front_end');
function indtable_display_front_end($atts ) {
global $post;
	extract( shortcode_atts( array(
	'id' => ''	
	),	$atts ) );

//indtable color
$increment = get_post_meta($id, 'indtable_counter_key', true);
($increment != '') ?  $incrent = $increment : $incrent = 1 ;
$ctatextval = get_post_meta($id, 'ctatitletext_meta_key', true);
$indfeatnameval = get_post_meta($id, 'ind_featurename_meta_key', true);

include_once("css/indstyle.php");
include_once("css/colmcolrs.php");
//$indtableshow = "<center>";
$indtableshow = "<div id='parenttable'>";

if ($ctatextval || $indfeatnameval) :
$indtableshow .= "<div id='indcta'>";
endif;

if ($ctatextval) :
$indtableshow .= "<div id='indwrapequally1'><div class='indctastyler'></div><p>" .$ctatextval . "</p></div>";
endif;

if ($indfeatnameval) :
if ($ctatextval == '') {
$indtableshow .= "<div id='indwrapequally1'><div id='ctahead' style='padding:0;'></div></div>";
}
$indtableshow .= "<div id='wrapfeatureequally1'>";
foreach ($indfeatnameval as $indfeaturename) {
$indtableshow .= "<div id='featurenamerow'><p>" . $indfeaturename['featurename'] . "</p></div>";
}
$indtableshow .= "</div>";
endif;

if ($ctatextval || $indfeatnameval) :
$indtableshow .= "</div>";
endif;

// generating metabox values
for ($z=1; $z<=$incrent; $z++) {
$indplankey = 'indplan_meta_key'.$z;
$planribbon = 'indribbon_meta_key'.$z;
$indpricekey = 'indprice_meta_key'.$z;
$indpricelabelkey = 'indpricelabel_meta_key'.$z;
$indfeaturekey = 'indfeature_meta_key'.$z;
$indbuttonkey = 'indbutton_meta_key'.$z;
$indplanval = get_post_meta($id, $indplankey, true);
$indribbonval = get_post_meta($id, $planribbon, true);
$indpriceval = get_post_meta($id, $indpricekey, true);
$indpricelabelval = get_post_meta($id, $indpricelabelkey, true);
$indfeatureval = get_post_meta($id, $indfeaturekey, true);
$indbuttonval = get_post_meta($id, $indbuttonkey, true);

if ($indribbonval != 'None') :
$url = plugins_url();
$path = '/ind-css3-pricing-table/img/';
else :
$url = '';
$path = '';
endif;

$indtableshow .= "<div class='innertablecolumns'><div class='truecolind'>";
$indtableshow .= "<div id='indwrapequally2'>";

if ($indribbonval != 'None') :
$indtableshow .= "<div class='indimageribbon'><img src='".$url.$path.$indribbonval.".gif'/></div>";
endif;

if ($indplanval) :
$indtableshow .= "<div class='indplan'><p>" . $indplanval  . "</p>";
$indtableshow .= "</div>";
else :
$indtableshow .= "<div class='blankplan'><p></p></div>";
endif;
if ($indpriceval) :
$indtableshow .= "<div class='indprice'><p>" . $indpriceval . "</p></div>";
else :
$indtableshow .= "<div class='blankprice'></div>";
endif;
if($indpricelabelval) :
$indtableshow .= "<div class='indperiod'><p>".$indpricelabelval."</p></div>";
else :
$indtableshow .= "<div class='indperiod'></div>";
endif;
$indtableshow .= "</div>";
$indtableshow .= "<div id='wrapfeatureequally2'>";
foreach ($indfeatureval as $indfeature) {
$indtableshow .= "<div class='featurerow'><p>" . $indfeature['feature'.$z] . "</p></div>";
}
$indtableshow .= "</div>";
if ($indbuttonval) :
foreach ($indbuttonval as $indbutton) {
$indtableshow .= "<div class='indbutton'><p>" . "<a href='". $indbutton['buttonurls'.$z] . "'>" . $indbutton['buttontext'.$z] . "</a>" . "</p></div>";
}
else :
$indtableshow .= "<div class='blankbutton'></div>";
endif;

$indtableshow .= "</div></div>";
}
$indtableshow .= "</div>";
//$indtableshow .= "</center>";
return $indtableshow;
}

if (is_admin()) :
add_action( 'init', 'ind_pricing_table_table', 0 );
//add_action('admin_enqueue_scripts', 'ind_load_wpjquery');
add_action( 'admin_enqueue_scripts', 'enqueue_indtable_ajax' );
add_action( 'admin_enqueue_scripts', 'enqueue_indtable_style' );
add_action('add_meta_boxes', 'indtable_meta_hook');
add_filter( 'manage_edit-indtable_columns', 'wp_edit_indtable_columns' );
add_action( 'manage_indtable_posts_custom_column', 'wp_manage_indtable_columns', 10, 2 );
add_filter( 'manage_edit-indtable_sortable_columns', 'wp_edit_indtable_sortable_columns' ); 
add_action('save_post', 'indtable_form_save');
add_action('wp_ajax_ind_save_ajax', 'indtable_ajax_process');
add_action('wp_ajax_ind_decrementor', 'indcol_decrement');
else :
return;
endif;
?>