// JavaScript Document
	var farmer=new function(){
		
		this.changeview=function(){
 
			var sel=$("#applicationType option:selected").val();
			
			if(sel=="0"){
				$("#viewframer").hide();
				}
				
				if(sel=="1"){
				 
				$("#viewframer").show();
				}
				
				if(sel=="2"){
				$("#viewframer").hide();
				}
			
			
			}
		
		
		
		this.saveData=function(){
	 
			$.ajax({
			url:"server/farmer.php",
			method:"post",
			data:$("form[name='form1']").serialize()
			}).done(function(data){
				 
				 
					 
				});
			
			}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
//End of function		
		
		}
	$(document).ready(function(){
							 
							   
							   });

 
				
		 