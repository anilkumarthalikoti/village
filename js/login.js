// JavaScript Document

 var login=new function(){
	 
	 this.validate=function(){
	 $.ajax({
			url:"db/login.php",
			method:"post",
			data:$("form[name='login_form']").serialize()
			}).done(function(data){
				if(data=="valid_login"){
					window.location="home.php";
					}else{
						$("#errorMsg").html("Invalid user name/password");
						}
				});
	 }
	 
	 
	 
	 
	 
	 }
	 
	 // JavaScript Document

$(document).ready(function(){
						   
$("div[class='content']").before("<div class='header'><img src='images/logo.png' width='300' height='60'  /></div>");	
$("div[class='content']").after("<div class='fotter'><div>@2016 All rights reserved</div></div>");	
 
						   
						   });