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
		public function isActive()
		{
			public function isTimedIn()
			{

			}
		}
	}

	 public function isActive()
        {
                if(isset($_SESSION['id']))
                {
                        $time=$this->isTimedIn();
                        if($time)
                        {
                                header(Location:);
                        }
                        else
                        {
                                header(Location:);
                        }
                }
                else
                {
                        $_SESSION['id']=$_GET['id'];
                        $_SESSION['timeout']=time();
                }
        }
	
	public function validateWSDL(){
		return true;
	}
	
	public function checkForSubmission(){
		return true;
	}
}
?>
`
