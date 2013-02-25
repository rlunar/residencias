<?php 
/* Connection vars here for example only. Consider a more secure method. */
$dbhost = 'YOUR_SERVER';
$dbuser = 'YOUR_USERNAME';
$dbpass = 'YOUR_PASSWORD';
$dbname = 'YOUR_DATABASE_NAME';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$return_arr = array();

/* If connection to database, run sql statement. */
if ($conn)
{
    $fetch = mysql_query("SELECT states.* FROM states where state like '%" . mysql_real_escape_string($_GET['term']) . "%'"); 
    
    /* Retrieve and store in array the results of the query.*/
    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
        $row_array['value'] = $row['state'];
        $row_array['abbrev'] = $row['abbrev'];
        
        array_push($return_arr,$row_array);
    }
}

/* Free connection resources. */
mysql_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

 ?>