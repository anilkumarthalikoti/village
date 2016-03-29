// JavaScript Document

$(document).ready(function(){
						   
 
$("div[class='viewport']").before("<div class='header'><img src='images/logo.png' width='300' height='60'  /></div>");	
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

$("div[class='viewport']").append("<div class='view_menu'></div>");
$("div[class='view_menu']").load("menu.php");
						   
						   
						   })