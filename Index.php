<html>
<head>
    <meta charset="utf-8" />
    <title>Title for Lynn</title>
</head>
<body>


<?php 
 session_start();

 if ($_POST['Name'])
	{
        $user_name = "root";
        $password = "";
        $database = "Club";
        $server = "localhost";
	 $_SESSION['Auth'] = false;

        $db_handle = mysql_connect($server, $user_name, $password);
        $db_found = mysql_select_db($database, $db_handle);

        if ($db_found) {

        $SQL = "SELECT * FROM Users where User=\"" . $_POST['Name'] . "\"";
        $result = mysql_query($SQL);
        while ( $db_field = mysql_fetch_assoc($result) ) {
            if ($db_field['Pwd'] == $_POST['Pwd'])
                {
                    $_SESSION['Auth'] = true; 
?>
                    <h2>Welcome to the BPS Club Hall Management System.</h2> 
			<ul>
			    <li>
			            <a href ="Halls.php">View List of Halls</a>
			    </li>
			    <li>
			            <a href ="CalendarNew.php">View Monthly Hall Schedule</a>
			    </li>
			    <li>
			            <a href ="Bookings.php">Enter / Update Hall Bookings</a>
			    </li>
			</ul>
<?php
                    break;
                }

					                      }
        if (!$_SESSION['Auth'])
            print "<h2>Sorry, You have no access.</h2>"; 
        mysql_close($db_handle);


                         }
                    else {

        print "Database NOT Found ";
        mysql_close($db_handle);
                        }
}
else
{
 session_start();
 ?> 
<h2>Welcome! Please Login</h2>
 <form action="Index.php" method="post"> 
 <table> 
 <tr><td>Name:</td><td><input type="text" name="Name" /></td></tr> 
 <tr><td>Password:</td><td><input type="password" name="Pwd" /></td></tr> 
 <tr><td colspan="2" align="center"><input type="submit" /></td></tr> 
 </table> 
 </form> 
</body>
</html>
<?php
 
 }
 ?>
