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
		
		
		
		// Approval details update
		
		this.updateschemadetails=function(){
			// $("#details_schema").load("approval_schemedetails.php");
			 $("#details_schema").load("approval_schemedetails.php");
			var params={}
			params["schemeid"]=$("#scheme_select option:selected").val();
			params["get"]="schemes";
			
			
			
			$.ajax({
			url:"server/actionmapping.php",
			method:"post",
		 	data:params
			
							}).done(function(data){
								
								
								 data=data+"";
								 var total=0,pending=0;
										 var list=$.parseJSON(data);
				  									$.each(list,function(key,val){
										 
									  $.each(val,function(keyx,valx){
														  
														  
														  
										   if(keyx=="A"){
											   total=valx;
																			 $("#scheme_filling_val").html(valx);
																			  
																			 }
										if(keyx=="P"){
											pending=total-valx;
											$("#pendding").html(valx);
											}									 
																			 
																			 
										  });
																		
																		 
																		 });
								
								});
			
			
			
			
			
			}
			
			
			
			
			
		this.search_application=function(){
			
			var params={};
			params["status"]=$("#actionselect option:selected").val();
			$.ajax({
			url:"approval_actions.php",
			method:"post",
		 	data:params
			
							}).done(function(data){
								
								
								$("div#actions").html(data);
								
								});
			}	
			
			 
	
	}
	
	$(document).ready(function(){
							   
							   
							   $("#details_schema").load("approval_schemedetails.php");
							   $("#actions").load("approval_actions.php");
							   
							   
							   
							   
							   });
	
	
	