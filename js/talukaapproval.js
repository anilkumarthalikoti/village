var talukaapproval=new function(){
 this.calculateSheet=function(){
 
	 $("input[damt]").attr("disabled",true);
	 $("input[dqty]").attr("disabled",true);
	  var i=0;
	  var totalBillAmt=0;
	  $( "input[damt]").each(function(){
    
          
		 
		 var tr="#mat_list tbody tr:eq("+i+")";
		  
									 var amt=$(tr).find("input[damt]").val();
				var qty=$(tr).find("input[dqty]").val();
				
				var tamt= amt*qty;
				
				var ftotal=$(tr).find("td:eq(7)").text();//field total
				alert(amt+":"+qty+":"+tamt+":"+ftotal);
				$(tr).find("td:eq(10)").html(tamt);
				var setAmt=ftotal;
				if(tamt<ftotal){
				ftotal=tamt;
				}
				totalBillAmt=Number(totalBillAmt)+Number(ftotal);
				$(tr).find("td:eq(11)").html(ftotal);
				 i++;
     
});
	   
	 	  
				$("#materialAmt").html(totalBillAmt);
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