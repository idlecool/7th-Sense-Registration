<?php
session_start();
if(!isset($_SESSION['regdeskmail']))
{
    header("location:index.php");
}
else
{
	if(isset($_POST['proceed']))
	{
		if($_POST['event'] > 0 && $_POST['event'] <29 && $_POST['event'] != 16 && $_POST['event'] != 19 && $_POST['event'] != 21 )
		{
			require_once("config.php");
			$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        	$selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        	
        	$query = "SELECT * FROM `event_meta` WHERE `event_id` = '".$_POST['event']."'";
        	$result = mysql_query($query) or die("database error 1");
        	$row = mysql_fetch_array($result);
        	$event_meta['event_id'] = $row['event_id'];
        	$event_meta['event_name'] = $row['event_name'];
        	$event_meta['prefix'] = $row['prefix'];
        	$event_meta['team_size'] = $row['team_size'];
        	$event_meta['limit'] = $row['limit'];
        	$event_meta['entry_fee'] = $row['entry_fee'];
        	
        	$_SESSION['event_id'] = $row['event_id'];
        	$_SESSION['event_name'] = $row['event_name'];
        	$_SESSION['event_prefix'] = $row['prefix'];
        	$_SESSION['team_size'] = $row['team_size'];
        	$_SESSION['limit'] = $row['limit'];
        	$_SESSION['entry_fee'] = $row['entry_fee'];
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
	div#form_space {
		background-color:#d2d2d2;
		width: 320px;
		margin: 0px auto;
		padding: 5px;
	}
	div#header, div#footer {
		height:100px;
	}
	span.dom_element {
		font-size: 9px;
		color: #f00;
	}
	</style>
	<script type="text/javascript">
					function validate()
					{
						var result = true;
						var RE_REGID = /^[0-9]{1,4}$/;
				        if (!RE_REGID.test(document.event_par.teammember1.value))
				        {
				            document.getElementById("teammember1_dom").innerHTML=" reg id format is invalid.";
				            document.event_par.teammember1.focus();
				            result = false;
				        }
				        else
				        {
				            document.getElementById("teammember1_dom").innerHTML='';
				        }
				        //prefix
				        if (document.event_par.regprefix1.value == 'false')
				        {
				            document.getElementById("regprefix1_dom").innerHTML=" select regid prefix.";
				            document.event_par.regprefix1.focus();
				            result = false;
				        }
				        else
				        {
				            document.getElementById("regprefix1_dom").innerHTML="";
				        }
						<?php for ( $i=2; $i<=$event_meta['team_size']; $i++) { ?>
						//numberbox
				        var RE_REGID = /^[0-9]{1,4}$/;
				        if ((!RE_REGID.test(document.event_par.teammember<?php echo $i; ?>.value)) && (document.event_par.teammember<?php echo $i; ?>.value!=''))
				        {
				            document.getElementById("teammember<?php echo $i; ?>_dom").innerHTML=" reg id format is invalid.";
				            document.event_par.teammember<?php echo $i; ?>.focus();
				            result = false;
				        }
				        else
				        {
				            document.getElementById("teammember<?php echo $i; ?>_dom").innerHTML='';
				        }
				        //prefix
				        if (document.event_par.regprefix<?php echo $i; ?>.value == 'false')
				        {
				            if(document.event_par.teammember<?php echo $i; ?>.value!='')
					        {
				            	document.getElementById("regprefix<?php echo $i; ?>_dom").innerHTML=" select regid prefix.";
				            	document.event_par.regprefix<?php echo $i; ?>.focus();
				            	result = false;
				            }
				        }
				        else
				        {
					        if(document.event_par.teammember<?php echo $i; ?>.value=='')
					        {
					        	document.getElementById("teammember<?php echo $i; ?>_dom").innerHTML=" enter reg id.";
					            document.event_par.teammember<?php echo $i; ?>.focus();
					            result = false;
					        }
				            document.getElementById("regprefix<?php echo $i; ?>_dom").innerHTML="";
				        }
						<?php }?>
						return result;
					}
	</script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">Team Registration -</span> Event Registration Dashboard</span></h1>
		</div>
		<div id="team_details">
			<table>
				<tr>
					<td>
						Event Name
					</td>
					<td>
						<?php echo $event_meta['event_name']; ?>
					</td>
				</tr>
				<tr>
					<td>
						Event Code
					</td>
					<td>
						<?php echo $event_meta['prefix']; ?>
					</td>
				</tr>
				<tr>
					<td>
						Max Team Size
					</td>
					<td>
						<?php echo $event_meta['team_size']; ?>
					</td>
				</tr>
				<tr>
					<td>
						Maximum Teams
					</td>
					<td>
						<?php echo $event_meta['limit']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-weight:bold;color:#f00;font-size:18px;">Entry Fee</p>
					</td>
					<td>
						<p style="font-weight:bold;color:#f00;font-size:18px;"><?php echo $event_meta['entry_fee']; ?>.00 INR</p>
					</td>
				</tr>
			</table>
			<div id="form_space"> 
			Enter Event Registration IDs
			<br/>
			<br/>
			<form name="event_par" action="" method="post" autocomplete="off" style="width:320px;">
				<table>
				<?php for ( $i=1; $i<=$event_meta['team_size']; $i++) { ?>
					<tr>
						<td>
							Team Member<?php echo $i?> 
						</td>
						<td>
							<select name="regprefix<?php echo $i; ?>">
								<option selected="selected" value="false">--</option>
								<option>SR-</option>
								<option>OL-</option>
								<option>MO-</option>
							</select>
							<input type="text" name="teammember<?php echo $i; ?>" style="width:100px;"/>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
							<span class="dom_element" id="regprefix<?php echo $i; ?>_dom"></span><span class="dom_element" id="teammember<?php echo $i; ?>_dom"></span>
						</td>
					</tr>
				<?php }?>
					<tr style="text-align:center;">
						<td colspan="2">
							<input type="submit" name="team_submit" value="submit" onclick="return validate();"/>
						</td>
					</tr>
				</table>
			</form>
			
			</div>
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
			echo "illegal event id";
		}
	}
	else if(isset($_POST['team_submit']))
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
	
	div#header, div#footer {
		height:100px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Event Registration Dashboard</span></h1>
		</div>
	<?php
	
		require_once("config.php");
		$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        $selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        
        
        //verify
        $verifyresult=true;
		for( $i=1; $i<=$_SESSION['team_size']; $i++ )
		{
			 for( $j=1; $j<=$_SESSION['team_size']; $j++)
			 {
			 	$regid = mysql_real_escape_string($_POST["regprefix".$i]).mysql_real_escape_string(trim($_POST["teammember".$i]));
			 	if($regid != 'false')
			 	{
			 		$query = "SELECT `teamid` FROM event".$_SESSION['event_id']." WHERE member".$j."='".$regid."'"."";
			 		$result = mysql_query($query) or die("DB verify error");
			 		if(mysql_num_rows($result) != 0)
			 		{
			 			$row = mysql_fetch_array($result);
			 			echo $regid." has already been registered in ".$_SESSION['event_name']." with team id ".$_SESSION['event_prefix'].$row['teamid']."<br/>";
			 			$verifyresult=false;
			 		}
			 	}
			 }
		}
		if(!$verifyresult)
		{
			echo "Sorry!! Registeration cannot be done!!<br/>";
		}
        
        //insert
        if($verifyresult)
        {
        	$query="INSERT INTO event".$_SESSION['event_id']." ( ";
        	$querytemp="";
        	for ( $i=1; $i<=$_SESSION['team_size']; $i++)
        	{
        		if($i<$_SESSION['team_size'])
        		{
        			$query.="member".$i.", ";
        			$regid = mysql_real_escape_string($_POST["regprefix".$i]).mysql_real_escape_string(trim($_POST["teammember".$i]));
        			if ($regid == 'false')
        			{
        				$regid = 'NA';
        			}
        			$querytemp.= "'".$regid."', ";
        		}
        		else if ($i==$_SESSION['team_size']){
        			$query.="member".$i;
        			$regid = mysql_real_escape_string($_POST["regprefix".$i]).mysql_real_escape_string(trim($_POST["teammember".$i]));
        			if ($regid == 'false')
        			{
        				$regid='NA';
        			}
        			$querytemp.= "'".$regid."'";
        		}
        	}
        	$query.=",doneby) VALUES(".$querytemp.", '".$_SESSION['regdeskmail']."')";
        	$result = mysql_query($query) or die("database error");
        	
        	//output
        	$query = "SELECT * FROM event".$_SESSION['event_id']." WHERE member1 ="."'".mysql_real_escape_string($_POST["regprefix1"]).mysql_real_escape_string(trim($_POST["teammember1"]))."'";
        	$result = mysql_query($query) or die("Database Output Error");
        	$row = mysql_fetch_array($result);
        	?>
        	<div id="event_result">
        	<p style="color:#f00;">Team Registration Successful :)</p>
        		<table>
        			<tr>
        				<td>
        					Event Name
        				</td>
        				<td>
        					<?php echo $_SESSION['event_name']; ?>
        				</td>
        			</tr>
        			<tr>
        				<td>
        					Team ID
        				</td>
        				<td>
        					<strong><?php echo $_SESSION['event_prefix'].$row['teamid']; ?></strong>
        				</td>
        			</tr>
        			<tr style="test-align:center;">
        				<td colspan="2">
        					Team Members
        				</td>
        			</tr>
        			<?php for ( $i=1; $i<=$_SESSION['team_size']; $i++) { ?>
        				<tr>
        					<td>
        						Member<?php echo $i; ?>
        					</td>
        					<td>
        						<?php echo $row['member'.$i]; ?>
        					</td>
        				</tr>
        			<?php } ?>
        		</table>
        	</div>
        	<?php 
        }
        ?>
        <div id="linkback">
        	<p><a href="events_reg.php">Make Another Event Registration</a></p>
        </div>
		<div id="footer">
			<br/><br/><br/>
			&copy; 7th Sense 2010 
		</div>
	</div>
