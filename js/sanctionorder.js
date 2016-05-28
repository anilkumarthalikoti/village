var sanctionorder = new function() {

this.sanctiondetails=function(){ 
 	$.ajax({
 						url:"server/sanctionorder.php",
 						method:"post",
 						data:$("[form-field='Y']").serialize()
 						
 						}).done(function(data){
						 
 							 window.location="approval.php";
 							});

}


}