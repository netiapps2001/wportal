/*function  isEmpty(id)
  {
 var empty=document.getElementById(id).value;
  if(empty==""||empty==null)
  {
   alert("Enter the field");
   return false;
  {
 return true; 
 }
function isAlphabetic(id)
{
 var fldVal=document.getElementbyId(id).value;
 var fldValmatch=fldVal.match( /^[a-zA-Z\s]*$/);
    if(!namematch)
    {
    alert("Enter only string");
    return false;
     }
   return true;
   }
 function isValidEmail(id)
  {
   var email=document.getElementbyId(id).value;
   var emailmatch=email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(.com$)/);
   if(!emailmatch)
    {
    alert("Enter email in Correct format");
    return false;
  }
 return true;
}
function isNumeric(id)
 {
 var phone=document.getElementbyId(id).value;
 var phonematch=phone.match( /^d{10}$/);
 if(!phonematch)
  {
   alert("Enter 10 digit number");
   return false;
  }
  return true;
 }
function isAlphanumeric(passwordid)  
 {
 var password=document.getElementbyId(passwordid).value;
 var passwordmatch=password.match( /^(?=.*[a-zA-Z\d.*)[a-zA-Z0-9\d!@#$%&*]{6,15}$;
 if(!passwordmatch)
  {
   alert("Enter Pasword in correct format");
   return false;
   }
 return true;
}
*/

function validate()
{
	var uname= document.getElementById('uname').value;
	alert(uname);
	var pass=document.getElementById('password').value;
	if(uname="" || uname="null")
	{
		document.getElementById('name').innerHTML=("enter correct username");
	}
}
