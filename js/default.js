// JavaScript Document

$(document).ready(function(){
						   
 
$("div[class='viewport']").before("<div class='header'></div>");	
$("div[class='header']").load("header.html");
$("div[class='viewport']").after("<div class='fotter'><div>@2016 All rights reserved</div></div>");	
 
 
 

$("div[class='viewport']").before("<div class='viewport_menu' id='menu_hide'></div>");
$("div[class='viewport_menu']").load("menu.php");
	<!-- Tabs code-->		 
 $('#tabs li a:not(:first)').addClass('inactive');
$('.container').hide();
$('.container:first').show();
    
$('#tabs li a').click(function(){
    var t = $(this).attr('id');
  if($(this).hasClass('inactive')){ //this is the start of our condition 
    $('#tabs li a').addClass('inactive');           
    $(this).removeClass('inactive');
    
    $('.container').hide();
    $('#'+ t + 'C').fadeIn('slow');
 }
});			 
		 
	 $("input[class='datepicker']").datepicker({changeMonth: true,
      changeYear: true,
	  
	  showWeek: true
	  });
	  $(".readonly").attr("disabled",true);
			 pramukhIME.addLanguage(PramukhIndic,"kannada"); 
       
        
	 
			  $("[alt='ka']").each(function(){
				
			 pramukhIME.enable($(this).attr("id"));
						   });
			 
$("select[search='search']").selectToAutocomplete();			 
			  $("select:not(.fit)").addClass("selectcls");
			  
$("select[class='ui-datepicker-month']").removeClass("selectcls");
$("select[class='ui-datepicker-year']").removeClass("selectcls");

	if($("div[class='viewport1']").is(":visible")){		 
	$("div[class='viewport1']").before("<div class='header'></div>");	
$("div[class='header']").load("header.html");
$("div[class='viewport1']").after("<div class='fotter'><div>@2016 All rights reserved</div></div>");			 
	}
						   });

 document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     //alert(status);
     return false;    
   }
}



function isNull(element){
	var key="#"+element;
	if($(key).val().trim().length==0){
		return true;
		}
		return false;
	}
	
	
	function tval(element){
		var key="#"+element;
	 return $(key).val().trim(); 
		}
		
	function isNullC(groupName){
		var key="input[name='"+groupName+"']:checked";
		if($(key).length==0){
			return true;
			}
		return false;
		}	
		
		
		function createDialog(id){
 var key="#"+id;
$(key).dialog({
      autoOpen: false,
	  width:'auto',
	  position: { my: "center", at: "top" },
	  maxWidth:'600px',
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "blind",
        duration: 1000
      }
    });
 }