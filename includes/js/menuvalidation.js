<script type="text/javascript" src="validation.js">
</script>
function menuValidation()
{
	var name=document.getElementById('menuname').value;
	var href=document.getElementById('href').value;
	var status1=document.getElementById('status');
	var res=1;
	if(!isEmpty(name))
	{res=0;}
	break;

	if(!isEmpty(href))
	{res=0;}
	break;

	if(!isEmpty(status1))
	{res=0;}
	break;

	return res;
}
