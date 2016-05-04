// JavaScript Document
var itemtrn=new function(){
	
	this.saveupdate=function(){
		
	 var params={};
	 
	 params["itemname"]=$("#itemname").val();
	 params["standard_measure"]=$("#standard_measure").val();
	 params["itemprice"]=$("#itemprice").val();
	 params["units"]=$("#units option:selected").val();
	 params["itemid"]=$("#mat_id").val();
	 
			$.ajax({
				    url:"cropitemsprice.php",
				   method:"POST",
				   data:params
				  
				   
				   
				   }).done(function(data){
				   location.reload();
					   });
		}
	
	
	
	}
	
	
	
	$(document).ready(function(){
 $("#existing tbody tr").click(function(){
 $("#itemname").attr("disabled","disabled");
 $("#units").attr("disabled","disabled");
  $("#standard_measure").attr("disabled","disabled");
  
 $("#mat_id").val($(this).attr("id"));
 $("#itemname").val($(this).find("td:eq(1)").html());
 $("#itemprice").val($(this).find("td:eq(4)").html());
 $("#standard_measure").val($(this).find("td:eq(2)").html());
 $("#units").val($(this).find("td:eq(3)").html());
 });
 });