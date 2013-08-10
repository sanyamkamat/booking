<?php 

	session_start();
	$_SESSION['Auth'] = true;
        if (!$_SESSION['Auth'])
            print "<h2>Sorry, You have no access.</h2>"; 
        else 
		{


function calendar($date) 
{ 
//If no parameter is passed use the current date. 
if($date == null){ 
$date = getDate(); 

} 
$day = $date["mday"]; 
$month = $date["mon"]; 
$month_name = $date["month"]; 
$year = $date["year"]; 
$HallID = 1;
if(isset($_GET['HallID']))
	$HallID = $_GET["HallID"];


if($_SESSION['day'])
	$day=(int)$_SESSION['day'];


if($_SESSION['month'])
    {
	$month=(int)$_SESSION['month'];
    $month_name = monthname($month); 
    }

if($_SESSION['year'])
	$year=(int)$_SESSION['year'];




if(isset($_GET['mday'])){ 
$day = $_GET["mday"]; 
$month = $_GET["mon"]; 
$month_name = $_GET["month"]; 
$year = $_GET["year"];
if($month == "0"){ 
$year = $year-1; 
$num = cal_days_in_month(CAL_GREGORIAN, 12, $year ) ; 
$day = $num; 
$month = "12"; 

} 


if($month == "13"){ 
$year = $year+1; 
$num = cal_days_in_month(CAL_GREGORIAN,1, $year ) ; 
$day = $num; 
$month = "1"; 
} 
$month_name = monthname($month); 

} 
$this_month = getDate(mktime(0, 0, 0, $month, 1, $year)); 
$next_month = getDate(mktime(0, 0, 0, $month + 1, 1, $year)); 
$prev_month1 = $month-1; 
$next_month1 = $month+1; 
$prev_month_name = monthname($prev_month1); 
$next_month_name = monthname($next_month1); 


//Find out when this month starts and ends. 


$days_in_this_month = round(($next_month[0] - $this_month[0]) / (60 * 60 * 24)); 


$first_week_day = $this_month["wday"]-1; 
$calendar_html = "<table width=80% style=\"background-color:#FAFAD2; color:#F0E68C;\">"; 

$calendar_html .= "<tr><td colspan=\"7\" align=\"center\" style=\"background-color:9999cc; color:000000;\">"." <a href='CalendarNew.php?mday=$day&mon=$prev_month1&month=$prev_month_name&year=$year&HallID=$HallID'>Previous </a>" . 
$month_name . " " . $year ." <a href='CalendarNew.php?mday=$day&mon=$next_month1&month=$next_month_name&year=$year&HallID=$HallID'>Next </a>"."</td></tr>"; 
$calendar_html .= "<tr><td style=\"color:000000;\">Mon</td><td style=\"color:000000;\">Tue</td><td style=\"color:000000;\">Wed</td><td style=\"color:000000;\">Thr</td><td style=\"color:000000;\">Fri</td><td style=\"color:000000;\">Sat</td><td style=\"color:000000;\">Sun</td></tr>"; 

$calendar_html .= "<tr>"; 





//Fill the first week of the month with the appropriate number of blanks. 
for($week_day = 0; $week_day < $first_week_day; $week_day++) 
{ 

$calendar_html .= "<td style=\"background-color:9999cc; color:000000;\"> </td>"; 
} 

$week_day = $first_week_day; 




        $user_name = "root";
        $password = "";
        $database = "Club";
        $server = "localhost";

        $db_handle = mysql_connect($server, $user_name, $password);
        $db_found = mysql_select_db($database, $db_handle);


	$sql="Select b.*, hs.HSIcon, DATE_FORMAT(BkDate, '%m') AS `month`, DATE_FORMAT(BkDate, '%d') AS `day` from Bookings  AS b INNER JOIN `Hall_Status` AS hs ON b.HSID = hs.HSID and DATE_FORMAT(BkDate, '%m')=" . $month . " and DATE_FORMAT(BkDate, '%Y') =" . $year;
        $result = mysql_query($sql);

	$rec=0;
        while ( $db_field = mysql_fetch_assoc($result) ) 
		$RecArr[$rec++] = $db_field;


	$sql="Select * from Halls";
        $result = mysql_query($sql);

$_SESSION['day'] = $day;
$_SESSION['month'] = $month;
$_SESSION['year'] = $year;


?>
	 To Choose another hall, select from the list and click submit: 
	<form action="CalendarNew.php" method="get">
	<select name='HallID'>
<?php
	while($row = mysql_fetch_assoc($result)) {
	  print "\r\n<option value='{$row['HallID']}' ";
		if ($row['HallID']==$HallID){
			$SelectedHall=$row['HallName'];   
			print "selected";
						}
	  print ">{$row['HallName']}</option>";

							}

?>
	\r\n</select>
	<input type="submit" />
	</form>
<br>
<br>
<h3> Your Currently Selected Hall is : 

<?php

Print $SelectedHall . "</h3>";

for($day_counter = 1; $day_counter <= $days_in_this_month; $day_counter++) 
{ 

$week_day %= 7; 

if($week_day == 0) 
$calendar_html .= "</tr><tr>"; 



$Is_Bkd=false;
$calendar_html .= "<td align=\"center\" style=\"background-color:9999cc; color:000000;\">&nbsp;" . $day_counter;          
for ($i = 0; $i < $rec; $i++) 
	if((int)$RecArr[$i]['day']==$day_counter)
	{
		$calendar_html .= "<br>Hall:". $RecArr[$i]['HallID'] . "<img src=\"img/" . $RecArr[$i]['HSIcon'] . "\"><br> " . $RecArr[$i]['Person'] . "<br>" . $RecArr[$i]['Reason']; 
		$Is_Bkd=true;
	}
 $calendar_html .= $Is_Bkd ? "</td>" : "</td>"; 



$week_day++; 

} 

$calendar_html .= "</tr>"; 
$calendar_html .= "</table>"; 

return($calendar_html); 
} 

function monthname($month){ 

switch($month){ 
case 1 : $month_name = 'January'; 
return $month_name; 
break; 
case 2 : $month_name = 'February'; 
return $month_name; 
break; 
case 3 : $month_name = 'March'; 
return $month_name; 
break; 
case 4 : $month_name = 'April'; 
return $month_name; 
break; 
case 5 : $month_name = 'May'; 
return $month_name; 
break; 
case 6 : $month_name = 'June'; 
return $month_name; 
break; 
case 7 : $month_name = 'July'; 
return $month_name; 
break; 
case 8 : $month_name = 'August'; 
return $month_name; 
break; 
case 9 : $month_name = 'September'; 
return $month_name; 
break; 
case 10 : $month_name = 'October'; 
return $month_name; 
break; 
case 11 : $month_name = 'November'; 
return $month_name; 
break; 
case 12 : $month_name = 'December'; 
return $month_name; 
break; 

} 

} 
echo	$val = calendar(getDate()); 
mysql_close($con);

} //of auth

?> 

