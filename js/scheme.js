 var scheme=new function(){
 
	this.saveData=function(form_name){
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/scheme.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 
				 
					 
				});
		
		}
	
	this.updateview=function(elementid){
		var params={};
		 
		params["getschemes"]=true;
		params["parent_id"]= $(elementid).val();
			$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
								var setelement=$(elementid).parent().closest('tr').next().find("select");
								  
								$(setelement).find('option') .remove();
									 var key="";
				 					key=setelement;
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									  
									  var id="";
									  var name="";
									  $.each(val,function(keyx,valx){
										  console.log(keyx+":"+valx);
										  id=keyx;
										  name=valx;
										  });
									   								$(key).append($('<option>', {
   																				 value: id,
   																				 text: name
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
		 
		params["scheme_select"]=$("#scheme_select2 option:selected").val();
		params["subscheme_select"]=$("#sub_scheme_select2 option:selected").val();
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
							  $(document).bind('keydown.Shift_s',function (evt){
																		  //add key function
																		   });
							   
							   });