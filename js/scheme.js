 var scheme=new function(){
 
	this.saveData=function(form_name){
		
		var formKey="form[name='"+form_name+"']";
		
		$.ajax({
			url:"server/scheme.php",
			method:"post",
			data:$(formKey).serialize()
			}).done(function(data){
				 
				 alert(data);
					 
				});
		
		}
	
	
	this.updatesubscheme=function(){
		
		var params={};
		params["scheme_select"]=$("#scheme_selected option:selected").val();
		
		
				$.ajax({
			url:"server/scheme.php",
			method:"get",
		 	data:params
			
			}).done(function(data){
				 
				 $("#sub_scheme_select option").remove();
				 $('#sub_scheme_select').append($('<option>', {
    value: -1,
    text: "Select"
}));
		 data=data+"";
			 var list=$.parseJSON(data);
				  $.each(list,function(key,val){
									   
									   $('#sub_scheme_select').append($('<option>', {
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