</body>
</html>
<?php
	unset($_SESSION['event_id']);
    unset($_SESSION['event_name']);
    unset($_SESSION['event_prefix']);
    unset($_SESSION['team_size']);
    unset($_SESSION['limit']);
    unset($_SESSION['entry_fee']); 
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
	
	div#header, div#footer {
		height:100px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><p style="text-align:left;float:left;width:80%;margin:0px;padding:0px;"><a href="regdeskdashboard.php">RegDesk Dashboard</a></p><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Event Registration Dashboard</span></h1>
		</div>
		<div id="eventlistformdiv">
			<form name="eventlistform" action="" method="post">
				<table>
					<tr>
						<td colspan="2">
							Select Event Name
						</td>
					</tr>
					<tr>
						<td>
						<select  name="event">
						 	<option value="false" selected="selected">--</option>
							<!-- <option value="1">1.Code Breaker (3, 30)</option> -->
							<option value="2">2.Net Slam (2,50)</option>
							<!-- <option value="3">3.DrunchCode(3,60)</option> -->
							<!-- <option value="4">4.Code Maestros (2,50)</option> -->
							<!-- <option value="5">5.Black &amp; White (3,30)</option> -->
							<option value="6">6.Web Lords (2,40)</option>
							<option value="7">7.Black Hole (2,150)</option>
							<option value="8">8.Techie Thought (1,50)</option>
							<option value="9">9.Counter Mind (2,40)</option>
							<!-- <option value="10">10.Tech Tatva (1,180)</option> -->
							<!-- <option value="11">11.Ad Zap (5,40)</option> -->
							<!-- <option value="12">12.Treasure Hunt (2,50)</option> -->
							<option value="13">13.Back 2 Skool (2,50)</option>
							<option value="14">14.Crazy Bazaar (3,50)</option>
							<!-- <option value="15">15.7 C++ ()</option> -->
							<!-- <option value="17">17.Forum Signature (1,1000)</option> -->
							<!-- <option value="18">18.Mozilla Personas Designing ()</option> -->
							<option value="20">20.Internal Event (1,100000)</option>
							<!-- <option value="22">22.Chain (FIFA, AOE, Most Wanted) (4,70)</option> -->
							<!-- <option value="23">23.DOTA, Counter Strike (5,70)</option> -->
							<option value="24">24.Play Station 2 (Taken, Burnout, Smack Down) (1,150)</option>
							<!-- <option value="25">25.Demo Rag (Paper Presentation) (1,40)</option> -->
							<!-- <option value="26">26.Quizar (7th Sense Main Quiz) (2,50)</option> -->
							<option value="27">27.Placement La Craquer (1,100)</option>
							<option value="28">28.SudoKode (1,100)</option>
						</select>
						</td>
						<td>
							<input type="submit" name="proceed" value="proceed" onclick="return validate(); function validate() {if(document.eventlistform.event.value == 'false') return false; else return true;}"/>
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