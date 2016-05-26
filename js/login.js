// JavaScript Document

 var login=new function(){
	 
	 this.validate=function(){
	 validation.validate();
	 if($("[class='error']").length>0){
	 return false;
	 }
	 $.ajax({
			url:"server/login.php",
			method:"post",
			data:$("form[name='login_form']").serialize()
			}).done(function(data){
				if(data=="valid_login"){
					window.location="home.php";
					}else{
						 
						}
				});
	 }
	 
	 
	 this.checklogin=function(e){
		 if(e.which==13){
	 
			 login.validate();
			 }
		 }
	 
	 
	 }
	 
	 // JavaScript Document

$(document).ready(function(){
						   
$("div[class='content']").before("<div class='header'><img src='images/logo.png' width='300' height='60'  /></div>");	
$("div[class='content']").after("<div class='fotter'><div>@2016 All rights reserved</div></div>");	
 
						   
						   });