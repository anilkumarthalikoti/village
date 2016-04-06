 var schemefilling=new function(){
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
			var params={};
			params["searchregistration"]=$("#search").val();
			params["searchin"]=$("#searchin option:selected").val();
			
			$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
							 
									 data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,value){
																		 var keys=Object.keys(value);
																	 
																		 var key="input[id='"+keys[0]+"']";
																		 $(key).val(value[keys[0]]);
																		 
																		 });
								
								});
			}
		
		this.saveData=function(){
			
			$.ajax({
			url:"server/schemefilling.php",
			method:"post",
			data:$("form[name='form1']").serialize()
			}).done(function(data){
				 
				 
					 
				});
			}
	
	}
	
	
	
	
	
	
	$(document).ready(function(){
							 $("input[type='text']").attr("disabled","disabled");
							   $("input[type='text']").addClass("medium");
							   	 $("input[id='search']").attr("disabled",false);
							   });