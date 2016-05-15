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
				var totalValCalc=totalBillAmt-(totalBillAmt/1.055);
			 
				 
				$("#totalVatAmt").val(totalValCalc);
				$("#totalFieldVat").val((fieldTotal+fieldVat).toFixed(2));
				$("#dealerTotalVat").val((dealerTotal+dealerVat).toFixed(2));
				$("#totalBillAmt").val((totalBillAmt+totalValCalc).toFixed(2));
				var tcharges=Number($("#transportationchargers").val());
				var icharges=Number($("#installchargers").val());
				var tbill=Number(totalValCalc)+Number(totalBillAmt)+Number(tcharges)+Number(icharges);
				 
				$("#totalBillAmt").html(tbill.toFixed(2));
				// Calculation of 50 &90
				var preallocated=$("#preallocatedtemp").val();
				$("#preAllocatedLand").val(preallocated);
				var totalLandHolding=$("#totalLandHolding").val();
				var totalFileLand=$("input[name='area1']").val()+$("input[name='area2']").val()+$("input[name='area3']").val();
				$("#presentLand").val(totalFileLand);
				var land50=0;
				var land90=2-preallocated;
				var tempFarmerLand=Number(preallocated)+Number(totalFileLand);
				 if(preallocated>2){
				 land50=preallocated-2;
				}
				var totalSubsidy=land50+land90;
				 var _tempPreallocted=0;
				 if(tempFarmerLand>5){
				 _tempPreallocted=-(5-tempFarmerLand);
				 }
				//calculate min from land50,land90,preallocated,applied
				
				var minareaarray=[totalFileLand,tempFarmerLand,land50,totalSubsidy];
				var minarea=arrayMin(minareaarray);
			 
				var maxArray=[minarea,totalSubsidy];
				var maxArea=0;
				if(tempFarmerLand>2){
				maxArea=arrayMax(maxArray);
				}
				
				console.log("Already:"+preallocated);
				console.log("Present:"+totalFileLand);
				console.log("Total farmer land:"+tempFarmerLand);
				console.log("land90:"+land90);
				console.log("land50:"+land50);
				console.log("Total land subsidy:"+totalSubsidy);
				console.log("minArea:"+minarea);
				console.log("max area:"+maxArea);
				console.log("Temp pre allocated"+_tempPreallocted);
				var final90=maxArea;
				if(tempFarmerLand<=2){
				final90=totalFileLand;
				}
				var final50=0;
				if(preallocated>5){
				final50=0;
				}else{
				final50=totalFileLand-final90-_tempPreallocted;
				if(final50<0){
				final50=0;
				}
				}
				$("#land90").val(final90);
				$("#land50").val(final50);
				if(final90==0){
				$("#land90subsidy").val(0);
				}
				if(final50==0){
				$("#land50subsidy").val(0);
				}
				
	 }
}


function arrayMin(arr) {
  var len = arr.length;
  console.log("-------MIN ARRAY-----");
var  min = arr[0];
console.log("0:"+min);
  for(var i=1;i<len;i++){
  if(arr[i]<min){
  min=arr[i];
  }
  console.log(i+":"+arr[i]);
  }
    console.log("-------MIN VAL-----");
   console.log(min);
  return min;
};

function arrayMax(arr) {
  var len = arr.length;
  console.log("-------MAX ARRAY-----");
var  max = arr[0];
console.log("0:"+max);
  for(var i=1;i<len;i++){
  if(arr[i]>max){
  max=arr[i];
  }
  console.log(i+":"+arr[i]);
  }
    console.log("-------MAX VAL-----");
   console.log(max);
  return max;
};