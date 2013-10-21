<?php
//All javascript related PHP functions shall be included here.
public class JSValidator()
{
	public function getReferrer($param)
	{
		$url=$_SERVER['HTTP_REFERER'];
		$page = substr( $url, strrpos( $url, '/' )+1 ); 
		switch($param)
		{
   			case "buy":
		              if(($page=='Home.php') || ($page=='product.php') || ($page=='service.php')))
				{
					return true;
				}
				else
				{
					return false;			
				}
			break;
		}
	}
}	
?>
