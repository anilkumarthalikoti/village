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
					 $("#rolemapping").dialog("open");
					 $("input[name='userregid']").val(data);
					 $("select#hobli_select").focus();
					 }else{
						  $("#rolemapping").dialog("close");
						  $("input[name='userregid']").val("");
						 alert("Invalid user");
						 }
				});
	 }else{
		  $("#rolemapping").dialog("close");
		 
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
				 location.reload();
				});
		 }
	 
	this.setUser=function(tr){
	 
		 $("table[id='tbl_users'] tbody tr").removeClass("active");
		 
	 
		 $(tr).addClass("active");
		 
			$("input[name='userregid']").val($(tr).attr("userid"));
				$( "#rolemapping" ).dialog( "open" );
			}
	 
	 }
	 
 