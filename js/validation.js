// JavaScript Documentfunction 

function validateForm(formName){
	
	
	if(formName.fname.value==''){
	alert("Missing Firstname");
	  formName.fname.focus();
	    return false ;
		}
		else 
		if(formName.lname.value==''){
	alert("Missing Lastname");
	  formName.lname.focus();
	    return false ;
		}
		
		else 
		if(formName.usergroup.value==''){
	alert("Select a User group");
	  formName.usergroup.focus();
	    return false ;
		
		//subcomponent
		}
		
		else 
		if(formName.role.value==''){
	alert("Select a User Role");
	  formName.role.focus();
	    return false ;
		
		//
		}
		else
	if(formName.username.value==''){
	alert("missing username");
	  formName.username.focus();
	    return false ;
		}
		else if(formName.password.value==''){
		alert("Missing Password");
	 formName.password.focus();
		 return false ;	
			
			}
			else if(formName.password.value.length<6){
alert("Password should more than 6 characters");	 
				 formName.password.focus();
					return false;
				}
			else if(formName.cpass.value==''){
				alert("Password Mismatch!");
	 formName.password.focus();
		 return false ;	
				
				
				}
else if(formName.cpass.value==''){
	alert("Password Mismatch!");
	 formName.cpass.focus();
		 return false ;	
				
				
	}			
	else if(formName.cpass.value!=formName.password.value){
	alert("Password Mismatch!");
	 formName.cpass.focus();
		 return false ;	
				
					
					}
					else if(formName.code.value!=formName.vcode.value){
	alert("Invalid Verification Code!");
	 formName.vcode.focus();
		 return false ;	
					}
					return true;
		xajax_add_user(formName);	
			//
			
	//xajax_add_user(xajax.getFormValues('user'));return false;
	}