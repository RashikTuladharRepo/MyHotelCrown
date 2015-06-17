<div style="background-color:black; width:100%; height:100%; top:0;">
<?php
	@session_start();
	@error_reporting(0);
	include "mailclass/PHPMailerAutoload.php";
	$emailtosend="tuladhar.rashik@gmail.com";

	if (isset($_POST['reservation'])) {

		$arrivaldate=$_POST['arrival'];
		$departuredate=$_POST['departure'];
		$numberofadults=$_POST['num-of-adults'];
		$numberofchildren=$_POST['num-of-children'];
		$fullname=$_POST['fullname'];
		$emailaddress=$_POST['email'];
		$remarks=$_POST['remarks'];


		$mail = new PHPMailer(); 					// create a new object
				$mail->IsSMTP(); 							// enable SMTP
				$mail->SMTPDebug = 1; 						// debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; 					// authentication enabled
				$mail->SMTPSecure = 'tls'; 					// secure transfer enabled REQUIRED for GMail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587; 							// or 587
				$mail->IsHTML(true);
				$mail->Username = "uglyzfrens@gmail.com";
				$mail->Password = "9841840193";
				$mail->SetFrom("hotelcrownmail@gmail.com");
				$mail->Subject = "Inquiry for Hotel Room Reservation";
				$mail->AddAddress($emailtosend);			//To address who will receive this email
				$mail->Body = "
				  <strong>Arrival Date:</strong> ".$arrivaldate."<br><br>"
				."<strong>Departure Date:</strong> ".$departuredate."<br>"."<br>"
				."<strong>Number of Adults:</strong> ".$numberofadults."<br>"."<br>"
				."<strong>Number of Children:</strong> ".$numberofchildren."<br>"."<br>"
				."<strong>Full Name:</strong> ".$fullname."<br>"."<br>"
				."<strong>Email Address:</strong> ".$emailaddress."<br>"."<br>"
				."<strong>Remarks:</strong> ".$remarks."<br>"."<br>";
				if(!$mail->Send()){
						$_SESSION['msg'] = "Your enquiry could not be sent... Please try again.";
						print "<script>window.location.href='index.php'</script>";
					}
				else{
						$_SESSION['msg'] = "Your enquiry has been sent... We will reach you soon.";
						print "<script>window.location.href='index.php'</script>";
					}
	}


	elseif(isset($_POST['contact']))
	{
		$fullname=$_POST['fullname'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$query=$_POST['query'];
		

				$mail = new PHPMailer(); 					// create a new object
				$mail->IsSMTP(); 							// enable SMTP
				$mail->SMTPDebug = 1; 						// debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; 					// authentication enabled
				$mail->SMTPSecure = 'tls'; 					// secure transfer enabled REQUIRED for GMail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587; 							// or 587
				$mail->IsHTML(true);
				$mail->Username = "uglyzfrens@gmail.com";
				$mail->Password = "9841840193";
				$mail->SetFrom("hotelcrownmail@gmail.com");
				$mail->Subject = "Inquiry for Hotel Crown";
				$mail->AddAddress($emailtosend);			//To address who will receive this email
				$mail->Body = "
				  <strong>Full Name:</strong> ".$fullname."<br><br>"
				."<strong>Address:</strong> ".$address."<br>"."<br>"
				."<strong>Email:</strong> ".$email."<br>"."<br>"
				."<strong>Phone:</strong> ".$phone."<br>"."<br>"
				."<strong>Query:</strong> ".$query."<br>"."<br>";
				if(!$mail->Send()){
						$_SESSION['msg'] = "Your enquiry could not be sent... Please try again.";
						print "<script>window.location.href='contact.php'</script>";
					}
				else{
						$_SESSION['msg'] = "Your enquiry has been sent... We will reach you soon.";
						print "<script>window.location.href='contact.php'</script>";
					}
	}

	else
	{
		echo "nothing";
	}




?>
</div>