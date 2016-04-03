 var scheme=new function(){
 
	this.saveData=function(form_name){
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/scheme.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 
				 alert(data);
					 
				});
		
		}
	
	
	this.updatesubscheme=function(){
		
		var params={};
		params["scheme_select"]=$("#scheme_selected option:selected").val();
		
		
				$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
			}).done(function(data){
				alert(data);
				 $("#sub_scheme_select option").remove();
				 
				   
						$.each(data, function (index, value) {
        console.log(value);
    });			 
					 
				});
		
		
		}
	
	}