<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>


<?php

	session_start();
	$_SESSION['Auth'] = true;
        if (!$_SESSION['Auth'])
            print "<h2>Sorry, You have no access.</h2>"; 
        else 
		{



    $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

    mysql_select_db("Club", $con);


if ($_POST[HallID])
{

$sql="delete from Bookings where HallID=" . $_POST[HallID] . " and BkDate=\"" . $_POST[BkDate] . "\"";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



$sql="INSERT INTO Bookings (HallID, BkDate, HSID, Person, Reason)
VALUES
('$_POST[HallID]','$_POST[BkDate]','$_POST[HSID]','$_POST[Person]','$_POST[Reason]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";


}
//When the form first loads

	$sql="Select * from Halls";
    $result = mysql_query($sql);



?> 


 <form action="Bookings.php" method="post"> 
 <table> 
 <tr><td>Hall:</td><td><select name='HallID'>
 <?php
	while($row = mysql_fetch_assoc($result)) 
	{
	  print "\r\n<option value='{$row['HallID']}' ";
	  if ($row['HallID']==$_GET['h']) 
		print "selected";
	  print ">{$row['HallName']}</option>"; 
	}
?>    
 	\r\n</select>
	
    
      </td></tr> 
 
     
     <tr><td>Date (yyyy-mm-dd):</td><td><input type="text" name="BkDate" value="<?php print $_GET['d']; ?>" /></td></tr> 
 
     <?php 
	$sql="Select * from Hall_Status";
    $result = mysql_query($sql);

?>
     
     
     <tr><td>Booked For:</td><td><select name='HSID'>
 <?php
	while($row = mysql_fetch_assoc($result))
	{ 
	  print "\r\n<option value='{$row['HSID']}' ";
	  if ($row['HSID']==$_GET['b'])
		 print "selected";
	  print ">{$row['HSName']}</option>";
	}
    mysql_close($con);
?>    
 	\r\n</select>
        
         
         </td></tr> 
 <tr><td>Person:</td><td><input type="text" name="Person" value="<?php print $_GET['p']; ?>" /></td></tr> 
 <tr><td>Reason:</td><td><input type="text" name="Reason" value="<?php print $_GET['r']; ?>" /></td></tr> 

 <tr><td colspan="2" align="center"><input type="submit"  /></td></tr> 
 </table> 
 </form> 

<?php
	} //of auth
?>

</body>
</html>
