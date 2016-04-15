// JavaScript Document
var itemtrn=new function(){
	
	this.saveupdate=function(){
		
	 var params={};
	 
	 params["itemname"]=$("#itemname").val();
	 params["itemprice"]=$("#itemprice").val();
	 params["units"]=$("#units option:selected").val();
	 params["itemid"]=$("#id").val();
	 
			$.ajax({
				    url:"cropitemsprice.php",
				   method:"POST",
				   data:params
				  
				   
				   
				   }).done(function(data){
					//   location.reload();
					   });
		}
	
	
	
	}
	
	
	
	$(document).ready(function(){
 $("#existing tbody tr").click(function(){
 $("#itemname").attr("disabled","disabled");
 $("#units").attr("disabled","disabled");
  
 $("#id").val($(this).attr("id"));
 $("#itemname").val($(this).find("td:eq(1)").html());
 $("#itemprice").val($(this).find("td:eq(3)").html());
 $("#units").val($(this).find("td:eq(2)").html());
 });
 });