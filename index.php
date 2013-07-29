<?php
$link = mysql_connect('sql3.freesqldatabase.com:3306', 'sql315031', 'gL5!vN7*');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>