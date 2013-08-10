<html>
<?php
	session_start();
	$_SESSION['Auth'] = true;
        if (!$_SESSION['Auth'])
            print "<h2>Sorry, You have no access.</h2>"; 
        else 
		{

	print "<h2>List of Halls in BPS Club</h2>";
        $user_name = "root";
        $password = "";
        $database = "Club";
        $server = "localhost";

        $db_handle = mysql_connect($server, $user_name, $password);
        $db_found = mysql_select_db($database, $db_handle);

        if ($db_found) {

        $SQL = "SELECT * FROM Halls";
        $result = mysql_query($SQL);
	print "<table width=80%>";
        while ( $db_field = mysql_fetch_assoc($result) ) 
		{
		print "<tr><td><a href=CalendarNew.php?HallID=" . $db_field['HallID'] . ">" . $db_field['HallName'] . "</a></td><td>" . $db_field['Description'] . "</td><td><img width=100 src=\"img/" . $db_field['ImgName'] . "\"></td></tr>";
		}
	print "</table>";

        mysql_close($db_handle);


                         }
                    else {

        print "Database NOT Found ";
        mysql_close($db_handle);
                        }

	} //of auth
?>
</html>