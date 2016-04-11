 var schemefilling=new function(){
	 
	 
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