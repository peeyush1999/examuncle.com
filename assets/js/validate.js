function user_reg_validate() {
	
	var uname = document.getElementById('register')[0];
	var name =  document.getElementById('register')[1];
	var checkuname = /^[a-zA-Z]+$/;
	var checkname = /^[a-zA-Z\s]+$/
	
	var mobile = document.getElementById('register')[4];
    var checkmobile=/^\d{10}$/;
	var aadhar = document.getElementById('register')[5];
    var checkaadhar=/^\d{12}$/;
	var email = document.getElementById('register')[6];	
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var state = document.getElementById('state');
    var password=document.getElementById('register')[2];
	var cpassword=document.getElementById('register')[3];
	var passw= /^(?=.*\d)(?=.*[a-z]).{8,20}$/;  

	if(!checkname.test(uname.value))
	{   
		alert('Username can contain alphabets only.  ')  
		return false;  
	}
	if(!checkname.test(name.value))
	{   
		alert('Name can contain alphanumeric value.  ')  
		return false;  
	}
	
	
	if(!password.value.match(passw))   
	{   
	alert('Password must contain atleast 8 ch. and one numeric ch.  ')  
	return false;  
	}  

	if(!(password.value===cpassword.value))   
	{   
	alert('Passwords not match \nEnter again!!')  
	return false;  
	}
	
	
	
	
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
	state.innerHTML;
    email.focus;
    return false;
	}
	if (!checkmobile.test(mobile.value)) {
    alert('Please provide a valid Mobile Number');
    mobile.focus;
    return false;
	}
	if (!checkaadhar.test(aadhar.value)) {
    alert('Please provide a valid Aadhar Number');
    aadhar.focus;
    return false;
	}
	
	if (state.options[state.selectedIndex].value === "0") 
	{
    alert('Please select the state');
    state.focus
    return false;
	}
	

}


function employee_reg_validate() {
	var uname = document.getElementById('register1')[0];
	var name =  document.getElementById('register1')[1];
	var checkuname = /^[a-zA-Z]+$/;
	var checkname = /^[a-zA-Z\s]+$/
	
	var mobile = document.getElementById('register1')[4];
    var checkmobile=/^\d{10}$/;
	
	var email = document.getElementById('register1')[6];	
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var state = document.getElementById('state1');
    var password=document.getElementById('register1')[2];
	var cpassword=document.getElementById('register1')[3];
	var passw= /^(?=.*\d)(?=.*[a-z]).{8,20}$/;  
	var skill = document.getElementById('skill');
	var exp = document.getElementById('register1')[11];
    var checkexp=/^\d{1,2}$/;
	
	if(!checkname.test(uname.value))
	{   
		alert('Username can contain alphabets only.  ')  
		return false;  
	}
	if(!checkname.test(name.value))
	{   
		alert('Name can contain alphanumeric value.  ')  
		return false;  
	}
	
	
	if(!password.value.match(passw))   
	{   
	alert('Password must contain atleast 8 ch. and one numeric ch.  ')  
	return false;  
	}  
	if(!(password.value===cpassword.value))   
	{   
	alert('Passwords not match \nEnter again!!')  
	return false;  
	}
	
	
	
	
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
	
    email.focus;
    return false;
	}
	if (!checkmobile.test(mobile.value)) {
    alert('Please provide a valid Mobile Number');
    mobile.focus;
    return false;
	}

	
	if (state.options[state.selectedIndex].value === "0") 
	{
    alert('Please select the state');
    state.focus
    return false;
	}
	
	if (skill.options[skill.selectedIndex].value === "0") 
	{
    alert('Please select your skill');
    skill.focus
    return false;
	}
	
	if (!checkexp.test(exp.value)) {
    alert('Please Enter your Experience in integer');
    exp.focus;
    return false;
	}
	
	

}

function feedback_validate() {
	var a = document.getElementById("star-1").checked;
	var b = document.getElementById("star-2").checked;
	var c = document.getElementById("star-3").checked;
	var d = document.getElementById("star-4").checked;
	var e = document.getElementById("star-5").checked;
	
	
	if(a === false && b === false && c===false && d===false && e===false)
	{
		alert('Please Give Rating.');
		return false;
	}
	
}	





function user_update_validate(){
	
	var email = document.getElementById('update-profile')[0];	
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	var mobile = document.getElementById('update-profile')[1];
	var checkmobile=/^\d{10}$/;
	

	
	var state = document.getElementById('state');
	
	
	if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
	
    email.focus;
    return false;
	}
	if (!checkmobile.test(mobile.value)) {
    alert('Please provide a valid Mobile Number');
    mobile.focus;
    return false;
	}

	
	if (state.options[state.selectedIndex].value === "0") 
	{
    alert('Please select the state');
    state.focus
    return false;
	}
	
}





function employee_update_validate(){
	
	var email = document.getElementById('update-profile')[0];	
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	var mobile = document.getElementById('update-profile')[1];
	var checkmobile=/^\d{10}$/;
	

	
	
	var state = document.getElementById('state');
	
	
	
	
	if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
	
    email.focus;
    return false;
	}
	if (!checkmobile.test(mobile.value)) {
    alert('Please provide a valid Mobile Number');
    mobile.focus;
    return false;
	}

	

	
	
	
	
	if (state.options[state.selectedIndex].value === "0") 
	{
    alert('Please select the state');
    state.focus
    return false;
	}
	
}