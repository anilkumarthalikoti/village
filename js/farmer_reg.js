// JavaScript Document
	var farmer=new function(){
		
		this.changeview=function(){
 
			var sel=$("#applicationType option:selected").val();
			
			if(sel=="0"){
				$("#viewframer").hide();
				}
				
				if(sel=="1"){
				 
				$("#viewframer").show();
				}
				
				if(sel=="2"){
				$("#viewframer").hide();
				}
			
			
			}
		
		
		
		this.saveData=function(){
	 
			$.ajax({
			url:"server/farmer.php",
			method:"post",
			data:$("form[name='form1']").serialize()
			 
			}).done(function(data){
				 
				 
					 
				});
			
			}
		
		
		
		
		
		
		
	this.updatedistrict=function(formname){
		var params={};
		var key="div[id='"+formname+"'] #state_selected option:selected";
		params["state_selected"]=$(key).val();
		params["responsefor"]="district";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="div[id='"+formname+"'] #district_selected";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
		
		
		
		}
	
	 
		
		
		
		
		
		
	this.updatetaluka=function(formname){
		var params={};
		var key="div[id='"+formname+"'] #state_selected option:selected";
		var key1="div[id='"+formname+"'] #district_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["responsefor"]="taluka";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="div[id='"+formname+"'] #taluka_selected";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
		
		
		
		}
		
		
		
		this.updatehobli=function(formname){
		var params={};
		var key="div[id='"+formname+"'] #state_selected option:selected";
		var key1="div[id='"+formname+"'] #district_selected option:selected";
		var key2="div[id='"+formname+"'] #taluka_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["taluka_selected"]=$(key2).val();
		params["responsefor"]="hobli";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="div[id='"+formname+"'] #hobli_selected";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
		
		
		
		}
		
		
		
		
		
		
		this.updatevillage=function(formname){
		var params={};
		var key="div[id='"+formname+"'] #state_selected option:selected";
		var key1="div[id='"+formname+"'] #district_selected option:selected";
		var key2="div[id='"+formname+"'] #taluka_selected option:selected";
		var key3="div[id='"+formname+"'] #hobli_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["taluka_selected"]=$(key2).val();
		params["hobli_selected"]=$(key3).val();
		params["responsefor"]="village";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="div[id='"+formname+"'] #village_selected";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
		
		
		
		}
		
		
			
		
		
		this.updatepanchaitay=function(formname){
		var params={};
		var key="div[id='"+formname+"'] #state_selected option:selected";
		var key1="div[id='"+formname+"'] #district_selected option:selected";
		var key2="div[id='"+formname+"'] #taluka_selected option:selected";
		var key3="div[id='"+formname+"'] #hobli_selected option:selected";
		var key4="div[id='"+formname+"'] #village_selected option:selected";
		params["state_selected"]=$(key).val();
		params["district_selected"]=$(key1).val();
		params["taluka_selected"]=$(key2).val();
		params["hobli_selected"]=$(key3).val();
		params["village_selected"]=$(key4).val();
		params["responsefor"]="panchaitay";
		
		
		
						$.ajax({
			url:"server/village.php",
			method:"get",
		 	data:params
			
							}).done(function(data){
									 var key="div[id='"+formname+"'] #panchaitay_selected";
								 	$(key+" option").remove();
				 					 
									 $(key).append($('<option>', {
  									  value: -1,
    									text: "Select"
										}));
		 									data=data+"";
										 var list=$.parseJSON(data);
				  									$.each(list,function(key1,val){
									   
									   								$(key).append($('<option>', {
   																				 value: val["id"],
   																				 text: val["state_name"]+"/"+val["state_name_k"]
																					}));
									   
									   											});
						 
													});
		
		
		
		}
		
		
		
		
		
		
		
		
		
		
		
//End of function		
		
		}
	 
 
				
		 $(document).ready(function(){
									
									$("input[name='button']").parent().find("input[type='file']").prop("accept"," image/gif,image/jpeg,image/png");
									$("input[name='button']").click(function(){
																					
																					 
																					$(this).parent().find("input[type='file']").click();
																					
																					
																					});
									
									$("input[name='button']").parent().find("input[type='file']").change(function(event){
																												  
			 if (window.File && window.FileReader && window.FileList && window.Blob) {
  					// Great success! All the File APIs are supported.
  var input=$(this);
  var td=$(this).parent().index();
  
  var trkey="#fileupload tr#imgview td#"+td+"";
  var img="<img width='120' alt='NO IMAGE' height='120' id='img"+td+"'></img>";
  $(trkey).html(img);
  $("#img"+td).attr("src",URL.createObjectURL(event.target.files[0]));
  
   
  												} else {
  													
													
										}
																												  
																												  
																												  
																												  });
									
									});