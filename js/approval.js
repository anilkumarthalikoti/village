 var approvaljs=new function(){
 
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
		
		
		
		
		
		this.updatesubscheme=function(id,scheme){
		
			var params={};
		var schemeselected="#"+scheme+" option:selected";
		params["scheme_select"]=$(schemeselected).val();
		
		
				$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="#"+id+" option";
								 	$(key).remove();
				 					key="#"+id;
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["item_id"],
   																				 text: val["item_name"]
																					}));
									   
									   											});
						 
													});
			
			
			
			
		}
		
		
		
		this.updatecomponent=function(){
			
			
			
			var params={};
		 
		params["scheme_select"]=$("#scheme_select option:selected").val();
		params["subscheme_select"]=$("#subscheme_select option:selected").val();
				$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="#component_select option";
								 	$(key).remove();
				 				 
									 $("#component_select").append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$("#component_select").append($('<option>', {
   																				 value: val["item_id"],
   																				 text: val["item_name"]
																					}));
									   
									   											});
						 
													});
			
			
			
			
			
			
			}
		
		
		
		this.updatecrops=function(){
			
			var params={};
		 
		params["scheme_select"]=$("#scheme_select option:selected").val();
		params["subscheme_select"]=$("#subscheme_select option:selected").val();
		params["component_select"]=$("#component_select option:selected").val();	
		
		
		
		$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 
								 	$("select[crop='crop'] option").remove();
				 				 
									 $("select[crop='crop']").append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   //4,5,6,7
									   var item_type=val["item_type"];
									   var key="";
									   if(item_type==3){
										   	key="select[name='component_1']";
									   
										   }
										    if(item_type==4){
										   	key="select[name='component_2']";
									   
										   }
										    if(item_type==5){
										   	key="select[name='component_3']";
									   
										   }
										    if(item_type==6){
										   	key="select[name='component_4']";
									   
										   }
									   					$(key).append($('<option>', {
   																				 value: val["item_id"],
   																				 text: val["item_name"]
																					}));
														
														
														
									   											});
						 
													});
		
		
			}
		
		
		this.searchRegistration=function(){
			
			
			}
		
		
		
		// Approval details update
		
		this.updateschemadetails=function(){
			
			}
	
	}
	
	
	
	
	