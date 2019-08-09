<?php
session_start();
if (isset($_POST["clear_session"])) {
  unset($_SESSION["caritem"]);
  unset($_SESSION["carlist"]);
  echo "購物車內沒有商品!";
  echo "<hr>";
}else if(!isset($_SESSION["caritem"])){
  echo "購物車內沒有商品!";
  echo "<hr>";
}
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
    .card {
      width: 27%;
      display: inline-block;
      margin-left: 3%;
      margin-top: 3%;

    }

    img {
      margin: 1%;
      display: block;
      width: 200px;
      height: 200px;



    }
  </style>

</head>

<body>
  <form id="form2" name="form2" method="post" action="">
    <?php
    if (isset($_SESSION["carlist"])) {
      $str_sec = explode(",", $_SESSION["caritem"]);
      for ($i = 0; $i < count($_SESSION["carlist"]); $i++) {
        $cc = $str_sec[$i];

        $carlist = $_SESSION["carlist"];
        ?> <a href="Products_details.php?pid=<?= $carlist[$cc]["pid"] ?>"><img src="images/<?php echo $carlist[$cc]["pname_e"] ?>.png"></a>
        <div ><?php echo "商品名稱:" . $carlist[$cc]["pname"] . "<br>"; ?></div>
        <div ><?php echo "價格:" . $carlist[$cc]["price"] . "<br>"; ?></div>
        數量:<input type="number" value="<?php echo $carlist[$cc]["number"]; ?>">

        <?php

        // foreach($carlist[$cc] as $key=>$value){

        // 	echo $key .":".$value;
        // 	echo "<br>";
        // }
        echo "<hr>";
      }
      ?><input type="submit" name="clear_session" value="清空所有數量">
      <?php } ?>
                                                            


  </form>

  <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <tr>
      <td align="center" bgcolor="#CCCCCC">
        <font color="#FFFFFF">會員系統 - 首頁</font>
      </td>
    </tr>
    <tr>
      <td align="center" valign="baseline">
        <?php
        $userName = "Guest";
        if (isset($_SESSION["userName"])) {
          $userName = $_SESSION["userName"];
        }
        if ($userName == "Guest") { ?>
          <a href="login.php">登入</a>
        <?php } else { ?>
          <a href="login.php?signout=1">登出</a>
        <?php } ?>
        | <a href="index.php">回首頁</a>


    </tr>
    <tr>
      <td align="center" bgcolor="#CCCCCC">welcome! <?php echo $userName; ?></td>
    </tr>
  </table>


  <!-- </div> -->


</body>

</html>