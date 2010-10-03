<?php 
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	if( (isset($_SESSION['rd_full_name']) && ($_SESSION['rd_full_name'] != '')) )
	{
		require_once("config.php");
		$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        $selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        
        $full_name = mysql_real_escape_string(trim($_SESSION['rd_full_name']));
        $department = mysql_real_escape_string(trim($_SESSION['rd_department']));
        $college_id = mysql_real_escape_string(trim($_SESSION['rd_college_id']));
        $college = mysql_real_escape_string(trim($_SESSION['rd_college']));
        $city = mysql_real_escape_string(trim($_SESSION['rd_city']));
        $phone = mysql_real_escape_string(trim($_SESSION['rd_phone']));
        $email = mysql_real_escape_string(trim($_SESSION['rd_email']));
		$doneby = mysql_real_escape_string(trim($_SESSION['regdeskmail']));
		
        $query = "SELECT `id` FROM $dbtbl_regdesk_participant_details WHERE `email` = '$email'";
        $result = mysql_query($query) or die('database error 3');
        $num = mysql_num_rows($result);
        if($num != 0)
        {
        	header("location:deskregister.php?rnd=".rand()."&status=false&email=".$email);
        }
        else
        {
        	
        	unset($_SESSION['rd_full_name']);
	        unset($_SESSION['rd_department']);
    	    unset($_SESSION['rd_college_id']);
        	unset($_SESSION['rd_college']);
        	unset($_SESSION['rd_city']);
	        unset($_SESSION['rd_phone']);
    	    unset($_SESSION['rd_email']);
        
	        $query = "INSERT INTO $dbtbl_regdesk_participant_details (full_name,department,college_id,college,city,phone,email,doneby) VALUES('".$full_name."','".$department."','".$college_id."','".$college."','".$city."','".$phone."','".$email."','".$doneby."')";
    	    $result = mysql_query($query) or die('database error 1');
        
        
        	$query = "SELECT `id` FROM $dbtbl_regdesk_participant_details WHERE `email` = '$email'";
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
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Participant Details Form</span></h1>
		</div>
		<div id="status">
			<p>Alright Sparky.. Registration Successful..</p>
			<p>Name: <?php echo $full_name; ?></p>
			<p>RegID: SR-<?php echo $id; ?></p>
			<p>Email: <?php echo $email; ?></p>
			<br/>
			<p><a href="deskregister.php">Do next registration</a></p>
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
		header("location:deskregister.php");
	}
}
?>