 var states=new function(){
 
	this.saveData=function(form_name){
		validation.validate();
		if($("[class='error']").length>0){
			return false;
			}
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/village.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				if(form_name=="addState"){
					window.location="village.php";
					}
				 data=data+"";
				 var table="table[grid='"+form_name+"'] tbody";
				  
				 $(table).find("tr").remove();
										 var list=$.parseJSON(data);
										 var i=1;
				  									$.each(list,function(key1,val){
																		 
									   var  tr="<tr><td width='50'>"+i+"</td><td>"+val['state_name']+"</td><td>"+val['state_name_k']+"</td></tr>";
									   								$(table).append(tr);
																 
																	i++;
									   
									   											});
													$(formKey).find("input[name='state_name']").val('');
													$(formKey).find("input[name='state_name_k']").val('');
				 
					 
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
	
	
	
	
	