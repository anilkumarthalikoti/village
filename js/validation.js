var validation=new function(){

this.validate=function(){
 

$("[rules]:visible").each(function(){


$(this).on("focus",function(){
$(this).removeClass("error");
 $(this).attr("placeholder",$(this).attr("defaultplaceholder"));
});

 


var rules=$(this).attr("rules").split(",");
//Not null rule
if(rules.indexOf("required")!=-1){
var error=false;
console.log("Required rule");
if($(this).is("input")){
if($(this).val().trim().length==0){
error=true;
 
 $(this).attr("placeholder","Required");
}
}

if($(this).is("select")){
if($(this).find("option:selected").val()==-1){
error=true;
 
}
}
if(error){
$(this).addClass("error");
}
}


});

}


}

