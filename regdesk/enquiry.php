<?php
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	if(isset($_GET['email']))
	{
		require_once("config.php");
		$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
    	$selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
    
    	$email = mysql_real_escape_string($_GET['email']);
    
    	$query = "SELECT * FROM $dbtbl_regdesk_participant_details WHERE `email` = '$email'";
		$result = mysql_query($query) or die('database error 1');
		$num = mysql_num_rows($result);
		if ( $num == 1 )
		{
    		$row = mysql_fetch_array($result);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Equiry - RegDesk Registartions - 7th Sense</title>
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
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">Equiry - RegDesk Registartions -</span> 7th Sense</span></h1>
		</div>
		<div id="details_table">
				<table>
				<tr>
					<td>
						<span class="form_fields">Reg ID</span>
					</td>
					<td>
						SR-<?php echo $row['id'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Name</span>
					</td>
					<td>
						<?php echo $row['full_name'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Department</span>
					</td>
					<td>
						<?php echo $row['department'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">College ID</span>
					</td>
					<td>
						<?php echo $row['college_id'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">College</span>
					</td>
					<td>
						<?php echo $row['college'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">City</span>
					</td>
					<td>
						<?php echo $row['city'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Phone</span>
					</td>
					<td>
						<?php echo $row['phone'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Email</span>
					</td>
					<td>
						<?php echo $row['email'];?>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Registartion Done By</span>
					</td>
					<td>
						<?php echo $row['doneby'];?>
					</td>
				</tr>
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
		else
		{
			echo "record not found";
		}
	}
	else
	{
				?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Equiry - RegDesk Registartions - 7th Sense</title>
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
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">Equiry - RegDesk Registartions -</span> 7th Sense</span></h1>
		</div>
		<div id="details_table" style="text-align:center;width:100%;margin:0px auto;">
			<form name="email_equiry_form" method="get" action="" autocomplete="off" style="width:260px;margin:0px auto;">
				<table>
				<tr>
					<td>
						Email
					</td>
					<td>
						<input type="text" name="email" style="width:200px;"/>
					</td>
				</tr>
				<tr style="text-align:center;">
					<td colspan="2">
						<input type="submit" name="submit" value="Submit" onclick="return validate();"/>
					</td>
				</tr>
				</table>
			</form>
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