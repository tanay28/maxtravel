        <?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Custom_email
	{
                public function account_activation($code,$email,$name)
                {
                	$encrypted_code = base64_encode($code);
                	$encrypted_email = base64_encode($email);

                	$link = "<a href='http://maxholidays.likesyou.org/signup/activate_account/".$encrypted_email."/".$encrypted_code."'>Click Here</a>"; // server url

                	//$link = "<a href='http://localhost/maxtravel/signup/activate_account/".$encrypted_email."/".$encrypted_code."'>Click here to your account</a>"; // local url

                	$html = <<<EOF
<!doctype html>
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

                public function forgot_password($code,$email,$name)
                {
                        $encrypted_code = md5($code);
                        $encrypted_email = base64_encode($email);

                        $link = "<a href='http://maxholidays.likesyou.org/forgotpassword/viewresetpassword/".$encrypted_email."/".$encrypted_code."'>Click Here</a>"; // server url

                        //$link = "<a href='http://localhost/maxtravel/forgotpassword/viewresetpassword/".$encrypted_email."/".$encrypted_code."'>Click here to reset your account password</a>"; // local url

                        $html = <<<EOF
<!doctype>
<html>
<head>
        <title>Reset Account Password</title>
</head>
<body>
<p>Welcome Mr./Ms. $name</p><br>
$link
</body>
</html>
EOF;

                                return $html;
                }

                public function contact_info($name,$email,$phone,$msg)
                {
                    $html = <<<EOF
<!doctype>
<html>
<head>
        <title>New User Contact Details</title>
</head>
<body>
<p>Welcome Mr./Ms. $name</p><br>
<p>Name    : $name</p>
<p>Email   : $email</p>
<p>Phone   : $phone</p>
<p>Message : $msg</p>
</body>
</html>
EOF;

                                return $html;
                }
	}
?>