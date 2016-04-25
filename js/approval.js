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
										if(keyx=="1"){
											pending=total-valx;
											$("#pendding").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=1");
											$("#pendding").html(valx);
											}		
											if(keyx=="-1"){
												$("#scheme_reject").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=-1");
												$("#scheme_reject").html(valx);
												}
											if(keyx=="2"){
											 
											$("#yettoapproval").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=2");
											$("#yettoapproval").html(valx);
											$("#forwardtorsk").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=4")
											$("#forwardtorsk").html(valx);
											}								 
												
											if(keyx=="4"){
												$("#forwardedtorsk").html(valx);
												
												}	
												
												if(keyx=="5"){
												$("#preinspection").html(valx);
												
												}	
												if(keyx=="5P"){
												$("#preinspection_pending").html(valx);
												$("#preinspection_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=5");
										
												}
												if(keyx=="5R"){
												$("#preinspection_rejected").html(valx);
												
												}
												
												if(keyx=="5C"){
												$("#preinspection_completed").html(valx);
												$("#forward_preinspection").html(valx);
												$("#forward_preinspection").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6");
												
												}
												
												if(keyx=="6"){
												$("#recivedfrom_rsk").html(valx);
												 $("#yettoforward_ddh").html(valx);
												  $("#forwardto_ddh").html(valx);
												$("#recivedfrom_rsk").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6A");
												$("#yettoforward_ddh").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6B");
												$("#forwardto_ddh").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6C");
												}
												
												
												if(keyx=="7"){
												$("#workorder").html(valx);
												
												}	
												if(keyx=="7P"){
												$("#workorder_pending").html(valx);
												$("#workorder_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=7");
										
												}
												if(keyx=="7R"){
												$("#workorder_rejected").html(valx);
												
												}
												
												if(keyx=="7C"){
												$("#workorder_completed").html(valx);
												$("#recivedfrom_ddh").html(valx);
												$("#recivedfrom_ddh").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=8");
												
												}
												
												
												
												if(keyx=="9"){
												$("#postinspection").html(valx);
												
												}	
												if(keyx=="9P"){
												$("#postinspection_pending").html(valx);
												$("#postinspection_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=9");
										
												}
												if(keyx=="9R"){
												$("#postinspection_rejected").html(valx);
												
												}
												
												if(keyx=="9C"){
												$("#postinspection_completed").html(valx);
												 
												 
												
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
						data:$("form[name='application']").serialize()
						
						}).done(function(data){
							location.reload(); 
							});
				  
				 }
				 
		 this.rejectApplication=function(){
				 
				 
				 $.ajax({
						url:"server/approval.php",
						method:"post",
						data:$("form[name='rejectApplication']").serialize()
						
						}).done(function(data){
							location.reload(); 
							});
				  
				 }		 
				 
				 
				 
				 this.generatecoverletter=function(savetype){
				 
				 $("form[name='application']").attr("action","coverletter.php");
				 $("form[name='application']").submit();
				  
				 } 
				 
				 
		this.search_action=function(){
			var url="applicationacceptreject.php?schemeid="+$("#scheme_select1 option:selected").val()+"&status="+$("select[name='_application'] option:selected").val();
			 
			 window.location.href=url;
			}		 
				 
		this.saveandprint=function(){
		 
			
			$.ajax({
						url:"server/approval.php",
						method:"post",
						data:$("form[name='preinspection_form']").serialize()
						
						}).done(function(data){
							var filling =$("input[name='filling_id']").val();
							
								$( "#preinspection" ).dialog( "close" );
								 
							window.open("form3.php?fillingid="+filling);
							location.reload();
							});
			
			}	
			
			
<!-- Work order-->			
			
			this.workorder=function(){
		 
			
			$.ajax({
						url:"server/approval.php",
						method:"post",
						data:$("form[name='workorderApplication']").serialize()
						
						}).done(function(data){
							 
							
								( "#workorder" ).dialog( "close" );
					 
							location.reload();
							});
			
			}	
	
	}
	
	$(document).ready(function(){
							   
							   
							   $("#details_schema").load("approval_schemedetails.php");
							    
							   
							   });
							   
							 