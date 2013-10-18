
function validate()
{
	var name=document.getElementById('name').value;
	var des = document.getElementById('des').value;
	if(name=="" || name=="null")
	{
		alert("Enter Correct name");
	}
	else if(des=="" || des=="null")
	{
		alert("Enter description");
	}
	
}

function validateuser()
{
	var name=document.getElementById('uname').value;
	var pos= name.search(/^[A-Z a-z]+$/);
	var pass=document.getElementById('password').value;
	var pos1= pass.search(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/);
	if(pos!=0 || name=="" || name=="null")
	{
		document.getElementById("name").innerHTML=("enter correct username");
		return false;
	}
	else if(pos1!=0 || pass=="" || pass=="null")
	{
		document.getElementById("pass").innerHTML=("enter correct password");
                return false;

	}
}

function validateEnquiry()
{
	var fname=document.getElementById('fname').value;
	var pos= fname.search(/^[A-Z a-z]+$/);
	var lname=document.getElementById('lname').value;
        var pos1= lname.search(/^[A-Z a-z]+$/);
	var org=document.getElementById('org').value;
	var orgpos= org.search(/^[A-Z a-z]+$/);
	var mobile=document.getElementById('mobile').value;
        var mob= mobile.search(/^[0-9]{10}$/);
	var email=document.getElementById('email').value;
        var pos2= email.search(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/);

	if(pos!=0 || fname==" " || fname=="null")
        {
        	document.getElementById("firstname").innerHTML=("enter correct Firstname");       
		return false;
        }
	else if(pos1!=0 || lname==" " || lname=="null")
        {
               document.getElementById("lastname").innerHTML=("enter correct lastname");
		return false;
        }
	else if(orgpos!=0 || org==" " || org=="null")
	{
		document.getElementById("organisation").innerHTML=("Inappropriate organisation");
		return false;
	}
	else if(mob!=0 || mobile==" " || mobile=="null")
        {
                document.getElementById("num").innerHTML=("enter correct mobile number");
		return false;
        }

	else if(pos2!=0 || email==" " || email=="null")
        {
                document.getElementById("mail").innerHTML=("enter correct lastname");
		return false;
        }

}

