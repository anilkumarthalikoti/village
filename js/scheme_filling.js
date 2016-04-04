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
		
		
		
		
		
		
		
		
		
	
	}
	
	
	
	
	
	
	$(document).ready(function(){
							  $(document).bind('keydown.Alt+Shift+s',function (evt){
																		  
																		   });
							   
							   });