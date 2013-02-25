<?php

$dbhost = 'YOUR_SERVER';
$dbuser = 'YOUR_USERNAME';
$dbpass = 'YOUR_PASSWORD';
$dbname = 'YOUR_DATABASE_NAME';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$return_arr = array();

if ($conn)
{
    $fetch = mysql_query("SELECT zip, city FROM zips WHERE state_abbrev = '" . mysql_real_escape_string($_GET['filter']) . "' AND zip like '" . mysql_real_escape_string($_GET['term']) . "%' LIMIT 20"); 
    
    /* Retrieve and store in array the results of the query.*/
    
    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['label'] = $row['zip'] . " " . $row['city'];
        $row_array['value'] = $row['zip'];
        $row_array['city'] = $row['city'];
        
        array_push($return_arr,$row_array);
    }

    
}
/* Free connection resources. */
mysql_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

?>