<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <title>User Validation - Seventh Sense 2010</title>
    <link rel="stylesheet" type="text/css" href="verify.css" />
</head>
<body>
 <div id="register" style="text-align:center;">
<?php
if(isset($_POST['register']))
{
	$email = $_POST['email'];
	require_once('recaptchalib.php');
	$privatekey = "6LcZbrwSAAAAAMmtB7HiUK_NK6zzHHYvTHJhDAuv";
	$resp = recaptcha_check_answer ($privatekey,
                               $_SERVER["REMOTE_ADDR"],
                               $_POST["recaptcha_challenge_field"],
                               $_POST["recaptcha_response_field"]);
	if (!$resp->is_valid)
	{
	    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
	    "(reCAPTCHA said: " . $resp->error . ")");
	}
	else
	{    
	    if (!preg_match('/^[A-Za-z0-9_-]+[A-Za-z0-9_.-]*@[A-Za-z0-9_-]+[A-Za-z0-9_.-]*\.[A-Za-z]{2,5}$/', $email))
	    {
	        echo $email." is not a valid email address"."</br>";
	        ?>
	        <input type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF']."?=".rand();?>'" value="click here" />
	        <span class="clickhere"> to enter again.</span>
	        <?php
	    }
	    else
	    {
		list($userName, $mailDomain) = split("@", $email);
		if (checkdnsrr($mailDomain, "MX")) //this function checkdnsrr() will not work for stupid windows server, comment the function checkdnsrr() and turn the if check to true
		{
		    $akey = "7th-s3ns3-".sha1(md5($email))."-verify";
		    $message = "This email is forwarded to you because someone (that can be you) has tried to register for 7th Sense through this email address\n\nIn order to verify your email and get registered to 7th Sense click the following link\nhttp://7th-sense.in/register/submit.php?key=$akey&email=$email\n\nThanks for your interest. :)\n\nSeventh Sense Team\nhttp://www.7th-sense.in/";
		    $subject = "7th Sense Account Validation";
			 $from = "do-not-reply@7th-sense.in";
			 $headers = "From: $from";
			 mail($email,$subject,$message,$headers) or die("email server is not working properly.. mail cannot be sent.");;
		    ?>
		    A link has been generated and sent to your email id <?php echo "$email" ?>. Check your inbox and follow the instructions..<br/>
		    <center><table><tr><td><form action="" method="post" name="resend" id="resend">
		    <input type="hidden" size="30" name="email" value="<?php echo "$email" ?>"/>
		    <input type="submit" name="resend" value="Click Here" />
		    </form></td><td><span class="clickhere"> to resend the message again</span><br/></td></tr>
		    <tr><td><input type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF']."?=".rand();?>'" value="click here" /></td>
		    <td><span class="clickhere"> to enter alternate email id.</span></td></tr>
		    </table></center>
		    <?php
		}
		else
		{
		    echo "email service is not available for the given email address ".$email.".</br>";
		    ?>
		    <input type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF']."?=".rand();?>'" value="click here" />
		    <span class="clickhere"> to enter another email address.</span>
		    <?php
		} 
	    }
	}
}
else
{
 if(isset($_POST['resend']))
 	{
			$email = $_POST['email'];
  			$akey = "7th-s3ns3-".sha1(md5($email))."-verify";
			$message = "This email is forwarded to you because someone (that can be you) has tried to register for 7th Sense through this email address\n\nIn order to verify your email and get registered to 7th Sense click the following link\nhttp://7th-sense.in/register/submit.php?key=$akey&email=$email\n\nThanks for your interest. :)\n\nSeventh Sense Team\nhttp://www.7th-sense.in/";
			$subject = "7th Sense Account Validation";
			$from = "do-not-reply@7th-sense.in";
			$headers = "From: $from";
			mail($email,$subject,$message,$headers) or die("email server is not working properly.. mail cannot be sent.");;

			?>
			A link has been <strong>re-sent</strong> to your email id: <?php echo "$email" ?>. Check your inbox and follow the instructions..<br/>
			<center><table><tr><td><form action="" method="post" name="resend" id="resend">
			 <input type="hidden" size="30" name="email" value="<?php echo "$email" ?>"/>
			 <input type="submit" name="resend" value="Click Here" />
			</form></td><td><span class="clickhere"> to resend the message again</span><br/></td></tr>
			<tr><td><input type="button" onclick="location.href='<?php echo $_SERVER['PHP_SELF']."?=".rand();?>'" value="click here" /></td>
			<td><span class="clickhere"> to enter alternate email id.</span></td></tr>
			</table></center>
			<?php
			}
	else
	{
	echo "<p>invalid page</p>";
	}
}
  ?>
</div>
 </body>
</html>