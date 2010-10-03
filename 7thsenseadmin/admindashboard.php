<?php
session_start();
if(!isset($_SESSION['adminmail']))
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
		width: 100%;
		min-height: 500px;
	}
	div#header, div#footer {
		height:100px;
	}
	div#sidebar {
		width: 250px;
		float: left;
		min-height: 500px;
	}
	div#content {
		min-width: 774px;
		min-height: 500px;
		margin: 0px 0px 0px 250px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="headline" style="text-align:right;width:100%;font-size:14px;"><a href="logout.php">logout</a></div>
			<h1><span style="font-family:Verdana;font-size:20px; color:#006633"><span style="color:#003399;">7th Sense -</span> Admin Dashboard</span></h1>
		</div>
		<div id="sidebar">
			<ul>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."SR";?>">SPOT REG Participant List</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."OL";?>">ONLINE REG Participant List</a></li>
				<li><a href="regdesk_adduser.php">Registration Desk User Accounts</a></li>
			</ul>
			<p><strong>Event List</strong></p>
			<ol>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."1";?>">Code Breaker</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."2";?>">Net Slam</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."3";?>">DrunchCode</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."4";?>">Code Maestros</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."5";?>">Black &amp; White</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."6";?>">Web Lords</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."7";?>">Black Hole</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."8";?>">Techie Thought</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."9";?>">Counter Mind</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."10";?>">Tech Tatva</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."11";?>">Ad Zap</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."12";?>">Treasure Hunt</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."13";?>">Back 2 Skool</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."14";?>">Crazy Bazaar</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."15";?>">7 C++</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."16";?>">Ideate</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."17";?>">Forum Signature</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."18";?>">Mozilla Personas Designing</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."19";?>">Not Just Geeks</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."20";?>">Internal Event</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."21";?>">Pro-Gamers</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."22";?>">Chain (FIFA, AOE, Most Wanted)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."23";?>">DOTA, Counter Strike</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."24";?>">Play Station 2 (Quake, Burnout)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."25";?>">Demo Rag (Paper Presentation)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."26";?>">Quizar (7th Sense Main Quiz)</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."27";?>">Placement La Craquer</a></li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']."?rnd=".rand()."&evnt="."28";?>">SudoKode</a></li>
			</ol>
		</div>
		<div id="content">
			<?php
			$eventid = $_GET['evnt'];
			if( ($eventid<29 && $eventid>0 ))
			{
				?>
				<div id="evnt_table">
				<h2>Event <?php echo $_GET['evnt']; ?></h2>
				<?php
				require_once("config.php");
				$cont = mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        		$selectdb = mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        		$query = "select DISTINCT user_details.id, user_details.first_name, user_details.last_name, user_details.email, user_details.phone, user_details.college from user_details inner join event_details on user_details.id = event_details.id where event_details.eventid=".$eventid." ORDER BY user_details.id";
        		$result = mysql_query($query);
				?>
				<table border="1">
					<tr>
						<td>
							RegID
						</td>
						<td>
							First Name
						</td>
						<td>
							Last Name
						</td>
						<td>
							Email
						</td>
						<td>
							Phone
						</td>
						<td>
							College
						</td>
					</tr>
					<?php
					while ($row = mysql_fetch_array( $result ))
					{
						echo "<tr>";
							echo "<td>";
								echo "OL-".$row['id'];
							echo "</td>";
							echo "<td>";
								echo $row['first_name'];
							echo "</td>";
							echo "<td>";
								echo $row['last_name'];
							echo "</td>";
							echo "<td>";
								echo $row['email'];
							echo "</td>";
							echo "<td>";
								echo $row['phone'];
							echo "</td>";
							echo "<td>";
								echo $row['college'];
							echo "</td>";
						echo "</tr>";
					}
					mysql_close($cont);
					?>
				</table>
				</div>
				<?php
			}
			else if ( $eventid == "OL")
			{
				?>
				<div id="par_table">
					<?php
					require_once("config.php");
					$cont = mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        			$selectdb = mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        			$query = "select * from $dbtbl_reg_details ORDER BY user_details.id";
        			$result = mysql_query($query);
        			?>
					<table border="1">
						<tr>
							<td>
								Regid
							</td>
							<td>
								first_name
							</td>
							<td>
								last_name
							</td>
							<td>
								dob
							</td>
							<td>
								sex
							</td>
							<td>
								email
							</td>
							<td>
								phone
							</td>
							<td>
								college_id
							</td>
							<td>
								degree
							</td>
							<td>
								year
							</td>
							<td>
								course
							</td>
							<td>
								college
							</td>
							<td>
								address
							</td>
							<td>
								city
							</td>
							<td>
								state
							</td>
							<td>
								pin_code
							</td>
						</tr>
						<?php 
						while ($row = mysql_fetch_array( $result ))
						{
						echo "<tr>";
							echo "<td>";
								echo "OL-".$row['id'];
							echo "</td>";
							echo "<td>";
								echo $row['first_name'];
							echo "</td>";
							echo "<td>";
								echo $row['last_name'];
							echo "</td>";
							echo "<td>";
								echo $row['dob'];
							echo "</td>";
							echo "<td>";
								echo $row['sex'];
							echo "</td>";
							echo "<td>";
								echo $row['email'];
							echo "</td>";
							echo "<td>";
								echo $row['phone'];
							echo "</td>";
							echo "<td>";
								echo $row['college_id'];
							echo "</td>";
							echo "<td>";
								echo $row['degree'];
							echo "</td>";
							echo "<td>";
								echo $row['year'];
							echo "</td>";
							echo "<td>";
								echo $row['course'];
							echo "</td>";
							echo "<td>";
								echo $row['college'];
							echo "</td>";
							echo "<td>";
								echo $row['address'];
							echo "</td>";
							echo "<td>";
								echo $row['city'];
							echo "</td>";
							echo "<td>";
								echo $row['state'];
							echo "</td>";
							echo "<td>";
								echo $row['pin_code'];
							echo "</td>";
						echo "</tr>"; 
						}
						mysql_close($cont);
						?>
					</table>
				</div>
				<?php
			}
			else if ( $eventid == "SR")
			{
				?>
				<div id="par_table">
					<?php
					require_once("config.php");
					$cont = mysql_connect($dbhost,$dbuser,$dbpass) or die("Error Connecting the Database");
        			$selectdb = mysql_select_db($dbselect,$cont) or die("Error in Selecting Database");
        			$query = "select * from $dbtbl_regdesk_participant_details ORDER BY $dbtbl_regdesk_participant_details.id";
        			$result = mysql_query($query);
        			?>
        			id	full_name	department	college_id	college	city	phone	email
					<table border="1">
						<tr>
							<td>
								Regid
							</td>
							<td>
								full_name
							</td>
							<td>
								department
							</td>
							<td>
								college_id
							</td>
							<td>
								college
							</td>
							<td>
								city
							</td>
							<td>
								phone
							</td>
							<td>
								email
							</td>
						</tr>
						<?php 
						while ($row = mysql_fetch_array( $result ))
						{
						echo "<tr>";
							echo "<td>";
								echo "SR-".$row['id'];
							echo "</td>";
							echo "<td>";
								echo $row['full_name'];
							echo "</td>";
							echo "<td>";
								echo $row['department'];
							echo "</td>";
							echo "<td>";
								echo $row['college_id'];
							echo "</td>";
							echo "<td>";
								echo $row['college'];
							echo "</td>";
							echo "<td>";
								echo $row['city'];
							echo "</td>";
							echo "<td>";
								echo $row['phone'];
							echo "</td>";
							echo "<td>";
								echo $row['email'];
							echo "</td>";
						echo "</tr>"; 
						}
						mysql_close($cont);
						?>
					</table>
				</div>
				<?php
			}
			?>
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