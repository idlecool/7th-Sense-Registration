<?php
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	if(isset($_POST['mobile_submit']))
	{
		require_once("config.php");
		$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        $selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        
        $full_name = mysql_real_escape_string(trim($_POST['full_name']));
        $college_id = mysql_real_escape_string(trim($_POST['college_id']));
        $college = mysql_real_escape_string(trim($_POST['college']));
        $phone = mysql_real_escape_string(trim($_POST['phone']));
        $_SESSION['mo_full_name'] = $full_name;
        $_SESSION['mo_college_id'] = $college_id;
        $_SESSION['mo_college'] = $college;
        $_SESSION['mo_phone'] = $phone;
        
        $query = "SELECT `id` FROM $dbtbl_mobile_participant_details WHERE `phone` = '$phone'";
        $result = mysql_query($query) or die('database error 1');
        $num = mysql_num_rows($result);
        if($num != 0)
        {
        	header("location:".$_SERVER['PHP_SELF']."?rnd=".rand()."&status=false&phone=".$phone);
        }
        else
        {
        	
        	unset($_SESSION['mo_full_name']);
    	    unset($_SESSION['mo_college_id']);
        	unset($_SESSION['mo_college']);
	        unset($_SESSION['mo_phone']);
	        
	        $query = "INSERT INTO $dbtbl_mobile_participant_details (full_name,college_id,college,phone,doneby) VALUES('".$full_name."','".$college_id."','".$college."','".$phone."','".$_SESSION['regdeskmail']."')";
    	    $result = mysql_query($query) or die('database error 1');
        
        
        	$query = "SELECT `id` FROM $dbtbl_mobile_participant_details WHERE `phone` = '$phone'";
	        $result = mysql_query($query) or die('database error 2');
    	    $row = mysql_fetch_array($result);
    	    $id = $row['id'];
        	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <title>Registeration Status - Seventh Sense 2010</title>
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
	div#status {
		width: 670px;
		margin: 0px auto;
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
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Mobile Participant Details Form</span></h1>
		</div>
		<div id="status">
			<p>Alright Sparky.. Registration Successful..</p>
			<p>Name: <?php echo $full_name; ?></p>
			<p>RegID: MO-<?php echo $id; ?></p>
			<p>Mobile No: +91 - <?php echo $phone; ?></p>
			<br/>
			<p><a href="mobileregister.php">Do next mobile registration</a></p>
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
		mysql_close($cont);
	}
	else
	{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Participant Details - Mobile Registration Dashboard - 7th Sense</title>
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
	div#register {
		width: 420px;
		margin: 0px auto;
	}
	div#header, div#footer {
		height:100px;
	}
	span.dom_element {
	height: 12px;
	color: #f00;
	font-size: 12px;
	padding: 0px;
	margin: 0px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Mobile - Participant Details Form</span></h1>
		</div>
		<div id="register">
			<?php if($_GET['status'] == 'false') { ?><p style="font-size:12px;color:#f00;text-align:center;">someone with the same mobile number "<?php echo $_SESSION['mo_phone'];?>" has already been registed with us at our registration desk.. use another mobile number or else if you are already registered with us.. <a href="mobileenquiry.php?phone=<?php echo $_GET['phone'];?>">follow this link</a></p> <?php }?>
			<form name="regdeskregister" method="post" action="" autocomplete="off">
				<table>
				<tr>
					<td>
						<span class="form_fields">Name</span>
					</td>
					<td>
						<input type="text" name="full_name"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['mo_full_name'];?>" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="full_name_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">College ID</span>
					</td>
					<td>
						<input type="text" name="college_id"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['mo_college_id'];?>" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="college_id_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">College</span>
					</td>
					<td>
						<input type="text" name="college"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['mo_college'];?>" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="college_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Phone</span>
					</td>
					<td>
						+91 - <input type="text" name="phone"  value="" size="20" maxlength="10" style="width:158px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="phone_dom"></span>
					</td>
				</tr>
				<tr style="text-align:center">
					<td colspan="2">
						<input type="submit" name="mobile_submit" value="Submit" onclick="return validate();" />
					</td>
				</tr>
				</table>
			</form>
			<script type="text/javascript">
			function validate() {
				var result = true;
				//phone
				if(document.regdeskregister.phone.value=="")
				{
					document.getElementById("phone_dom").innerHTML="enter the phone number";
					document.regdeskregister.phone.focus();
					result = false; 
				}
				else
				{
					document.getElementById("phone_dom").innerHTML="";
				}
				//college
				if(document.regdeskregister.college.value=="")
				{
					document.getElementById("college_dom").innerHTML="enter the college name";
					document.regdeskregister.college.focus();
					result = false; 
				}
				else
				{
					document.getElementById("college_dom").innerHTML="";
				}
				//college_id
				if(document.regdeskregister.college_id.value=="")
				{
					document.getElementById("college_id_dom").innerHTML="enter the college id";
					document.regdeskregister.college_id.focus();
					result = false; 
				}
				else
				{
					document.getElementById("college_id_dom").innerHTML="";
				}
				
				//full_name
				if(document.regdeskregister.full_name.value=="")
				{
					document.getElementById("full_name_dom").innerHTML="enter the full name";
					document.regdeskregister.full_name.focus();
					result = false; 
				}
				else
				{
					document.getElementById("full_name_dom").innerHTML="";
				}
				return result;
			}
			</script>
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