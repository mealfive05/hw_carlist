<?php
session_start();
if (isset($_POST["clear_session"])) {
  unset($_SESSION["caritem"]);
  unset($_SESSION["carlist"]);
  echo "購物車內沒有商品!";
  echo "<hr>";
} else if (!isset($_SESSION["caritem"])) {
  echo "購物車內沒有商品!";
  echo "<hr>";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lab - index</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style>
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
      $str_sec = explode(",", $_SESSION["caritem"]);          //商品品項(字串)處理成陣列，取出來當作購物車SESSION的KEY值
      for ($i = 0; $i < count($_SESSION["carlist"]); $i++) {
        $cc = $str_sec[$i];

        $carlist = $_SESSION["carlist"];
        //印出資訊
        ?> <a href="Products_details.php?pid=<?= $carlist[$cc]["pid"] ?>"><img src="images/<?php echo $carlist[$cc]["pname_e"] ?>.png" title="查看商品詳細資訊"></a>
        <div><?php echo "商品名稱:" . $carlist[$cc]["pname"] . "<br>"; ?></div>
        <div><?php echo "價格:" . $carlist[$cc]["price"] . "<br>"; ?></div>
        數量:<input type="number" id="number<?php echo $i; ?>" value="<?php echo $carlist[$cc]["number"]; ?>">

        <?php


        echo "<hr>";
      }
      ?><input type="submit" name="clear_session" value="清空所有數量">
      <input type="button" value="結帳">
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
  <script>
    <?php for ($i = 0; $i < count($_SESSION["carlist"]); $i++) { ?>
      document.getElementById('number<?php echo $i; ?>').disabled = "true"; //鎖住購物車數量
    <?php } ?>
  </script>
</body>

</html>