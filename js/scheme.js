 var schema=new function(){
 
	this.saveData=function(){
		
		$.ajax({
			url:"scheme.php",
			method:"post",
			data:$("form[name='form1']").serialize()
			}).done(function(data){
				 
				//	window.location="scheme.php";
					 
				});
		
		}
	
	
	
	
	}