<!DOCTYPE html>
<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700|Open+Sans+Condensed:700" rel="stylesheet">
<style>
body{
font-family: 'Open Sans',sans-serif;
font-weight: 400;
background: #f2f5f3;
color: #6b7770;
font-size: 11.5pt;
line-height: 2em;
}
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
width:100%;
float:left;
}
input, textarea{
padding:10px;
font-family: 'Open Sans',sans-serif;
font-weight: 400;
color: #6b7770;
font-size: 11.5pt;
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
<body>
    <div style="allign:center; margin-left:28%; ">
    	<ul>
        <li class="gallery2" id="firatab">Form</li>
    	<li class="gallery1" id="videostab">DB Entries</li>
    	</ul>
    </div>
    <br/>
    <?php
    $con = mysql_connect('sql3.freesqldatabase.com:3306', 'sql315031', 'gL5!vN7*');
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    //echo 'Connected successfully';
    mysql_select_db("sql315031", $con);
    $result = mysql_query("SELECT * FROM intern");
    if($result){
    
    echo "<div id='videos-grid' style='margin-top:-20px; display:none;'><table>
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
    echo "</table></div>";}
    if($_POST){
    $query = mysql_query("SELECT * FROM intern WHERE mail_id  = '". $_POST['mail'] ."'"); 
    if (mysql_num_rows($query) == 0) 
    { 
        $sql="INSERT INTO intern (name,mail_id,university,research,relcourse) 
        VALUES ('{$_POST['name']}','{$_POST['mail']}','{$_POST['univ']}','{$_POST['research']}','{$_POST['relcourse']}')";
        $r = mysql_query($sql); 
        if (!$r)
          {
          die('Error: ' . mysql_error($con));
          }
        else{
            $suc = "record added";
        }
    }
    }
    mysql_close($con);
    ?>
	<div id="fira-grid">
        <form style="float:left; width:50%; border-right:1px solid grey;" action="index.php" method="post">
        <input style="width:75%;" type="text" name="name" placeholder="Name"><br/>
        <input style="width:75%;" type="text" name="mail" placeholder="Email Id"><br/>
        <input style="width:75%;" type="text" name="univ" placeholder="University"><br/>
        <input style="width:75%;" type="text" name="research" placeholder="Research"><br/>
        <textarea rows="10" cols="77" name="relcourse" placeholder="Relcourse"></textarea><br/>
        <input type="submit">
        </form>
        <?php $suc; ?>
        <div style="float:left; width:50%; position:absolute; left:50%; ">
        <center><h4><u>Courses Done</u></h4>
        <div>
            Chemical Kinetics,<br/> Fluid Mechanics and its laboratory,<br/> Chemical Process Calculation,<br/> Thermodynamics,<br/> Heat Transfer and its laboratory<br/> 
            Chemical Reaction Engineering,<br/> Computer Aided Process Engineering,<br/> Computer Methods in Chemical Engineering,<br/> Instrumentation and Process Control and its laboratory,<br/> Mass Transfer- 1 & 2 and its laboratory,<br/> Mechanical Operations and its laboratory,<br/> Transport Phenomena,<br/> Chemical Equipment Design-1 & 2<br/>
            Biochemical Engineering,<br/> Process Modelling and Simulation,<br/> Optimization techniques in chemical engineering,<br/>
        
        </div>
        </center>
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
});
</script>
</body>
</html>