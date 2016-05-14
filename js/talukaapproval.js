var talukaapproval=new function(){
 this.calculateSheet=function(){
 
	 $("input[damt]").attr("disabled",true);
	 $("input[dqty]").attr("disabled",true);
	  var i=0;
	  var totalBillAmt=0;
	  var fieldTotal=0;
	  var dealerTotal=0;
	  $( "input[damt]").each(function(){
    
          
		 
		 var tr="#mat_list tbody tr:eq("+i+")";
		   
									 var amt=$(tr).find("input[damt]").val();
				var qty=$(tr).find("input[dqty]").val();
				
				var tamt= amt*qty;
				var ftotal=0;
				var rowspan=false;
				 
				if($(tr).find("td:eq(0)").is("[rowspan]")){
					rowspan=true;
					}
				if(rowspan==true){
					
					ftotal=$(tr).find("td:eq(5)").text();
	  
					$(tr).find("td:eq(9)").html(tamt);
				 
					}else{
						ftotal=$(tr).find("td:eq(4)").text();
				 
						$(tr).find("td:eq(7)").html(tamt);
					 
						}
				 
				 fieldTotal=fieldTotal+Number(ftotal);
				 dealerTotal=dealerTotal+Number(tamt);
				
				var setAmt=ftotal;
				if(tamt<ftotal){
				ftotal=tamt;
				}
				
				if(rowspan==true){
					 
					$(tr).find("td:eq(10)").html(ftotal);
					}else{
					 
						$(tr).find("td:eq(8)").html(ftotal);
						}
				totalBillAmt=Number(totalBillAmt)+Number(ftotal);
				 
				 i++;
     
});
	   $("#fieldtotal").val(fieldTotal.toFixed(2));
	   $("#dealertotal").val(dealerTotal.toFixed(2));
	   var fieldVat=(fieldTotal-(fieldTotal/1.055));
	   var dealerVat=(dealerTotal-(dealerTotal/1.055));
	   $("#fieldVat").val(fieldVat.toFixed(2));
	    $("#dealerVat").val(dealerVat.toFixed(2));
	 	  
				$("#materialAmt").val(totalBillAmt.toFixed(2));
				var vat=(totalBillAmt)/1.055;
				vat=totalBillAmt-vat;
				vat=vat.toFixed(2);
				$("#vatAmt").html(vat);
				var tcharges=Number($("#transportationchargers").val());
				var icharges=Number($("#installchargers").val());
				var tbill=Number(vat)+Number(totalBillAmt)+Number(tcharges)+Number(icharges);
				tbill=tbill.toFixed(2);
				$("#totalBillAmt").html(tbill);
	 }
}