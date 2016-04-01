// JavaScript Document

$(document).ready(function(){
						   
 
$("div[class='viewport']").before("<div class='header'></div>");	
$("div[class='header']").load("header.html");
$("div[class='viewport']").after("<div class='fotter'><div>@2016 All rights reserved</div></div>");	
$("div[class='content']").before("<div class='interceptor'></div>");
$("div[class='viewport']").before("<div class='interceptor'></div>");
var current_url=window.location.pathname;
 
$.ajax({
  url: "interceptor.php",
  beforeSend: function( xhr ) {
    xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
  }
})
  .done(function( data ) {
 	 if(data=="index.php"){
		 window.location="/index.php";
		 }
  });

$("div[class='viewport']").before("<div class='viewport_menu'></div>");
$("div[class='viewport_menu']").load("menu.php");
	<!-- Tabs code-->		 
 $('#tabs li a:not(:first)').addClass('inactive');
$('.container').hide();
$('.container:first').show();
    
$('#tabs li a').click(function(){
    var t = $(this).attr('id');
  if($(this).hasClass('inactive')){ //this is the start of our condition 
    $('#tabs li a').addClass('inactive');           
    $(this).removeClass('inactive');
    
    $('.container').hide();
    $('#'+ t + 'C').fadeIn('slow');
 }
});			 
			 
			 
			  $("[alt='ka']").each(function(){
					$(this).attr("charset","utf-8");	   
						   
						   
						   $(this).keydown(function(e){
															
														toggleKBMode(e)	;
															});
						   
						   
						      $(this).keypress(function(e){
															
														convertThis(e);
															});
						   
						   
														 });
			 
						   });

 document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     //alert(status);
     return false;    
   }
}



function isNull(element){
	var key="#"+element;
	if($(key).val().trim().length==0){
		return true;
		}
		return false;
	}
	
	
	function tval(element){
		var key="#"+element;
	 return $(key).val().trim(); 
		}
		
	function isNullC(groupName){
		var key="input[name='"+groupName+"']:checked";
		if($(key).length==0){
			return true;
			}
		return false;
		}	