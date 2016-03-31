// JavaScript Document
var rolecreate=new function(){
	
	
	
	this.createRole=function(){
		
		if(isNull("role_name")){
			alert("Enter role name");
			return;
			}
			var _params={};
			_params["method_call"]="newrole";
			_params["role_name"]=tval("role_name");
			$.ajax({
				   method:"POST",
				   data:_params,
				   url:"rolecreation.php"
				   
				   
				   }).done(function(data){
					   
					   });
			
			 
		
		}
	
	
	this.updateRole=function(){
		if(isNull("role_id_selected")){
			alert("Select role");
			return;
			}
			if(isNullC("linkid[]")){
				alert("Select link");
				return;
				}
		$.ajax({
				   method:"POST",
				   data:$("form[name='role_dtl']").serilize(),
				   url:"rolecreation.php"
				   
				   
				   }).done(function(data){
					   
					   });
		}
	this.checkAll=function(){
		
		if($("#checkAll").is(":checked")){
			$("input[name='linkid']").prop("checked",true);
			}else{
				$("input[name='linkid']").prop("checked",false);
				}
		}
		
		this.setRole=function(role){
		 var key="#"+role;
		 alert($(key).attr("role_id"));
			$("input[name='role_id_selected']").val($(key).attr("role_id"));
			}
	}