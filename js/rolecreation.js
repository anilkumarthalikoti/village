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
					    location.reload();
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
				var formKey="form[name='role_dtl']";
		$.ajax({
				   method:"POST",
				   
				   url:"rolecreation.php",
				   data:$(formKey).serialize()
				   
				   
				   
				   }).done(function(data){
					   location.reload();
					   });
		}
	this.checkAll=function(){
		
		if($("#checkAll").is(":checked")){
			$("input[name='linkid[]']").prop("checked",true);
			}else{
				$("input[name='linkid[]']").prop("checked",false);
				}
		}
		
		this.setRole=function(role){
		 
		 $("table[id='role_mstr'] tbody tr").removeClass("active");
		 var key="table[id='role_mstr'] tbody tr[id='"+role+"']";
	 
		 $(key).addClass("active");
		 
			$("input[name='role_id_selected']").val($(key).attr("role_id"));
				$( "#link_dtl" ).dialog( "open" );
			}
	}