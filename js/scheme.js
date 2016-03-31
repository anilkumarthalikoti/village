// JavaScript Documentdocument.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
function subschemeVal(subscheme)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(subscheme.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter SubScheme Name in character only");  
	 document.form1.subscheme.focus();  
     return false;  
  }  
}
function componentVal(component)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(component.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Component Name in character only");  
	 document.form1.component.focus();  
     return false;  
  }  
}
function item1Val(item1)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item1.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item1 Name in character only");  
	 document.form1.item1.focus();  
     return false;  
  }  
}
function item2Val(item2)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item2.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item2 Name in character only");  
	 document.form1.item2.focus();  
     return false;  
  }  
}
function item3Val(item3)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item3.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item3 Name in character only");  
	 document.form1.item3.focus();  
     return false;  
  }  
}
function item4Val(item4)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item4.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item4 Name in character only");  
	 document.form1.item4.focus();  
     return false;  
  }  
}
function unitVal(unit)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(unit.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Unit Name in character only");  
	 document.form1.unit.focus();  
     return false;  
  }  
}