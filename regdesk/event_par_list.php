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
	<title>Equiry - Mobile Registartions - 7th Sense</title>
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
		width: 1000px;
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
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">Equiry - Event Registartions List -</span> 7th Sense</span></h1>
		</div>
	<?php
	if($_GET['eventid']>0 && $_GET['eventid']<29 && $_GET['eventid']!=16 && $_GET['eventid']!=19 && $_GET['eventid']!=21)
	{
		require_once("config.php");
		$cont=mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
    	$selectdb=mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
    
    	$eventid = mysql_real_escape_string($_GET['eventid']);
    	
    	$query = "SELECT * FROM `event_meta` WHERE `event_id`='$eventid'";
    	$result = mysql_query($query) or die("db error1");
		$row = mysql_fetch_array($result);
		$event_name = $row['event_name'];
		$event_prefix = $row['prefix'];
		$team_size = $row['team_size'];
		$limit = $row['limit'];
    	
    	$query = "SELECT * FROM `event".$eventid."`";
    	$result = mysql_query($query) or die("db error1");
    	$num = mysql_num_rows($result);
    	?>
    	<h3>Event: <?php echo $event_name; ?> || Total Teams: <?php echo $num?></h3><h4><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand();?> ">&lt;&lt;back</a></h4>
    	<table border="1">
    	<tr>
    		<td>
    			RegID
    		</td>
    		<td>
    			Name
    		</td>
    		<td>
    			College
    		</td>
    		<td>
    			Phone
    		</td>
    	</tr>
    	<?php
    	while($row = mysql_fetch_array($result))
    	{
    		?>
    		<tr style="text-align:center;">
    			<td colspan="4">
    				<strong><?php echo $event_prefix.$row['teamid'];?></strong>
    			</td>
    		</tr>
    		<?php for ( $i=1; $i<=$team_size; $i++ ) {
    		if($row['member'.$i]!='NA')
    			{
    				list($regprefix, $regnum) = split('[-]', $row['member'.$i]);
    				if($regprefix=="SR")
    				{
    					$tableselect='desk_user_details';
    					$query2 = "SELECT `full_name`, `college`, `phone` FROM $tableselect WHERE `id`='".$regnum."'";
    					$result2 = mysql_query($query2);
    					if($row2 = mysql_fetch_array($result2))
    					{
    						$name = $row2['full_name'];
    						$college = $row2['college'];
    						$phone = $row2['phone'];
    					}
    					else
    					{
    						$name = "Not Registered";
    						$college = "Not Registered";
    						$phone = "Not Registered";
    					}	
    				}
    				else if($regprefix=="OL")
    				{
    					$tableselect='user_details';
    					$query2 = "SELECT `first_name`, `last_name`, `college`, `phone` FROM $tableselect WHERE `id`='".$regnum."'";
    					$result2 = mysql_query($query2);
    					if($row2 = mysql_fetch_array($result2))
    					{
    						$name = $row2['first_name']." ".$row2['last_name'];
    						$college = $row2['college'];
    						$phone = $row2['phone'];
    					}
    					else
    					{
    						$name = "Not Registered";
    						$college = "Not Registered";
    						$phone = "Not Registered";
    					}
    				}
    				else if($regprefix=="MO")
    				{
    					$tableselect='mobile_user_details';
    					$query2 = "SELECT `full_name`, `college`, `phone` FROM $tableselect WHERE `id`='".$regnum."'";
    					$result2 = mysql_query($query2);
    					if($row2 = mysql_fetch_array($result2))
    					{
    						$name = $row2['full_name'];
    						$college = $row2['college'];
    						$phone = $row2['phone'];
    					}
    					else
    					{
    						$name = "Not Registered";
    						$college = "Not Registered";
    						$phone = "Not Registered";
    					}
    				}
    				else
    				{
    					$name = "Prefix Doesnot Exist";
    					$college = "Prefix Doesnot Exist";
    					$phone = "Prefix Doesnot Exist";
    				}
    			}
    			else
    			{
    				$name = "NA";
    				$college = "NA";
    				$phone = "NA";
    			}
    		?>
    			<tr>
    				<td>
    					<?php echo $row['member'.$i];?>
    				</td>
    				<td>
    					<?php echo $name;?>
    				</td>
    				<td>
    					<?php echo $college;?>
    				</td>
    				<td>
    					<?php echo $phone;?>
    				</td>
    			</tr>
    		<?php }?>
    		<tr>
    			<td colspan="4">
    				&nbsp;
    			</td>
    		</tr>
    		<?php
    	}
		?>
		</table>
		<?php
	}
	else
	{
?>
		<div id="links">
			<p><strong>Event List</strong></p>
			<ol>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."1";?>">Code Breaker</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."2";?>">Net Slam</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."3";?>">DrunchCode</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."4";?>">Code Maestros</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."5";?>">Black &amp; White</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."6";?>">Web Lords</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."7";?>">Black Hole</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."8";?>">Techie Thought</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."9";?>">Counter Mind</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."10";?>">Tech Tatva</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."11";?>">Ad Zap</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."12";?>">Treasure Hunt</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."13";?>">Back 2 Skool</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."14";?>">Crazy Bazaar</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."15";?>">7 C++</a></li>
				<li><a href="<?php //echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."16";?>"><del>Ideate</del></a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."17";?>">Forum Signature</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."18";?>">Mozilla Personas Designing</a></li>
				<li><a href="<?php //echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."19";?>"><del>Not Just Geeks</del></a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."20";?>">Internal Event</a></li>
				<li><a href="<?php //echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."21";?>"><del>Pro-Gamers</del></a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."22";?>">Chain (FIFA, AOE, Most Wanted)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."23";?>">DOTA, Counter Strike</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."24";?>">Play Station 2 (Quake, Burnout)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."25";?>">Demo Rag (Paper Presentation)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."26";?>">Quizar (7th Sense Main Quiz)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."27";?>">Placement La Craquer</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&eventid="."28";?>">SudoKode</a></li>
			</ol>
		</div>
<?php	
	}
?>
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