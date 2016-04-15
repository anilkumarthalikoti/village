 var scheme=new function(){
 
	this.saveData=function(form_name){
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/scheme.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 var selecttab=$(formKey).parent().attr("id").substring(0,4);
				 
					 window.location="scheme.php?viewtab="+selecttab;
					 
					 
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
	 
		
		
		
		
	
	}
	
	
	
	
	
	
	$(document).ready(function(){
							 var tabview=$("input#selectTab").val();
							 tabview="#"+tabview;
							 $(tabview).click();
							   
							   });