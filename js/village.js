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
		
		
	this.updatedistrict=function(formname){
		var params={};
		var key="form[name='"+formname+"'] #state_selected option:selected";
		params["state_selected"]=$(key).val();
		params["responsefor"]="district";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="form[name='"+formname+"'] #district_selected";
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
	
	 
		
		
		
		
		
		
	this.updatetaluka=function(formname){
		var params={};
		var key="form[name='"+formname+"'] #state_selected option:selected";
		var key1="form[name='"+formname+"'] #district_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["responsefor"]="taluka";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="form[name='"+formname+"'] #taluka_selected";
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
		
		
		
		this.updatehobli=function(formname){
		var params={};
		var key="form[name='"+formname+"'] #state_selected option:selected";
		var key1="form[name='"+formname+"'] #district_selected option:selected";
		var key2="form[name='"+formname+"'] #taluka_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["taluka_selected"]=$(key2).val();
		params["responsefor"]="hobli";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="form[name='"+formname+"'] #hobli_selected";
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
		
		
		
		
		
		
		this.updatevillage=function(formname){
		var params={};
		var key="form[name='"+formname+"'] #state_selected option:selected";
		var key1="form[name='"+formname+"'] #district_selected option:selected";
		var key2="form[name='"+formname+"'] #taluka_selected option:selected";
		var key3="form[name='"+formname+"'] #hobli_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["taluka_selected"]=$(key2).val();
		params["hobli_selected"]=$(key3).val();
		params["responsefor"]="village";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="form[name='"+formname+"'] #village_selected";
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
	
	
	
	
	