var talukaapproval=new function(){
 this.calculateSheet=function(){
 
	 $("input[damt]").attr("disabled",true);
	 $("input[dqty]").attr("disabled",true);
	  var i=0;
	  var totalBillAmt=0;
	  var fieldTotal=0;
	  var dealerTotal=0;
	  var nonVatAmt=0;
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
				}else{
				var spacingselected=$("select[name='aspacing1'] option:selected").val();
				var roundval=Math.round10(final90,-1);
				var trkey="#price tr[spacingid='"+spacingselected+"'][spacingarea='"+roundval.toFixed(2)+"']";
				var amtat90=($(trkey).attr("amount")*90)/100;
				$("#land90subsidy").val(amtat90);
				}
				if(final50==0){
				$("#land50subsidy").val(0);
				
				}else{
				
				var spacingselected=$("select[name='aspacing1'] option:selected").val();
				var roundval=Math.round10(final50,-1);
				
				var trkey="#price tr[spacingid='"+spacingselected+"'][spacingarea='"+roundval.toFixed(2)+"']";
				 var amtat50=($(trkey).attr("amount")*50)/100;
				$("#land50subsidy").val(amtat50);
				}
				var totalAvlAmt=Number($("#land90subsidy").val())+Number($("#land50subsidy").val());
				$("#totalSubsidy").val(totalAvlAmt);
				
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
}

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
}


(function() {
  /**
   * Decimal adjustment of a number.
   *
   * @param {String}  type  The type of adjustment.
   * @param {Number}  value The number.
   * @param {Integer} exp   The exponent (the 10 logarithm of the adjustment base).
   * @returns {Number} The adjusted value.
   */
  function decimalAdjust(type, value, exp) {
    // If the exp is undefined or zero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // If the value is not a number or the exp is not an integer...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Decimal round
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Decimal floor
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Decimal ceil
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();


