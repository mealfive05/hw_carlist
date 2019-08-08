<?php
//     require_once("config.php");
//     $link = mysqli_connect($dbhost,$dbuser,$dbpass);
//     mysqli_select_db($link,$dbname);
//     $sqlCommand = "select * from members";
//     $result = mysqli_query($link,$sqlCommand);
//     while($row = mysqli_fetch_assoc($result)){
        
//         echo "mid :{$row['mid']}<br>";
//         echo "username :{$row['username']}<br>";
//         echo "passsword :{$row['password']}<br>";
//         echo "<hr>";
    
//     }
//     exit();
// ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" />
<link rel="stylesheet" href="styles.css" />
</head>
<body>
<div data-role="page" data-theme="c">

<div data-role="header">
	
</div>

<div data-role="content">
	<ul data-role="listview" data-filter="true">
        
			<li>
		<a href="employeeDetails.php?id=1"> 
			<img src="images/">
			<h4> </h4>
			<p> </p> <span class="ui-li-count">4</span>
		</a>
		</li>
        
		</ul>
</div>

</div>
</body>
</html>