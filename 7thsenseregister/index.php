<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <title>User Validation - Seventh Sense 2010</title>
    <link rel="stylesheet" type="text/css" href="verify.css" />
</head>
<body>
 <div id="register" style="text-align:center;">

<div id="register_form">
  <form action="http://www.idlecool.net/seventhsense/mailing.php" method="post" name="register">
  <table border="0" >
    <tr>
        <td width=""><span class="form_details">Email ID</span></td>
        <td><input type="text" size="30" name="email" /></td>
    </tr>
    <tr>
	<td colspan="2">
	    <script type="text/javascript" src="http://api.recaptcha.net/challenge?k=6LcZbrwSAAAAAJt6V-cmgODOcR9wqq3nI_wnK08y"></script>
	    <noscript>
	    <iframe src="http://api.recaptcha.net/noscript?k=6LcZbrwSAAAAAJt6V-cmgODOcR9wqq3nI_wnK08y"
	    height="300" width="500" frameborder="0"></iframe><br/>
	    </noscript>
	    <?php
	    require_once('recaptchalib.php');
	    $publickey = "6LcZbrwSAAAAAJt6V-cmgODOcR9wqq3nI_wnK08y"; // you got this from the signup page
	    echo recaptcha_get_html($publickey);
	    ?>
	</td>
    </tr>
    <tr>
	<td colspan="2">
	    <input type="submit" value="Submit" name="register" />
	</td>
    </tr>
  </table>
  </form>
</div>
</div>
 </body>
</html>
