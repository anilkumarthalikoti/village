 var scheme=new function(){
 
	this.saveData=function(form_name){
		alert('d');
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"scheme.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 
				 alert(data);
					 
				});
		
		}
	
	
	
	
	}