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
		params["skip"]=true;
		params["parent_id"]= $(elementid).val();
			$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
								var tabid=$(elementid).attr("tabid");
								tabid=Number(tabid)+1;
								var keys="select[tabid='"+tabid+"']";
								var setelement=$(keys);
								  
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
									  var type="";
									  $.each(val,function(keyx,valx){
										  var pk=keyx.split("#");
										  id=pk[0];
										  type=pk[1];
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
		 
			 
			var params={}
			params["schemeid"]=$("#scheme_select option:selected").val();
			params["get"]="schemes";
			
			
			
			$.ajax({
			url:"server/approval.php",
			method:"post",
		 	data:params,
			datatype:'json'
			
							}).done(function(data){
								
								alert(data);
								 
								 var total=0,pending=0;
										 var list=data;
				  									$.each(list,function(key,val){
										 
									  $.each(val,function(keyx,valx){
														  
														  
														  
										   if(keyx=="A"){
											   total=valx;
																			 $("#scheme_filling_val").html(valx);
																			  
																			 }
										if(keyx=="1"){
											pending=total-valx;
											$("#pendding").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=1");
											$("#pendding").html(valx);
											}									 
											if(keyx=="2"){
											pending=total-valx;
											$("#yettoapproval").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=2");
											$("#yettoapproval").html(valx);
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
			
			 this.savenewapplication=function(savetype){
				 
				 $("input[name='statusto']").val(savetype);
				 $.ajax({
						url:"server/approval.php",
						method:"post",
						data:$("form[name='acpplication']").serialize()
						
						});
				  
				 }
				 
				 
				 
				 
				 
				 
				 
				 
				 
	
	}
	
	$(document).ready(function(){
							   
							   
							   $("#details_schema").load("approval_schemedetails.php");
							   $("#actions").load("approval_actions.php");
							   
							   
							   
							   
							   });
	
	
	