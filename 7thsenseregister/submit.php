<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <title>Common Registration - Seventh Sense 2010</title>
    <link rel="stylesheet" type="text/css" href="verify.css" />
</head>
<body>
<?php
if ($_GET['key'] == "7th-s3ns3-".sha1(md5($_GET['email']))."-verify")
{
  $cont=mysql_connect('xxxx','xxx','xxx');
  $seldatabase=mysql_select_db('seventhsense10',$cont);
  $email = $_GET['email'];
  if($cont)
  {
    if(!mysql_num_rows(mysql_query("SELECT email FROM user_details WHERE email = '$email'")))
    {
    if (isset($_POST['details']))
    {
        //form variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$dob = ($yyyy =$_POST['yyyy'])."-".($mm =$_POST['mm'])."-".($dd=$_POST['dd']);
        $sex = $_POST['sex'];
        $email = $_GET['email'];
	$phone = "+91-".$_POST['phone'];
	$degree = $_POST['degree'];
	$course = $_POST['course'];
        $year = $_POST['year'];
	$college = $_POST['college'];
	$college_id = $_POST['college_id'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $pin_code = $_POST['pin_code'];
	$password = $_POST['password'];
        $re_password = $_POST['re_password'];

        //regex error catch
        //for form validation
        $result = true;
        $error_message = "";
        if(!preg_match('/^[A-Za-z\. ]{1,40}$/', $first_name))
        {
            $result = false;
            $error_message.= "First Name, ";
        }
        if(!preg_match('/^[A-Za-z\. ]{1,40}$/', $last_name))
        {
            $result = false;
            $error_message.= "Last Name, ";            
        }
        //date validation
        if(!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $dob))
        {
            $result = false;
            $error_message.= "Date Of Birth, ";
        }
        else
        {
            if (!($yyyy>1900 && $yyyy<2010))
            {
                $result = false;
                $error_message.= "Year Birth, ";
            }
            if (!($mm<=12 && $dd<=31))
            {
                $result = false;
                $error_message.= "Date Of Birth Format, ";
            }
            if ($mm==1||$mm==3||$mm==5||$mm==7||$mm==8||$mm==10||$mm==12)
            {
                if ($dd>31)
                {
                    $result = false;
                    $error_message.= "Day And Month Relationship, ";   
                }
            }
            else
            {
                if ($mm == 2)
                {
                    if(($yyyy%4)==0)
                    {
                        if($dd>29)
                        {
                            $result = false;
                            $error_message.= "Day And Month Relationship, ";                            
                        }
                    }
                    else
                    {
                        if($dd>28)
                        {
                            $result = false;
                            $error_message.= "Day And Month Relationship, ";                            
                        }
                    }
                }
                else
                {
                    if($dd>30)
                    {
                        $result = false;
                        $error_message.= "Day And Month Relationship, ";
                    }
                }
            }
        }
        if(!($sex=='male'||$sex=='female'))
        {
            $result = false;
            $error_message.= "Gender Selection, ";
        }
        if(!preg_match('/^\+91\-[0-9]{10}$/', $phone))
        {
            $result = false;
            $error_message.= "Phone Number, ";
        }
        if(!preg_match('/^[A-Za-z0-9_\.\- ]{1,20}$/', $college_id))
        {
            $result = false;
            $error_message.= "College ID, ";
        }        
        if(!preg_match('/^[A-Za-z0-9]{1}[A-Za-z0-9\.\-\, ]{0,38}[A-Za-z0-9\. ]{1}$/', $degree))
        {
            $result = false;
            $error_message.= "Degree, ";
        }
        if(!preg_match('/^[A-Za-z0-9]{1}[A-Za-z0-9\.\-\, ]{0,38}[A-Za-z0-9\. ]{1}$/', $course))
        {
            $result = false;
            $error_message.= "Dept., ";
        }
        if(!preg_match('/^[A-Za-z0-9]{1}[A-Za-z0-9\.\-\, ]{0,38}[A-Za-z0-9\. ]{1}$/', $college))
        {
            $result = false;
            $error_message.= "College, ";
        }
        if(strlen($address)>200)
        {
            $result = false;
            $error_message.= "Address, ";
        }
        if(!preg_match('/^[A-Za-z]{1}[A-Za-z\-\, ]{0,28}[A-Za-z\. ]{1}$/', $city))
        {
            $result = false;
            $error_message.= "City, ";
        }
        if(!preg_match('/^[A-Za-z]{1}[A-Za-z\-\, ]{0,28}[A-Za-z\. ]{1}$/', $state) || $state=='false')
        {
            $result = false;
            $error_message.= "State, ";
        }
        if(!preg_match('/^[0-9]{6}$/', $pin_code))
        {
            $result = false;
            $error_message.= "PIN code, ";
        }
        if(!preg_match('/^[^\<\>\{\}\[\]\(\)]{6,255}$/', $password))
        {
            $result = false;
            $error_message.= "Password, ";            
        }
        if(!preg_match('/^[^\<\>\{\}\[\]\(\)]{6,255}$/', $re_password) || $password != $re_password)
        {
            $result = false;
            $error_message.= "Confirm Password, ";            
        }
        if (!preg_match('/^[A-Za-z0-9_-]+[A-Za-z0-9_.-]*@[A-Za-z0-9_-]+[A-Za-z0-9_.-]*\.[A-Za-z]{2,5}$/', $email) && !preg_match('/^[^!]{6,50}$/', $email))
        {
            $result = false;
            $error_message.= "Email Address, ";            
        }
        
        //display logic
        if (!$result)
        {
            echo '<div id="submit">'."there is something worng with following fields:</br>".$error_message.'</br>please <strong>enable javascript on your webbrowser</strong> to catch errors.'.'</div>';
        }
    else
    {
        $password_hash = sha1($password);
        if($cont)
        {
        $insert = "INSERT INTO user_details(first_name,last_name,dob,sex,email,phone,degree,course,year,college,college_id,city,state,password,address,pin_code) VALUES('".$first_name."','".$last_name."','".$dob."','".$sex."','".$email."','".$phone."','".$degree."','".$course."','".$year."','".$college."','".$college_id."','".$city."','".$state."','".$password_hash."','".$address."','".$pin_code."')";
            $query=mysql_query($insert);
            if($query)
            {
                echo '<div id="submit">'."Hi ".$first_name." ".$last_name."! you have been registered successfully... :)</br>".'</div>';
            }
            else
            {
                echo '<div id="submit">'."database error: user info cannot be stored in the database, possible email address duplication, register yourself with a different email address</br>".'</div>';
            }
        }
        else
        {
		echo '<div id="submit">'.'database error: database not connected</br>'.'</div>';
        }
    }
}
else
{
?>
<div id="submit_form">
<script src="validate_details.js"></script>
<form name="details" action="" method="post" autocomplete="off">
<caption><span id="form_caption">Seventh Sense Common Registration Form</span></caption>
<table border="0" style='table-layout:fixed'>
    <col width=120>
    <col width=187>
    <tr>
        <td width="120px"><span class="form_details">First Name</span></td>
        <td width="187px"><input type="text" name="first_name"  value="" size="20" maxlength="40" style="width:185px;"><span id="first_name_dom" class="form_dom"></span></td>
    </tr>
    <tr>        
        <td><span class="form_details">Last Name</span></td>
        <td><input type="text" name="last_name"  value="" size="20" maxlength="40" style="width:185px;"><span id="last_name_dom" class="form_dom"></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td width=""><span class="form_details">Date Of Birth</span></td>
        <td><select name="dd" style="width:55px;margin: 4px 0px;">
                <option value="false" selected="selected">DD</option>
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
            </select>
            <select name="mm" style="width:55px;">
                <option value="false" selected="selected">MM</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">Mar</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">Jul</option>
                <option value="08">Aug</option>
                <option value="09">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
            <input type="text" name="yyyy"  value="" size="5" maxlength="4" style="width:65px;" />
            <span id="dd_dom" class="form_dom"></span>
            <span id="mm_dom" class="form_dom"></span>
            <span id="yyyy_dom" class="form_dom"></span>
        </td>
    </tr>
    <tr>
        <td><span class="form_details">Gender</span></td>
        <td>
            <input type="radio" name="sex" value="male"/>
            <span class="mf">male</span>
            <input type="radio" name="sex" value="female"/>
            <span class="mf">female</span>
            <span id="sex_dom" class="form_dom"></span>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td><span class="form_details">Phone</span></td>
        <td><span id="phone_code">+91 - </span><input type="text" name="phone"  value="" size="15" maxlength="10" style="width:140px;"><span id="phone_dom" class="form_dom"></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>        
        <td><span class="form_details">College ID</span></td>
        <td><input type="text" name="college_id"  value="" size="20" maxlength="20" style="width:185px;"><span id="college_id_dom" class="form_dom"></span></td>
    </tr>
    <tr>
        <td><span class="form_details">Degree</span></td>
        <td><input type="text" name="degree"  value="" size="10" maxlength="40" style="width:99px;">
            <span class="form_details">Year</span>
            <select name="year" style="width:45px;">
                <option value="false" selected="selected">--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select><span id="degree_dom" class="form_dom"></span><span id="year_dom" class="form_dom"></span>
        </td>
    <tr>
        <td><span class="form_details">Dept.</span></td>
        <td><input type="text" name="course"  value="" size="20" maxlength="40" style="width:185px;"><span id="course_dom" class="form_dom"></span></td>
    </tr>
    <tr>
        <td><span class="form_details">College</span></td>
        <td><input type="text" name="college"  value="" size="20" maxlength="40" style="width:185px;"><span id="college_dom" class="form_dom"></span></td>
    </tr>
    <tr>
        <td width=""><span class="form_details">Mailing Address<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/></span></td>
        <td><textarea rows="5" cols="23" type="text" name="address"  value="" maxlength="200" style="width:185px;resize:none;"></textarea><span id="address_dom" class="form_dom"></span></td>
    </tr>
    <tr>
        <td width=""><span class="form_details">City</span></td>
        <td><input type="text" name="city"  value="" size="20" maxlength="30" style="width:185px;"><span id="city_dom" class="form_dom"></span></td>
    </tr>
    <tr>
        <td><span class="form_details">State</span></td>
        <td><select name="state" style="width:185px;">
                <option value="false" selected="selected">-select-</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Orissa">Orissa</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            <span id="state_dom" class="form_dom"></span>
        </td>
    </tr>
    <tr>        
    <td><span class="form_details">PIN code</span></td>
    <td><input type="text" name="pin_code"  value="" size="20" maxlength="6" style="width:185px;"><span id="pin_code_dom" class="form_dom"></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td width=""><span class="form_details">Password</span></td>
        <td><input type="password" name="password"  value="" size="20" maxlength="255" style="width:185px;"><span id="password_dom" class="form_dom"><span class="form_info_dom"></br>&nbsp;&nbsp;should be atleast 6 characters long</span></span></td>
    </tr>
    <tr>
        <td><span class="form_details">Confirm Password</span></td>
        <td><input type="password" name="re_password"  value="" size="20" maxlength="255" style="width:185px;"><span id="re_password_dom" class="form_dom"></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr id="signupbutton">
        <td colspan="2"><input type="submit" value="Sign Up" name="details" onclick="return validate();"/></td>
    </tr>
</table>
</form>
</div>
<?php
    }
    }
    else
    {
        echo '<div id="submit">'.'This link has been expired, email-id already being used.</br>'.'</div>';
    }
  }
  else
  {
    echo '<div id="submit">'.'database error: database not connected</br>'.'</div>';
  }
}
else {
    echo "this page is not valid";
}
?>
</div>
</center>
</body>
</html>
