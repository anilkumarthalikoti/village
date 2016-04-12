// JavaScript Document

 var mapping=new function(){
	 
	 this.validateuser=function(e){
	 
		  if(e.which == 13) {
	 $.ajax({
			url:"server/login.php",
			method:"post",
			data:$("form[name='rolemapping']").serialize()
			}).done(function(data){
				 
				 if(data.length>0){
					 $("tr#rolemapping").show();
					 $("input[name='userregid']").val(data);
					 $("select#hobli_select").focus();
					 }else{
						 $("tr#rolemapping").addClass("hide");
						  $("input[name='userregid']").val("");
						 alert("Invalid user");
						 }
				});
	 }else{
		 $("tr#rolemapping").hide();
		  $("input[name='userregid']").val("");
		 }
	 }
	 
	 this.savedata=function(){
		 $("input[name='methodcall']").val("save_role_mapping");
		  $.ajax({
			url:"server/login.php",
			method:"post",
			data:$("form[name='rolemapping']").serialize()
			}).done(function(data){
				//window.location='actionmapping.php';
				});
		 }
	 
	 
	 
	 }
	 
 