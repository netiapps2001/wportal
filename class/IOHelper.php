<?php
include_once('../includes/system/globals.php');
include_once('../includes/system/phpmailer/class.phpmailer.php');
include_once('../includes/system/phpmailer/class.smtp.php');
class IOHelper
{
	public function return_bytes($val) {
		 $val = trim($val);
   		 $last = strtolower($val[strlen($val)-1]);
    		switch($last) {
	        // The 'G' modifier is available since PHP 5.1.0
	        	case 'g':
	        	    $val *= 1024;
		        case 'm':
	        	    $val *= 1024;
		        case 'k':
        		    $val *= 1024;
    		}
		return $val;
	}
	

	public function setErrorMessage($msg){
		$this->pushError($msg);
	}

	public function pushError(){
		GLOBAL $errorArray;
		array_push($errorArray,$msg);
		$this->setSession('errorSession',$errorArray);
	}

	public function setSession($var,$val){
		$_SESSION[$var] = $val;
	}
	public function fetchSystemVar($var,$method){
		
		switch($method) {
			case 'post':
				$retValue = $_POST[$var];
				break;
			
			case 'request':
				$retValue = $_REQUEST[$var];
				break;
			
			case 'get':
				$retValue = $_GET[$var];
				break;
				
			case 'session':
				$retValue = $_SESSION[$var];
				break;
		}
		return $retValue;
	}


	public function sendMail($subject,$to)
	{
		switch($subject)
		{
			case "newuser":
					$body = "Thank you for the Registration";
					break;


			case "payment":
					$body ="Your payment has been done successfully";
					break;
		}
		
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->CharSet="UTF-8";
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = 'roopali@netiapps.com';
	$mail->Password = 'roopa123$$';
	$mail->SMTPAuth = true;
	
	$mail->From = 'roopali@netiapps.com';
	$mail->FromName = 'roopali';
	$mail->AddAddress($to);
	$mail->AddReplyTo($to, 'Information');

	$mail->IsHTML(true);
	$mail->Subject    = $subject;
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
	$mail->Body    = $body;
	
	if(!$mail->Send())
	{	
	  echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else
	{
		  echo "Message sent!";
	}
}

	 public function isAuthenticated()
        {
                $active=$this->isActive();
                if($active)
                {
                        $time=$this->isTimedIn();
                        if($time)
                        {
				$nowtime=time();
                              $this->setSessionTimedOut($nowtime);
                        }
                        else
                        {
                                header("Location:../views/admin/login.php");
                        }
                }header("Location:../views/admin/login.php");
        }

         public function isActive()
        {
                if(session_id=='')
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        public function isTimedIn()
        {

                // set time-out period (in seconds)
                $inactive = 600;
                // check to see if $_SESSION["timeout"] is set
                if (isset($_SESSION["timeout"]))
                {
                        // calculate the session's "time to live"
                        $sessionTTL = time() - $_SESSION["timeout"];
                        if ($sessionTTL > $inactive)
                        {
				  session_destroy();
                                $this->logout();
                        }
                }

                $_SESSION["timeout"] = time();
        }

  	public function setSessionTimedOut($nowtime)
	{
		$_SESSION['timeout']= $nowtime;
	}    

	public function addtocart($pid,$q){
                if($pid<1 or $q<1) return;

                if(is_array($_SESSION['cart'])){
                        if($this->product_exists($pid)) return;
                        $max=count($_SESSION['cart']);
                        $_SESSION['cart'][$max]['productid']=$pid;
                        $_SESSION['cart'][$max]['qty']=$q;
                }
                else{
                        $_SESSION['cart']=array();
                        $_SESSION['cart'][0]['productid']=$pid;
                        $_SESSION['cart'][0]['qty']=$q;
                }
        }
        public function product_exists($pid){
                $pid=intval($pid);
                $max=count($_SESSION['cart']);
                $flag=0;
                for($i=0;$i<$max;$i++){
                        if($pid==$_SESSION['cart'][$i]['productid']){
                                $flag=1;
                                break;
                        }
                }
                return $flag;
        }

}
?>
