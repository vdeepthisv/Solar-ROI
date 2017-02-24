<?php
$con=mysql_connect("localhost","vsrivole","vs2738");  
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}   
mysql_select_db("vsrivole",$con);
$result=mysql_query("select month,hours,month_name from Sundata",$con);

echo "<table border='1' >
<tr>
<td align=center> <b>month</b></td>
<td align=center><b>hours</b></td>
<td align=center><b>month_name</b></td>";

while($data = mysql_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "</tr>";
}
echo "</table>";
?>