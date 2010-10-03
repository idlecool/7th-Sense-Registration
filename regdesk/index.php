<?php
session_start();
if(isset($_SESSION['regdeskmail']))
{
    header("location:regdeskdashboard.php");
}
else
{
    if(isset($_POST['login']))
    {
	require_once("config.php");
	$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        $selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        $email = mysql_real_escape_string(trim($_POST['email']));
	$password = md5(mysql_real_escape_string(trim($_POST['password'])));
	$query = "SELECT `email`,`password` FROM $dbtbl_regdesk_details WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysql_query($query) or die("Error Retrieving Data");
	$numrows = mysql_num_rows($result);
	if($numrows == 1)
        {
            $row = mysql_fetch_array($result) or die("dberror2");
            $_SESSION['regdeskmail']=$email;
            header("location:regdeskdashboard.php");
        }
        else
        {
            header("location:".$_SERVER['PHP_SELF']."?rnd=".rand()."&verify=no");
        }
	
    }
    else
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <title>RegDesk Login - Seventh Sense 2010</title>
    <style>
    legend {
    font-family:"Verdana";
    font-size: 14px;
    }
    .form_element {
    font-family:"Verdana";
    }
    .dom_element {
    font-family:"Verdana";
    font-size: 10px;
    color: #ff0000;
    }
    div#login_div {
        margin: 15% auto;
	-moz-border-radius: 7px;
	border-radius: 7px;
	padding: 4px 0px 4px 8px;
	}
	.forgot_pass {
	font-family: "Verdana";
	font-size: 80%;
	}
	a {
	text-decoration: none;
	}
	a:link, a:visited, a:active {
	color: #242424;
	}
	a:hover {
	color: #6d6d6d;
	}
    </style>
    <script>
    function login_validate()
    {
        var result = true;
        if(trim(document.login_form.password.value)=="")
        {
            document.getElementById('password_dom').innerHTML='enter password';
            document.login_form.password.focus();
            result = false;
        }
        else
        {
            if (document.login_form.password.value.length < 6)
            {
                document.getElementById('password_dom').innerHTML='password should be atleast 6 chars long';
                document.login_form.password.focus();
                result = false;
            }
            else
            {
                document.getElementById('password_dom').innerHTML='<span style="color: #666666;">password is 6+ char long</span>';
            }
        }
        var RE_EMAIL =/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
        if(trim(document.login_form.email.value)=="")
        {
            document.getElementById('email_dom').innerHTML='enter a valid email address';
            document.login_form.email.focus();
            result = false;
        }
        else
        {
            if (!RE_EMAIL.test(document.login_form.email.value))
            {
                document.getElementById('email_dom').innerHTML='enter a valid email address';
                document.login_form.email.focus();
                result = false;
            }
            else
            {
                document.getElementById('email_dom').innerHTML='<span style="color: #666666;">ex: admin@7th-sense.in</span>';
            }
        }
        return result;
    }
	//define trim function
    function trim(str)
    {
        return str.replace(/^\s+|\s+$/g, '');
    }
    </script>
</head>
<body>
	<div id="login_div" style="background-color:#bcbcbc; width:280px;">
	<form name="login_form" action="" method="post" style="width:280px;">
	<table border="0">
		<tr>
			<td colspan="2" style="text-align:center;">
				<span style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:20px; color:#006633"><span style="color:#003399;">7th-Sense :</span> RegDesk Login</span><hr/>
			</td>
		</tr>
		<tr>
			<td width="100px">
				<span class="form_element">Email</span>
			</td>
			<td>
				<input type="text" name="email" maxlength="60" style="width:150px;" />
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<span id="email_dom" class="dom_element"><span style="color: #666666;">ex: admin@7th-sense.in</span></span>
			</td>
		</tr>
		<tr>
			<td>
				<span class="form_element">Password</span>
			</td>
			<td>
				<input type="password" name="password" maxlength="60" style="width:150px;" />
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<span id="password_dom" class="dom_element"><span style="color: #666666;">password is 6+ char long</span></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php if($_GET['verify']=='no') {?><span class="dom_element">&nbsp;&nbsp;&nbsp;&nbsp;your email address and password donot match.</span><?php }?>
			</td>
		</tr>
		<tr style="text-align: right;">
			<td colspan="2">
				<div class="forget_pass" style="float:left;"><a href="#"><span class="forgot_pass">Forgot Password</span></a></div><input type="submit" value="Login" name="login" onclick="return login_validate();"/>
			</td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>
<?php
    }
}
?>