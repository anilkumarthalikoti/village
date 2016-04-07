// JavaScript Document

 var mapping=new function(){
	 
	 this.validateuser=function(e){
	 
		  if(e.which == 13) {
	 $.ajax({
			url:"server/login.php",
			method:"post",
			data:$("form[name='actionmapping']").serialize()
			}).done(function(data){
				 
				 if(data.length>0){
					 $("tr#hobli").show();
					 $("input[name='userregid']").val(data);
					 $("select#hobli_select").focus();
					 }else{
						 $("tr#hobli").addClass("hide");
						  $("input[name='userregid']").val("");
						 alert("Invalid user");
						 }
				});
	 }else{
		 $("tr#hobli").hide();
		  $("input[name='userregid']").val("");
		 }
	 }
	 
	 this.savedata=function(){
		 $("input[name='methodcall']").val("save_action_mapping");
		  $.ajax({
			url:"server/login.php",
			method:"post",
			data:$("form[name='actionmapping']").serialize()
			}).done(function(data){
				//window.location='actionmapping.php';
				});
		 }
	 
	 
	 
	 }
	 
 