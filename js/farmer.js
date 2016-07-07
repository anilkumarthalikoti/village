// JavaScript Document

var farmerpage=new function(){
	this.searchRegistration=function(){
		var url="farmer.php?searchin="+$("#searchin option:selected").val()+"&searchval="+$("#search").val();
		window.location=url;
		}
                
                
	}