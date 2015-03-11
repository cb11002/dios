<?php

#Basic Line
require 'conn/connection.php';

$result = mysql_query("SELECT Name AS BULAN, Total_Login AS JUMLAH FROM tutor GROUP BY Name");

$bln = array();
$bln['name'] = 'Bulan';
$rows['name'] = 'Total Login';
while ($r = mysql_fetch_array($result)) {
    $bln['data'][] = $r['BULAN'];
    $rows['data'][] = $r['JUMLAH'];
}
$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


