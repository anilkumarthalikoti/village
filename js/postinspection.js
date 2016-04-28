var postinspection=new function(){
this.updatePrice=function(){
$("input[name='gAmount']").val($("select[name='material'] option:selected").attr("price"));


}
this.addMaterial=function(){

var itemname=$("select[name='material'] option:selected").text();
var iPrice=$("select[name='material'] option:selected").attr("price");
var delarAmount=$("input[name='dAmount']").val();
var delarQty=$("input[name='dQty']").val();
var iQty=$("input[name='gQty']").val();
var tr="<tr><td>"+itemname+"<td>"+delarAmount+"</td> <td>"+delarQty+"</td><td class='dAmt'>"+(delarQty*delarAmount)+"</td><td>"+iPrice+"</td> <td>"+iQty+"</td><td class='iAmt'>"+(iQty*iPrice)+"</td></tr>";
$("table[id='material_list'] tbody").append(tr);
postinspection.updateAmount();
}
this.updateAmount=function(){

var dtotal=0;
var itotal=0;
$("table[id='material_list'] tbody tr").each(function(){
 
dtotal=dtotal+Number($(this).find("td[class='dAmt']").html());
itotal=itotal+Number($(this).find("td[class='iAmt']").html());
});
 
$("table[id='material_list'] tfoot td[id='dAmt']").html(dtotal);
$("table[id='material_list'] tfoot td[id='gAmt']").html(itotal);
$("table[id='material_list'] tfoot td[id='vdAmt']").html((dtotal*5.5)/100);
$("table[id='material_list'] tfoot td[id='gdAmt']").html((itotal*5.5)/100);
}
}