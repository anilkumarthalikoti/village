 var states=new function(){
 
	this.saveData=function(form_name){
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/village.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 
				 
					 
				});
		
		}
		
	 
		this.updateview=function(formname,selected,responsefor,setelementfor){
			
			
			var params={};
		var key="form[name='"+formname+"'] #"+selected+" option:selected";
		params[selected]=$(key).val();
		params["responsefor"]=responsefor;
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="form[name='"+formname+"'] #"+setelementfor+"";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
			
			
			}
		
		
	
	}
	
	
	
	
	