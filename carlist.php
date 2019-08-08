<?php
session_start();
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
// print_r($_SESSION["caritem"]);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
/* table { 
  border:1px solid #000; 
  font-family: 微軟正黑體;
  font-size:16px; 
  width:70%;
  border:1px solid #000;
  text-align:center;
  border-collapse:collapse;
} 
td { 
  border:1px solid #000;
  padding:5px;
}  */
.card{
  width: 27%; 
  display: inline-block;
  margin-left:3%;
  margin-top:3%;

}
img{
  display: block;
  width: 250px;
  height: 200px;
 
 

}
</style>

</head>
<body>

<?php 




$str_sec = explode(",",$_SESSION["caritem"]);
for($i=0;$i<count($_SESSION["carlist"]);$i++){
$cc=$str_sec[$i];

$carlist=$_SESSION["carlist"];

?><div class="ooo"><?php echo "商品名稱:".$carlist[$cc]["pname"]."<br>";?></div>
<div class="number1">數量:<?php echo $carlist[$cc]["number"]."<br>";?></div>

<?php
// foreach($carlist[$cc] as $key=>$value){

// 	echo $key .":".$value;
// 	echo "<br>";
// }
echo "<hr>";
}
?>
<input type="button" value="清空所有數量" onclick="clear2()">
<!-- <div class="card" >
<a href="#" ><img src="images/blacktea.png" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->



<!-- <table>
<tr>
  <td rowspan="2">rowspan欄位</td>
  <td>表格1</td></tr>
<tr>
  <td>表格2</td>
</tr>
</table> -->

</div>
<script>
  function clear2(){
    document.getElementsByClassName("number1").innerHTML = "數量:"+0;
  }
</script>

</body>
</html>