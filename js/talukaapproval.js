var talukaapproval=new function(){
 this.calculateSheet=function(){
 
	 $("input[dlamt]").attr("disabled",true);
	 $("input[dlqty]").attr("disabled",true);
	  var i=1;
	  var totalBillAmt=0;
	 	$("#div_mater table   td").each(function(){
				var mid="#mat_list tr:eq("+i+")";
				i++;
				mid=$(mid).attr("inputid");
				
			 
				//$(this).prev().closest("th").prev().closest("th").prev().closest("th").html("0");
				var amt=$(this).prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").find("input").val();
				var qty=$(this).prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").find("input").val();
				var tamt= amt*qty;
				var ftotal=$(this).prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").text();
				$(this).prev().closest("th").prev().closest("th").prev().closest("th").html(tamt);
				var setAmt=ftotal;
				if(tamt<ftotal){
				ftotal=tamt;
				}
				totalBillAmt=Number(totalBillAmt)+Number(ftotal);
				$(this).prev().closest("th").prev().closest("th").html(ftotal);
				}); 
				$("#materialAmt").html(totalBillAmt);
				var vat=(totalBillAmt)/1.055;
				vat=totalBillAmt-vat;
				$("#vatAmt").html(vat);
				var tcharges=Number($("#transportationchargers").val());
				var icharges=Number($("#installchargers").val());
				$("#totalBillAmt").html(vat+totalBillAmt+tcharges+icharges);
	 }
}