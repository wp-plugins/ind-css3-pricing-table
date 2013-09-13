jQuery(document).ready(function($){

// Remove placeholder on input focus
if(!$.browser.webkit){
$("input").each(
        function(){
            $(this).data('holder',$(this).attr('placeholder'));
            $(this).focusin(function(){
                $(this).attr('placeholder','');
            });
            $(this).focusout(function(){
                $(this).attr('placeholder',$(this).data('holder'));
            });

        });}

var tellme = $("#parenttable").find("input[name*='plan']").length;
if (tellme <= 1) {
$('.removelastcolumn').hide();
} else {
$('.removelastcolumn').show();
}

// Clone tbody
$(".addpricingcolumn").on("click", function(event){
event.preventDefault();
$("#ind_loading").show();
// $(".openingcolumn[style='visibility:hidden;']").removeAttr("style");
	var number = $("#parenttable").find("input[name*='plan']").length;
	$('.counter').val(number*1+1);
	var showrmv = $('.counter').val();
	var addcol = $("#parenttable tbody:first").clone(true);
	var incr = $("#parenttable").find("input[name*='plan']").length+1;
	var newplan = addcol.find("input[name*='plan1']").attr({'name':'plan'+incr});
	var newprice = addcol.find("input[name*='price1']").attr({'name':'price'+incr});
	var newfeature = addcol.find("input[name*='feature1[]']").attr({'name':'feature'+incr+'[]'});
	var newtext = addcol.find("input[name*='buttontext1']").attr({'name':'buttontext'+incr+'[]'});
	var newurl = addcol.find("input[name*='buttonurl']").attr({'name':'buttonurls'+incr+'[]'});
	addcol.removeClass('columnstobecloned openingcolumn');
	addcol.addClass('columnstoberemoved');
	var pid = $('.postidclass').val();
	var data = {
		action: 'ind_save_ajax',
		cache: false,
		ind_ajax_nonce: indtable_ajax_script_vars.ind_ajax_nonce,
		postid: pid,
		countrow: number
	};
	
	$.post(ajaxurl, data, function(response) {
	if (showrmv > 1) {
$('.removelastcolumn').show();
}
$("#ind_loading").hide();
addcol.insertAfter("#parenttable tbody:last").newplan.newprice.newfeature.newtext.newurl;
});
});

// Remove Last Column 
$(".removelastcolumn").on("click", function(event){
event.preventDefault();
$("#ind_loading").show();
	var psid = $('.postidclass').val();
	var decounting = $('.counter').val();
	$('.counter').val(decounting*1-1);
	
var data = {
action: 'ind_decrementor',
cache: false,
ind_ajax_nonce: indtable_ajax_script_vars.ind_ajax_nonce,
postdec: psid,
decrease: decounting
}

	$.post(ajaxurl, data, function(response) {
	$("#ind_loading").hide();
var hidermv = $('.counter').val();
if (hidermv <= 1) {
$('.removelastcolumn').hide();
} else {
$('.removelastcolumn').show();
}
});

$("#parenttable tbody:last").remove();
$("tbody:empty").remove();
});

// Clone Feature Field
$('.addfeature').click(function(event) {
event.preventDefault();
var clone = $(this).closest('tr').clone(true);
var parenttr = $(this).closest('tr');
clone.find('input').val('');
clone.insertAfter(parenttr);
});

// Remove Feature Field
$('.remove-feature').on('click', function(event){
event.preventDefault();
$(this).parents('tr').remove();
});

$('#parenttable tbody').sortable({
opacity: 0.6,
cursor: 'move',
handle: '.sortfeature'
});
    $('#indplanbgtop_color').wpColorPicker();
	$('#indplanbgbottom_color').wpColorPicker();
	$('#indplantext_color').wpColorPicker();
$('#indfeaturow_1n').wpColorPicker();
$('#indfeaturow_2n').wpColorPicker();
$('#indfeatucol_1n').wpColorPicker();
$('#indfeatucol_2n').wpColorPicker();
$('#indbuttonbg_topdef_color').wpColorPicker();
$('#indbuttonbgdefbottom_color').wpColorPicker();
$('#indbuttonbgtophover_color').wpColorPicker();
$('#indbuttonbgbottomhover_color').wpColorPicker();
$('#indbuttontext_color').wpColorPicker();
});
