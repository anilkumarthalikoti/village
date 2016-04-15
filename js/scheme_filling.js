 var schemefilling=new function(){
	 
	 this.enableArea=function(ele,area){
		 /*
		 var key="input[name='area"+area+"']";
		 if($(ele).val()=="-1"){
			 
			 $(key).val(0);
			 $(key).attr("disabled",true);
			 }else{
				  $(key).attr("disabled",false);
				 }*/
		 
		 }
	 this.enableArea=function(){
		 
		 if($("input[name='landsurvayno[]']:checked").length>0){
			 
																					    $("input[name='area1']").attr("disabled",false);
																						   $("input[name='area2']").attr("disabled",false);
																						   $("input[name='area3']").attr("disabled",false);
																					   }else{
																						   $("input[name='area1']").attr("disabled",true);
																						   $("input[name='area2']").attr("disabled",true);
																						   $("input[name='area3']").attr("disabled",true);
																						   $("input[name='area1']").val(0);
																						   $("input[name='area2']").val(0);
																						   $("input[name='area3']").val(0);
																						   }
																						   var totalarea="0";
																						   $("input[name='landsurvayno[]']:checked").each(function(){
																							if(!isNaN($(this).attr("landvalue"))){
																								totalarea=Number(totalarea)+Number($(this).attr("landvalue"));
																								}
																																				   });
																						   $("#totalarea").val(totalarea);
		 }
	 
	 this.viewEntries=function(){
		  $("td#cropbase").hide();
		   $("td#componentbased").hide();
		 if($("#subscheme_select option:selected").attr("ftype")=="C"){
			  this.updateLandDetails();
			 $("td#cropbase").show();
			
			 }else{
				  $("td#componentbased").show();
				 }
		 
		 }
	 
	 this.updateview=function(elementid){
		var params={};
		 
		params["getschemes"]=true;
		params["parent_id"]= $(elementid).val();
		params["skip"]=true;
			$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
								var next=$(elementid).attr("tab");
								next=Number(next)+1;
								 
								var key="select[tab='"+next+"']";
								if(next>6){
									return;
									}
								var setelement=$(key);
								  
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
									  var fillingtype="";
									  $.each(val,function(keyx,valx){
										   
										  id=keyx.split("#")[0];
										  fillingtype=keyx.split("#")[1];
										  name=valx;
										  });
								 
									   								$(key).append($("<option>", {
   																				 value: id,
   																				 text: name,
																				 ftype:fillingtype
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
		this.updateLandDetails=function(){
			var reg_id=$("input#regid").val();
													var pr={};
													pr["regid"]=reg_id;
													$.ajax({
			url:"server/landdetails.php",
			method:"get",
		 	data:pr
			
							}).done(function(data){
								$("table#landdetails tbody tr").remove();
								$("table#landdetails tbody").html(data);
								
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
	