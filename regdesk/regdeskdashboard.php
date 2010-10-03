<?php
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>RegDesk Dashboard - 7th Sense</title>
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
	div#links {
		min-height: 300px;
	}
	div#header, div#footer {
		height:100px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;color:#333333;">Logged in as: <?php echo $_SESSION['regdeskmail'];?></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> RegDesk Dashboard</span></h1>
		</div>
		<div id="links">
		<h2>Links</h2>
		<h3>Common Registration</h3>
		<a href="deskregister.php">Spot Registration</a><br/>
		<a href="mobileregister.php">Mobile Registration</a><br/>
		<br/>
		<h3>Enquiry</h3>
		<a href="enquiry.php">RegId Query (Email RegId Enquiry) - Spot Registrations</a><br/>
		<a href="onlineenquiry.php">RegId Query (Email RegId Enquiry) - Online Registrations</a><br/>
		<a href="mobileenquiry.php">RegId Query (Email RegId Enquiry) - Mobile Registrations</a><br/>
		<br/>
		<h3>Event Registration</h3>
		<a href="events_reg.php">Event Registration</a><br/>
		<a href="event_par_list.php">Event Participant List</a><br/>
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
?>