<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Custom_email
	{
        public function account_activation($code,$email,$name)
        {
        	$encrypted_code = base64_encode($code);
        	$encrypted_email = base64_encode($email);

        	//$link = "<a href='http://maxholidays.likesyou.org/signup/activate_account/".$encrypted_email."/".$encrypted_code."'>Click Here</a>";

        	$link = "<a href='http://localhost/maxtravel/signup/activate_account/".$encrypted_email."/".$encrypted_code."'>Click here to your account</a>";

        	$html = <<<EOF
<!DOCTYPE html>
<html>
<head>
	<title>Account Activation</title>
</head>
<body>
<p>Welcome Mr./Ms. $name</p><br>
$link
</body>
</html>
EOF;

			return $html;
        }
	}
?>