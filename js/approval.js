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
														  
														  
										 
										switch(keyx){
										
										case "A":
											total=valx;
											$("#scheme_filling_val").html(valx);
										break;
										case "1":
										//Scheme application
											pending=total-valx;
											$("#pendding").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=1");
											$("#pendding").html(valx);
											
										break;
										case "-1":
										//Reject by ta at application
											$("#scheme_reject").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=-1");
											$("#scheme_reject").html(valx);
										
										break;
										
										
										case "2" :
											$("#yettoapproval").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=2");
											$("#yettoapproval").html(valx);
											$("#forwardtorsk").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=4")
											$("#forwardtorsk").html(valx);
										
										break;
										
										case "4":
											$("#forwardedtorsk").html(valx);
										break;
										case "5":
											$("#preinspection").html(valx);
										break;
										
										case "5P":
											$("#preinspection_pending").html(valx);
											$("#preinspection_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=5");
										
										break;
										
										case "5R":
										 	$("#preinspection_rejected").html(valx);	
										break;
										
										case "5C":
										 	$("#preinspection_completed").html(valx);
											$("#forward_preinspection").html(valx);
											$("#forward_preinspection").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6");
													
										break;
										case "6":
										 	$("#recivedfrom_rsk").html(valx);
											$("#yettoforward_ddh").html(valx);
											$("#forwardto_ddh").html(valx);
											$("#recivedfrom_rsk").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6A");
											$("#yettoforward_ddh").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6B");
											$("#forwardto_ddh").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=6C");
											
										break;
										case "7":
										 	$("#workorder").html(valx);	
										break;
										
										case "7P":
										 	$("#workorder_pending").html(valx);
											$("#workorder_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=7");
										
										break;
										
										case "7R":
										 	$("#workorder_rejected").html(valx);
										break;
										
										case "7C":
												$("#workorder_completed").html(valx);
												$("#workorder_forward").html(valx);
												$("#workorder_forward").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=8");
												
										break;
										 
										case "9P":
												$("#yettoforward_rsk_wo").html(valx);
												$("#yettoforward_rsk_wo").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=9A");
												$("#forwardto_rsk_wo").html(valx);
												$("#forwardto_rsk_wo").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=9B");
											$("#recivedfrom_ddh").html(valx);	
										break;
										
										
										case "10":
												$("#postinspection ").html(valx);
										break;
										
										
											case "10C":
												$("#postinspection_completed").html(valx);
												 $("#postinspection_forward").html(valx);
												 $("#postinspection_forward").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=12");
												
										break;
										
										
										case "10P":
												$("#postinspection_pending").html(valx);
												$("#postinspection_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=11");
													
										break;
										
										case "10R":
											$("#postinspection_rejected").html(valx);	
										break;
										
										case "13":
											$("#postinspection_received").html(valx);
											$("#postinspection_ta_approval_yet").html(valx);
											$("#postinspection_ta_approval_yet").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=13A");
											$("#postinspection_ta_approval").html(valx);	
											$("#postinspection_ta_approval").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=13B");
											
										break;
										
										case "14":
										$("#taluka_approval").html(valx);
										
										
										break;
										
										case "14P":
										$("#taluka_approval_pending").html(valx);
										$("#taluka_approval_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=14");
										
										break;
										case "14C":
										$("#talukaapproval_done").html(valx);
										$("#talukaapproval_done").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=15");
										
										break;
										case "16":
										$("#applicationfor_sanctionorder").html(valx);
										$("#applicationfor_sanctionorder").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=16");
										break;
										case "17":
										$("#sanctionorder_applications").html(valx);
										//$("#applicationfor_sanctionorder").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=16");
										break;
										case "17P":
										$("#sanctionorder_applications_pending").html(valx);
										$("#sanctionorder_applications_pending").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=17");
										break;
										case "18":
										$("#sanctionorder_applications_approved").html(valx);
										$("#sanctionorder_applications_approved_forward").html(valx);
										$("#sanctionorder_applications_approved_forward").parent().attr("href","applicationacceptreject.php?schemeid="+params["schemeid"]+"&status=18");
										break;
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
				 var url="coverletter_"+savetype+".php"
				 $("form[name='application']").attr("action",url);
				 $("form[name='application']").submit();
				  
				 } 
				 
				 
		this.search_action=function(){
			var url="applicationacceptreject.php?schemeid="+$("#scheme_select1 option:selected").val()+"&status="+$("select[name='_application'] option:selected").val();
			 
			 window.location.href=url;
			}		 
<!--pre inspection-->				 
		this.saveandprint=function(){
		 
								$("#preinspection").dialog( "close" );
			
			$.ajax({
						url:"server/approval.php",
						method:"post",
						data:$("form[name='preinspection_form']").serialize()
						
						}).done(function(data){
							var filling =$("input[name='filling_id']").val();
							
								 
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
							 
							
								 $( "#workorder" ).dialog( "close" );
					 
							 location.reload();
							});
			
			}	
	
	}
	
	$(document).ready(function(){
							   
							   
							   $("#details_schema").load("approval_schemedetails.php");
							    
							   
							   });
							   
							 