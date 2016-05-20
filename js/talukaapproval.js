var talukaapproval = new function() {
    this.calculateSheet = function() {

        $("input[damt]").attr("disabled", true);
        $("input[dqty]").attr("disabled", true);
        
        var totalBillAmt = 0;
        var fieldTotal = 0;
        var dealerTotal = 0;
        var nonVatDealerAmt = 0;
		 var nonVatFieldAmt = 0;
		 var nonVatTotalBill=0;
        var deduction = 0;
		//Calculation of vatable fields
		var ctype=["tbody","tfoot"];
		for(var j=0;j<ctype.length;j++){
		var i=0;
		var forkey=ctype[j]+" input[damt]";
		var trkey=ctype[j];
		 
        $(forkey).each(function() {
		    var applydeduction = $("#isdeduct option:selected").val();
			 
			var tr = "#mat_list "+trkey+" tr:eq(" + i + ")";
			if(j==1){
			tr="#mat_list "+trkey+" tr:eq(" + (i+3) + ")";
			}
            var amt = toNumber($(tr).find("input[damt]").val());
            var isvat = $(tr).find("input[damt]").attr("isvat");
            var isdeduct = $(tr).find("input[damt]").attr("isdeduct");
            var qty = toNumber($(tr).find("input[dqty]").val());
            var tamt = amt * qty;
            var ftotal = 0;
            var rowspan = false;
            if ($(tr).find("td:eq(0)").is("[rowspan]")) {
                rowspan = true;
            }
            if (rowspan == true) {
			 
                ftotal = $(tr).find("td:eq(6)").text();
				 
                $(tr).find("td:eq(9)").html(tamt);

            } else {
                ftotal = $(tr).find("td:eq(4)").text();
			 
                $(tr).find("td:eq(7)").html(tamt);
            }
            ftotal = ftotal ? ftotal : 0;
		
            
			console.log("Total amt:"+fieldTotal+"current amt:"+ftotal+" IN "+ctype[j]);
			if (isvat == "Y") {
            fieldTotal = sum(fieldTotal,ftotal);
            dealerTotal =sum(dealerTotal,tamt);
}else{
nonVatFieldAmt=sum(nonVatFieldAmt,ftotal);
nonVatDealerAmt=sum(nonVatDealerAmt,tamt);
}
            
            if (tamt < ftotal) {
                ftotal = tamt;
            }
				ftotal=ftotal?ftotal:0;
					ftotal=Number(ftotal);
					if (applydeduction == "Y") {
                var ded = ftotal;
                deduction = deduction + ded;
                if (rowspan == true) {
                    $(tr).find("td:eq(11)").html(ded);
                } else {
                    $(tr).find("td:eq(9)").html(ded);
                }
            } else {
                if (rowspan == true) {
                    $(tr).find("td:eq(11)").html('0');
                } else {
                    $(tr).find("td:eq(9)").html('0');
                }
            }
            if (rowspan == true) {

                $(tr).find("td:eq(10)").html(ftotal);
            } else {

                $(tr).find("td:eq(8)").html(ftotal);
            }
            if (isvat == "Y") {
                totalBillAmt = sum(totalBillAmt,ftotal);
            } else {
			            nonVatTotalBill =sum(nonVatTotalBill,ftotal);
            }
            i++;

        });
		
		}
		deduction=deduction?deduction:0;
 var deduction90= (deduction*90)/100;
 deduction90=deduction90.toFixed(2)
        $("#tdlessamt").html(deduction);
		$("#tdlessamt90").html(deduction90);
        $("#deducationAmtView").val(deduction90);
		$("#lessAmount").val(deduction90);
        fieldTotal = fieldTotal ? fieldTotal : 0;
         dealerTotal = dealerTotal ? dealerTotal : 0;
		 
 

        $("#fieldtotal").val(fieldTotal);
        $("#dealertotal").val(dealerTotal);

        var fieldVat = (fieldTotal * 5.5)/100;
		fieldVat=fieldVat?fieldVat:0;
		fieldVat=fieldVat.toFixed(2);
        var dealerVat = (dealerTotal * 5.5)/100;
		dealerVat=dealerVat?dealerVat:0;
		dealerVat=dealerVat.toFixed(2);
        $("#fieldVat").val(fieldVat);
        $("#dealerVat").val(dealerVat);
		totalBillAmt=totalBillAmt?totalBillAmt:0;
		totalBillAmt=Number(totalBillAmt);
		totalBillAmt= totalBillAmt.toFixed(2)
        $("#materialAmt").val(totalBillAmt);
        var totalValCalc = (totalBillAmt* 5.5)/100;
		totalValCalc=totalValCalc?totalValCalc:0;
		totalValCalc=totalValCalc.toFixed(2);
	     $("#totalVatAmt").val(totalValCalc);
	     $("#totalFieldVat").val(sum(fieldTotal,fieldVat));
        $("#dealerTotalVat").val(sum(dealerTotal,dealerVat));
        $("#totalBillAmt").val(sum(totalBillAmt,totalValCalc));
		 
        var tbill = totalValCalc + totalBillAmt;
		tbill=tbill?tbill:0;
		tbill=Number(tbill);
        $("#totalBillAmt").html(tbill.toFixed(2));
        var finalFieldBill=sum($("#totalFieldVat").val(),nonVatFieldAmt);
		var finalDealerBill=sum($("#dealerTotalVat").val(),nonVatDealerAmt);
		var finalCalculationBill=sum($("#totalBillAmt").val(),nonVatTotalBill);
		$("#finalFieldBill").val(Math.round(finalFieldBill));
		$("#finalDealarBill").val(Math.round(finalDealerBill));
		$("#finalCalculationBill").val(Math.round(finalCalculationBill));
		// Calculation of 50 &90
        var preallocated = $("#preallocatedtemp").val();
        $("#preAllocatedLand").val(preallocated);
        var totalLandHolding = $("#totalLandHolding").val();
        var totalFileLand = $("input[name='area1']").val() + $("input[name='area2']").val() + $("input[name='area3']").val();
        $("#presentLand").val(totalFileLand);
        var land50 = 0;
        var land90 = 2 - preallocated;
        var tempFarmerLand = preallocated + totalFileLand;
        if (preallocated > 2) {
            land50 = preallocated - 2;
        }
        var totalSubsidy = land50 + land90;
        var _tempPreallocted = 0;
        if (tempFarmerLand > 5) {
            _tempPreallocted = -(5 - tempFarmerLand);
        }
        //calculate min from land50,land90,preallocated,applied

        var minareaarray = [totalFileLand, tempFarmerLand, land50, totalSubsidy];
        var minarea = arrayMin(minareaarray);

        var maxArray = [minarea, totalSubsidy];
        var maxArea = 0;
        if (tempFarmerLand > 2) {
            maxArea = arrayMax(maxArray);
        }
/*
        console.log("Already:" + preallocated);
        console.log("Present:" + totalFileLand);
        console.log("Total farmer land:" + tempFarmerLand);
        console.log("land90:" + land90);
        console.log("land50:" + land50);
        console.log("Total land subsidy:" + totalSubsidy);
        console.log("minArea:" + minarea);
        console.log("max area:" + maxArea);
        console.log("Temp pre allocated" + _tempPreallocted);*/
        var final90 = maxArea;
        if (tempFarmerLand <= 2) {
            final90 = totalFileLand;
        }
        var final50 = 0;
        if (preallocated > 5) {
            final50 = 0;
        } else {
            final50 = totalFileLand - final90 - _tempPreallocted;
            if (final50 < 0) {
                final50 = 0;
            }
        }

        $("#land90").val(final90);
        $("#land50").val(final50);
				var applicableAmt=$("#maxamount_a1").val();
		applicableAmt=applicableAmt?applicableAmt:0;
		var minCalcAmt=arrayMin([finalFieldBill,finalDealerBill,finalCalculationBill]);
		console.log("minCalcAmt:"+minCalcAmt);
	 
		var remainingAmt=applicableAmt-minCalcAmt;
		var amountToConsider=0;
		if(minCalcAmt<remainingAmt){
		amountToConsider=remainingAmt;
		}
		var CA65=amountToConsider/(totalFileLand*100);
		final90=Math.round10(final90, -1);
		var final90_100=final90*100;
		 var sub90Amt=final90_100*CA65;
		 
		 var maxAmtFor90=sub90Amt*0.9;
		 final50=Math.round10(final50, -1);
		 var final50_100=final50*100;
		var sub50Amt=final50_100*CA65;
		var maxAmtFor50=sub50Amt*0.5;
		console.log("==============================================================================");
		console.log("minCalcAmt:"+minCalcAmt);
		console.log("remainingAmt:"+remainingAmt);
		console.log("amountToConsider:"+amountToConsider);
			console.log("CA65:"+CA65);
				console.log("final90_100:"+final90_100);
		console.log("sub90Amt:"+sub90Amt);
		console.log("maxAmtFor90:"+maxAmtFor90);
			console.log("final50_100:"+final50_100);
		console.log("sub50Amt:"+sub50Amt);
		console.log("maxAmtFor50:"+maxAmtFor50);
		if (final90 == 0) {
            $("#land90subsidy").val(0);
        } else {
		
            var spacingselected = $("select[name='aspacing1'] option:selected").val();
            var roundval = Math.round10(final90, -1);
            var trkey = "#price tr[spacingid='" + spacingselected + "'][spacingarea='" + roundval.toFixed(2) + "']";
			 
            var amtat90 = ($(trkey).attr("amount") * 90) / 100;
					console.log("Row amt:"+$(trkey).attr("amount")+" 90% Amt:"+amtat90+" maxAmtFor90:"+maxAmtFor90+" 90Subsidy:"+(amtat90-maxAmtFor90));
var tempAmt=Math.abs(amtat90-maxAmtFor90);
           tempAmt=Math.round10(tempAmt,-1);
		   $("#land90subsidy").val(tempAmt);
			
        }
		 
        if (final50 == 0) {
            $("#land50subsidy").val(0);

        } else {

            var spacingselected = $("select[name='aspacing1'] option:selected").val();
            var roundval = Math.round10(final50, -1);

            var trkey = "#price tr[spacingid='" + spacingselected + "'][spacingarea='" + roundval.toFixed(2) + "']";
            var amtat50 = ($(trkey).attr("amount") * 50) / 100;
			console.log("Row amt:"+$(trkey).attr("amount")+" 50% Amt:"+amtat50+" maxAmtFor50:"+maxAmtFor50+" 50Subsidy:"+(amtat50-maxAmtFor50));
           var tempAmt=Math.abs(amtat50-maxAmtFor50);
           tempAmt=Math.round10(tempAmt,-1);
            $("#land50subsidy").val(tempAmt);
        }
		
        var totalAvlAmt = Number($("#land90subsidy").val()) + Number($("#land50subsidy").val());
        $("#totalSubsidy").val(totalAvlAmt);
		//Calculation of subsidy amt
	
		
$("#avalibleSubsidy").val(totalAvlAmt-deduction90);
 
$("#amountinwords").val(inWords(Math.round($("#avalibleSubsidy").val())));
    }
}


function arrayMin(arr) {
    var len = arr.length;
   // console.log("-------MIN ARRAY-----");
    var min = arr[0];
    console.log("0:" + min);
    for (var i = 1; i < len; i++) {
        if (arr[i] < min) {
            min = arr[i];
        }
   //     console.log(i + ":" + arr[i]);
    }
   // console.log("-------MIN VAL-----");
   // console.log(min);
    return min;
}

function arrayMax(arr) {
    var len = arr.length;
   // console.log("-------MAX ARRAY-----");
    var max = arr[0];
    console.log("0:" + max);
    for (var i = 1; i < len; i++) {
        if (arr[i] > max) {
            max = arr[i];
        }
     //   console.log(i + ":" + arr[i]);
    }
   // console.log("-------MAX VAL-----");
  //  console.log(max);
    return max;
}

function toNumber(val) {
    val = val ? val : 0;
    return val;
}
function sum(f1,f2){
f1=f1?f1:0;
f2=f2?f2:0;
var total=Number(f1)+Number(f2);
total=total?total:0;
total=total.toFixed(2);

return total;
}

var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
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