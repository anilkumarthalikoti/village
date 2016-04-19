// JavaScript Document


var install=new function(){
	
 
	
	this.installdetails=function(){
		
		 $.ajax({
			url:"server/spacing.php",
			method:"post",
			data:$("form[name='installation']").serialize()
			}).done(function(data){
				//window.location='actionmapping.php';
				});
		
		
		}
		
		
		this.subcd=function(){
		
		 $.ajax({
			url:"server/spacing.php",
			method:"post",
			data:$("form[name='subcd']").serialize()
			}).done(function(data){
				//window.location='actionmapping.php';
				});
		
		
		}
	
	
	
	
	}