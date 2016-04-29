var postinspection=new function(){
this.updatePrice=function(){
$("input[name='gAmount']").val($("select[name='material'] option:selected").attr("price"));


}
this.addMaterial=function(){

var itemname=$("select[name='material'] option:selected").text();
var itemid=$("select[name='material'] option:selected").val();
var iPrice=$("select[name='material'] option:selected").attr("price");
var delarAmount=$("input[name='dAmount']").val();
var delarQty=$("input[name='dQty']").val();
var iQty=$("input[name='gQty']").val();
var tr="<tr><td save='true' value='"+itemid+"'>"+itemname+"<td save='true' value='"+delarAmount+"'>"+delarAmount+"</td> <td save='true' value='"+delarQty+"'>"+delarQty+"</td><td class='dAmt'>"+(delarQty*delarAmount)+"</td><td save='true' value='"+iPrice+"'>"+iPrice+"</td> <td save='true' value='"+iQty+"'>"+iQty+"</td><td class='iAmt'>"+(iQty*iPrice)+"</td></tr>";
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


this.savePostInspection=function(){
var tbl = $('table#material_list tbody tr').get().map(function(row) {
  return $(row).find('td[save="true"]').get().map(function(cell) {
    return $(cell).attr("value");
  });
});
 $("input[name='material_save']").val(tbl);
 
 	$.ajax({
 						url:"server/postinspection.php",
 						method:"post",
 						data:$("form[name='post_inspection']").serialize()
 						
 						}).done(function(data){
						var filling_id=$("input[name='filling_id']").val();
 							 window.location="form10.php?fillingid="+filling_id;
 							 
 							});
}


}