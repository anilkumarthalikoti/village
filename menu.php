<table id="access_roles"  style="display:none;">
<?php 
session_start();
require "server/app_connector.php";
$user=$_SESSION["logged_in"];
$query="select linkid from page_links where linkid not in(select distinct d.page_link_id from user_roles u,role_mstr m, role_dtl d where u.login_id='".$user["login_id"]."' and u.is_active='Y' and u.role_id= m.role_id and m.role_id= d.role_id)";
$link=$database->query($query)->fetchAll();
foreach($link as $links){
 echo "<tr><td>".$links['linkid']."</td></tr>";
}
?>
</table>
<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   
   
   
      <li class="has-sub"><a href='#'><span>Admin</span></a> 
	  
	  <ul>
   <li link_id='1'><a href="village.php"><span>Add Village</span></a></li>
   <li link_id='2'><a href="scheme.php"><span>Add Scheme</span></a></li>
      <li link_id='3'><a href="password.php"><span>Reset Password</span></a></li>
	   <li link_id='17'><a href="password.php"><span>Role creation</span></a></li>
	    <li link_id='18'><a href="password.php"><span>Role mapping</span></a></li>

  </ul>
	  
	  </li>
   
   <li class="has-sub"><a class="ajxsub" href="#"><span>Farmer </span></a>
  <ul>
   <li link_id='4'><a href="farmer_reg.php"><span>Registration</span></a></li>
            <li link_id='5'><a href="scheme_filling.php"><span>Scheme Filing</span></a></li>
      <li link_id='6'><a href="#"><span>Existing</span></a></li>

            <li link_id='8'><a href="#"><span>Search</span></a></li>
  </ul>
 </li>
   
   
   <li class='has-sub'><a href='#'><span>Officer</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Proposal</span></a>
           <ul>
      <li link_id='9'><a href="proposal_chd.php"><span>MIS/PMKSY</span></a></li>
   <li link_id='10'><a href="#"><span>CHD</span></a></li>
         <li link_id='11'><a href="#"><span>NHM/MIDH </span></a></li>
            <li link_id='12'><a href="#"><span>RKVY </span></a></li>
   </ul>
         </li>
            <li link_id='13'><a href="#"><span>Track Records</span></a></li>
         <li link_id='14'><a href="#"><span>Beneficiary</span></a></li>
      </ul>
   </li>
  
   <li class='last has-sub'><a href='#'><span>Reports</span></a>
   <ul>
      <li link_id='15-'><a href="#"><span>Track Records</span></a></li>
         <li class="16-" link_id='1'><a href="#"><span>Beneficiary</span></a></li>
      
   </ul>
   
   </li>
</ul>
</div>
<script type="text/javascript">

( function( $ ) {
$( document ).ready(function() {
$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		 
		}
		else {
			element.addClass('open');
			
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});

	$('#cssmenu>ul>li.has-sub>a').append('<div class="holder"></div>');
$('div[class="holder"]').each(function(){
var val=$(this).parent().parent().find("li").length;
$(this).html(val);
});
	(function getColor() {
		var r, g, b;
		var textColor = $('#cssmenu').css('color');
		textColor = textColor.slice(4);
		r = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		g = textColor.slice(0, textColor.indexOf(','));
		textColor = textColor.slice(textColor.indexOf(' ') + 1);
		b = textColor.slice(0, textColor.indexOf(')'));
		var l = rgbToHsl(r, g, b);
		if (l > 0.7) {
			//$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
			//$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
		}
		else
		{
			//$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
		//	$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
		}
	})();

	function rgbToHsl(r, g, b) {
	    r /= 255, g /= 255, b /= 255;
	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
	    var h, s, l = (max + min) / 2;

	    if(max == min){
	        h = s = 0;
	    }
	    else {
	        var d = max - min;
	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
	        switch(max){
	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
	            case g: h = (b - r) / d + 2; break;
	            case b: h = (r - g) / d + 4; break;
	        }
	        h /= 6;
	    }
	    return l;
	}
});
} )( jQuery );
$(document).ready(function(){

$("table[id='access_roles'] tr td").each(function(){
var link=$(this).html();
var rid="li[link_id='"+link+"']";
$(rid).remove();

});
$("table[id='access_roles']").remove();

$('div[class="holder"]').each(function(){
var val=$(this).parent().parent().find("li").length;
$(this).html(val);
});
});
</script>