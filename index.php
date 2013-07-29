<!DOCTYPE html>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
table 
{
width:50%;
float:left;
}
@font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: local('Open Sans'), local('OpenSans'), url(http://themes.googleusercontent.com/static/fonts/opensans/v6/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
}
</style>
</head>

<?php
$con = mysql_connect('sql3.freesqldatabase.com:3306', 'sql315031', 'gL5!vN7*');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$result = mysqli_query($con,"SELECT * FROM intern");

echo "<div><table border='1'>
<tr>
<th>Name</th>
<th>Mail Id</th>
<th>University</th>
<th>research</th>
<th>relcourse</th>
<th>Status</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['mail_id'] . "</td>";
  echo "<td>" . $row['university'] . "</td>";
  echo "<td>" . $row['research'] . "</td>";
  echo "<td>" . $row['relcourse'] . "</td>";
  if ($row['status'] == '0'){
    echo "<td>Pending</td>";    
  }
  else{
    echo "<td>Sent</td>";  
  }
  echo "</tr>";
  }
echo "</table></div>";
if($_POST){
$sql="INSERT INTO intern (name,mail_id,university,research,relcourse) 
VALUES ($_POST[name],$_POST[mail],$_POST[univ],$_POST[research],$_POST[relcourse])";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
else{
    $suc = "record added";
}
}
mysql_close($con);
?>
<body>
<form style="float:right; width:50%;" action="index.php" method="post">
<input type="text" name="name" placeholder="Name"><br/>
<input type="text" name="mail" placeholder="Email Id"><br/>
<input type="text" name="univ" placeholder="University"><br/>
<input type="text" name="research" placeholder="Research"><br/>
<textarea rows="10" cols="30" name="relcourse" placeholder="Relcourse">
</textarea><br/>
<input type="submit">
</form>
<br/><br/>
<?php $suc; ?>
</body>
</html>