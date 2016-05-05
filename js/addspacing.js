// JavaScript Document


var install=new function(){
	
 
	
	this.installdetails=function(){
		
		 $.ajax({
			url:"server/spacing.php",
			method:"post",
			data:$("form[name='installation']").serialize()
			}).done(function(data){
				 window.location='addspacing.php?tab=2';
				});
		
		
		}
		
		
		this.subcd=function(){
		
		 $.ajax({
			url:"server/spacing.php",
			method:"post",
			data:$("form[name='subcd']").serialize()
			}).done(function(data){
				 window.location='addspacing.php?tab=3';
				});
		
		
		}
	
	
	
	
	}
	
	$(document).ready(function(){
							   
							   var tab=$("input[id='tabSelect']").val();
							    
							   tab="a#tab"+tab+"";
							    
							   $(tab).click();
							   var data=[];
							   
							   $("#installation_tbl tbody tr").each(function(){
																			 var std_spacing_val=$(this).find("td:eq(0)").text();
																			 var area_val=$(this).find("td:eq(1)").text();
																			 var amount=$(this).find("td:eq(2)").text();
																			data.push({SPACING:std_spacing_val, AREA:area_val,value:amount});
																			 
																			 });
							    var sum = $.pivotUtilities.aggregatorTemplates.sum;
        var numberFormat = $.pivotUtilities.numberFormat;
        var intFormat = numberFormat({digitsAfterDecimal: 0});
							  $("#p_table_install").pivot(data,{rows:["AREA"],cols:["SPACING"],aggregator: sum(intFormat)(["value"])});
							  $("[class='pvtRowLabel']").css("height","16px");
							  $("[class='pvtVal']").css("padding","5px");
							  $("[class='pvtAxisLabel']").css("height","16px");
							   $("[class='pvtColLabel']").css("height","16px");
							  
							   });
	
	 