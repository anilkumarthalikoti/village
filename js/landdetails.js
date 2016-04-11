 var landdetailsjs=new function(){
	 
		
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
													
													var reg_id=$("input#regid").val();
													var pr={};
													pr["regid"]=reg_id;
													$.ajax({
			url:"server/landdetails.php",
			method:"get",
		 	data:pr
			
							}).done(function(data){
								$("table#existing tbody tr").remove();
								$("table#existing tbody").html(data);
								
								});
								
								});
			}
		
		this.saveData=function(){
			
			$.ajax({
			url:"server/landdetails.php",
			method:"post",
			data:$("form[name='form1']").serialize()
			}).done(function(data){
				 
				 
					 
				});
			}
	
	}
	
	
	
	
	
	
	$(document).ready(function(){
							 
							   $("input[type='text']").addClass("medium");
							   	 $("input[id='search']").attr("disabled",false);
							   });