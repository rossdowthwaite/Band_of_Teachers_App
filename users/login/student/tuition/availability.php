<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include '../../../includes/auth.php';
include '../../../includes/functions.php';
include '../../../includes/registration_functions.php';

sec_session_start();

if(login_check($mysqli) !== true) 
  {
  header('Location: ../../login.php');
  }

if(!isset($_SESSION['genres']))
	{
			echo "<script>";
			echo "window.location = \"tuition_process_fail.php\";";
			echo "</script>";
	}

?>

<!DOCTYPE html>
<html lang = en>

<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
	<script type="text/javascript" src="../../../javascripts/sha512.js"></script>
	<script type="text/javascript" src="../../../javascripts/forms.js"></script>
  <script type="text/javascript" src="../../../javascripts/tuition.js"></script>
	<script type="text/javascript" src="../../../javascripts/register_user.js"></script>  <!-- used to register new user - validates input-->

	<title>Template</title>
<head/>
<body>
<?php

  echo $_SESSION['stu_ID'] . '<br>';
  echo $_SESSION['stu_name'] . '<br>';

?>
	<div id='main'>
	<center><table width=600px>
		<tr>
			<td>Day</td><td>From</td><td>until</td>
		</tr>
		<tr>
			<td>
			<form action="process_availability.php" method="post" name="set_availability">			
			<select name="day1" id="day1">
				  <option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from1" id="from1">
				  <option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
			<td>
				<select name="until1" id="until1">
				  <option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>
    <tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day1_error" id="day1_error"></div>
        </td>
    </tr> 
		<tr>
			<td>			
			<select name="day2" id="day2">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from2" id="from2">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
			<td>
				<select name="until2" id="until2">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>
    <tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day2_error" id="day2_error"></div>
        </td>
    </tr> 
		<tr>
			<td>			
			<select name="day3" id="day3">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from3" id="from3">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
	
			<td>
				<select name="until3" id="until3">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>
    <tr>
      <td colspan=3>
        <div style="visibility: visible;" name="day3_error" id="day3_error"></div>
        </td>
    </tr> 
		<tr>
			<td>			
			<select name="day4" id="day4">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from4" id="from4">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
	
			<td>
				<select name="until4" id="until4">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>      
    <tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day4_error" id="day4_error"></div>
        </td>
    </tr> 
		<tr>
			<td>			
			<select name="day5" id="day5">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from5" id="from5">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>	
			<td>
				<select name="until5" id="until5">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>
    <tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day5_error" id="day5_error"></div>
        </td>
      </tr> 
		<tr>
			<td>			
			<select name="day6" id="day6">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from6" id="from6">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>	
			<td>
				<select name="until6" id="until6">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>
		</tr>
		<tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day6_error" id="day6_error"></div>
        </td>
    </tr>
    <tr>
			<td>			
			<select name="day7" id="day7">
				<option value="none">nope</option>
  				<option value="Monday">Monday</option>
  				<option value="Tuesday">Tuesday</option>
  				<option value="Wednesday">Wednesday</option>
  				<option value="Thursday">Thursday</option>
  				<option value="Friday">Friday</option>
  				<option value="Saturday">Saturday</option>
  				<option value="Sunday">Sunday</option>
			</select>
			</td>
			<td>
			<select name="from7" id="from7">
				<option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			</select>
			</td>	
			<td>
				<select name="until7" id="until7">
				  <option value="none">nope</option>
  				<option value="09">9am</option>
  				<option value="10">10am</option>
  				<option value="11">11am</option>
  				<option value="12">12am</option>
  				<option value="13">1pm</option>
  				<option value="14">2pm</option>
  				<option value="15">3pm</option>
  				<option value="16">4pm</option>
  				<option value="17">5pm</option>
  				<option value="18">6pm</option>
  				<option value="19">7pm</option>
  				<option value="20">8pm</option>
  				<option value="21">9pm</option>
  				<option value="22">10pm</option>
			 </select>
			</td>
		</tr>
    <tr>
        <td colspan=3>
          <div style="visibility: visible;" name="day7_error" id="day7_error"></div>
        </td>
    </tr>
		<tr><td colspan=3>
      <input class="btn_150x30" type="button" value="next" onClick="formValidateAvailability(
                                              this.form,
                                              this.form.day1,
                                              this.form.from1,
                                              this.form.until1,
                                              this.form.day2,
                                              this.form.from2,
                                              this.form.until2,
                                              this.form.day3,
                                              this.form.from3,
                                              this.form.until3,
                                              this.form.day4,
                                              this.form.from4,
                                              this.form.until4,
                                              this.form.day5,
                                              this.form.from5,
                                              this.form.until5,
                                              this.form.day6,
                                              this.form.from6,
                                              this.form.until6,
                                              this.form.day7,
                                              this.form.from7,
                                              this.form.until7)">
                                            </td></tr>

	</table>
</center>
</center>
</form>
	
	</div>	
</body>