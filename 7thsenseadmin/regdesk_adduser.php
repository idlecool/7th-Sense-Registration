<?php
session_start();
if(!isset($_SESSION['adminmail']))
{
    header("location:index.php");
}
else
{
	if(isset($_POST['reguser_submit']))
	{
		require_once("config.php");
		$cont = mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        $selectdb = mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        
        $email = mysql_real_escape_string(trim($_POST['email']));
        $password = md5(mysql_real_escape_string(trim($_POST['password'])));
        
        $query = "SELECT `email` FROM $dbtbl_regdesk_details WHERE email = '$email'";
        $result = mysql_query($query) or die("Database Error 1");
        $num = mysql_num_rows($result);
        if($num != 0)
        {
        	header("location:".$_SERVER['PHP_SELF']."?rnd=".rand()."&status=false&email=".$email);
        }
        else
        {
        	$query = "INSERT INTO $dbtbl_regdesk_details (email,password,doneby) VALUES('".$email."','".$password."','".$_SESSION['adminmail']."')";
        	$result = mysql_query($query) or die("Database Error 2");
        	header("location:".$_SERVER['PHP_SELF']."?rnd=".rand()."&status=true&email=".$email);
        }
        mysql_close($cont);
	}
	else
	{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Admin Dashboard - 7th Sense</title>
	<style type="text/css">
	body {
		margin: 0px;
		padding: 0px 5px 0px 5px;
		font-family:"Verdana";
	}
	a {
		text-decoration: none;
	}
	div#wrapper {
		margin: 0px auto;
		width: 500px;
		min-height: 500px;
	}
	div#header, div#footer {
		height:100px;
	}
	.dom_element {
	height:10px;
	font-size: 12px;
	color: #f00;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><div style="text-align:left;float:left;width:200px;"><a href="admindashboard.php">back to dashboard</a></div><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Add New RegDesk User</span></h1>
		</div>
		<div id="entry">
			<?php if($_GET['status']=='false') {?><p style="color:#f00;font-size:11px;text-align:center;">An user with emailid "<?php echo $_GET['email'];?>" already exists.. try another email address</p><?php } ?>
			<form name="regusers" action="" method="post" autocomplete="off" style="width:320px;margin:0px auto;">
			<table>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<input type="text" name="email" maxlength="60" style="width:200px;"/>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<span class="dom_element" id="email_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
						<input type="password" name="password" style="width:200px;"/>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<span class="dom_element" id="password_dom"><span style="color:#666666;">must be atleast 6 chars long</span></span>
					</td>
				</tr>
				<tr style="text-align:center;">
					<td colspan="2">
						<input type="submit" name="reguser_submit" value="submit" onclick="return validate();"/>
					</td>
				</tr>
			</table>
			</form>
			<script type="text/javascript">
				function validate() {
					var result = true;
					//phone
					if(document.regusers.password.value=="")
					{
						document.getElementById("password_dom").innerHTML="enter a valid password in atleast 6 chars";
						document.regusers.password.focus();
						result = false; 
					}
					else
					{
						document.getElementById("password_dom").innerHTML='<span style="color:#666666;">must be atleast 6 chars long</span>';
					}
					//email
					var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					if(!emailPattern.test(document.regusers.email.value))
					{
						document.getElementById("email_dom").innerHTML="enter a valid email id";
						document.regusers.email.focus();
						result = false; 
					}
					else
					{
						document.getElementById("email_dom").innerHTML="";
					}
					return result;
				}
			</script>
		</div>
		<div id="display_list">
		<br/>
		<?php if($_GET['status']=='true') {?><p style="color:#666;font-size:11px;text-align:center;">A new user with emailid "<?php echo $_GET['email'];?>" has been added successfully.. :)</p><?php } ?>
		<br/>
		<h2>Current Users</h2>
			<table>
				<tr>
					<td>
						<strong>User Name</strong>
					</td>
					<td>
						<strong>Uploaded By</strong>
					</td>
				</tr>
			<?php
			require_once("config.php");
			$cont = mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        	$selectdb = mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        	$query = "SELECT `email`,`doneby` FROM $dbtbl_regdesk_details";
        	$result = mysql_query($query) or die("Database Query Failed");
        	while($row = mysql_fetch_array($result))
        	{
        		?>
        		<tr>
        			<td>
        				<?php echo $row['email'];?>
        			</td>
        			<td>
        				<?php echo $row['doneby'];?>
        			</td>
        		</tr>
        		<?php
        	}
        	mysql_close($cont);
        	?>
        	</table>
		</div>
		<div id="footer">
			<br/><br/><br/>
			&copy; 7th Sense 2010 
		</div>
	</div>
</body>
</html>
	<?php
	}
}
?>