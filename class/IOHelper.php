<?php
class IOHelper
{
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
//		include_once('../includes/system/kickstart.php');
		$mail = new PHPMailer();		
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.google.com';
		$mail->Port = 465;
		$mail->Username = "roopali@netiapps.com";
		$mail->Password = "roopa123$$";
		$mail->SetFrom('roopali@netiapps.com', 'roopali');
		$mail->Subject = $subject;
		$mail->MsgHTML($body);
		$mail->AddAddress($to);
				
		if(!$mail->Send())
		{
			echo ("<p>Message was not sent</p>");
			echo ("<p>" . $mail->ErrorInfo . "</p>");
			exit;
		}		
		else
		{
			echo("<p>Message successfully sent</p>");
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
                                header("Location:../admin/index.php");
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

        public function logout()
        {
                session_start();
                session_unset();
        }


}
?>
