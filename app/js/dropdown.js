$(document).ready(function(){
$('#url').hide();
$('#sms').hide();
$('#text').hide();
$('#phone').hide();
$('#email').hide();
$('#vcard').hide();
$('#display').hide();

$("#qroptions").change(function(){
$("#" + this.value).show().siblings().hide();
});

$("#qroptions").change();
});