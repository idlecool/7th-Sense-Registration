<?php
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	if(isset($_POST['regdesk_submit']))
	{
        $_SESSION['rd_full_name'] = $_POST['full_name'];
        $_SESSION['rd_department'] = $_POST['department'];
        $_SESSION['rd_college_id'] = $_POST['college_id'];
        $_SESSION['rd_college'] = $_POST['college'];
        $_SESSION['rd_city'] = $_POST['city'];
        $_SESSION['rd_phone'] = $_POST['phone'];
        $_SESSION['rd_email'] = $_POST['email'];
        header("location:final_submit.php");
	}
	else
	{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Participant Details - RegDesk Dashboard - 7th Sense</title>
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
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Participant Details Form</span></h1>
		</div>
		<div id="register">
			<?php if($_GET['status'] == 'false') { ?><p style="font-size:12px;color:#f00;text-align:center;">someone with the same email address "<?php echo $_SESSION['rd_email'];?>" has already been registed with us at our registration desk.. use another email address or else if you are already registered with us.. <a href="enquiry.php?email=<?php echo $_GET['email'];?>">follow this link</a></p> <?php }?>
			<form name="regdeskregister" method="post" action="" autocomplete="off">
				<table>
				<tr>
					<td>
						<span class="form_fields">Name</span>
					</td>
					<td>
						<input type="text" name="full_name"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_full_name'];?>" size="20" maxlength="60" style="width:210px;" />
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
						<span class="form_fields">Department</span>
					</td>
					<td>
						<input type="text" name="department"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_department'];?>" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="department_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">College ID</span>
					</td>
					<td>
						<input type="text" name="college_id"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_college_id'];?>" size="20" maxlength="60" style="width:210px;" />
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
						<input type="text" name="college"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_college'];?>" size="20" maxlength="60" style="width:210px;" />
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
						<span class="form_fields">City</span>
					</td>
					<td>
						<input type="text" name="city"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_city'];?>" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="city_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Phone</span>
					</td>
					<td>
						<input type="text" name="phone"  value="<?php if($_GET['status'] == 'false') echo $_SESSION['rd_phone'];?>" size="20" maxlength="15" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="phone_dom"></span>
					</td>
				</tr>
				<tr>
					<td>
						<span class="form_fields">Email</span>
					</td>
					<td>
						<input type="text" name="email"  value="" size="20" maxlength="60" style="width:210px;" />
					</td>
				</tr>
				<tr>
					<td class="dom_element">
					</td>
					<td class="dom_element">
						<span class="dom_element" id="email_dom"></span>
					</td>
				</tr>
				<tr style="text-align:center">
					<td colspan="2">
						<input type="submit" name="regdesk_submit" value="Submit" onclick="return validate();" />
					</td>
				</tr>
				</table>
			</form>
			<script type="text/javascript">
			function validate() {
				var result = true;
				//email
				var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
				if(!emailPattern.test(document.regdeskregister.email.value))
				{
					document.getElementById("email_dom").innerHTML="enter a valid email address";
					document.regdeskregister.email.focus();
					result = false; 
				}
				else
				{
					document.getElementById("email_dom").innerHTML="";
				}
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
				//city
				if(document.regdeskregister.city.value=="")
				{
					document.getElementById("city_dom").innerHTML="enter the city";
					document.regdeskregister.city.focus();
					result = false; 
				}
				else
				{
					document.getElementById("city_dom").innerHTML="";
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
				//department
				if(document.regdeskregister.department.value=="")
				{
					document.getElementById("department_dom").innerHTML="enter the department";
					document.regdeskregister.department.focus();
					result = false; 
				}
				else
				{
					document.getElementById("department_dom").innerHTML="";
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