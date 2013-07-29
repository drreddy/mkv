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
ul
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
}
li
{
float:left;
}
.gallery
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #50A6C2;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
}
.gallery:hover,.gallery:active
{
background-color:  #05B8CC;
}
.galleryactive
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #05B8CC;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
}
.gallery1
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #50A6C2;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
-moz-border-radius-bottomright: 25px;
border-bottom-right-radius: 25px;
-moz-border-radius-topright: 25px;
border-top-right-radius: 25px;
}
.gallery1:hover,.gallery:active
{
background-color:  #05B8CC;
}
.gallery1active
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #05B8CC;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
-moz-border-radius-bottomright: 25px;
border-bottom-right-radius: 25px;
-moz-border-radius-topright: 25px;
border-top-right-radius: 25px;
}
.gallery2
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #50A6C2;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
-moz-border-radius-bottomleft: 25px;
border-bottom-left-radius: 25px;
-moz-border-radius-topleft: 25px;
border-top-left-radius: 25px;
}
.gallery2:hover,.gallery:active
{
background-color:  #05B8CC;
}
.gallery2active
{
display:block;
width:300px;
font-weight:bold;
color: white;
background-color: #05B8CC;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
cursor:pointer;
border: 4px solid #50A6C2;
-moz-border-radius-bottomleft: 25px;
border-bottom-left-radius: 25px;
-moz-border-radius-topleft: 25px;
border-top-left-radius: 25px;
}
</style>
</head>

<?php
$con = mysql_connect('sql3.freesqldatabase.com:3306', 'sql315031', 'gL5!vN7*');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';

$result = mysql_query($con,"SELECT * FROM intern WHERE 1");

echo "<div id='videos-grid'><table border='1'>
<tr>
<th>Name</th>
<th>Mail Id</th>
<th>University</th>
<th>research</th>
<th>relcourse</th>
<th>Status</th>
</tr>";

while($row = mysql_fetch_array($result))
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
VALUES ('$_POST[name]','$_POST[mail]','$_POST[univ]','$_POST[research]','$_POST[relcourse]')";
if (!mysql_query($con,$sql))
  {
  die('Error: ' . mysql_error($con));
  }
else{
    $suc = "record added";
}
}
mysql_close($con);
?>
<body>
<div style="allign:center; margin-left:50px; ">
    						<ul>
                            <li class="gallery2" id="firatab">Form</li>
							<li class="gallery1" id="videostab">DB Entri</li>
							</ul>
			</div>
	<div id="fira-grid">
        <form style="float:right; width:20%;" action="index.php" method="post">
        <input style="width:100%;" type="text" name="name" placeholder="Name"><br/>
        <input type="text" name="mail" placeholder="Email Id"><br/>
        <input type="text" name="univ" placeholder="University"><br/>
        <input type="text" name="research" placeholder="Research"><br/>
        <textarea rows="10" cols="30" name="relcourse" placeholder="Relcourse">
        </textarea><br/>
        <input type="submit">
        </form>
        <br/><br/>
        <?php $suc; ?>	
	</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 
$("#videos-grid").hide();
$("#firatab").attr("class", "gallery2active");
$("#videostab").click(function(){
	$("#fira-grid").fadeOut("fast",function(){
			$("#videos-grid").fadeIn("fast");
			$("#videostab").attr("class", "gallery1active");
			$("#firatab").attr("class", "gallery2");				
	});	
});
$("#firatab").click(function(){
	$("#videos-grid").fadeOut("fast",function(){
			$("#fira-grid").fadeIn("fast");
			$("#firatab").attr("class", "gallery2active");
			$("#videostab").attr("class", "gallery1");
	});		
});
</script>
</body>
</html>